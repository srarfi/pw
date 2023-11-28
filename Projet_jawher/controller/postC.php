<?php
include_once '../../config.php';
include_once '../../model/post.php';

// Create a PDO connection
try {
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

$postModel = new PostModel($pdo);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['user'], $_POST['post'])) {
        $userv = $_POST['user'];
        $postv = $_POST['post'];

        // Insert new post
        $postModel->addPost($userv, $postv);
    } elseif (isset($_POST['edit_post'], $_POST['edit_text'])) {
        // Edit existing post
        $postId = $_POST['edit_post'];
        $editText = $_POST['edit_text'];

        $postModel->editPost($postId, $editText);
    } elseif (isset($_POST['delete_post'])) {
        // Delete existing post
        $postIdToDelete = $_POST['delete_post'];

        $postModel->deletePost($postIdToDelete);
    }
    elseif(isset($_POST["reply_post"],$_POST["reply"],$_POST["username"],$_POST["userid"])){
        $postModel->addReply($_POST["userid"],$_POST["reply_post"],$_POST["username"],$_POST["reply"]);
    }
    elseif(isset($_POST["edit_reply"],$_POST["id_comment"])){
        $postModel->editReply($_POST["id_comment"],$_POST["edit_reply"]);
    }
}

// Fetch Posts
$posts = $postModel->getPosts();
?>
<!-- Your HTML/Template code for displaying posts goes here -->
