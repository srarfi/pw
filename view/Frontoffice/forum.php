<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "projet_web";

// Create a PDO connection
try {
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

// Handle Post Submission, Edit, and Delete
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['user'], $_POST['post'])) {
        $userv = $_POST['user'];
        $postv = $_POST['post'];

        // Insert new post
        $stmt = $pdo->prepare("INSERT INTO post (user, post) VALUES (?, ?)");
        $stmt->execute([$userv, $postv]);
    } elseif (isset($_POST['edit_post'], $_POST['edit_text'])) {
        // Edit existing post
        $postId = $_POST['edit_post'];
        $editText = $_POST['edit_text'];

        $stmt = $pdo->prepare("UPDATE post SET post = ? WHERE id = ?");
        $stmt->execute([$editText, $postId]);
    } elseif (isset($_POST['delete_post'])) {
        // Delete existing post
        $postIdToDelete = $_POST['delete_post'];

        $stmt = $pdo->prepare("DELETE FROM post WHERE id = ?");
        $stmt->execute([$postIdToDelete]);
    }
}

// Fetch Posts
$query = "SELECT id, user, post FROM post ORDER BY id DESC";
$result = $pdo->query($query);

if ($result) {
    $posts = $result->fetchAll(PDO::FETCH_ASSOC);
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

    <style>
    .post-container {
        background-color: #f8f9fa;
        margin-bottom: 20px;
        padding: 15px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .user-info {
        background-color: #3498db;
        color: white;
        padding: 10px;
        border-radius: 5px 5px 0 0;
    }

    .post-content {
        padding: 15px;
    }

    .edit-button,
    .delete-button {
        background-color: #4CAF50;
        color: white;
        padding: 10px 15px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        margin-right: 5px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        transition: background-color 0.3s ease;
    }

    .delete-button {
        background-color: #e74c3c;
    }

    .edit-button:hover,
    .delete-button:hover {
        background-color: #45a049;
    }

    .edit-form,
    .delete-form {
        display: inline-block;
    }

    input[type="text"] {
        width: 200px;
        padding: 8px;
        margin-right: 5px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }
    .error-message {
        color: #e74c3c;
        font-size: 14px;
        margin-top: 5px;
    }
</style>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const editButtons = document.querySelectorAll('.edit-button');

        editButtons.forEach(button => {
            button.addEventListener('click', function () {
                const postId = this.getAttribute('data-post-id');
                const postContent = this.parentElement.querySelector('p:last-child').textContent;

                const editText = prompt('Edit Post:', postContent);
                if (editText !== null) {
                    // Set the values for the edit form
                    document.getElementById('editPostId').value = postId;
                    document.getElementById('postAuthor').value = '<?php echo htmlspecialchars($userv); ?>';
                    document.getElementById('postContent').value = editText;

                    // Submit the form programmatically
                    document.getElementById('editForm').submit();
                }
            });
        });
    });
</script>
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
        
        <form action="" method="POST" class="post-content" onsubmit="return validateForm()">
        <input type="text" id="postAuthor" name="user" placeholder="Your username" required>
        <span class="error-message" id="usernameError"></span>

        <textarea id="postContent" name="post" placeholder="Write your post here" required></textarea>
        <span class="error-message" id="postContentError"></span>

        <button type="submit" class="button">Submit Post</button>
    </form>
<div id="editContainer" style="display: none;">
    <input type="text" id="editInput" name="editedPost" placeholder="Edit your post" required>
    <span class="error-message" id="editError"></span>
    <button type="submit" id="editButton" class="button">Confirm Edit</button>
</div>


<div id="posts">
        <?php
        // Display the posts
        if (isset($posts) && is_array($posts)) {
            foreach ($posts as $post) {
                echo '<div class="post">';
                echo '<p><strong>User:</strong> ' . htmlspecialchars($post['user']) . '</p>';
                echo '<p><strong>Post:</strong> ' . htmlspecialchars($post['post']) . '</p>';
                echo '<form action="" method="post" class="edit-form">';
                echo '<input type="hidden" name="edit_post" value="' . $post['id'] . '">';
                echo '<input type="hidden" name="user" value="' . htmlspecialchars($post['user']) . '">';
                echo '<input type="text" name="edit_text" placeholder="Edit post text">';
                echo '<button type="submit" class="edit-button">Edit</button>';
                echo '</form>';
                echo '<form action="" method="post" class="delete-form">';
                echo '<input type="hidden" name="delete_post" value="' . $post['id'] . '">';
                echo '<button type="submit" class="delete-button">Delete</button>';
                echo '</form>';
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
    <script>
    function validateForm() {
        const authorInput = document.getElementById('postAuthor');
        const postContentInput = document.getElementById('postContent');
        const usernameError = document.getElementById('usernameError');
        const postContentError = document.getElementById('postContentError');

        // Reset previous error messages
        usernameError.textContent = '';
        postContentError.textContent = '';

        // Check if username is empty
        if (authorInput.value.trim() === '') {
            usernameError.textContent = 'Username is required.';
            return false;
        }

        // Check if post content is empty
        if (postContentInput.value.trim() === '') {
            postContentError.textContent = 'Post content cannot be empty.';
            return false;
        }

        return true;
    }

    function showEditForm(postId, currentContent) {
        const editContainer = document.getElementById('editContainer');
        const editInput = document.getElementById('editInput');
        const editButton = document.getElementById('editButton');

        // Show the edit form
        editContainer.style.display = 'block';

        // Set the current content in the edit input
        editInput.value = currentContent;

        // Update the form action to include the post ID
        document.querySelector('.post-content').action = `?edit=${postId}`;

        // Focus on the edit input
        editInput.focus();
    }
</script>
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

<?php
// Close the PDO connection after executing queries
$pdo = null;
?>
