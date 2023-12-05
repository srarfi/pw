<?php
require_once '../controller/produitC.php';

$commandeController = new CommandeController();
if (isset($_GET['delete']) && !empty($_GET['delete'])) {
    $commandeId = $_GET['delete']; // Corrected variable name
    $commandeController->deleteCommande($commandeId); // Corrected variable name

    header('Location: ../view/admin.php');
}
?>
