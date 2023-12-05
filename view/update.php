<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mise à jour Utilisateur</title>
    <link rel="stylesheet" type="text/css" href="test.css">
    <script src="test2.js"></script>
</head>
<body>
    <?php
        if (isset($_GET['id_ut'], $_GET['username'], $_GET['nom'], $_GET['prenom'], $_GET['email'], $_GET['tel'], $_GET['add'], $_GET['login'])) {
            $id_ut = $_GET['id_ut'];
            $username = $_GET['username'];
            $nom = $_GET['nom'];
            $prenom = $_GET['prenom'];
            $email = $_GET['email'];
            $tel = $_GET['tel'];
            $add = $_GET['add'];
            $login = $_GET['login'];
            echo "ID: $id_ut, Username: $username, Nom: $nom, Prenom: $prenom, Email: $email, Tel: $tel, Addresse: $add, Login: $login";

        } else {
            echo "Incomplete parameters. Please provide all required parameters.";
        }
    ?>

    <h2>Mise à jour utilisateur</h2>
    <form action="update_utilisateur.php" method="POST" onsubmit="return validateForm()">

        <label for="id">id :</label>
        <input type="text" id="id" name="id" value="<?php echo htmlspecialchars($id_ut); ?>" readonly ><br><br>    

        <label for="username">user name :</label>
        <input type="text" id="username" name="username"  value="<?php echo htmlspecialchars($username); ?>" required><br><br>

        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom_ut" value="<?php echo htmlspecialchars($nom); ?>" readonly><br><br>

        <label for="prenom">Prenom :</label>
        <input type="text" id="prenom" name="prenom_ut" value="<?php echo htmlspecialchars($prenom); ?>" readonly><br><br>

        <label for="email">Email :</label>
        <input type="email" id="email" name="email_ut" value="<?php echo htmlspecialchars($email); ?>" required><br><br>

        <label for="tel">Telephone :</label>
        <input type="tel" id="tel" name="tel_ut" value="<?php echo htmlspecialchars($tel); ?>"  required><br><br>
        
        <label for="adresse">Adresse :</label>
        <input type="text" id="adresse" name="addresse_ut" value="<?php echo htmlspecialchars($add); ?>" required></textarea><br><br>

        <label for="login">Login :</label>
        <input type="text" id="login" name="login_ut" value="<?php echo htmlspecialchars($login); ?>" readonly ><br><br>

        <label for="password">Modifier mot de passe :</label>
        <input type="password" id="password" name="mdp_ut" required><br><br>

        <label for="con_password">confirmer mot de passe :</label>
        <input type="password" id="con_password" name="con_password" required><br><br>

        <input type="submit" value="Mettre à jour">
    </form>
</body>
</html>
