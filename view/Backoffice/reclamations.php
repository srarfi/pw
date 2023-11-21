<?php 
include '../../Controller/ReclamController.php';

// Créer une instance du contrôleur
$reclamController = new ReclamController();

// Récupérer la liste des événements depuis la base de données
$reclams = $reclamController->listReclams();
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

<div class="sidebar" id="sidebar" onmouseover="expandSidebar()" onmouseout="collapseSidebar()">
    <div class="logo">
        <img src="aa.png" alt="Logo" height="96" width="126">
    </div>
    <div class="links">
        <a href="#">admin gestion_client</a>
        <a href="#">admin gestion_commande</a>
        <a href="#">admin gestion_forum</a>
        <a href="#">admin gestion_reclamations</a>
        <a href="#">admin gestion_</a>
    </div>
</div>

<div class="content">
    <div class="container mt-5">
        <a href="http://localhost/gestionreclamation/view/frontoffice/addReclamation.php" >Ajouter une Nouvelle reclamation</a>
        <h2>Liste des Réclamations</h2>

        <table class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead class="thead-dark">
        <tr>
            <th>Date</th>
            <th>Objet</th>
            <th>Description</th>
            <th>Modifier</th>
            <th>Supprimer</th>
            <th>Réponse</th>
        </tr>
    </thead>
    <tbody>
    <?php
// Afficher les réclamations
foreach ($reclams as $reclam) {
    echo "<tr>";
    echo "<th>{$reclam['date']}</th>";
    echo "<th>{$reclam['objet']}</th>";
    echo "<th>{$reclam['description']}</th>";
    echo "<th><a href='editreclam.php?id={$reclam['id']}' class='btn btn-primary'><i class='fas fa-edit'></i> Modifier</a></th>";
    echo "<th><a href='deletereclam.php?id={$reclam['id']}' onclick='return confirm(\"Êtes-vous sûr de vouloir supprimer cette réclamation ?\")' class='btn btn-danger'><i class='fas fa-trash'></i> Supprimer</a></th>";
    echo "<th><a href='addreponse.php' class='btn btn-outline-success btn-circle'><i class='fas fa-edit'></i>Ajouter Reponse</a></th>";
    echo "</tr>";
}
?>
    </tbody>
</table>

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



