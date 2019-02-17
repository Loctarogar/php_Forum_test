<?php

include_once '../../Core/database.php';
include_once '../../Objects/topic.php';

$topics = [];

$database = new Database();
$conn = $database->getConnection();
$topic = new Topic($conn);
$stmt = $topic->topicShowAll();
$topics = $stmt->fetchAll();

include_once '../../Templates/topic/topicShowAll.php';