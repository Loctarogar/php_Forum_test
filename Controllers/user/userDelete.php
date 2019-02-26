<?php

session_start();

include_once '../../Objects/user.php';
include_once '../../Core/database.php';

$pageTitle = "User Delete";
if(isset($_GET['userId']) && isset($_GET['delete'])){
    $userId = $_GET['userId'];
    $database = new Database();
    $conn = $database->getConnection();
    $user = new User($conn);
    $stmt = $user->userDelete($userId);
    unset($_GET['userId']);
    if(0 < $stmt){
        $message = "User was deleted";
        unset($_SESSION['user']);
        unset($_SESSION['userId']);
    }else{
        $message = "An error occurred";
    }
}else{
    $message = "User wasn't found";
}

include_once '../../Templates/layouts/header.php';
include_once '../../Templates/user/userDelete.php';
include_once '../../Templates/layouts/footer.php';
