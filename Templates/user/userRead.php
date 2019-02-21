<?php
?>


<!DOCTYPE HTML>
<html>
<head>
    <title>White Edition | Projects</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../../public/css/style.css">
</head>
<body>
<header>
    <nav class="main-nav">
        <ul>
            <li><a href="../../Controllers/topic/topicShowAll.php">Main page</a></li>
            <li><a href="">works</a></li>
            <?php if(isset($_SESSION['user'])){ ?>
                <li><a href="#"><?php echo $_SESSION['user']; ?>'s Personal cabinet</a></li>
                <li><a href="../../Controllers/user/userLogout.php">Logout</a></li>
            <?php }else{ ?>
                <li><a href="../../Controllers/user/userLogin.php" class="active">Login</a></li>
            <?php } ?>
        </ul>
    </nav>
</header>
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
        <?php if(!empty($topics)){ ?>
            <?php foreach($topics as $topic){ ?>
                <p><a href="../../Controllers/topic/topicRead.php?topicId=<?php echo $topic['topic_id']; ?>"><?php echo $topic['name']; ?></a></p>
                <p><?php echo substr($topic['body'], 0, 250); ?></p>
            <?php } ?>
        <?php }else{ ?>
            <p>There is no topics for this user</p>
        <?php } ?>
    </div>
</section>
<footer>
    <div class="copyright"><small>Made by Loctarogar.</small></div>
</footer>
</body>
</html>

