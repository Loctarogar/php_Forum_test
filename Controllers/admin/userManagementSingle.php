<?php

session_start();

include_once '../../Core/database.php';
include_once '../../Objects/user.php';
include_once '../../Objects/topic.php';
include_once '../../Objects/comment.php';
include_once '../../Objects/role.php';

$pageTitle = "Admin: Single User Management";
$activeMenu = "management";

if(!isset($_SESSION['user']) || !isset($_GET['userId'])){
    $message = "The page doesn't exists";
    $userPermission = false;
}elseif (isset($_SESSION['user']) && isset($_GET['userId'])){
    $userPermission = true;
    $message = "You have not permission to admin page";
    $userId = $_SESSION['userId'];
    $userSingleId = $_GET['userId'];
    $database = new Database();
    $conn = $database->getConnection();
    $user = new User($conn);
    //admin read
    $stmtUser = $user->userRead($userId);
    //users information
    $stmtUserSingleId = $user->userRead($userSingleId);
    $userSinglePermissions = $user->userAllPermissions($userSingleId);
    $userSingleRole = $user->userHasRole($userSingleId);
    $userSingle = $stmtUserSingleId->fetch();
    //admin fetch
    $user = $stmtUser->fetch();
    //user's topics
    $topic = new Topic($conn);
    $stmtTopic = $topic->topicAllForUser($userSingleId);
    $topics = $stmtTopic->fetchAll();
    //user's comments
    $comment = new Comment($conn);
    $stmtComment = $comment->commentAllForUser($userSingleId);
    $comments = $stmtComment->fetchAll();
    //role
    $role = new Role($conn);
    //admin's role
    $userRole = $role->readRole($userSingleRole);
    // all roles
    $roles = $role->showAllRoles();
    $roles = $roles->fetchAll();
    if(isset($_GET['role'])){
        $role->roleForUserUpdate($userSingleId, $_GET['role']);
    }

}else{
    $message = "The page doesn't exists";
    $userPermission = false;
}

include_once "../../Templates/admin/userManagementSingle.php";
