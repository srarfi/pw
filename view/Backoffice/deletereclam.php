<?php

include '../../Controller/ReclamController.php';

// Assurez-vous que l'ID de l'événement à supprimer est présent dans l'URL
if (isset($_GET['id']) && !empty($_GET['id'])) {
    // Créer une instance du contrôleur
    $reclamController = new ReclamController();

    // Récupérer l'ID de l'événement à supprimer
    $reclamId = $_GET['id'];

    // Supprimer l'événement en utilisant le contrôleur
    $reclamController->deleteReclam($reclamId);

    // Rediriger vers la liste des événements après la suppression
    header('Location: http://localhost/gestionreclamation/view/Backoffice/reclamations.php');
} else {
    // Rediriger vers la liste des événements en cas d'ID manquant
    header('Location: http://localhost/gestionreclamation/view/Backoffice/reclamations.php');
}

?>