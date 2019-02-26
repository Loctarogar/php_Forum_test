<?php

session_start();

include_once '../../Objects/user.php';
include_once '../../Core/database.php';

if(isset($_POST['userId'])){
    $userId = $_POST['userId'];
}

if(isset($_POST['name']) && isset($_POST['password']) && isset($_POST['passwordRepeat'])){
    $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
    $database = new Database();
    $conn = $database->getConnection();
    $user = new User($conn);
    $user->setName($name);
    $user->setPassword($password);
    $user->userUpdate($userId);
    $message = "User was updated";
}

include_once '../../Templates/layouts/header.php';
include_once '../../Templates/user/userUpdate.php';
include_once '../../Templates/layouts/footer.php';
