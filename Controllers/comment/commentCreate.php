<?php

include_once '../../Objects/comment.php';
include_once '../../Core/database.php';
//include_once '../../Templates/comment/commentCreate.php';

$database = new Database();
$conn = $database->getConnection();
$comment = new Comment($conn);

$linc = $_POST['link'];
$userId = $_POST['userId'];
$topicId = $_POST['topic'];
$body = $_POST['body'];
$comment->setTopic($topicId);
$comment->setBody($body);
$comment->setUserId($userId);
$stmt = $comment->commentCreate();
if($stmt->rowCount() > 0){
    echo "Comment was created successfully";
}else{
    echo "An error occur";
}
header('Location: '.$linc.'?topicId='.$topicId);