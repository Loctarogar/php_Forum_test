<?php

session_start();

include_once '../../Core/database.php';
include_once '../../Objects/topic.php';

$topics = [];
$counter = 0;
$arrayCounter = 0;
$pageTitle = "Main Page";

$database = new Database();
$conn = $database->getConnection();
$topic = new Topic($conn);
$stmt = $topic->topicShowAll();
while($row = $stmt->fetch()){
    $counter += 1;
    $topics[$arrayCounter][] = $row;
    if($counter == 3){
        $arrayCounter += 1;
        $counter = 0;
    }
}

include_once '../../Templates/layouts/header.php';
include_once '../../Templates/topic/topicShowAll.php';
include_once '../../Templates/layouts/footer.php';