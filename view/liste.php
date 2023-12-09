<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<style>
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.4);
        }

        .modal-content {
            background-color: #fefefe;
            margin: 10% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 20%;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        .button {
            text-align: center;
            margin-right    : 40%;
        }

        .btn {
            background-color: #3498db;
            color: #fff;
            border: 0;
            border-radius: 6px;
            cursor: pointer;
            font-family: inherit;
            padding: 8px 30px;
            margin: 5px;
            font-size: 14px;
        }

        .btn:active {
            transform: scale(0.98);
        }

        .btn:focus {
            outline: 0;
        }

        .btn:disabled {
            background-color: #e0e0e0;
        }
    </style>
<div class="sidebar" id="sidebar" onmouseover="expandSidebar()" onmouseout="collapseSidebar()">
    <div class="logo">
        <img src="img/logo.png" alt="Logo" height="96" width="126">
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
    <div style="margin-top: -52%;">
    <?php
    include "../control/utilisateurc.php";
    $c=new utilisateurc();
    $tab=$c->list_utilisateur();
    ?>
    <center><h1>lsite des Utilisateur</h1></center>
        <table border='2' align='center' width='60%' >
            <tr>
                <td>id_utilisateur</td>
                <td>role</td>
                <td>username</td>
                <td>Nom</td>
                <td>Prenom</td>
                <td>email</td>
                <td>tel</td>
                <td>cin</td>
                <td>poid</td>
                <td>taille</td>
                <td>genre</td>
                <td>age</td>
                <td>adresse</td>
                <td>login</td>
                <td>mot de passe</td>
                <td>Update</td>
                <td>Delete</td>
            </tr>
    <?php
    foreach ($tab as $ut) {
        echo "<tr>
                <td>".$ut['id_ut']."</td>
                <td>".$ut['role_ut']."</td>
                <td>".$ut['username']."</td>
                <td>".$ut['nom_ut']."</td>
                <td>".$ut['prenom_ut']."</td>
                <td>".$ut['email_ut']."</td>
                <td>".$ut['tel_ut']."</td>
                <td>".$ut['cin_ut']."</td>
                <td>".$ut['poid_ut']."</td>
                <td>".$ut['taille_ut']."</td>
                <td>".$ut['genre_ut']."</td>
                <td>".$ut['age_ut']."</td>
                <td>".$ut['addresse_ut']."</td>
                <td>".$ut['login_ut']."</td>
                <td>".$ut['mdp_ut']."</td>
                <td><a href='update.php?id_ut=".urlencode($ut['id_ut'])."&username=".urlencode($ut['username'])."&nom=".urlencode($ut['nom_ut'])."&prenom=".urlencode($ut['prenom_ut'])."&email=".urlencode($ut['email_ut'])."&tel=".urlencode($ut['tel_ut'])."&add=".urlencode($ut['addresse_ut'])."&login=".urlencode($ut['login_ut'])."'>UPDATE</a></td>
                <td><a href='deleteutilisateur.php?idd=".$ut['id_ut']."'>DELETE</a></td>
              </tr>";
    }
    
    ?>
     </table>
     
     </div>   
      
</div>


<footer class="footer">

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
