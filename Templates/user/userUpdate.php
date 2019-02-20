<?php

/**
<html>
<head>
    <title>User Update</title>
</head>
<body>
<form name="userUpdate" method="post" action="../../Controllers/user/userUpdate.php">
    Enter new User's name: <br>
    <input type="text" name="name"><br>
    Enter new User's password: <br>
    <input type="text" name="password"><br>
    Repeat password: <br>
    <input type="text" name="passwordRepeat"><br>
    <input type="submit">
</form>
</body>
</html>

*/
?>

<!DOCTYPE HTML>
<html>
<head>
    <title>Update user</title>
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
    <h1>User update</h1>
</section>
<?php if(isset($_SESSION['user'])){ ?>
    <section id="main-content">
        <div class="text-intro">
            <?php if(isset($message)){ ?>
                <h2><?php echo $message; ?></h2>
            <?php }else{ ?>
                <h2>You can update user now</h2>
            <?php } ?>
        </div>
        <div class="columns features">
            <?php if(isset($message)){ ?>
                <p><?php echo $message; ?></p>
            <?php }else{ ?>
                <h3>Update user</h3>
                <form name="userUpdate" method="post" action="../../Controllers/user/userUpdate.php">
                    Enter new User's name: <br>
                    <input type="text" name="name"><br>
                    Enter new User's password: <br>
                    <input type="text" name="password"><br>
                    Repeat password: <br>
                    <input type="text" name="passwordRepeat"><br>
                    <input type="hidden" name="userId" value="<?php echo $_GET['userId']; ?>"><br>
                    <input type="submit">
                </form>
            <?php } ?>
        </div>
    </section>
<?php }else{?>
    <h1>Please login to be able delete user</h1>
<?php } ?>
<footer>
    <div class="copyright"><small>Made by Loctarogar.</small></div>
</footer>
</body>
</html>

