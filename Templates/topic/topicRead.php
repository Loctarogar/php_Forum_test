<?php ?>

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
                <li><a href="#">Personal cabinet</a></li>
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
        <h2><?php echo $topic['name']; ?></h2>
    </div>
    <div class="columns">
        <p><?php echo $topic['body']; ?></p>
        <p><?php echo $user['name']; ?></p>
    </div>
    </div>
</section>
<footer>
    <div class="copyright"><small>Made by Loctarogar.</small></div>
</footer>
</body>
</html>
