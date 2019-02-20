<?php

session_start();

include_once '../../Objects/user.php';
include_once '../../Core/database.php';

if(isset($_GET['userId'])){
    $userId = $_GET['userId'];
    $database = new Database();
    $conn = $database->getConnection();
    $user = new User($conn);
    $stmt = $user->userDelete($userId);
    unset($_GET['userId']);
    if(0 < $stmt){
        $message = "User was deleted";
    }else{
        $message = "An error occurred";
    }
}else{
    $message = "User wasn't found";
}


include_once '../../Templates/user/userDelete.php';
