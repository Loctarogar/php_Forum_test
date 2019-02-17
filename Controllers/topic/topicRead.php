<?php

include_once '../../Core/database.php';
include_once '../../Objects/topic.php';

if(isset($_GET['topicId'])){
    $id = $_GET['topicId'];
}else{
    $id = 5;
}

$database = new Database();
$conn = $database->getConnection();
$topic = new Topic($conn);
$stmt = $topic->topicRead($id);
$topic = $stmt->fetch();

include_once '../../Templates/topic/topicRead.php';