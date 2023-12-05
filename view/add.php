<?php
 include "../control/utilisateurC.php";
 include "../model/utilisateur.php";
 $utilisateurc = new utilisateurc();
 if(isset($_POST['role_ut']) && isset($_POST['username']) && isset($_POST['nom_ut']) && isset($_POST['prenom_ut']) && isset($_POST['email_ut']) && isset($_POST['tel_ut']) && isset($_POST['cin_ut']) && isset($_POST['poid_ut']) && isset($_POST['taille_ut']) && isset($_POST['genre_ut']) && isset($_POST['age_ut']) && isset($_POST['addresse_ut']) && isset($_POST['login_ut']) && isset($_POST['mdp_ut'])){
    if(!empty($_POST['role_ut']) && !empty($_POST['username']) && !empty($_POST['nom_ut']) && !empty($_POST['prenom_ut']) && !empty($_POST['email_ut']) && !empty($_POST['tel_ut']) && !empty($_POST['cin_ut']) && !empty($_POST['poid_ut']) && !empty($_POST['taille_ut']) && !empty($_POST['genre_ut']) && !empty($_POST['age_ut']) && !empty($_POST['addresse_ut']) && !empty($_POST['login_ut']) && !empty($_POST['mdp_ut'])){
        $utilisateur= new utilisateur(NULL, $_POST['role_ut'] , $_POST['username'] ,$_POST['nom_ut'], $_POST['prenom_ut'] , $_POST['email_ut'] , $_POST['tel_ut'] , $_POST['cin_ut'] , $_POST['poid_ut'] , $_POST['taille_ut'] , $_POST['genre_ut'] , $_POST['age_ut'] ,$_POST['addresse_ut'], $_POST['login_ut'] , $_POST['mdp_ut']) ;
        $utilisateurc->addutilisateur($utilisateur);
        //header("location:liste.php");   
     }
}
?>


<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire Utilisateur</title>
    <link rel="stylesheet" type="text/css" href="test.css">
    <script src="test1.js"></script>

    <title>Zay Shop - Product Detail Page</title>
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

            <a class="log.png" href="index.html">
            <img src="log.png" alt="GymBros" height="77" width="118">
            </a>

            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#templatemo_main_nav" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            </button>

            <div class="align-self-center collapse navbar-collapse flex-fill  d-lg-flex justify-content-lg-between" id="templatemo_main_nav">
                <div class="flex-fill">
                    <ul class="nav navbar-nav d-flex justify-content-between mx-lg-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="index.html">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="about.html">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="shop.html">Shop</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contact.html">Contact</a>
                        </li>
                    </ul>
                </div>
                
        </div>
    </nav>
    <!-- Close Header -->














    <h2>bienvenue </h2>
    <form  method="POST"  onsubmit="return validateForm()">
        <label for="role">Role :</label>
        <select id="role" name="role_ut">
            <option value="client">Client</option>
            <option value="admin">Admin</option>
            <option value="coach">Coach</option>
        </select><br><br>

        <label for="username">Nom d'utilisateur :</label>
        <input type="text" id="username" name="username" required><br><br>

        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom_ut"required><br><br>

        <label for="prenom">Prenom :</label>
        <input type="text" id="prenom" name="prenom_ut" required><br><br>

        <label for="email">Email :</label>
        <input type="email" id="email" name="email_ut" required><br><br>

        <label for="tel">Telephone :</label>
        <input type="tel" id="tel" name="tel_ut" required><br><br>

        <label for="cin">CIN :</label>
        <input type="text" id="cin" name="cin_ut" required><br><br>

        <label for="poid">Poids :</label>
        <input type="number" id="poid" name="poid_ut" required><br><br>

        <label for="taille">Taille :</label>
        <input type="number" id="taille" name="taille_ut" required><br><br>

        <label for="genre">Genre :</label>
        <input type="radio" id="homme" name="genre_ut" value="H" required>
        <label for="homme">Homme</label>
        <input type="radio" id="femme" name="genre_ut" value="F" required>
        <label for="femme">Femme</label><br><br>

        <label for="age">Âge :</label>
        <input type="number" id="age" name="age_ut" required><br><br>

        <label for="adresse">Adresse :</label>
        <textarea id="adresse" name="addresse_ut" required></textarea><br><br>

        <label for="login">Login :</label>
        <input type="text" id="login" name="login_ut" required><br><br>

        <label for="password">Mot de passe :</label>
        <input type="password" id="password" name="mdp_ut" required><br><br>

        <label for="con_password">confirmer mot de passe :</label>
        <input type="password" id="con_password" name="con_password" required><br><br>

        <input type="submit" value="s'inscrire">
    </form>



























    <!-- Start Footer -->
    <footer class="bg-dark" id="tempaltemo_footer">
        <div class="container">
            <div class="row">

                <div class="col-md-4 pt-5">
                    <h2 class="h2 text-success border-bottom pb-3 border-light logo">
					<span lang="en-gb">GymBros</span></h2>
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
                        <li><a class="text-decoration-none" href="#">Home</a></li>
                        <li><a class="text-decoration-none" href="#">About Us</a></li>
                        <li><a class="text-decoration-none" href="#">Shop Locations</a></li>
                        <li><a class="text-decoration-none" href="#">FAQs</a></li>
                        <li><a class="text-decoration-none" href="#">Contact</a></li>
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
                <div class="col-auto">
                    <label class="sr-only" for="subscribeEmail">Email address</label>
                    <div class="input-group mb-2">
                        <input type="text" class="form-control bg-dark border-light" id="subscribeEmail" placeholder="Email address">
                        <div class="input-group-text btn-success text-light">Subscribe</div>
                    </div>
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
    <script src="assets/js/slick.min.js"></script>
    <script>
        $('#carousel-related-product').slick({
            infinite: true,
            arrows: false,
            slidesToShow: 4,
            slidesToScroll: 3,
            dots: true,
            responsive: [{
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 3
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 3
                    }
                }
            ]
        });
    </script>





</body>

</html>
