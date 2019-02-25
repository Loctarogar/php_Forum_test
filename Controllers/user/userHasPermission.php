<?php

include_once '../../Core/database.php';
include_once '../../Objects/user.php';

$permission = 7;
$database = new Database();
$conn = $database->getConnection();
$user = new User($conn);
$stmt = $user->userHasPermission(8, $permission);

if(true === $stmt){
    echo "permission granted";
}else{
    echo "permission denied";
}