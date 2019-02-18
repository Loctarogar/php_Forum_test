<?php ?>

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
