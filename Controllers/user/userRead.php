<?php

include_once '../../Objects/user.php';
include_once '../../Core/database.php';

$id = 5;
if(isset($_POST['id'])){
    $id = filter_var($_POST['id'], FILTER_VALIDATE_INT);
}
$database = new Database();
$conn = $database->getConnection();
$user = new User($conn);
$user = $user->userRead($id)->fetch();

include_once '../../Templates/user/userRead.php';
