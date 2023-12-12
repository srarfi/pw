<?php
require "../config.php";

session_start();

if (isset($_POST['uname']) && isset($_POST['password'])) {
    if (!empty($_POST['uname']) && !empty($_POST['password'])) {
        $uname = $_POST['uname'];
        $pass = $_POST['password'];
    }
}

if (empty($uname)) {
    header("Location: session.php?error=User Name is required");
    exit();
} else if (empty($pass)) {
    header("Location: session.php?error=Password is required");
    exit();
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
            if($user['role_ut']=="admin"){
                header("Location:admin.php");
            }
            else{
                header("Location:home2.php");
            }
        
        } else {
            exit();
        }
    } catch (PDOException $e) {
        header("Location: session.php?error=Database connection error");
        exit();
    }
}
?>