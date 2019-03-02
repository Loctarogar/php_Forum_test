<?php

session_start();

include_once '../../Core/database.php';
include_once '../../Objects/user.php';
include_once '../../Objects/topic.php';
include_once '../../Objects/comment.php';

$pageTitle = "Admin: Single User Management";
$activeMenu = "management";

if(!isset($_SESSION['user']) || !isset($_GET['userId'])){
    $message = "The page doesn't exists";
    $userPermission = false;
}elseif (isset($_SESSION['user']) && isset($_GET['userId'])){
    $userPermission = true;
    $message = "You have not permission to admin page";
    $userId = $_SESSION['userId'];
    $userSingleId = $_GET['userId'];
    $database = new Database();
    $conn = $database->getConnection();
    $user = new User($conn);
    $stmtUser = $user->userRead($userId);
    $stmtUserSingleId = $user->userRead($userSingleId);
    $userSingle = $stmtUserSingleId->fetch();
    $user = $stmtUser->fetch();
    $topic = new Topic($conn);
    $stmtTopic = $topic->topicAllForUser($userSingleId);
    $topics = $stmtTopic->fetchAll();
    $comment = new Comment($conn);
    $stmtComment = $comment->commentAllForUser($userSingleId);
    $comments = $stmtComment->fetchAll();
}else{
    $message = "The page doesn't exists";
    $userPermission = false;
}

include_once "../../Templates/admin/userManagementSingle.php";
