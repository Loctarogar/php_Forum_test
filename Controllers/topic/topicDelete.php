<?php

session_start();

include_once '../../Core/database.php';
include_once '../../Objects/topic.php';

if(isset($_GET['topicId'])){
    $topicId = $_GET['topicId'];
    $database = new Database();
    $conn = $database->getConnection();
    $topic = new Topic($conn);
    $stmt = $topic->topicDelete($topicId);
    $stmt = $stmt->rowCount();
    unset($_GET['topicId']);
    if(0 < $stmt){
        $message = "Topic was successfully deleted";
    }else{
        $message = "En error occurred";
    }
}else{
    $message = "Topic wasn't found";
}

include_once '../../Templates/topic/topicDelete.php';
