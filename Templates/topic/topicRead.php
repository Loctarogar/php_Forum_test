<section id="home-head" class="work">
    <h1>We built identity for local and international clients.</h1>
</section>
<section id="main-content">
    <?php if(!isset($message)){ ?>
    <div class="text-intro">
        <h2><?php echo $topic['name']; ?></h2>
    </div>
    <div class="columns">
        <p><?php echo $topic['body']; ?></p>
        <p>Author : <a href="../../Controllers/user/userRead.php?userId=<?php echo $user['user_id']; ?>"><?php echo $user['name']; ?></a></p>
        <?php if(isset($_SESSION['user']) && $_SESSION['user'] == $user['name']){ ?>
            <p><a href="../../Controllers/topic/topicUpdate.php?topicId=<?php echo $topic['topic_id']; ?>">Update</a>  or
            <a href="../../Controllers/topic/topicDelete.php?topicId=<?php echo $topic['topic_id']; ?>">Delete topic?</a></p>
        <?php } ?>
        <p>Comment section: </p>
        <?php if (isset($message)) {?>
        <p><?php echo $message; ?></p>
        <?php } ?>
        <?php if(isset($_SESSION['user'])){ ?>
            <form action="../../Controllers/comment/commentCreate.php" method="post">
            Enter your comment : <br>
            <input type="text" name="body"> <br>
            <input type="hidden" name="link" value="<?php echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']; ?>">
            <input type="hidden" name="topic" value="<?php echo $topic['topic_id']; ?>">
            <input type="hidden" name="userId" value="<?php echo $_SESSION['userId']; ?>">
            <input type="submit">
             </form>
        <?php } ?>
        <br>
        <?php foreach($comments as $comment){ ?>
            <p><?php echo $comment['body']; ?></p>
            <?php if(isset($_SESSION['user'])){ ?>
                <form action="../../Controllers/comment/commentDelete.php" method="post">
                    <input type="hidden" value="<?php echo $comment['comment_id']; ?>" name="commentId">
                    <input type="hidden" value="<?php echo $topic['topic_id']; ?>" name="topicId">
                    <input type="submit" value="Delete comment?">
                </form>
                <form action="../../Controllers/comment/commentUpdate.php" method="post">
                    <input type="hidden" value="<?php echo $comment['comment_id']; ?>" name="commentId">
                    <input type="hidden" value="<?php echo $comment['body'] ?>" name="body">
                    <input type="submit" value="Update comment">
                </form>
            <?php } ?>

        <?php } ?>
    </div>
    </div>
    <?php }else{ ?>
        <?php echo $message; ?>
    <?php } ?>
</section>
