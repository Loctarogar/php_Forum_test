<section id="home-head" class="contact">
    <h1>Ready to start? drop us a line!</h1>
</section>
<?php if(isset($_SESSION['user'])){ ?>
<section id="main-content">
    <div class="text-intro">
        <h2>Input topic's name and add something to topic's body</h2>
    </div>
    <div class="columns features">
        <?php if (isset($message)){ ?>
            <h2><?php echo $message; ?></h2>
        <?php }else{ ?>
            <form method="post" action="../../Controllers/topic/topicCreate.php" id="contact-form">
                Enter topic's name: <br>
                <input type="text" name="name" style="width: 300px"><br>
                Enter topic's body: <br>
                <input type="text" name="body" style="height: 200px; width: 300px"><br>
                <br>
                <br>
                <input class="btn btn-input" id="sendMessage" name="sendMessage" type="submit" value="IM DONE">
            </form>
        <?php } ?>
    </div>
</section>
<?php }else{?>
    <h1>Please login to be able create topic</h1>
<?php } ?>