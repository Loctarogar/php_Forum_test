<?php

session_start();

include_once '../../Core/database.php';
include_once '../../Objects/comment.php';
include_once '../../Objects/user.php';

$userId = $_SESSION['userId'];
$database = new Database();
$conn = $database->getConnection();
$user = new User($conn);
$stmt = $user->userRead($userId);
$currentUser = $stmt->fetch();
$comment = new Comment($conn);
$commentStmt = $comment->commentShowALl();
$comments = $commentStmt->fetchAll();

include_once '../../Templates/admin/layouts/header.php';
include_once '../../Templates/admin/commentManagement.php';
include_once '../../Templates/admin/layouts/footer.php';