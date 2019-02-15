<?php

include_once '../../Objects/comment.php';
include_once '../../Core/database.php';
include_once '../../Templates/comment/commentDelete.php';

$commentId = 2;

$database = new Database();
$conn = $database->getConnection();
$comment = new Comment($conn);
$stmt = $comment->commentDelete($commentId);
if($stmt->rowCount() > 0){
    echo "Deleted successfully";
}else{
    echo "An error occur";
}