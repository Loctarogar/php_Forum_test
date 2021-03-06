<?php
session_start();

include_once '../../Core/database.php';
include_once '../../Objects/topic.php';
include_once '../../Objects/user.php';

$pageTitle = "Topic Read";
if(isset($_GET['topicId'])){
    $id = $_GET['topicId'];
    $database = new Database();
    $conn = $database->getConnection();
    $topic = new Topic($conn);
    $stmtComments = $topic->topicGetComments($id);
    $comments = $stmtComments->fetchAll();
    $user = new User($conn);
    $stmtTopic = $topic->topicRead($id);
    $topic = $stmtTopic->fetch();
    $stmtUser = $user->userRead($topic['user_id']);
    $user = $stmtUser->fetch();
}else{
    $message = "An error occurred";
}

include_once '../../Templates/layouts/header.php';
include_once '../../Templates/topic/topicRead.php';
include_once '../../Templates/layouts/footer.php';
