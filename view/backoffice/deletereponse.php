<?php

include '../../Controller/reponseController.php';

// Assurez-vous que l'ID de l'événement à supprimer est présent dans l'URL
if (isset($_GET['id']) && !empty($_GET['id'])) {
    // Créer une instance du contrôleur
    $reponseController = new reponseController();

    // Récupérer l'ID de l'événement à supprimer
    $reponseId = $_GET['id'];

    // Supprimer l'événement en utilisant le contrôleur
    $reponseController->deletereponse($reponseId);

    // Rediriger vers la liste des événements après la suppression
    header('Location: http://localhost/gestionreclamation/view/Backoffice/reponse.php');
} else {
    // Rediriger vers la liste des événements en cas d'ID manquant
    header('Location: http://localhost/gestionreclamation/view/Backoffice/reponse.php');
}

?>