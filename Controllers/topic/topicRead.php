<?php
session_start();

include_once '../../Core/database.php';
include_once '../../Objects/topic.php';
include_once '../../Objects/user.php';

if(isset($_GET['topicId'])){
    $id = $_GET['topicId'];
}else{
    $id = 5;
}

$database = new Database();
$conn = $database->getConnection();
$topic = new Topic($conn);
$stmtTopic = $topic->topicRead($id);
$topic = $stmtTopic->fetch();

$user = new User($conn);
$stmtUser = $user->userRead($topic['user_id']);
$user = $stmtUser->fetch();

include_once '../../Templates/topic/topicRead.php';