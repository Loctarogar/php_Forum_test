<?php

session_start();

include_once '../../Core/database.php';
include_once '../../Objects/user.php';

$userId = $_SESSION['userId'];
$database = new Database();
$conn = $database->getConnection();
$user = new User($conn);
$stmt = $user->userRead($userId);
$user = $stmt->fetch();

include_once '../../Templates/admin/dashboard.php';