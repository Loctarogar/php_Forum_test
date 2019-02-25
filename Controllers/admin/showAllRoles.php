<?php

include_once '../../Core/database.php';
include_once '../../Objects/role.php';

$database = new Database();
$conn = $database->getConnection();
$role = new Role($conn);
$stmt = $role->showAllRoles();
$roles = $stmt->fetchAll();

print_r($roles);