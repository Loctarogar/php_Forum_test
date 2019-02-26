<!DOCTYPE HTML>
<html>
<head>
    <title><?php echo $pageTitle; ?></title>
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
                        <li><a href="../../Controllers/user/userRead.php?userId=<?php echo $_SESSION['userId']; ?>"><?php echo $_SESSION['user']; ?>'s Personal cabinet</a></li>
                        <li><a href="../../Controllers/user/userLogout.php" class="active">Logout</a></li>
                    <?php }else{ ?>
                        <li><a href="../../Controllers/user/userLogin.php" class="active">Login</a></li>
                        <li><a href="../../Controllers/user/userCreate.php" class="active">Crate new user</a></li>
                    <?php } ?>
                </ul>
            </li>
        </ul>
    </nav>
</header>
