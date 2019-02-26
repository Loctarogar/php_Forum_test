
<section id="home-head" class="work">
    <h1>Here you can delete topic.</h1>
</section>
<section id="main-content">
    <div class="text-intro">
        <h2>Do you want to delete topic ?</h2>
    </div>
    <?php if(isset($_GET['topicId'])){ ?>
    <div class="columns">
        <div class="img-first"><a href="../../Controllers/topic/topicDelete.php?topicId=<?php echo $_GET['topicId']; ?>&delete=yes">Yes i want to delete topic</a></div>
        <div class="img-second"><a href="../../Controllers/topic/topicShowAll.php">No, go back to main page</a></div>
    </div>
    <?php }else{ ?>
        <div><?php echo $message;?></div>
    <?php } ?>

</section>
