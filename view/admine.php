<?php
require_once '../control\postC.php';
include_once '../model/post.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>gymbros</title>   
    <link rel="icon" href="logo.png" type="image/x-icon">
    <link rel="stylesheet" href="st.css">
    <link rel="stylesheet" href="forum.css">
    <script src="forum.js"></script>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #3498db;
            color: white;
        }

        tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        button {
            background-color: #3498db;
            color: white;
            padding: 8px 12px;
            border: none;
            cursor: pointer;
        }

        button a {
            text-decoration: none;
            color: white;
        }

        button:hover {
            background-color: #2980b9;
        }

        #myInput {
            padding: 8px;
            width: 200px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        #myInput:focus {
            border-color: #3498db;
            outline: none;
        }
        .admin {
    max-width: 600px;
    margin: 20px auto;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 8px;
    background-color: #fff;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.admin form {
    display: flex;
    flex-direction: column;
}

.admin label {
    font-weight: bold;
    margin-bottom: 8px;
}

.admin input[type="text"],
.admin textarea {
    padding: 10px;
    margin-bottom: 16px;
    border: 1px solid #ddd;
    border-radius: 4px;
    box-sizing: border-box;
}

.admin input[type="submit"],
.admin a {
    background-color: #3498db;
    color: white;
    padding: 10px 15px;
    border: none;
    cursor: pointer;
    text-decoration: none;
    border-radius: 4px;
    transition: background-color 0.3s;
}

.admin input[type="submit"]:hover,
.admin a:hover {
    background-color: #2980b9;
}

.admin textarea[readonly] {
    background-color: #eee;
}

.footer {
    text-align: center;
    margin-top: 20px;
    padding: 10px;
    background-color: #f2f2f2;
}

    </style>
</head>
<div class="content">
    <div class="container">
        <h1 style="text-align:center;">Admin Panel</h1>
        

        <!-- Display posts here -->
        <div id="posts">
        <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." style="position:relative;bottom:10px;left:600px;">
        <table border="2px" id="myTable" >
        <thead>
            <tr>
                <th> User </th>
                <th> Post </th>
                <th> Replies </th>
                <th> update </th>
                <th> delete </th>
                
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
