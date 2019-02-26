<section id="home-head" class="work">
    <h1>We built identity for local and international clients.</h1>
</section>
<section id="main-content">
    <div class="text-intro">
        <?php if(false !== $user){ ?>
            <h2><?php echo $user['name']; ?></h2>
        <?php }else{ ?>
            <h2>There is no such user</h2>
        <?php } ?>
    </div>
    <div class="columns">
        <a href="../../Controllers/topic/topicCreate.php"><h1 align="center">Create new topic</h1></a>
        <?php if(!empty($topics)){ ?>
            <h1>Your topics</h1>
            <?php foreach($topics as $topic){ ?>
                <p><a href="../../Controllers/topic/topicRead.php?topicId=<?php echo $topic['topic_id']; ?>"><?php echo $topic['name']; ?></a></p>
                <p><?php echo substr($topic['body'], 0, 250); ?></p>
            <?php } ?>
        <?php }else{ ?>
            <p>There is no topics for this user</p>
        <?php } ?>
        <br>
        <a href="../../Controllers/user/userDelete.php?userId=<?php echo $_SESSION['userId']; ?>"><p>Do you want delete account?</p></a>
    </div>
</section>
