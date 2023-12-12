<?php

include '../../Controller/ReclamController.php';
include '../../model/Reclamation.php';


// Assurez-vous que l'ID de l'événement à éditer est présent dans l'URL
if (isset($_GET['id']) && !empty($_GET['id'])) {
    // Créer une instance du contrôleur
    $reclamController = new ReclamController();

    // Récupérer l'ID de l'événement à éditer
    $reclamId = $_GET['id'];

    // Récupérer les détails de l'événement à éditer
    $reclamDetails = $reclamController->showReclam($reclamId);

    if ($reclamDetails) {
        // Vérifier si le formulaire de modification a été soumis
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupérer les nouvelles informations du formulaire
            $newDate = $_POST['date'];
            $newObjet = $_POST['objet'];
            $newDescription = $_POST['description'];

            // Créer un nouvel objet Event avec les nouvelles informations
            $updatedReclam = new Reclamation($reclamId, $newDate, $newObjet, $newDescription);

            // Mettre à jour l'événement en utilisant le contrôleur
            $reclamController->updateReclam($updatedReclam, $reclamId);

            // Rediriger vers la liste des événements après la mise à jour
            header('Location: http://localhost/gestionreclamation/view/Backoffice/reclamations.php');
        }
    } else {
        // Rediriger vers la liste des événements en cas d'ID invalide
        header('Location: http://localhost/gestionreclamation/view/Backoffice/reclamations.php');
    }
} else {
    // Rediriger vers la liste des événements en cas d'ID manquant
    header('Location: http://localhost/gestionreclamation/view/Backoffice/reclamations.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>gymbros</title>   
    <link rel="icon" href="logo.png" type="image/x-icon">
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
        <a href="http://localhost/gestionreclamation/view/Backoffice/reclamations.php">Liste des Réclamations</a>

        <form action="" method="POST">
    <table>
        
        <tr>
            <td><label for="date">Date :</label></td>
            <td>
                <input type="date" id="date" name="date" value="<?php echo $reclamDetails['date']; ?>" />
                <span id="erreurDate" style="color: red"></span>
            </td>
        </tr>
        <tr>
            <td><label for="objet">Objet :</label></td>
            <td>
                <input type="text" id="objet" name="objet" value="<?php echo $reclamDetails['objet']; ?>" />
                <span id="erreurObjet" style="color: red"></span>
            </td>
        </tr>
        <tr>
            <td><label for="description">Description :</label></td>
            <td>
                <input type="text" id="description" name="description" value="<?php echo $reclamDetails['description']; ?>" />
                <span id="erreurDescription" style="color: red"></span>
            </td>
        </tr>

        <td>
            <input type="submit" value="Enregistrer">
        </td>
    </table>
</form>

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



