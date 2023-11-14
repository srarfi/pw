<?php 
      include "../control/coachingc.php";
      include "../model/coaching.php";
      $id_co=$_GET["idd"];
      $co = new coachingc();
      $rep = isset($_POST['rep']) ? $_POST['rep'] : '';
      echo "ID: $id_co, reponse: $rep";
      $co->update($id_co,$rep);
      header("location:admin_coacing.php");   
?>