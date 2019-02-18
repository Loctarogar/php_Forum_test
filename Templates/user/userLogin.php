<?php
/**
<html>
<head>
    <title>User Login</title>
</head>
<body>
<form method="post" action="../../Controllers/user/userLogin.php">
    Enter Username : <br>
    <input type="text" name="name"> <br>
    Enter Password : <br>
    <input type="text" name="password"><br><br>
    <input type="submit">
</form>
</body>
</html>
*/
?>

<!DOCTYPE HTML>
<html>
<head>
    <title>Login page</title>
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
<section id="main-content">
    <div class="text-intro">
        <h2>Enter login and password</h2>
    </div>
    <div class="columns features">
        <form action="../../Controllers/user/userLogin.php" method="post" id="contact-form">
            <input type="text" name="name" placeholder="Enter login"><br>
            <input type="text" name="password" placeholder="Enter password">

            <input class="btn btn-input" id="sendMessage" name="sendMessage" type="submit" value="IM DONE">
        </form>
    </div>
</section>
<footer>
    <div class="copyright"><small>Made by Loctarogar.</small></div>
</footer>
</body>
</html>
