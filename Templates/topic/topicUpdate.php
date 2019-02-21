<?php ?>

<!DOCTYPE HTML>
<html>
<head>
    <title>Update topic</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../../public/css/style.css">
</head>
<body>
<header>
    <nav class="main-nav">
        <ul>
            <li>
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
            </li>
        </ul>
    </nav>
</header>
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
<footer>
    <div class="copyright"><small>Made by Loctarogar.</small></div>
</footer>
</body>
</html>
