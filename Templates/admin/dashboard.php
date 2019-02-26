<?php session_start(); ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<?php if(false == $userPermission){ ?>
    <p>The page doesn't exists</p>
<?php }else{ ?>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin: Dashboard</title>
    <!-- BOOTSTRAP STYLES-->
    <link href="../../public/assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="../../public/assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLES-->
    <link href="../../public/assets/css/custom.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
<div id="wrapper">
    <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="../../Controllers/user/userRead.php?userId=<?php echo $_SESSION['userId']; ?>"><?php echo $_SESSION['user']; ?></a>
        </div>
        <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;"> Last access : <?php echo $user['last_access']; ?> &nbsp; <a href="../../Controllers/user/userLogout.php" class="btn btn-danger square-btn-adjust">Logout</a> </div>
    </nav>
    <!-- /. NAV TOP  -->
    <nav class="navbar-default navbar-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav" id="main-menu">
                <li class="text-center">
                    <img src="../../public/assets/img/find_user.png" class="user-image img-responsive"/>
                </li>


                <li>
                    <a class="active-menu" href="../../Controllers/admin/dashboard.php"><i class="fa fa-dashboard fa-3x"></i> Dashboard</a>
                </li>
                <li>
                    <a href="../../Controllers/admin/userManagement.php"><i class="fa fa-desktop fa-3x"></i>User, Topic, Comment<span class="fa arrow"></span></a>
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
                <li>
                    <a  href="tab-panel.html"><i class="fa fa-qrcode fa-3x"></i> Tabs & Panels</a>
                </li>
                <li  >
                    <a  href="chart.html"><i class="fa fa-bar-chart-o fa-3x"></i> Morris Charts</a>
                </li>
                <li  >
                    <a  href="table.html"><i class="fa fa-table fa-3x"></i> Table Examples</a>
                </li>
                <li  >
                    <a  href="form.html"><i class="fa fa-edit fa-3x"></i> Forms </a>
                </li>


                <li>
                    <a href="#"><i class="fa fa-sitemap fa-3x"></i> Multi-Level Dropdown<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="#">Second Level Link</a>
                        </li>
                        <li>
                            <a href="#">Second Level Link</a>
                        </li>
                        <li>
                            <a href="#">Second Level Link<span class="fa arrow"></span></a>
                            <ul class="nav nav-third-level">
                                <li>
                                    <a href="#">Third Level Link</a>
                                </li>
                                <li>
                                    <a href="#">Third Level Link</a>
                                </li>
                                <li>
                                    <a href="#">Third Level Link</a>
                                </li>

                            </ul>

                        </li>
                    </ul>
                </li>
                <li  >
                    <a   href="blank.html"><i class="fa fa-square-o fa-3x"></i> Blank Page</a>
                </li>
            </ul>

        </div>

    </nav>
    <!-- /. NAV SIDE  -->
    <div id="page-wrapper" >
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h2>Your Page</h2>
                    <h5>Welcome <?php echo $_SESSION['user']; ?> , Love to see you back. </h5>

                </div>
            </div>
            <!-- /. ROW  -->
            <hr />
            <div class="panel-heading">
                Your topics
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>N#</th>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Body</th>
                            <th>deleted_at</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $i = 1; foreach ($topics as $topic){ ?>
                            <tr class="odd gradeX">
                                <td><?php echo $i; $i ++; ?></td>
                                <td><?php echo $topic['topic_id']; ?></td>
                                <td><?php echo $topic['name'] ?></td>
                                <td class="center"><?php echo substr($topic['body'], 0, 200); ?></td>
                                <td><?php echo $topic['deleted_at']; ?></td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="panel-heading">
                Your comments
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>N#</th>
                            <th>Comment Id</th>
                            <th>Topic Id</th>
                            <th>Body</th>
                            <th>deleted_at</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $i = 1; foreach ($comments as $comment){ ?>
                            <tr class="odd gradeX">
                                <td><?php echo $i; $i ++; ?></td>
                                <td><?php echo $comment['comment_id']; ?></td>
                                <td><?php echo $comment['topic_id']; ?></td>
                                <td class="center"><?php echo substr($comment['body'], 0, 200); ?></td>
                                <td><?php echo $comment['deleted_at']; ?></td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- /. PAGE INNER  -->
    </div>
    <!-- /. PAGE WRAPPER  -->

</div>
<!-- /. WRAPPER  -->
<!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
<!-- JQUERY SCRIPTS -->
<script src="../../public/assets/js/jquery-1.10.2.js"></script>
<!-- BOOTSTRAP SCRIPTS -->
<script src="../../public/assets/js/bootstrap.min.js"></script>
<!-- METISMENU SCRIPTS -->
<script src="../../public/assets/js/jquery.metisMenu.js"></script>
<!-- CUSTOM SCRIPTS -->
<script src="../../public/assets/js/custom.js"></script>


</body>
</html>

<?php } ?>