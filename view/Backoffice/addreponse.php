<?php

include '../../Controller/reponseController.php';
include '../../model/reponse.php';

$error = "";

// Créer un événement
$reponse = null;

// Créer une instance du contrôleur
$reponseController = new reponseController();
if (
    isset($_POST["date"]) &&
    isset($_POST["objet"]) &&
    isset($_POST["description"])&&
    isset($_POST["idreclamation"])
) {
    if (
        !empty($_POST['date']) &&
        !empty($_POST["objet"]) &&
        !empty($_POST["description"])&&
        !empty($_POST["idreclamation"])
    ) {
        $idReclamation=$_POST['idreclamation'];

        $reponse = new reponse(
            null,
            $_POST['date'],
            $_POST['objet'],
            $_POST['description'],
            $idReclamation
        );

        $reponseController->addreponse($reponse,$idReclamation);
        header('Location: http://localhost/gestionreclamation/view/Backoffice/reponse.php');
        exit(); // Make sure to exit after redirect
    } else {
        $error = "Toutes les informations doivent être renseignées.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <link rel="stylesheet" href="styles.css">

    <script>
   function validateForm() {
    var objet = document.getElementById("objet").value;
    var description = document.getElementById("description").value;

    var erreurObjet = document.getElementById("erreurObjet");
    var erreurDescription = document.getElementById("erreurDescription");

    // Réinitialiser les messages d'erreur
    erreurObjet.innerHTML = "";
    erreurDescription.innerHTML = "";

    var isValid = true;

    // Valider le champ de type
    if (!/^[a-zA-Z]+$/.test(objet)) {
        erreurObjet.innerHTML = "Le champ Objet de reponse doit contenir uniquement des lettres.";
    isValid = false;
}
if (!/^[a-zA-Z]+$/.test(description) || /\s/.test(description)) {
    erreurDescription.innerHTML = "Le champ Description de reponse doit contenir uniquement des lettres.";
    isValid = false;
}

    // Valider le champ de montant
    

    // Désactiver le bouton si la validation échoue pour le champ de type
    document.getElementById("submitBtn").disabled = !isValid;

    return isValid;
}


    // Attacher la fonction de validation au formulaire
    document.getElementById("myForm").addEventListener("submit", function (event) {
        if (!validateForm()) {
            event.preventDefault(); // Empêcher la soumission du formulaire si la validation échoue
        }
    });
</script>
</head>
<body>

<div class="sidebar" id="sidebar" onmouseover="expandSidebar()" onmouseout="collapseSidebar()">
    <div class="logo">
        <img src="aa.png" alt="Logo" height="96" width="126">
    </div>
    <div class="links">
        <a href="#">admin gestion_client</a>
        <a href="#">admin gestion_commande</a>
        <a href="#">admin gestion_forum</a>
        <a href="#">admin gestion_reclamations</a>
        <a href="#">admin gestion_</a>
    </div>
</div>

<div class="content">
<div class="block text-center">         
          <h2 class="text-center">Ajouter reponse</h2>
          <form class="text-left clearfix" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" id="myForm">
          <div class="form-group">
            
                    <input class="form-control"  placeholder="Id de Reclam" type="text" id="idreclaamtion" name="idreclamation" />
                    <span id="erreurDate" style="color: red"></span>
             
            </div>  
          <div class="form-group">
            
                    <input class="form-control"  placeholder="Date de Reclam" type="date" id="date" name="date" />
                    <span id="erreurDate" style="color: red"></span>
             
            </div>
            <div class="form-group">
              <input class="form-control" placeholder="Objet" type="text" id="objet" name="objet"  oninput="validateForm()" />
                <span id="erreurObjet" style="color: red"></span>
            </div>
            <div class="form-group">
              <input class="form-control"  placeholder="Description" type="texte" id="description" name="description"  oninput="validateForm()" />
                    <span id="erreurDescription" style="color: red"></span>
            </div>
            <div class="text-center">
              <input type="submit" class="btn btn-main text-center" value="Enregistrer" id="submitBtn">

            </div><br>
            <div class="text-center">
              <input type="reset" class="btn btn-main text-center" value="Réinitialiser">

            </div>
          </form>
        </div>
</div>

<footer class="footer">
    <!-- Content for the footer goes here -->
</footer>

<script>
    function expandSidebar() {
        var sidebar = document.getElementById('sidebar');
        sidebar.style.width = '250px';
    }

    function collapseSidebar() {
        var sidebar = document.getElementById('sidebar');
        sidebar.style.width = '130px'; // Adjust this width as needed
    }

    function toggleSidebar() {
        var sidebar = document.getElementById('sidebar');
        sidebar.style.width = sidebar.style.width === '250px' ? '50px' : '250px';
    }
</script>

</body>
</html>



