<section id="home-head" class="contact">
    <h1>Crate new user</h1>
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