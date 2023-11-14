<?php
 $servername = "localhost";
 $username = "root";
 $password = "";
 $dbname = "projet_web";
 $conn = mysqli_connect($servername, $username, $password, "projet_web");
 if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$query = "SELECT user, post FROM post ORDER BY id DESC";
$result = mysqli_query($conn, $query);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   

    // Check if the 'user' and 'post' keys are set in the $_POST array
    if (isset($_POST['user'], $_POST['post'])) {
        $userv = $_POST['user'];
        $postv = $_POST['post'];
        $stmt = $conn->prepare("INSERT INTO post (user, post) VALUES (?, ?)");
        $stmt->bind_param("ss", $userv, $postv);
        $stmt->execute();

        // Close the statement and connection
        $stmt->close();
        $conn->close();
    }
}

if ($result) {
    $posts = mysqli_fetch_all($result, MYSQLI_ASSOC);
} else {
    die("Error retrieving posts");
}


?>




<html lang="en">
<head>
    <title>Zay Shop - Product Detail Page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="assets/img/apple-icon.png">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/templatemo.css">
    <link rel="stylesheet" href="assets/css/custom.css">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
    <link rel="stylesheet" href="assets/css/fontawesome.min.css">

    <link rel="stylesheet" type="text/css" href="assets/css/slick.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/slick-theme.css">
    <link rel="stylesheet" href="forum.css">
    <script type="text/javascript" src="forum.js"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-dark navbar-light d-none d-lg-block" id="templatemo_nav_top">
        <div class="container text-light">
            <div class="w-100 d-flex justify-content-between">
            </div>
        </div>
    </nav>
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
    <div class="container">
        <h1 style="text-align:center;">Discussion Forum</h1>
    
        <form action="" method="POST" class="post-content">
          <input type="text" id="postAuthor" name="user" placeholder="Your username" required>
          <textarea id="postContent" name="post" placeholder="Write your post here"></textarea>
          <button type="submit" class="button" >Submit Post</button>
        </form>
    
        <div id="posts">
        <?php
        // Display the posts
        if (isset($posts) && is_array($posts)) {
            foreach ($posts as $post) {
                echo '<div class="post">';
                echo '<p><strong>User:</strong> ' . htmlspecialchars($post['user']) . '</p>';
                echo '<p><strong>Post:</strong> ' . htmlspecialchars($post['post']) . '</p>';
                echo '</div>';
            }
        } else {
            echo '<p>No posts available.</p>';
        }
        ?>
    </div>
    
      </div>
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
   
</body>

</html>
    
