<?php
session_start();
 include "../control/utilisateurC.php";
 include "../model/utilisateur.php";
 $utilisateurc = new utilisateurc();
 $admin="admin";
 if(isset($_POST['username']) && isset($_POST['nom_ut']) && isset($_POST['prenom_ut']) && isset($_POST['email_ut']) && isset($_POST['tel_ut']) && isset($_POST['cin_ut']) && isset($_POST['poid_ut']) && isset($_POST['taille_ut']) && isset($_POST['genre_ut']) && isset($_POST['age_ut']) && isset($_POST['addresse_ut']) && isset($_POST['login_ut']) && isset($_POST['mdp_ut'])){
    if(!empty($_POST['username']) && !empty($_POST['nom_ut']) && !empty($_POST['prenom_ut']) && !empty($_POST['email_ut']) && !empty($_POST['tel_ut']) && !empty($_POST['cin_ut']) && !empty($_POST['poid_ut']) && !empty($_POST['taille_ut']) && !empty($_POST['genre_ut']) && !empty($_POST['age_ut']) && !empty($_POST['addresse_ut']) && !empty($_POST['login_ut']) && !empty($_POST['mdp_ut'])){
        $utilisateur= new utilisateur(NULL, $admin , $_POST['username'] ,$_POST['nom_ut'], $_POST['prenom_ut'] , $_POST['email_ut'] , $_POST['tel_ut'] , $_POST['cin_ut'] , $_POST['poid_ut'] , $_POST['taille_ut'] , $_POST['genre_ut'] , $_POST['age_ut'] ,$_POST['addresse_ut'],0, $_POST['login_ut'] , $_POST['mdp_ut']) ;
        $utilisateurc->addutilisateur($utilisateur);
        $_SESSION['login'] = $_POST['login_ut'];
$_SESSION['name'] = $_POST['nom_ut'];
$_SESSION['id'] = $_POST['id_ut'];
        header("location:admin.php");   
     }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <!--aa-->
    <link rel="stylesheet" href="css2.css">
    <title>gymbros</title>   
    <link rel="icon" href="logo.png" type="image/x-icon">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="assets/img/apple-icon.png">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/templatemo.css">
    <link rel="stylesheet" href="assets/css/custom.css">

    <!-- Load fonts style after rendering the layout styles -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
    <link rel="stylesheet" href="assets/css/fontawesome.min.css">

    <!-- Slick -->
    <link rel="stylesheet" type="text/css" href="assets/css/slick.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/slick-theme.css">
    <link rel="stylesheet" href="forum.css">

   
</head>
<body>
   













































    <form  method="POST"  onsubmit="return validateForm()">
        <label for="role">Role :</label>
        <input type="text" id="admin" name="admin" value="admin" readonly><br><br>

        <label for="username">Nom d'utilisateur :</label>
        <input type="text" id="username" name="username" required><br><br>

        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom_ut"required><br><br>

        <label for="prenom">Prenom :</label>
        <input type="text" id="prenom" name="prenom_ut" required><br><br>

        <label for="email">Email :</label>
        <input type="email" id="email" name="email_ut" required><br><br>

        <label for="tel">Telephone :</label>
        <input type="tel" id="tel" name="tel_ut" required><br><br>

        <label for="cin">CIN :</label>
        <input type="text" id="cin" name="cin_ut" required><br><br>

        <label for="poid">Poids :</label>
        <input type="number" id="poid" name="poid_ut" required><br><br>

        <label for="taille">Taille :</label>
        <input type="number" id="taille" name="taille_ut" required><br><br>

        <label for="genre">Genre :</label>
        <input type="radio" id="homme" name="genre_ut" value="H" required>
        <label for="homme">Homme</label>
        <input type="radio" id="femme" name="genre_ut" value="F" required>
        <label for="femme">Femme</label><br><br>

        <label for="age">Âge :</label>
        <input type="number" id="age" name="age_ut" required><br><br>

        <label for="adresse">Adresse :</label>
        <textarea id="adresse" name="addresse_ut" required></textarea><br><br>

        <label for="login">Login :</label>
        <input type="text" id="login" name="login_ut" required><br><br>

        <label for="password">Mot de passe :</label>
        <input type="password" id="password" name="mdp_ut" required><br><br>

        <label for="con_password">confirmer mot de passe :</label>
        <input type="password" id="con_password" name="con_password" required><br><br>

        <input type="submit" value="ajout">
    </form>




















</body>

</html>
    






</body>

</html>