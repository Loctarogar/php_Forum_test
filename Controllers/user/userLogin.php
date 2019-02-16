<?php

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
    print_r($u);
    echo "You successfully logged in";
}else{
    echo "An error occurred";
}
