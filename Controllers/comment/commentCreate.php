<?php

include_once '../../Objects/comment.php';
include_once '../../Core/database.php';
include_once '../../Templates/comment/commentCreate.php';

$database = new Database();
$conn = $database->getConnection();
$comment = new Comment($conn);

$topicId = 5;
$body = $_POST['body'];
$comment->setTopic($topicId);
$comment->setBody($body);
$stmt = $comment->commentCreate();
if($stmt->rowCount() > 0){
    echo "Comment was created successfully";
}else{
    echo "An error occur";
}