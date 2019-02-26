<section id="home-head" class="contact">
    <h1>Ready to start? drop us a line!</h1>
</section>
<?php if(isset($_SESSION['user'])){ ?>
    <section id="main-content">
        <div class="text-intro">
            <h2>Here you can update comment</h2>
        </div>
        <div class="columns features">
            <?php if(isset($message)){ ?>
                <p><?php echo $message; ?></p>
            <?php }else{ ?>
                <h3>Update Comment</h3>
                <form method="post" action="../../Controllers/comment/commentUpdate.php">
                    Enter comment : <br>
                    <input type="text" name="body" value="<?php echo $comment['body'];?>" style="height: 200px; width: 300px"> <br>
                    <input type="hidden" name="commentId" value="<?php echo $commentId; ?>">
                    <input type="hidden" name="update" value="update">
                    <input type="submit">
                </form>
            <?php } ?>
        </div>
    </section>
<?php }else{?>
    <h1>Please login to be able update comment</h1>
<?php } ?>
