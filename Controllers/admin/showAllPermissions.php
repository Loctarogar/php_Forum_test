<?php

include_once '../../Core/database.php';
include_once '../../Objects/permission.php';

$database = new Database();
$conn = $database->getConnection();
$permission = new Permission($conn);
$stmt = $permission->showAllPermissions();
$permissions = $stmt->fetchAll();

print_r($permissions);