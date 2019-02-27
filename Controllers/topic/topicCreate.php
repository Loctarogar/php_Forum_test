<?php

session_start();

include_once '../../Objects/topic.php';
include_once '../../Core/database.php';
include_once '../../Objects/user.php';

$pageTitle = "Topic Create";

if(isset($_SESSION['userId']) && isset($_POST['name']) && isset($_POST['body'])){
    $userId = $_SESSION['userId'];
    $topicName = $_POST['name'];
    $topicBody = $_POST['body'];
    $database = new Database();
    $conn = $database->getConnection();
    $user = new User($conn);
    $permission = $user->userHasPermission($userId, 1);
    if(true === $permission){
        $topic = new Topic($conn);
        $topic->setName($topicName);
        $topic->setBody($topicBody);
        $topic->setUser($userId);
        $stmt = $topic->topicCreate();
        if($stmt->rowCount() > 0){
            $message = "Topic was successfully created";
        }else{
            $message = "En error occurred";
        }
    }else{
        $message = "You have not permission to create topic";
    }
}
include_once '../../Templates/layouts/header.php';
include_once '../../Templates/topic/topicCreate.php';
include_once '../../Templates/layouts/footer.php';

