
<?php
include "../model/produit.php";
include "../controller/produitC.php"; 
$c = new ProductController();
$productList = $c->listProducts(); 
$salesController = new SalesController();
$bestAndLeastSellers = $salesController->getBestAndLeastSellers();


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title> Shop - Product  Page</title>
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

 <script src="https://kit.fontawesome.com/1694914d74.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="styles/style.css">

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
    <main>
   

                

        <div class="container mt-3 mb-5">
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                        class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                        aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                        aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner rounded-3">
                    <div class="carousel-item active">
                        <div class="row panda-bg-info p-5 d-flex align-items-center">
                            <div class="col-lg-7 ps-5">
                                <h1 class="fw-bold mb-3"><span lang="en-gb">AMINO X</span></h1>
                                <p class="mb-4">AMINOx is a stimulant free, BCAA formula designed to support endurance during your workout and aid in muscle recovery post training,
                                 so you can push your performance to the next level.<br>Amino acids are the building blocks of proteins and play crucial roles in various physiological processes in the human body.<br> 
                                 There are 20 different amino acids that can be categorized as essential and non-essential.</p>
                                <h1 class="price fw-semibold">
								<span lang="en-gb">120DT</span></h1>
                                <input type="hidden" name="111" value="<?php echo $product['id_prod']; ?>">
                                <input type="hidden" name="aminox" value="<?php echo $product['nom']; ?>">
    
                                <button type="submit" class="btn-buy-now">Buy Now <i class="fa-solid fa-arrow-right"></i></button>

                            </div>
                            <div class="col-lg-4">
                                &nbsp;<img src="images/BSN1960036_grey_900x-PhotoRoom.png" alt="" height="400" width="332"></div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row panda-bg-info p-5 d-flex align-items-center">
                            <div class="col-lg-7 ps-5">
                                <h1 class="fw-bold mb-3">WOMEN S MULTIVITAMIN- 120TABS</h1>
                                <p class="mb-4">spectre complet de vitamines essentielles
boosters d'immunite
vitamine c, vitamine d, fer et zinc
bioflavonoides et isoflavones d agrumes
mineraux critiques et micronutriments
sante de la peau, des os et des yeux
complexe complet de vitamines b
antioxydants et soutien au metabolisme</p>
                                <h1 class="price fw-semibold">130DT</h1>
                                <input type="hidden" name="112" value="<?php echo $product['id_prod']; ?>">
                                <input type="hidden" name="womenV" value="<?php echo $product['nom']; ?>">
    
                                <button type="submit" class="btn-buy-now">Buy Now <i class="fa-solid fa-arrow-right"></i></button>
                            </div>
                            <div class="col-lg-4">
                                <img src="images/wemen.png" class="d-block w-100 mt-4 mt-lg-0" alt="" height="400" width="120">
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row panda-bg-info p-5 d-flex align-items-center">
                            <div class="col-lg-7 ps-5">
                                <h1 class="fw-bold mb-3">Optimum Nutrition Whey</h1>
                                <p class="mb-4">Optimum Nutrition GOLD STANDARD 100% WHEY is formulated from premium whey sources, helping your body to repair and rebuild muscle fibres after training.<br> Each great tasting serving
                                 contains 24 g of premium whey protein,
                                 5.5 g of naturally occurring BCAAs</p>
                                <h1 class="price fw-semibold">355.500DT</h1>
                                <input type="hidden" name="111" value="<?php echo $product['id_prod']; ?>">
                                <input type="hidden" name="aminox" value="<?php echo $product['nom']; ?>">
    
                                <button type="submit" class="btn-buy-now">Buy Now <i class="fa-solid fa-arrow-right"></i></button>
                            </div>
                            <div class="col-lg-4">
                                <img src="images/whey.png" class="d-block w-100" alt="" height="400" width="266">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container my-5">
            <h2 class="fw-semibold mb-3">Categories</h2>
            <div class="row g-4">
                <div class="col-sm-12 col-md-6 col-lg-4">
                    <div
                        class="p-3 border bg-primary text-light d-flex align-items-center justify-content-around rounded-3 watch">
                        <h2 class="fw-semibold"><span lang="en-gb">vitamines</span></h2>
                        &nbsp;</div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-4">
                    <div
                        class="p-3 border bg-success text-light d-flex align-items-center justify-content-around rounded-3 bag">
                        <h2 class="fw-semibold"><span lang="en-gb">protein</span></h2>
                        &nbsp;</div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-4">
                    <div
                        class="p-3 border bg-warning text-light d-flex align-items-center justify-content-around rounded-3 shoes">
                        <h2 class="fw-semibold"><span lang="en-gb">herbal 
						supplements</span></h2>
                        &nbsp;</div>
                </div>
            </div>
        </div>

        <section class="all-categories">
        <?php

if ($productList) {
    echo '<table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Category</th>
                <th scope="col">Product Name</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Best Seller</td>
                <td>' . $bestAndLeastSellers['best_seller']['nom'] . '</td>
            </tr>
            <tr>
                <td>Least Seller</td>
                <td>' . $bestAndLeastSellers['least_seller']['nom'] . '</td>
            </tr>
        </tbody>
    </table>';

    
    echo "<section class='container my-5'>
            <div class='row g-4'>";
    

            foreach ($productList as $product) {
                echo "<div class='col'>
                    <div class='card border-0 rounded-3 h-100'>
                        <img src='images/{$product['photo']}' alt='{$product['nom']}' height='360' width='241'>
                        <div class='card-body text-center'>
                            <h5 class='card-title fw-semibold'>{$product['nom']}</h5>
                            <p class='card-text mt-4'>{$product['description']}</p>
                            <h5 class='price fw-semibold'>{$product['prix_prod']}</h5>
                        </div>
                        <div class='mb-4 mx-auto'>
                            <form action='checkout.php' method='post'>
                                <input type='hidden' name='product-id' value='{$product['id_prod']}'>
                                <input type='hidden' name='product-name' value='{$product['nom']}'>
                                <input type='hidden' name='product-price' value='{$product['prix_prod']}'> <!-- Add this line -->
                                <button type='submit' class='btn-buy-now'>Buy Now <i class='fa-solid fa-arrow-right'></i></button>
                            </form>
                        </div>
                    </div>
                </div>";
            }
            

    echo "</div></section>";
} else {
    echo "<p>No products found.</p>";
}
?>



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

   
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
    crossorigin="anonymous"></script>

</body>
</html>





