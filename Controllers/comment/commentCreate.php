<?php

include_once '../../Objects/comment.php';
include_once '../../Core/database.php';

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

header('Location: '.$linc.'?topicId='.$topicId);