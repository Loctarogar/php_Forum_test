<?php

session_start();

include_once '../../Core/database.php';
include_once '../../Objects/user.php';

$userId = $_SESSION['userId'];
$database = new Database();
$conn = $database->getConnection();

$user = new User($conn);
$stmtUser = $user->userRead($userId);
$currentUser = $stmtUser->fetch();

$stmt = $user->userShowAll();
$users = $stmt->fetchAll();

include_once '../../Templates/admin/layouts/header.php';
include_once '../../Templates/admin/userManagement.php';
include_once '../../Templates/admin/layouts/footer.php';