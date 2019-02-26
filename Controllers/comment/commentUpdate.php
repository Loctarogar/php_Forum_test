<?php
session_start();

include_once '../../Objects/comment.php';
include_once '../../Core/database.php';

$commentId = $_POST['commentId'];
$commentBody = $_POST['body'];


if(isset($_POST['update'])){
    $database = new Database();
    $conn = $database->getConnection();
    $comment = new Comment($conn);
    $comment->setBody($commentBody);
    $stmt = $comment->commentUpdate($commentId);
    if($stmt->rowCOunt() > 0){
        $message = "Comment was updated";
    }else{
        $message = "An error occur";
    }
}

include_once '../../Templates/layouts/header.php';
include_once '../../Templates/comment/commentUpdate.php';
include_once '../../Templates/layouts/footer.php';