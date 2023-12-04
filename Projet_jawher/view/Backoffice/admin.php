<?php
require_once '../../config.php';
require_once 'C:\xampp\htdocs\Projet_jawher\controller\postC.php';
include_once '../../model/post.php';



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
        <h1 style="text-align:center;">Admin Panel</h1>
        

        <!-- Display posts here -->
        <div id="posts">
        <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." style="position:relative;bottom:10px;left:284px;">
        <table border="2px" id="myTable" >
        <thead>
            <tr>
                <th> User </th>
                <th> Post </th>
                <th> Replies </th>
                
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($posts as $post) {
                echo '<tr>';
                echo '<td><strong>User:</strong> ' . htmlspecialchars($post['user']).'</td>';
                echo '<td><strong>Post:</strong> ' . htmlspecialchars($post['post']).'</td>';
                echo '<td>';
                $replies=$postModel->showReply($post["id"]);
                foreach($replies as $comment){
                    echo '<b>Reply</b>: '.$comment["mess"].'|';
                }
                echo '</td>';
                echo '<td><button><a href="updatepost.php?id='.$post["id"].'&post='.$post["post"].'">Update<a/></button></td>';
                echo '<td><button><a href="deletepost.php?id='.$post["id"].'">Delete</a></button></td>';
                echo '</tr>';
            }
            ?>
        </tbody>
    </table>        </div>

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
    function myFunction() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("myTable");
        tr = table.getElementsByTagName("tr");

        // Loop through all table rows, and hide those who don't match the search query
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[0];
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }
</script>

</body>
</html>
