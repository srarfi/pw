<?php
include "../../controller/postC.php";
$postModel->deletePost($_GET["id"]);
header("Location: admin.php");
?>