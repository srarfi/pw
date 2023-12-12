<?php
session_start();
?>
    <?php
require "../config.php";
require '../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

function generateToken() {
    return bin2hex(random_bytes(2));
}
function exist($mail){
    $db = config::getConnexion(); // Assurez-vous d'avoir la connexion à la base de données

    // Préparez la requête SQL
    $sql = "SELECT * FROM utilisateur WHERE email_ut = :email";
    // Utilisez un try-catch pour gérer les erreurs d'exécution de la requête
    try {
        // Préparez la requête SQL
        $stmt = $db->prepare($sql);

        // Liez le paramètre :email avec la valeur de $email
        $stmt->bindParam(':email', $mail);

        // Exécutez la requête
        $stmt->execute();

        // Récupérez le résultat
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        // Retournez true si l'e-mail existe, sinon false
        return ($result !== false);
    }
    catch (PDOException $e) {
        // Gérez l'exception, par exemple, en enregistrant l'erreur ou en la lançant à nouveau
        echo "Erreur: " . $e->getMessage();
        return false; // Ou lancez à nouveau l'exception si nécessaire
    }
}


// Initialize variables
$email = isset($_POST['mail_v']) ? $_POST['mail_v'] : '';
if(exist($email)){
    $token = generateToken();
    $mail = new PHPMailer(true);

    try {
        // SMTP settings for Gmail
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'ridha.srarfi@esprit.tn';
        $mail->Password = '221JMT7919';
        $mail->SMTPSecure = 'tls';  
        $mail->Port = 587;  

        // Email content
        $mail->setFrom('ridha.srarfi@esprit.tn','gymBros');
        $mail->addAddress($email,'Ahmed Mohsen');
        $mail->Subject = 'Email Verification';
        $mail->msgHTML('<p>Your verification code is: ' . $token . '</p>');

        // Send the email
        $mail->send();
    } catch (Exception $e) {
        echo 'Error sending email: ' . $mail->ErrorInfo;
    }
}
else{
    header("Location: verified.php?error=email nexiste pas");
}

?>


<!DOCTYPE html>
<html>

    <head>
    <!--aa-->
    <link rel="stylesheet" href="css.css">
    <title>gymbros</title>   
    <link rel="icon" href="logo.png" type="image/x-icon">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="assets/img/apple-icon.png">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/templatemo.css">
    <link rel="stylesheet" href="assets/css/custom.css">

    <!-- Load fonts style after rendering the layout styles -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
    <link rel="stylesheet" href="assets/css/fontawesome.min.css">

    <!-- Slick -->
    <link rel="stylesheet" type="text/css" href="assets/css/slick.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/slick-theme.css">
    <link rel="stylesheet" href="forum.css">

   
</head>
<body>
    <!-- Start Top Nav -->
    <nav class="navbar navbar-expand-lg bg-dark navbar-light d-none d-lg-block" id="templatemo_nav_top">
        <div class="container text-light">
            <div class="w-100 d-flex justify-content-between">
            </div>
        </div>
    </nav>
    <!-- Close Top Nav -->


    <!-- Header -->
    <nav class="navbar navbar-expand-lg navbar-light shadow">
        <div class="container d-flex justify-content-between align-items-center">

            <a class="log.png" href="index.html">
            <img src="log.png" alt="GymBros" height="77" width="118">
            </a>

            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#templatemo_main_nav" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            </button>

            <div class="align-self-center collapse navbar-collapse flex-fill  d-lg-flex justify-content-lg-between" id="templatemo_main_nav">
                <div class="flex-fill">
                <ul class="nav navbar-nav d-flex justify-content-between mx-lg-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="home2.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="product.php">product</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="addReclamation.php">Reclamation</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="forum2.php">forum</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="form_coaching.php">coaching</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="verified.php">verifier</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="logout.php">quitter</a>
                        </li>
                    </ul>
                    
                </div>
    </nav>
    


















































<br><br>
    <h2>Verify your account</h2>
    <form action="verif2.php?tokenv=<?php echo urlencode($token); ?>&email=<?php echo urlencode($email); ?>" method="POST">
        <input type="text" name="code" id="code" placeholder="Code">
        <input type="submit" value="Verify">
    </form>
    </body>
    <?php 
echo "<h2 class='text-center'>code has been sent successfully.</h2>";

?>
<br><br>














  <!-- Start Footer -->
  <footer class="bg-dark" id="tempaltemo_footer">
        <div class="container">
            <div class="row">

                <div class="col-md-4 pt-5">
                    
                    <ul class="list-unstyled text-light footer-link-list">
                        <li>
                            <i class="fas fa-map-marker-alt fa-fw"></i>
                            <span lang="en-gb">Esprit </span>
                        </li>
                        <li>
                            <i class="fa fa-phone fa-fw"></i>
                            <a class="text-decoration-none" href="tel:010-020-0340">
							<span lang="en-gb"><span class="auto-style2">
							26183391</span></span></a>
                        </li>
                        <li>
                            <i class="fa fa-envelope fa-fw"></i>
                            <a class="text-decoration-none" href="mailto:info@company.com">
							<span lang="en-gb"><span class="auto-style2">
							GymBros@gmail.com</span></span></a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-4 pt-5">
                    <h2 class="h2 text-light border-bottom pb-3 border-light">Further Info</h2>
                    <ul class="list-unstyled text-light footer-link-list">
                        <li><a class="text-decoration-none" href="home2.php">Home</a></li>
                        <li><a class="text-decoration-none" href="product.php">shop</a></li>
                        <li><a class="text-decoration-none" href="forum2.php">forum</a></li>
                        <li><a class="text-decoration-none" href="addReclamation.php">reclamation</a></li>
                        <li><a class="text-decoration-none" href="form_coaching.php">coaching</a></li>
                    </ul>
                </div>


            </div>

            <div class="row text-light mb-4">
                <div class="col-12 mb-3">
                    <div class="w-100 my-3 border-top border-light"></div>
                </div>
                <div class="col-auto me-auto">
                    <ul class="list-inline text-left footer-icons">
                        <li class="list-inline-item border border-light rounded-circle text-center">
                            <a class="text-light text-decoration-none" target="_blank" href="http://facebook.com/"><i class="fab fa-facebook-f fa-lg fa-fw"></i></a>
                        </li>
                        <li class="list-inline-item border border-light rounded-circle text-center">
                            <a class="text-light text-decoration-none" target="_blank" href="https://www.instagram.com/"><i class="fab fa-instagram fa-lg fa-fw"></i></a>
                        </li>
                        <li class="list-inline-item border border-light rounded-circle text-center">
                            <a class="text-light text-decoration-none" target="_blank" href="https://twitter.com/"><i class="fab fa-twitter fa-lg fa-fw"></i></a>
                        </li>
                        <li class="list-inline-item border border-light rounded-circle text-center">
                            <a class="text-light text-decoration-none" target="_blank" href="https://www.linkedin.com/"><i class="fab fa-linkedin fa-lg fa-fw"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="w-100 bg-black py-3">
            <div class="container">
                <div class="row pt-2">
                    <div class="col-12">
                        <p class="text-left text-light">
                            Copyright &copy; 2021 <span lang="en-gb">GymBros</span> 
                            | Designed by <a href="https://templatemo.com">
							<span lang="en-gb"><span class="auto-style1">HTML 
							Hooligans</span></span></a></p>
                    </div>
                </div>
            </div>
        </div>

    </footer>
    <!-- End Footer -->

    <!-- Start Script -->
    <script src="assets/js/jquery-1.11.0.min.js"></script>
    <script src="assets/js/jquery-migrate-1.2.1.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/templatemo.js"></script>
    <script src="assets/js/custom.js"></script>
    <!-- End Script -->

    <!-- Start Slider Script -->
   
</body>

</html>
    






</body>

</html>