<?php

session_start();

include_once '../../Core/database.php';
include_once '../../Objects/topic.php';
include_once '../../Objects/user.php';

$pageTitle = "Admin: Topic Management";
$activeMenu = "management";

$userId = $_SESSION['userId'];
$database = new Database();
$conn = $database->getConnection();
$user = new User($conn);
$stmt = $user->userRead($userId);
$userPermission = $user->userHasPermission($userId, 4);
$user = $stmt->fetch();
$topic = new Topic($conn);
$stmt = $topic->topicShowAll();
$topics = $stmt->fetchAll();

include_once '../../Templates/admin/topicManagement.php';
