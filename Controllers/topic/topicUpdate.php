<?php

session_start();

include_once '../../Core/database.php';
include_once '../../Objects/topic.php';

$topicId = $_GET['topicId'];

$database = new Database();
$conn = $database->getConnection();

if(isset($_POST['name']) && isset($_POST['body'])){
    $topicId = $_POST['topicId'];
    $name = $_POST['name'];
    $body = $_POST['body'];
    $topic = new Topic($conn);
    $topic->setName($name);
    $topic->setBody($body);
    $topic->topicUpdate($topicId);
    $message = "Topic was successfully updated";
}else{
    $topic = new Topic($conn);
    $topic = $topic->topicRead($topicId)->fetch();
}

include_once '../../Templates/topic/topicUpdate.php';
