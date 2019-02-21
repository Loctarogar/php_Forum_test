<?php
?>

<?php ?>
<!DOCTYPE HTML>
<html>
<head>
    <title>User Delete</title>
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
    <h1>User Delete</h1>
</section>
<section id="main-content">
    <div class="text-intro">
        <h2>Do you want to delete user ?</h2>
    </div>
    <?php if(isset($_GET['userId'])){ ?>
        <div class="columns">
            <div class="img-first"><a href="../../Controllers/user/userDelete.php?userId=<?php echo $_GET['userId']; ?>">Yes i want to delete user</a></div>
            <div class="img-second"><a href="../../Controllers/topic/topicShowAll.php">No, go back to the main page</a></div>
        </div>
    <?php }else{ ?>
        <div><?php echo $message;?></div>
    <?php } ?>

</section>
<footer>
    <div class="copyright"><small>Made by Loctarogar.</small></div>
</footer>
</body>
</html>