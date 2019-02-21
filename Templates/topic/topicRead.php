<?php ?>

<!DOCTYPE HTML>
<html>
<head>
    <title>Topic read</title>
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
        <h2><?php echo $topic['name']; ?></h2>
    </div>
    <div class="columns">
        <p><?php echo $topic['body']; ?></p>
        <p>Author : <a href="../../Controllers/user/userRead.php?userId=<?php echo $user['user_id']; ?>"><?php echo $user['name']; ?></a></p>
        <p><a href="../../Controllers/topic/topicUpdate.php?topicId=<?php echo $topic['topic_id']; ?>">Update</a>  or
        <a href="../../Templates/topic/topicDelete.php?topicId=<?php echo $topic['topic_id']; ?>">Delete topic?</a></p>
        <p>Comment section: </p>
        <?php if(isset($_SESSION['user'])){ ?>
            <form action="../../Controllers/comment/commentCreate.php" method="post">
            Enter your comment : <br>
            <input type="text" name="body"> <br>
            <input type="hidden" name="link" value="<?php echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']; ?>">
            <input type="hidden" name="topic" value="<?php echo $topic['topic_id']; ?>">
            <input type="submit">
             </form>
        <?php } ?>
        <br>
        <?php foreach($comments as $comment){ ?>
            <p><?php echo $comment['body']; ?></p>
        <?php } ?>
    </div>
    </div>
</section>
<footer>
    <div class="copyright"><small>Made by Loctarogar.</small></div>
</footer>
</body>
</html>
