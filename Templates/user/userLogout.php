<?php
/**
<html>
<head>
    <title>User Logout</title>
</head>
<body>
<h2><?php echo $_SESSION['user']; ?></h2><br>
<h2>Do you want to logout ?</h2><br>
<a href="../../Controllers/user/userLogout.php?logout=yes" >Logout</a>
</body>
</html>
*/

?>

<!DOCTYPE HTML>
<html>
<head>
    <title>Logout</title>
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
                        <li><a href="../../Controllers/user/userLogout.php" class="active">Logout</a></li>
                    <?php }else{ ?>
                        <li><a href="../../Controllers/user/userLogin.php">Login</a></li>
                    <?php } ?>
                </ul>
            </li>
        </ul>
    </nav>
</header>
<section id="home-head" class="contact">
    <h1>Do you want to log out?</h1>
</section>
<section id="main-content">

    <div class="columns features">
        <br>
        <br>
        <br>
        <br>
        <br>
        <form action="../../Controllers/user/userLogout.php?logout=yes" method="post" id="contact-form">
            <input class="btn btn-input" id="sendMessage" name="logout" type="submit" value="Log out">
        </form>

    </div>

</section>
<footer>
    <div class="copyright"><small>Copyright. All Rights Reserved | by <a target="_blank" rel="nofollow" href="http://www.iamsupview.be">Supview</a>.</small></div>
</footer>
</body>
</html>
