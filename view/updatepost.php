<?php
require_once '../control\postC.php';
include_once '../model/post.php';
if(isset($_POST["updatedpost"])&&!empty($_POST["updatedpost"])){
    $postModel->editPost($_GET["id"],$_POST["updatedpost"]);
    header("Location: admin.php");
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <<title>gymbros</title>   
    <link rel="icon" href="logo.png" type="image/x-icon">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="forum.css">
    <script src="forum.js" ></script>
</head>
<body>

<div class="sidebar" id="sidebar" onmouseover="expandSidebar()" onmouseout="collapseSidebar()">
    <div class="logo">
        <img src="aa.png.png" alt="Logo" height="96" width="126">
    </div>
    <div class="links"style="position:relative;top:120px;">
        <a href="#">admin gestion_client</a>
        <a href="#">admin gestion_commande</a>
        <a href="#">admin gestion_forum</a>
        <a href="#">admin gestion_</a>
        <a href="#">admin gestion_</a>
    </div>
</div>

<div class="content">
    <div class="container">
        <h1 style="text-align:center;">Edit post</h1>
        

        <!-- Display posts here -->
        <div id="posts">
            <form method="POST">
            <input type="text" name="updatedpost" value="<?php echo($_GET["post"])?>" style="position:relative;left:310px;">
            <input type="submit" value="Edit" style="position:relative;left:310px;">
            </form>
      </div>

        <div id="users">
            <!-- User list will be displayed here -->
        </div>
    </div>
</div>

<footer class="footer">
    <!-- Content for the footer goes here -->
</footer>

<script>
    function expandSidebar() {
        var sidebar = document.getElementById('sidebar');
        sidebar.style.width = '250px';
    }

    function collapseSidebar() {
        var sidebar = document.getElementById('sidebar');
        sidebar.style.width = '130px'; // Adjust this width as needed
    }

    function toggleSidebar() {
        var sidebar = document.getElementById('sidebar');
        sidebar.style.width = sidebar.style.width === '250px' ? '50px' : '250px';
    }
</script>

</body>
</html>
