<?php 
 include "../control/utilisateurC.php";
 include "../model/utilisateur.php";

echo "Are you sure you want to delete your account? This action cannot be undone.<br>";
echo "<form action='remove.php?id_ut=".urlencode($id)."method='post'>";
$id=$_SESSION['id'];
echo "<input type='submit' name='confirm_delete' value='Yes, I'm sure'>";
echo "</form>";





?>