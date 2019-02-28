<?php

session_start();

include_once '../../Objects/comment.php';
include_once '../../Core/database.php';
include_once '../../Objects/user.php';

$pageTitle = "Comment Update";

if(isset($_SESSION['user']) && isset($_POST['commentId']) && isset($_POST['body'])){
    $commentId = $_POST['commentId'];
    $commentBody = $_POST['body'];
    $userId = $_SESSION['userId'];

    if(isset($_POST['update'])){
        $database = new Database();
        $conn = $database->getConnection();
        $user = new User($conn);
        $permission = $user->userHasPermission($userId, 5);
        if(true === $permission){
            $comment = new Comment($conn);
            $comment->setBody($commentBody);
            $stmt = $comment->commentUpdate($commentId);
            if($stmt->rowCOunt() > 0){
                $message = "Comment was updated";
            }else{
                $message = "An error occur";
            }
        }else{
            $message = "You haven't permission to update comment";
        }
    }
}else{
    $message = "You have to login to change comment";
}

include_once '../../Templates/layouts/header.php';
include_once '../../Templates/comment/commentUpdate.php';
include_once '../../Templates/layouts/footer.php';
