<?php

include '../../Controller/ReclamController.php';
include '../../model/Reclamation.php';

$error = "";

// Créer un événement
$reclam = null; 

// Créer une instance du contrôleur
$reclamController = new ReclamController();

if (
    isset($_POST["date"]) &&
    isset($_POST["objet"]) &&
    isset($_POST["description"])
) {
    if (
        !empty($_POST['date']) &&
        !empty($_POST["objet"]) &&
        !empty($_POST["description"])
    ) {
        $reclam = new Reclamation(
            null,
            $_POST['date'],
            $_POST['objet'],
            $_POST['description']
        );
        $reclamController->addReclam($reclam);
        header('Location: http://localhost/artisanicaReclam/view/BackOffice/tablesReclam.php');
        exit(); // Make sure to exit after redirect
    } else {
        $error = "Toutes les informations doivent être renseignées.";
    }
}

?>

<html lang="en">

<head>
     <meta charset="utf-8">
  <title>Artisanica | Reclamation </title>

 
  
  <!-- icon -->
  <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png" />
  <link rel="stylesheet" href="css/boot.css">
  
  <!-- Main Stylesheet -->
  <link rel="stylesheet" href="css/style.css">

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
        erreurObjet.innerHTML = "Le champ Objet de don doit contenir uniquement des lettres.";
    isValid = false;
}
if (!/^[a-zA-Z]+$/.test(description) || /\s/.test(description)) {
    erreurDescription.innerHTML = "Le champ Description de don doit contenir uniquement des lettres.";
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

<body id="body">
    <a href="http://localhost/artisanicaReclam/view/BackOffice/tablesReclam.php">Retour à la liste des reclamations</a>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>
<div class="container">
    <div class="row">
      <div class="col-md-6 col-md-offset-3">
        <div class="block text-center">
          <a class="logo" href="index.html">
            <img src="images/logologo.jpg" alt="" width="250" height="220">
          </a>
          <h2 class="text-center">Ajouter Reclamations</h2>
          <form class="text-left clearfix" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" id="myForm">
            <div class="form-group">
            
                    <input class="form-control"  placeholder="Date de Reclam" type="date" id="date" name="date" />
                    <span id="erreurDate" style="color: red"></span>
             
            </div>           
             <div class="form-group">
              <input class="form-control " placeholder="Objet" type="text" id="objet" name="objet"   oninput="validateForm()" />
                <span id="erreurObjet" style="color: red"></span>
            </div> 
            <div class="form-group">
              <input class="form-control"  placeholder="Description" type="texte" id="description" name="description"   oninput="validateForm()" />
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
    </div>
  </div>
   
</body>

</html>