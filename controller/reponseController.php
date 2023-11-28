<?php

require '../../config.php'; 

class reponseController
{

    public function listReclams()
    {
        $sql = "SELECT * FROM reponse";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deletereponse($reponseId)
    {
        $sql = "DELETE FROM reponse WHERE id = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $reponseId);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function addreponse($reponse, $idreclamation)
{
    $date = $reponse->getDate();
    $objet = $reponse->getObjet();
    $description = $reponse->getDescription();

    // Validation des données
    if (empty($date) || empty($objet) || empty($description)) {
        echo "Tous les champs doivent être renseignés, y compris l'ID de la réclamation.";
        return;
    }

    // Vous pouvez ajouter d'autres validations ici (par exemple, format de date)

    $sql = "INSERT INTO reponse (date, objet, description, idreclamation) VALUES (:date, :objet, :description, :idreclamation)";
    $db = config::getConnexion();

    try {
        $query = $db->prepare($sql);
        $query->bindParam(':date', $date);
        $query->bindParam(':objet', $objet);
        $query->bindParam(':description', $description);
        $query->bindParam(':idreclamation', $idreclamation);
        $query->execute();
        echo "La réponse a été ajoutée avec succès.";
    } catch (Exception $e) {
        echo 'Erreur lors de l\'ajout de la réponse : ' . $e->getMessage();
    }
}


    function showreponse($id)
    {
        $sql = "SELECT * FROM reponse WHERE id = $id";
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

    function showresponsebyidreclamation($idreclamation)
    {
        $sql = "SELECT * FROM reponse WHERE idreclamation= $idreclamation";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $reponse= $query->fetch();
            return $reponse;
        }catch (Exception $e) {
            die('Error:'. $e->getMessage());
        }
    }

    function updatereponse($reponse, $id)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE reponse SET 
                    date = :date, 
                    objet = :objet, 
                    description = :description
                WHERE id= :idreponse'
            );

            $query->execute([
                'idreponse' => $id,
                'date' => $reponse->getDate(),
                'objet' => $reponse->getObjet(),
                'description' => $reponse->getDescription(),
            ]);

            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
}
?>