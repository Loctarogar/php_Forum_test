<?php

session_start();

include_once '../../Core/database.php';
include_once '../../Objects/user.php';

$pageTitle = "Admin: User Management";
$activeMenu = "management";

if(!isset($_SESSION['user'])){
    $message = "The page doesn't exists";
    $userPermission = false;
}else{
    $message = "You have not permission to admin page";
    $userId = $_SESSION['userId'];
    $database = new Database();
    $conn = $database->getConnection();
    $user = new User($conn);
    $stmtUser = $user->userRead($userId);
    $stmt = $user->userShowAll();
    $usersAll = $stmt->fetchAll();
    $users = [];
    foreach ($usersAll as $value){
        $value['permissions'] = $user->userAllPermissions($value['user_id']);
        $value['role'] = $user->userHasRole($value['user_id']);
        $users[] = $value;
    }
    $userPermission = $user->userHasPermission($userId, 4);
    $user = $stmtUser->fetch();
}

include_once '../../Templates/admin/userManagement.php';
