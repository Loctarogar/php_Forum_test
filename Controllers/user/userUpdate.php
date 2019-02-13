<?php

include_once '../../Objects/user.php';
include_once '../../Core/database.php';


$id = 5;
if(isset($_POST['id'])){
    $id = $_POST['id'];
}
if(isset($_POST['name']) && isset($_POST['password']) && isset($_POST['passwordRepeat'])){
    $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
    $database = new Database();
    $conn = $database->getConnection();
    $user = new User($conn);
    $user->setName($name);
    $user->setPassword($password);
    $user->userUpdate($id);
    echo "User's data was updated";
}else{
    include_once '../../Templates/user/userUpdate.php';
}
