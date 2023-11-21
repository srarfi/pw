
<?php
require_once '../config.php';
require_once '../controller/comment.php';

$pdo =config::getConnexion();
$PostController = new PostController($pdo);
?>




<!DOCTYPE html>

<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="forum.css">
    <script src="forum.js" ></script>

</head>
<body>

<div class="sidebar" id="sidebar" onmouseover="expandSidebar()" onmouseout="collapseSidebar()">
    <div class="logo">
        <img src="aa.png.png" alt="Logo" height="96" width="126">
    </div>
    <div class="links">
        <a href="#">admin gestion_client</a>
        <a href="#">admin gestion_commande</a>
        <a href="#">admin gestion_forum</a>
        <a href="#">admin gestion_</a>
        <a href="#">admin gestion_</a>
    </div>
</div>

<div class="content">
    <div class="container">
        <h1 style="text-align:center;">Admin Panel</h1>
    <form action="" method="POST">
        <div class="post-content">
          <input type="text" id="postAuthor" placeholder="Your username" name="user" >
          <input id="postContent" placeholder="Write your post here" name="post"></input>
          <button class="button" type="submit" onclick="submitPost()">Submit Post</button>
        </div>
    </form>
        <div id="posts">
          <!-- Posts will be displayed here -->
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
