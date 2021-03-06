<?php

session_start();

include_once '../../Core/database.php';
include_once '../../Objects/user.php';

$pageTitle = "User Logout";
if(isset($_GET['logout']) && isset($_SESSION['userId'])){
    $userId = $_SESSION['userId'];
    $database = new Database();
    $conn = $database->getConnection();
    $user = new User($conn);
    $stmt = $user->userLogout($userId);
    if($stmt->rowCount() > 0){
        $message =  "You successfully logged out";
    }
    unset($_SESSION['user']);
    unset($_SESSION['userId']);
    unset($userId);
}

include_once '../../Templates/layouts/header.php';
include_once '../../Templates/user/userLogout.php';
include_once '../../Templates/layouts/footer.php';
