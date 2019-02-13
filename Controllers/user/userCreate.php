<?php

include_once '../../Objects/user.php';
include_once '../../Core/database.php';
include_once '../../Templates/user/userCreate.php';

$database = new Database();
$conn = $database->getConnection();
$user = new User($conn);

if(isset($_POST['name']) && strlen($_POST['name']) > 5 && isset($_POST['password']) && strlen($_POST['password']) > 5){
    $userName = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    $userPassword = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
}else{
    echo "Please provide valid name and password";
    return ;
}
$user->setName($userName);
$user->setPassword($_POST[$userPassword]);
$stmt = $user->userCreate();

if($stmt->rowCount() > 0){
    echo "User was added";
}else{
    echo "Could not add user";
}
