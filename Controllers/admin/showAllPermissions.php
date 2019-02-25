<?php

session_start();

include_once '../../Core/database.php';
include_once '../../Objects/permission.php';
include_once '../../Objects/user.php';

if(isset($_SESSION['user'])){
    $database = new Database();
    $conn = $database->getConnection();
    $userId = $_SESSION['user_id'];
    $user = new User($conn);
    $user = $user->userRead($userId);
    $permission = new Permission($conn);
    $stmt = $permission->showAllPermissions();
    $permissions = $stmt->fetchAll();

    print_r($permissions);
}else{
    echo "there is no such page";
}

