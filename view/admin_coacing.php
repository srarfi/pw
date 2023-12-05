<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <link rel="stylesheet" href="common.css">
</head>

<?php
include "../control/coachingc.php";
include "../model/coaching.php";
$c = new coachingc();
$tab = $c->list_coaching();

foreach ($tab as $ut) {
    $motsBasket = ["Augmentation de la verticalité", "Meilleure Dribble", "Tir", "Passe"];
    $motAleatoire = $motsBasket[array_rand($motsBasket)];

    echo "
    <div class='admin'>
        <form action='admin2.php?idd=".$ut['id_coaching']."' method='POST'>
            <label for='id'>ID:</label>
            <input type='text' id='id' name='id' value='".$ut['id_ut']."' readonly><br><br>

            <label for='objectif'>Objectif :</label>
            <input type='text' id='obj' name='obj' value='".$ut['objectif']."' readonly><br><br>

            <label for='nb_j'>nb_jours :</label>
            <input type='text' id='nb_j' name='nb_j' value='".$ut['nb_j']."' readonly><br><br>

            <label for='nb_h'>nb_heures :</label>
            <input type='text' id='nb_h' name='nb_h' value='".$ut['nb_h']."' readonly><br><br>

            <label for='basket'>Ex basket selectionee :</label>
            <input type='text' id='basket' name='basket' value='".$motAleatoire."' readonly><br><br>

            <label for='rep'>reponse :</label>
            <textarea id='rep' name='rep'></textarea><br><br>
            
            <input type='submit' value='repondre'>
            <a href='update.php?rep=".urlencode('rep')."'>DELETE</a></td><br><br>
        </form>
    </div>";
}
?>
