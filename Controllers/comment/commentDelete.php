<?php

session_start();

include_once '../../Objects/comment.php';
include_once '../../Core/database.php';
include_once '../../Objects/user.php';

$pageTitle = "Comment Delete";

if(isset($_SESSION['user'])){
    if(isset($_POST['commentId']) && isset($_POST['topicId'])){
        $commentId = $_POST['commentId'];
        $topicId = $_POST['topicId'];

    }elseif (isset($_GET['commentId']) && isset($_GET['delete'])){
        $commentId = $_GET['commentId'];
        $database = new Database();
        $conn = $database->getConnection();
        $user = new User($conn);
        $permission = $user->userHasPermission($_SESSION['userId'], 6);

        if(true === $permission){
            $comment = new Comment($conn);
            $stmt = $comment->commentDelete($commentId);
            if ($stmt->rowCount() > 0) {
                $message = "Deleted successfully";
            } else {
                $message = "An error occur";
            }
            unset($commentId);

        }else{
            $message = "You haven't permission to delete this comment";
        }

    }else{
        $message = "Comment wasn't found";
    }

}else{
    $message = "Please login";
}

include_once '../../Templates/layouts/header.php';
include_once '../../Templates/comment/commentDelete.php';
include_once '../../Templates/layouts/footer.php';
