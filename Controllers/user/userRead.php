<?php
session_start();

include_once '../../Objects/user.php';
include_once '../../Core/database.php';
include_once '../../Objects/topic.php';

if(isset($_GET['userId'])){
    $id = filter_var($_GET['userId'], FILTER_VALIDATE_INT);
    $database = new Database();
    $conn = $database->getConnection();
    $user = new User($conn);
    $user = $user->userRead($id)->fetch();
    $topic = new Topic($conn);
    $stmt = $topic->topicAllForUser($user['user_id']);
    $topics = $stmt->fetchAll();
}

include_once '../../Templates/layouts/header.php';
include_once '../../Templates/user/userRead.php';
include_once '../../Templates/layouts/footer.php';