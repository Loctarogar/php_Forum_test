<?php

include_once '../../Core/database.php';
include_once '../../Objects/topic.php';

$id = 5;

$database = new Database();
$conn = $database->getConnection();
$topic = new Topic($conn);
$stmt = $topic->topicRead($id);
$topic = $stmt->fetch();

include_once '../../Templates/topic/topicRead.php';