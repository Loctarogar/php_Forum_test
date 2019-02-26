<section id="home-head" class="work">
    <h1>Here you can delete comment.</h1>
</section>
<section id="main-content">
    <div class="text-intro">
        <h2>Do you want to delete comment ?</h2>
    </div>
    <?php if($commentId){ ?>
        <div class="columns">
            <div class="img-first">
                <a href="../../Controllers/comment/commentDelete.php?commentId=<?php echo $commentId; ?>&delete=yes">
                    Yes i want to delete comment
                </a>
            </div>
            <div class="img-second">
                <a href="../../Controllers/topic/topicRead.php?topicId=<?php echo $topicId; ?>">
                    No, go back to the topic
                </a>
            </div>
        </div>
    <?php }else{ ?>
        <div><?php echo $message;?></div>
    <?php } ?>
</section>
