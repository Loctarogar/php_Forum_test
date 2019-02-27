<?php

session_start();

include_once '../../Core/database.php';
include_once '../../Objects/topic.php';
include_once '../../Objects/user.php';

$pageTitle = "Topic Update";
if(isset($_GET['topicId'])){
    $topicId = $_GET['topicId'];
}
$database = new Database();
$conn = $database->getConnection();


if(isset($_SESSION['user']) && isset($_POST['name']) && isset($_POST['body'])){
    $userId = $_SESSION['userId'];
    $topicId = $_POST['topicId'];
    $name = $_POST['name'];
    $body = $_POST['body'];

    $user = new User($conn);
    $topic = new Topic($conn);
    $permission = $user->userHasPermission($userId, 2);
    $isOwner = $topic->isOwner($topicId, $userId);
    if(true === $permission && true === $isOwner){
        $topic->setName($name);
        $topic->setBody($body);
        $topic->topicUpdate($topicId);
        $message = "Topic was successfully updated";
    }
}else{
    $topic = new Topic($conn);
    $topic = $topic->topicRead($topicId)->fetch();
}

include_once '../../Templates/layouts/header.php';
include_once '../../Templates/topic/topicUpdate.php';
include_once '../../Templates/layouts/footer.php';