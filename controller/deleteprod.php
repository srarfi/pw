<?php
require_once '../controller/produitC.php';

$ProductController = new ProductController();
if (isset($_GET['delete']) && !empty($_GET['delete'])) {
    $produitId = $_GET['delete']; // Corrected variable name
    $ProductController->deleteProduct($produitId); // Corrected variable name

    header('Location: ../view/admin.php');
}
?>
