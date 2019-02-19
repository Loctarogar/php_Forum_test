<?php



include_once '../../Core/database.php';
include_once '../../Objects/topic.php';

if(!isset($_POST['topicId'])) {
    include_once '../../Templates/topic/topicDelete.php';
}else{
    $topicId = $_POST['topicId'];
    $database = new Database();
    $conn = $database->getConnection();
    $topic = new Topic($conn);
    $stmt = $topic->topicDelete($topicId);
    $stmt = $stmt->rowCount();
    if(0 < $stmt){
        echo "Topic was deleted";
    }else{
        echo "An error occurred";
    }
}

