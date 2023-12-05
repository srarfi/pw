<?php
    include "../control/utilisateurc.php";
    $c=new utilisateurc();
    $id=$_GET["idd"];
    $c->DeleteJoueur($id);
    header("Location:liste.php");
?>


