<nav class="navbar-default navbar-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="main-menu">
            <li class="text-center">
                <img src="../../public/assets/img/find_user.png" class="user-image img-responsive"/>
            </li>


            <li>
                <a <?php if($activeMenu === "dashboard"){ echo 'class="active-menu"'; } ?>  href="../../Controllers/admin/dashboard.php"><i class="fa fa-dashboard fa-3x"></i> Dashboard</a>
            </li>
            <li>
                <a <?php if($activeMenu === "management"){ echo 'class="active-menu"'; } ?> href="../../Controllers/admin/userManagement.php"><i class="fa fa-desktop fa-3x"></i>User, Topic, Comment<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="../../Controllers/admin/userManagement.php">User management</a>
                    </li>
                    <li>
                        <a href="../../Controllers/admin/topicManagement.php">Topic management</a>
                    </li>
                    <li>
                        <a href="../../Controllers/admin/commentManagement.php">Comment management</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>