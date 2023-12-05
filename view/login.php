<?php
require "../config.php";

    session_start();
    
    $uname = $_POST['uname'];
    $pass = $_POST['password'];
    echo'uname'.$uname;
    echo'pass'.$pass;
    if (empty($uname)) {
        
        //header("Location: session.php?error=User Name is required");
    } else if (empty($pass)) {
        
        //header("Location: session.php?error=Password is required");
    } else {
        try {
            $conn = new PDO(
                'mysql:host=localhost;dbname=projet_web',
                'root',
                '',
                [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                ]
                );
            //$conn = new PDO("mysql:host=localhost;dbname=projet_web", "", "");
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $conn->prepare("SELECT * FROM utilisateur WHERE login_ut=:uname AND mdp_ut=:pass");
            $stmt->bindParam(':uname', $uname);
            $stmt->bindParam(':pass', $pass);
            $stmt->execute();

            $user = $stmt->fetch(PDO::FETCH_ASSOC);
                if ($user['login_ut'] === $uname && $user['mdp_ut'] === $pass) {
                    echo "Logged in!";

                    $_SESSION['login'] = $user['login_ut'];
                    $_SESSION['name'] = $user['nom_ut'];
                    $_SESSION['id'] = $user['id_ut'];

                    //header("Location: home.php");
                    exit();
                } else {
                    header("Location: session.php?error=Incorrect User name or password");
                    exit();
                }
        } catch (PDOException $e) {
            header("Location: session.php?error=Database connection error");
            exit();
        }
    }

?>