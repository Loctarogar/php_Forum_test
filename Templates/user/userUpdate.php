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
