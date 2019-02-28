<?php

session_start();

include_once '../../Objects/comment.php';
include_once '../../Core/database.php';
include_once '../../Objects/user.php';

if(isset($_SESSION['user']) && isset($_POST['link']) && isset($_POST['userId'])
    && isset($_POST['topic']) && isset($_POST['body']))

{
    $link = $_POST['link'];
    $userId = $_POST['userId'];
    $topicId = $_POST['topic'];
    $body = $_POST['body'];

    $database = new Database();
    $conn = $database->getConnection();
    $user = new User($conn);
    $permission = $user->userHasPermission($userId, 4);
    if(true === $permission){
        $comment = new Comment($conn);
        $comment->setTopic($topicId);
        $comment->setBody($body);
        $comment->setUserId($userId);
        $stmt = $comment->commentCreate();
    }
}

header('Location: '.$link.'?topicId='.$topicId);