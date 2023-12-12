<?php 
      include "../control/coachingc.php";
      include "../model/coaching.php";
      
      $id_co = $_GET["idd"];
      $co = new coachingc();
      
      $objectif = isset($_POST['obj']) ? $_POST['obj'] : '';
      $nb_jours = isset($_POST['nb_j']) ? $_POST['nb_j'] : '';
      $nb_heures = isset($_POST['nb_h']) ? $_POST['nb_h'] : '';
      $basket = isset($_POST['basket']) ? $_POST['basket'] : '';
      $rep = isset($_POST['rep']) ? $_POST['rep'] : '';
      
      $co->update($id_co, $objectif, $nb_jours, $nb_heures, $basket, $rep);
      header("location:Read_Demandes.php");
      
?>