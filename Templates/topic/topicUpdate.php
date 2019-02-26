<section id="home-head" class="contact">
    <h1>Ready to start? drop us a line!</h1>
</section>
<?php if(isset($_SESSION['user'])){ ?>
    <section id="main-content">
        <div class="text-intro">
            <h2>Here you can update topic</h2>
        </div>
        <div class="columns features">
            <?php if(isset($message)){ ?>
                <p><?php echo $message; ?></p>
            <?php }else{ ?>
            <h3>Update Topic</h3>
            <form method="post" action="../../Controllers/topic/topicUpdate.php">
                Enter new topic name: <br>
                <input type="text" name="name" value="<?php echo $topic['name'];?>" style="width: 300px"> <br>
                Enter new topic body: <br>
                <input type="text" name="body" style="height: 200px; width: 300px"><br>
                <input type="hidden" name="topicId" value="<?php echo $topic['topic_id']; ?>">
                <input type="submit">
            </form>
            <?php } ?>
        </div>
    </section>
<?php }else{?>
    <h1>Please login to be able create topic</h1>
<?php } ?>
