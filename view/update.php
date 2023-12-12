<?php
session_start();
?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>gymbros</title>   
    <link rel="icon" href="logo.png" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="test.css">
    <script src="test2.js"></script>
    <style>
        /* Add custom styles below */

body {
  font-family: Arial, sans-serif;
  margin: 0;
  padding: 20px;
}

h2 {
  text-align: center;
}

form {
  max-width: 400px;
  margin: 0 auto;
}

label {
  display: block;
  margin-bottom: 5px;
}

input[type="text"],
input[type="email"],
input[type="tel"],
input[type="password"] {
  width: 100%;
  padding: 8px;
  margin-bottom: 10px;
  border: 1px solid #ccc;
  border-radius: 4px;
}

input[type="submit"] {
  background-color: #4CAF50;
  color: white;
  padding: 10px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  font-size: 16px;
}

input[type="submit"]:hover {
  background-color: #45a049;
}

.error-message {
  color: red;
  margin-bottom: 10px;
}
    </style>
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
