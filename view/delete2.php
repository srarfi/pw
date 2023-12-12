<?php
    include "../control/coachingc.php";
    $c=new coachingc();
    $id=$_GET["idd"];
    $c->deletecoaching($id);
    header("Location:Update_Delete_Demandes.php");
?>


