<?php

session_start();

include_once '../../Core/database.php';
include_once '../../Objects/user.php';
include_once '../../Objects/topic.php';
include_once '../../Objects/comment.php';

$pageTitle = "Admin: Dashboard";
$activeMenu = "dashboard";

$userId = $_SESSION['userId'];
$database = new Database();
$conn = $database->getConnection();
$user = new User($conn);
$stmt = $user->userRead($userId);
$userPermission = $user->userHasPermission($userId, 4);
$user = $stmt->fetch();
$topic = new Topic($conn);
$stmt = $topic->topicAllForUser($userId);
$topics = $stmt->fetchAll();
$comment = new Comment($conn);
$stmt = $comment->commentAllForUser($userId);
$comments = $stmt->fetchAll();

include_once '../../Templates/admin/dashboard.php';
