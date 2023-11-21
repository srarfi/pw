<?php
public function getcomments($post_id) {
    try {
        $sql = "SELECT * FROM forum WHERE id_post = :id_post ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':id_post', $post_id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        return [];
    }
    }
    public function addComment($post_id, $contenu_commentaire) {
    try {
        $sql = "INSERT INTO forum (id_post, username, mess, ) VALUES (:id_post, NULL, :mess, NOW())";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':id_post', $post_id);
        $stmt->bindValue(':mess', $contenu_commentaire);
        $stmt->execute();
        return true;
    } catch (PDOException $e) {
        error_log("Erreur SQL: " . $e->getMessage());
        return false;
    }
    }
    ?>