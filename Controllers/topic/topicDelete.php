<?php

session_start();

include_once '../../Core/database.php';
include_once '../../Objects/topic.php';
include_once '../../Objects/user.php';

$pageTitle = "Topic Delete";
if(isset($_GET['topicId'])){
    $topicId = $_GET['topicId'];
}

if(isset($_GET['topicId']) && isset($_GET['delete']) && isset($_SESSION['user'])){
    $userId = $_SESSION['userId'];
    $topicId = $_GET['topicId'];
    $database = new Database();
    $conn = $database->getConnection();
    $user = new User($conn);
    $permission = $user->userHasPermission($userId, 3);
    $topic = new Topic($conn);
    $isOwner = $topic->isOwner($topicId, $userId);
    if(true === $permission && true === $isOwner){
        $stmt = $topic->topicDelete($topicId);
        $stmt = $stmt->rowCount();
        unset($_GET['topicId']);
        if(0 < $stmt){
            $message = "Topic was successfully deleted";
        }else{
            $message = "En error occurred";
        }

    }else{
        unset($_GET['topicId']);
        $message = "You have not permission to delete topic";
    }
}else{
    $message = "Topic wasn't found";
}

include_once '../../Templates/layouts/header.php';
include_once '../../Templates/topic/topicDelete.php';
include_once '../../Templates/layouts/footer.php';