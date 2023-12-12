<?php
session_start();
?>
<?php

include "../control/utilisateurc.php";
    $c = new utilisateurc();
    $id = isset($_POST['id']) ? $_POST['id'] : '';
    $username = isset($_POST['username']) ? $_POST['username'] : '';
    $email = isset($_POST['email_ut']) ? $_POST['email_ut'] : '';
    $tel = isset($_POST['tel_ut']) ? $_POST['tel_ut'] : '';
    $add = isset($_POST['addresse_ut']) ? $_POST['addresse_ut'] : '';
    $mdp = isset($_POST['mdp_ut']) ? $_POST['mdp_ut'] : '';
    $c->update_utilisateur($id,$username,$email,$tel,$add,$mdp);
    header("Location:liste.php");

?>
