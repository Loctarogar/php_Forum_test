<?php

include_once '../../Objects/topic.php';
include_once '../../Core/database.php';
include_once '../../Templates/topic/topicCreate.php';

$userId = 6;
$topicName = $_POST['name'];
$topicBody = $_POST['body'];

$database = new Database();
$conn = $database->getConnection();
$topic = new Topic($conn);
$topic->setName($topicName);
$topic->setBody($topicBody);
$topic->setUser($userId);
$stmt = $topic->topicCreate();
if($stmt->rowCount() > 0){
    echo "Topic was successfully created";
}else{
    echo "En error occurred";
}