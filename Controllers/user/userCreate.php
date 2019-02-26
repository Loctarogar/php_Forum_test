<?php
session_start();

include_once '../../Objects/user.php';
include_once '../../Core/database.php';

$database = new Database();
$conn = $database->getConnection();
$user = new User($conn);

if(isset($_POST['name']) && strlen($_POST['name']) > 5
    && isset($_POST['password']) && strlen($_POST['password']) > 5){
    $userName = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    $userPassword = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
    $user->setName($userName);
    $user->setPassword($_POST[$userPassword]);
    $stmt = $user->userCreate();

    if($stmt->rowCount() > 0){
        $message = "User was added";
    }else{
        $message = "Could not add user";
    }
}else{
    $message = "Please provide valid name and password";
}

include_once '../../Templates/layouts/header.php';
include_once '../../Templates/user/userCreate.php';
include_once '../../Templates/layouts/footer.php';
