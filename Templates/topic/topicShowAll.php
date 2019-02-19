<?php
?>

<!DOCTYPE HTML>
<html>
<head>
    <title>Main page</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../../public/css/style.css">
</head>
<body>
<header>
    <nav class="main-nav">
        <ul>
            <li>
                <ul>
                    <li><a href="../../Controllers/topic/topicShowAll.php" class="active">Main page</a></li>
                    <li><a href="">works</a></li>
                    <?php if(isset($_SESSION['user'])){ ?>
                        <li><a href="#">Personal cabinet</a></li>
                        <li><a href="../../Controllers/user/userLogout.php">Logout</a></li>
                    <?php }else{ ?>
                        <li><a href="../../Controllers/user/userLogin.php">Login</a></li>
                    <?php } ?>
                </ul>
            </li>
        </ul>
    </nav>
</header>
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
<footer>
    <div class="copyright"><small>Made by Loctarogar.</small></div>
</footer>
</body>
</html>
