<?php

session_start();

include_once '../../Core/database.php';
include_once '../../Objects/user.php';

$pageTitle = "Admin: User Management";
$activeMenu = "management";

$userId = $_SESSION['userId'];
$database = new Database();
$conn = $database->getConnection();
$user = new User($conn);
$stmtUser = $user->userRead($userId);
$stmt = $user->userShowAll();
$users = $stmt->fetchAll();
$userPermission = $user->userHasPermission($userId, 4);
$user = $stmtUser->fetch();


include_once '../../Templates/admin/userManagement.php';

