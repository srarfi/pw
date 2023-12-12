<?php
session_start();
?>
<?php
include "../control/utilisateurC.php";
include "../model/utilisateur.php";

if (isset($_GET['tokenv']) && isset($_GET['email']) && isset($_POST["code"])) {
    if (!empty($_GET['tokenv']) && !empty($_GET['email']) && !empty($_POST['code'])) {
        $token = $_GET['tokenv'];
        $email = $_GET['email'];
        $code = $_POST["code"];
        
        $c = new utilisateurc();
        
        if ($token == $code) {
            $c->verif_utilisateur($email);
            header("Location: verifvrais.php");
        } else {
            header("Location: veriffaux.php");
        }
    }
}
?>
