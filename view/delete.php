<?php
include "../control/postC.php";
$postModel->deleteReply($_GET["id"]);
header("Location: forum.php");
?>