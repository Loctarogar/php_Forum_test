<?php

include_once '../../Objects/comment.php';
include_once '../../Core/database.php';
include_once '../../Templates/comment/commentUpdate.php';

$commentId = 4;
$commentBody = $_POST['body'];

$database = new Database();
$conn = $database->getConnection();
$comment = new Comment($conn);
$comment->setBody($commentBody);
$stmt = $comment->commentUpdate($commentId);
if($stmt->rowCOunt() > 0){
    echo "Comment was updated";
}else{
    echo "An error occur";
}