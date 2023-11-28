<?php

include '../../Controller/reponseController.php';
include '../../model/reponse.php';


// Assurez-vous que l'ID de l'événement à éditer est présent dans l'URL
if (isset($_GET['id']) && !empty($_GET['id'])) {
    // Créer une instance du contrôleur
    $reponseController = new reponseController();

    // Récupérer l'ID de l'événement à éditer
    $reponseId = $_GET['id'];

    // Récupérer les détails de l'événement à éditer
    $reponseDetails = $reponseController->showreponse($reponseId);

    

    if ($reponseDetails) {
        // Vérifier si le formulaire de modification a été soumis
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupérer les nouvelles informations du formulaire
            $newDate = $_POST['date'];
            $newObjet = $_POST['objet'];
            $newDescription = $_POST['description'];
            $newIdreclam = $_POST['idreclamation'];

            // Créer un nouvel objet Event avec les nouvelles informations
            $updatedReponse = new reponse($reponseId, $newDate, $newObjet, $newDescription, $newIdreclam);

            // Mettre à jour l'événement en utilisant le contrôleur
            $reponseController->updatereponse($updatedReponse, $reponseId);

            // Rediriger vers la liste des événements après la mise à jour
            header('Location: http://localhost/gestionreclamation/view/Backoffice/reponse.php');
        }
    } else {
        // Rediriger vers la liste des événements en cas d'ID invalide
        header('Location: http://localhost/gestionreclamation/view/Backoffice/reponse.php');
    }
} else {
    // Rediriger vers la liste des événements en cas d'ID manquant
    header('Location: http://localhost/gestionreclamation/view/Backoffice/reponse.php');
}


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
        <a href="http://localhost/gestionreclamation/view/Backoffice/reclamations.php">Liste des Réclamations</a>

        <form action="" method="POST">
    <table>
        
        <tr>
            <td><label for="date">Date :</label></td>
            <td>
                <input type="date" id="date" name="date" value="<?php echo $reponseDetails['date']; ?>" />
                <span id="erreurDate" style="color: red"></span>
            </td>
        </tr>
        <tr>
            <td><label for="objet">Objet :</label></td>
            <td>
                <input type="text" id="objet" name="objet" value="<?php echo $reponseDetails['objet']; ?>" />
                <span id="erreurObjet" style="color: red"></span>
            </td>
        </tr>
        <tr>
            <td><label for="description">Description :</label></td>
            <td>
                <input type="text" id="description" name="description" value="<?php echo $reponseDetails['description']; ?>" />
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



