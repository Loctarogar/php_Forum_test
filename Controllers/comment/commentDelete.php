<?php

session_start();

include_once '../../Objects/comment.php';
include_once '../../Core/database.php';

$pageTitle = "Comment Delete";

if(isset($_POST['commentId']) && isset($_POST['topicId'])) {
    $commentId = $_POST['commentId'];
    $topicId = $_POST['topicId'];

}elseif (isset($_GET['commentId'])){
    $commentId = $_GET['commentId'];
    $database = new Database();
    $conn = $database->getConnection();
    $comment = new Comment($conn);
    $stmt = $comment->commentDelete($commentId);
    if ($stmt->rowCount() > 0) {
        $message = "Deleted successfully";
    } else {
        $message = "An error occur";
    }
    unset($commentId);
}else{
    $message = "Comment wasn't found";
}

include_once '../../Templates/layouts/header.php';
include_once '../../Templates/comment/commentDelete.php';
include_once '../../Templates/layouts/footer.php';