<section id="video" class="home">
    <h1>Enjoy our forum <?php echo $_SESSION['user']; ?></h1>
</section>
<section id="main-content">
    <div class="text-intro">
        <h2>All Topics</h2>
    </div>
    <?php foreach ($topics as $value){ ?>
    <div class="columns features">
        <?php foreach($value as $topic){ ?>
            <div class="one-third">
                <h3><?php echo $topic['name']; ?></h3>
                <p><?php echo substr($topic['body'], 0, 200); ?></p>
                <p><a  href="../../Controllers/topic/topicRead.php?topicId=<?php echo $topic['topic_id'] ?>" class="more">Watch all topic</a></p>
            </div>
        <?php } ?>
    </div>
    <?php } ?>
</section>
