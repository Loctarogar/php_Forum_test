<?php

session_start();

include_once '../../Core/database.php';
include_once '../../Objects/topic.php';
include_once '../../Templates/topic/topicUpdate.php';

$topicId = 5;
$name = $_POST['name'];
$body = $_POST['body'];

$database = new Database();
$conn = $database->getConnection();
$topic = new Topic($conn);
$topic->setName($name);
$topic->setBody($body);
$topic->topicUpdate($topicId);