<!DOCTYPE html>
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
    <link rel="stylesheet" href="forum.css">

    <script>
   function validateForm() {
    var objet = document.getElementById("objet").value;
    var description = document.getElementById("description").value;

    var erreurObjet = document.getElementById("erreurObjet");
    var erreurDescription = document.getElementById("erreurDescription");

    // Réinitialiser les messages d'erreur
    erreurObjet.innerHTML = "";
    erreurDescription.innerHTML = "";

    var isValid = true;

    // Valider le champ de type
    if (!/^[a-zA-Z]+$/.test(objet)) {
        erreurObjet.innerHTML = "Le champ Objet de don doit contenir uniquement des lettres.";
    isValid = false;
}
if (!/^[a-zA-Z]+$/.test(description) || /\s/.test(description)) {
    erreurDescription.innerHTML = "Le champ Description de don doit contenir uniquement des lettres.";
    isValid = false;
}

    // Valider le champ de montant
    

    // Désactiver le bouton si la validation échoue pour le champ de type
    document.getElementById("submitBtn").disabled = !isValid;

    return isValid;
}


    // Attacher la fonction de validation au formulaire
    document.getElementById("myForm").addEventListener("submit", function (event) {
        if (!validateForm()) {
            event.preventDefault(); // Empêcher la soumission du formulaire si la validation échoue
        }
    });
</script>
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
                
        </div>
    </nav>
    
    <h2 text-center>reclamation envoyer avec success </h2>
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
                        <li><a class="text-decoration-none" href="forum.php">forum</a></li>
                        <li><a class="text-decoration-none" href="reclamation.php">reclamation</a></li>
                        <li><a class="text-decoration-none" href="form_coaching.php">coaching</a></li>
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