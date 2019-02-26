<section id="home-head" class="work">
    <h1>User Delete</h1>
</section>
<section id="main-content">
    <div class="text-intro">
        <?php if(isset($message)){ ?>
            <h2><?php echo $message; ?></h2>
        <?php }else{ ?>
            <h2>Do you want to delete user ?</h2>
        <?php } ?>
    </div>
    <?php if(isset($_GET['userId'])){ ?>
        <div class="columns">
            <div class="img-first"><a href="../../Controllers/user/userDelete.php?userId=<?php echo $_GET['userId']; ?>&delete=yes">Yes i want to delete user</a></div>
            <div class="img-second"><a href="../../Controllers/topic/topicShowAll.php">No, go back to the main page</a></div>
        </div>
    <?php }else{ ?>
        <div><?php echo $message;?></div>
    <?php } ?>

</section>