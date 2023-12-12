<?php

require '../config.php'; // Assurez-vous que le chemin vers le fichier de configuration est correct

class ReclamController
{

    public function listReclams()
    {
        $sql = "SELECT * FROM reclamations";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deleteReclam($reclamId)
    {
        $sql = "DELETE FROM reclamations WHERE id = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $reclamId);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function addReclam($reclam)
    {

        $date = $reclam->getDate();
        $objet = $reclam->getObjet();
        $description = $reclam->getDescription();
     
        // Validation des données
        if (empty($date) || empty($objet) || empty($description)) {
            echo "Tous les champs doivent être renseignés.";
            return;
        }
    
        // Vous pouvez ajouter d'autres validations ici (par exemple, format de date)
    
        $sql = "INSERT INTO reclamations (date , objet , description) VALUES (:date, :objet, :description)";
        $db = config::getConnexion();
        
        try {
            $query = $db->prepare($sql);
            $query->bindParam(':date', $date);
            $query->bindParam(':objet', $objet);
            $query->bindParam(':description', $description);
            $query->execute();
            echo "La Reclamation a été ajouté avec succès.";
        } catch (Exception $e) {
            echo 'Erreur lors de l\'ajout de la reclamation : ' . $e->getMessage();
        }
    }
    

    function showReclam($id)
    {
        $sql = "SELECT * FROM reclamations WHERE id = $id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $event = $query->fetch();
            return $event;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    function updateReclam($reclam, $id)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE reclamations SET 
                    date = :date, 
                    objet = :objet, 
                    description = :description
                WHERE id= :idReclam'
            );

            $query->execute([
                'idReclam' => $id,
                'date' => $reclam->getDate(),
                'objet' => $reclam->getObjet(),
                'description' => $reclam->getDescription(),
            ]);

            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
}
?>