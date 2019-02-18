<?php
session_start();

if(isset($_GET['logout'])){
    echo "You successfully logged out";
    echo "<br>";
    unset($_SESSION['user']);
    include_once 'userLogin.php';
}

if(isset($_SESSION['user'])){
    include_once '../../Templates/user/userLogout.php';
}
