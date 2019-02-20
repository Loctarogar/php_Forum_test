<?php

/**
<html>
<head>
    <title>Create User</title>
</head>
<body>
<h2>
    Create User
</h2>
<form action="../../Controllers/user/userCreate.php" method="post">
    Enter name <br>
    <input type="text" name="name"><br>
    Enter Password <br>
    <input type="text" name="password"><br>
    <input type="submit">
</form>
</body>
</html>

*/
?>

<!DOCTYPE HTML>
<html>
<head>
    <title>User Create</title>
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
    <h1>User creating</h1>
</section>
<section id="main-content">
    <div class="text-intro">
        <h2><?php echo $message; ?></h2>
    </div>
    <div class="columns features">
        <form action="../../Controllers/user/userCreate.php" method="post" id="contact-form">
            Enter name <br>
            <input type="text" name="name"><br>
            Enter Password <br>
            <input type="text" name="password"><br><br><br>
            <input class="btn btn-input" id="sendMessage" type="submit">
        </form>
    </div>
</section>
<footer>
    <div class="copyright"><small>Made by Loctarogar.</small></div>
</footer>
</body>
</html>
