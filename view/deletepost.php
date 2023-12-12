<?php
include "../control/postC.php";
$postModel->deletePost($_GET["id"]);
header("Location:admine.php");
?>