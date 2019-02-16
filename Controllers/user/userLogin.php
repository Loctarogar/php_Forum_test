<?php

session_start();

include_once '../../Templates/user/userLogin.php';
include_once '../../Core/database.php';
include_once '../../Objects/user.php';

$username = $_POST['name'];
$password = $_POST['password'];

$database = new Database();
$conn = $database->getConnection();
$user = new User($conn);
$user->setName($username);
$user->setPassword($password);
$stmt = $user->userLogin();
$u = $stmt->fetch();
if($u){
    $_SESSION['user'] = $u['user_id'];
    echo "You successfully logged in";
}else{
    echo "An error occurred";
}