<?php
include "../control/coachingc.php";
include "../model/coaching.php";
session_start();
$id=$_SESSION["id"];
$coachingc = new coachingc();

if (isset($_POST['objectif']) && isset($_POST['jours']) && isset($_POST['heures']) && isset($_POST['basket'])) {
    if (!empty($_POST['objectif']) && !empty($_POST['jours']) && !empty($_POST['heures']) && !empty($_POST['basket'])) {
        $coaching = new coaching(null,$id, $_POST['objectif'], $_POST['jours'], $_POST['heures'], $_POST['basket']);
        $coachingc->plans($coaching);

        // Redirect to the confirmation HTML page
        header("location: submit_coaching_form.php");
        exit(); // Make sure to stop the script after redirecting
    }
}
?>


<html lang="en">

<head>
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
    <link rel="stylesheet" type="text/css" href="assets/css/coachingcss.css">
<!--
    




-->
	<style type="text/css">
	.auto-style1 {
		color: #DCDDE1;
		text-decoration: underline;
	}
	.auto-style2 {
		color: #DCDDE1;
	}

    .Contenu {
    width: 50%;
    margin: auto;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 10px;
    background-color: #f5f5f5;
    text-align: center;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h1 {
    color: #333;
}

h2 {
    color: #555;
}

label {
    display: inline-block;
    margin-bottom: 8px;
}

input[type="checkbox"],
input[type="radio"] {
    margin-right: 5px;
}

input[type="submit"] {
    background-color: #4caf50;
    color: white;
    padding: 10px 20px;
    font-size: 16px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

input[type="submit"]:hover {
    background-color: #45a049;
}

	</style>
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

            <a class="log.png" href="home2.php">
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
    <!-- Close Header -->
    
    <script src="coachingscript.js"></script>
    

<div class="Contenu">
  <h1> Formulaire de Coaching (Ajout)</h1> 
        <form action="" method="POST" onsubmit="return validateForm()">

        <h2>Choisissez l'Objectif :</h2>
        <label for="perte_poids">
            <input type="checkbox" id="perte_poids" name="objectif" value="perte_poids"> Perte de Poids
        </label><br>
        <label for="prise_muscle">
            <input type="checkbox" id="prise_muscle" name="objectif" value="prise_muscle"> Prise de Muscle
        </label><br>
        <label for="forme_generale">
            <input type="checkbox" id="forme_generale" name="objectif" value="forme_generale"> Forme Générale
        </label><br>
        <label for="endurance">
            <input type="checkbox" id="endurance" name="objectif" value="endurance"> Endurance
        </label><br>
        <label for="flexibilite">
            <input type="checkbox" id="flexibilite" name="objectif" value="flexibilite"> Flexibilité
        </label><br>
        <h2>Nombre de Jours Disponibles :</h2>
        <label for="jours_1">
            <input type="radio" id="jours_1" name="jours" value="1"> 1 Jour
        </label><br>
        <label for="jours_2">
            <input type="radio" id="jours_2" name="jours" value="2"> 2 Jours
        </label><br>
        <label for="jours_3">
            <input type="radio" id="jours_3" name="jours" value="3"> 3 Jours
        </label><br>
        <label for="jours_4">
            <input type="radio" id="jours_4" name="jours" value="4"> 4 Jours
        </label><br>
        <label for="jours_5">
            <input type="radio" id="jours_5" name="jours" value="5"> 5 Jours
        </label><br>
        <h2>Heures par Jour :</h2>
        <label for="heures_1">
            <input type="radio" id="heures_1" name="heures" value="1"> 1 Heure
        </label><br>
        <label for="heures_2">
            <input type="radio" id="heures_2" name="heures" value="2"> 2 Heures
        </label><br>
        <label for="heures_3">
            <input type="radio" id="heures_3" name="heures" value="3"> 3 Heures
        </label><br>
        <label for="heures_4">
            <input type="radio" id="heures_4" name="heures" value="4"> 4 Heures
        </label><br>
        <label for="heures_5">
            <input type="radio" id="heures_5" name="heures" value="5"> 5 Heures
        </label><br>
        <h2>Exercices Baskets  selectionee :</h2>
        <label for="ex">
            <input type="checkbox" id="ex" name="basket" value="non"> Pas interesse
        </label><br>
        <label for="ex1">
            <input type="checkbox" id="ex1" name="basket" value="verticalité"> Augmentation de la verticalité
        </label><br>
        <label for="ex2">
            <input type="checkbox" id="ex2" name="basket" value="Dribble"> Meilleure Dribble
        </label><br>
        <label for="ex3">
            <input type="checkbox" id="ex3" name="basket" value="Tir"> Tir
        </label><br>
        <label for="ex4">
            <input type="checkbox" id="ex4" name="basket" value="Passe "> Passe
        </label><br>
        <input type="submit" value="Envoi">
    </form>
</div>
      



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