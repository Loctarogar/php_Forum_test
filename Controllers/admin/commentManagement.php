<?php

session_start();

include_once '../../Core/database.php';
include_once '../../Objects/comment.php';
include_once '../../Objects/user.php';

$pageTitle = "Admin: Comment Management";
$activeMenu = "management";

$userId = $_SESSION['userId'];
$database = new Database();
$conn = $database->getConnection();
$user = new User($conn);
$stmt = $user->userRead($userId);
$userPermission = $user->userHasPermission($userId, 4);
$user = $stmt->fetch();
$comment = new Comment($conn);
$commentStmt = $comment->commentShowALl();
$comments = $commentStmt->fetchAll();

include_once '../../Templates/admin/commentManagement.php';
