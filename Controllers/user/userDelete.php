<?php

include_once '../../Objects/user.php';
include_once '../../Core/database.php';
include_once '../../Templates/user/userDelete.php';

$id = 1;

$database = new Database();
$conn = $database->getConnection();
$user = new User($conn);
$user->userDelete($id);