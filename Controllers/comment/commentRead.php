<?php

include_once '../../Objects/comment.php';
include_once '../../Core/database.php';
include_once '../../Templates/comment/commentRead.php';

$commentId = 4;

$database = new Database();
$conn = $database->getConnection();
$comment = new Comment($conn);
$stmt = $comment->commentRead($commentId);
print_r($stmt->fetch());