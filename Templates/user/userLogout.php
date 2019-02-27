<section id="home-head" class="contact">
    <h1>Do you want to log out?</h1>
</section>
<section id="main-content">
    <div class="columns features">
        <?php if(isset($_SESSION['user'])){ ?>
            <br>
            <br>
            <br>
            <br>
            <br>
            <form action="../../Controllers/user/userLogout.php?logout=yes" method="post" id="contact-form">
                <input class="btn btn-input" id="sendMessage" name="logout" type="submit" value="Log out">
            </form>
        <?php }else{ ?>
            <h2>You successfully logged out</h2>
        <?php } ?>
    </div>
</section>
