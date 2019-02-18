<!DOCTYPE HTML>
<html>
<head>
    <title>Create topic</title>
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
                        <li><a href="#">Personal cabinet</a></li>
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
        <h2>Enter login and password</h2>
    </div>
    <div class="columns features">

        <form method="post" action="../../Controllers/topic/topicCreate.php" id="contact-form">
            Enter topic's name: <br>
            <input type="text" name="name"><br>
            Enter topic's body: <br>
            <input type="text" name="body"><br>
            <br>
            <br>
            <input class="btn btn-input" id="sendMessage" name="sendMessage" type="submit" value="IM DONE">
        </form>

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
