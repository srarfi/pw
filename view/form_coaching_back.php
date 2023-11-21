<?php
 include "../control/coachingc.php";
 include "../model/coaching.php";
 $coachingc = new coachingc();
 if(isset($_POST['id']) &&  isset($_POST['objectif']) && isset($_POST['jours']) && isset($_POST['heures'])){
    if(!empty($_POST['id']) && !empty($_POST['objectif']) && !empty($_POST['jours']) && !empty($_POST['heures'])){
        $coaching= new coaching(NULL,$_POST['id'] , $_POST['objectif'] , $_POST['jours'] , $_POST['heures'] ) ;
        $coachingc->plans($coaching);
        header("location:admin_coacing.php");   
     }
}
?>


<html>
<head>
<title>MedNMore</title>
<head>
	<link rel="stylesheet" href="coachingcss.css">
	<title>gym</title>
    <link rel="stylesheet" href="styles.css">
	<script src="coachingscript.js"></script>
<body>
<div class="sidebar" id="sidebar" onmouseover="expandSidebar()" onmouseout="collapseSidebar()">
    <div class="logo">
        <img src="log.png" alt="Logo" height="96" width="126">
    </div>
    <div class="links">
        <a href="#">admin gestion_client</a>
        <a href="#">admin gestion_commande</a>
        <a href="#">admin gestion_forum</a>
        <a href="#">admin gestion_</a>
        <a href="#">admin gestion_</a>
    </div>
</div>

<div class="content">
  
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
    <div class="Contenu">
  <h1>Formulaire de Coaching</h1>
  
        <form action="" method="POST" onsubmit="return validateForm()">

        <h2>Choisissez l'Objectif :</h2>

        <label for="nom">id :</label>
        <input type="text" id="id" name="id"required><br><br>
        
        <label for="perte_poids">
            <input type="checkbox" id="perte_poids" name="objectif" value="perte_poids"> Perte de Poids
        </label><br>
        <label for="prise_muscle">
            <input type="checkbox" id="prise_muscle" name="objectif" value="prise_muscle"> Prise de Muscle
        </label><br>
        <label for="forme_generale">
            <input type="checkbox" id="forme_generale" name="objectif" value="forme_generale"> Forme Générale
        </label><br>
        <label for="endurance">
            <input type="checkbox" id="endurance" name="objectif" value="endurance"> Endurance
        </label><br>
        <label for="flexibilite">
            <input type="checkbox" id="flexibilite" name="objectif" value="flexibilite"> Flexibilité
        </label><br>
        <h2>Nombre de Jours Disponibles :</h2>
        <label for="jours_1">
            <input type="checkbox" id="jours_1" name="jours" value="1"> 1 Jour
        </label><br>
        <label for="jours_2">
            <input type="checkbox" id="jours_2" name="jours" value="2"> 2 Jours
        </label><br>
        <label for="jours_3">
            <input type="checkbox" id="jours_3" name="jours" value="3"> 3 Jours
        </label><br>
        <label for="jours_4">
            <input type="checkbox" id="jours_4" name="jours" value="4"> 4 Jours
        </label><br>
        <label for="jours_5">
            <input type="checkbox" id="jours_5" name="jours" value="5"> 5 Jours
        </label><br>
        <h2>Heures par Jour :</h2>
        <label for="heures_1">
            <input type="checkbox" id="heures_1" name="heures" value="1"> 1 Heure
        </label><br>
        <label for="heures_2">
            <input type="checkbox" id="heures_2" name="heures" value="2"> 2 Heures
        </label><br>
        <label for="heures_3">
            <input type="checkbox" id="heures_3" name="heures" value="3"> 3 Heures
        </label><br>
        <label for="heures_4">
            <input type="checkbox" id="heures_4" name="heures" value="4"> 4 Heures
        </label><br>
        <label for="heures_5">
            <input type="checkbox" id="heures_5" name="heures" value="5"> 5 Heures
        </label><br>

        <input type="submit" value="Envoi">
    </form>
</div>
</body>
</html>

	
</body>
</html>