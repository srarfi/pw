<?php
class PostModel
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function addPost($user, $post)
    {
        $stmt = $this->pdo->prepare("INSERT INTO post (user, post) VALUES (?, ?)");
        $stmt->execute([$user, $post]);
    }

    public function editPost($postId, $editText)
    {
        $stmt = $this->pdo->prepare("UPDATE post SET post = ? WHERE id = ?");
        $stmt->execute([$editText, $postId]);
    }

    public function deletePost($postIdToDelete)
    {
        $stmt = $this->pdo->prepare("DELETE FROM post WHERE id = ?");
        $stmt->execute([$postIdToDelete]);
    }

    public function getPosts()
    {
        $query = "SELECT id, user, post FROM post ORDER BY id DESC";
        $result = $this->pdo->query($query);

        if ($result) {
            return $result->fetchAll(PDO::FETCH_ASSOC);
        } else {
            die("Error retrieving posts");
        }
    }
    public function addReply($userid,$postid,$username,$message)
    {
        $stmt = $this->pdo->prepare("INSERT INTO forum (id_commentaire,id_cl,username,mess,id_post) VALUES (null,?,?,?,?)");
        $stmt->execute([$userid,$username,$message,$postid]);
    }
    public function showReply($postid){
        $sql="SELECT * FROM forum WHERE id_post = :id";
        try{
        $sth=$this->pdo->prepare($sql);
        $sth->bindParam('id', $postid);
        $sth->execute();
        return $sth->fetchAll();
        }
        catch(Exception $e){
            die($e->getMessage());
        }
    }
    public function deleteReply($replyid){
        $stmt = $this->pdo->prepare("DELETE FROM forum WHERE id_commentaire = ?");
        $stmt->execute([$replyid]);
    }
    public function editReply($replyId, $editText)
    {
        $stmt = $this->pdo->prepare("UPDATE forum SET mess = ? WHERE id_commentaire = ?");
        $stmt->execute([$editText, $replyId]);
    }
}
?>
