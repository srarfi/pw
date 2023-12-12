<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>gymbros</title>   
    <link rel="icon" href="logo.png" type="image/x-icon">
    <link rel="stylesheet" href="styles.css">

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










/* Add custom styles below */

form {
  max-width: 400px;
  margin: 0 auto;
}

label {
  display: block;
  margin-bottom: 5px;
}

input[type="text"],
textarea {
  width: 100%;
  padding: 8px;
  margin-bottom: 10px;
  border: 1px solid #ccc;
  border-radius: 4px;
}

input[type="submit"] {
  background-color: #3498db;
  color: white;
  padding: 10px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  font-size: 16px;
}

input[type="submit"]:hover {
  background-color: #3498db;
}

a {
  display: inline-block;
  margin-top: 10px;
  color: #4CAF50;
  text-decoration: none;
}

a:hover {
  text-decoration: underline;
}

    </style>
</head>

<body>
    <div class="sidebar" id="sidebar" onmouseover="expandSidebar()" onmouseout="collapseSidebar()">
        <div class="logo">
            <img src="aa.png.png" alt="Logo" height="96" width="126">
        </div>
        <div class="links">
        <a href="liste.php">admin gestion_client</a>
        <a href="admin.php">admin gestion_commande</a>
        <a href="admine.php">admin gestion_forum</a>
        <a href="reclamations.php">admin gestion_reclamation</a>
        <a href="update_delete_demandes.php">admin gestion_coaching</a>
        <a href="ajoutadmine.php">ajout admin</a>
    </div>
    </div>
    <div class="content">
    <div style="margin-top: -52%;">
    <?php
    include "../control/coachingc.php";
    include "../model/coaching.php";
    $c = new coachingc();
    $tab = $c->list_coaching();
    ?>
    <?php foreach ($tab as $ut) : ?>  
            <form action='admin2.php?idd=<?php echo $ut['id_coaching']; ?>' method='POST'>
                <label for='id'>ID:</label>
                <input type='text' id='id' name='id' value='<?php echo $ut['id_ut']; ?>' /><br><br>

                <label for='objectif'>Objectif :</label>
                <input type='text' id='obj' name='obj' value='<?php echo $ut['objectif']; ?>' /><br><br>

                <label for='nb_j'>nb_jours :</label>
                <input type='text' id='nb_j' name='nb_j' value='<?php echo $ut['nb_j']; ?>' /><br><br>

                <label for='nb_h'>nb_heures :</label>
                <input type='text' id='nb_h' name='nb_h' value='<?php echo $ut['nb_h']; ?>' /><br><br>

                <label for='basket'>Ex basket selectionee :</label>
                <input type='text' id='basket' name='basket' value='<?php echo $ut['basket']; ?>' /><br><br>

                <label for='rep'>reponse :</label>
                <textarea id='rep' name='rep' ><?php echo $ut['reponse']; ?></textarea><br><br>

                <input type='submit' value='Update'><br><br>
                <a href='delete2.php?idd=<?php echo $ut['id_ut']; ?>'>Delete</a></td>
            </form>
        </div>
    <?php endforeach; ?>
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
