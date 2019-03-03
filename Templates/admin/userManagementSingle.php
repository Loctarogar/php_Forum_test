<?php if(false === $userPermission){ ?>
    <p><?php echo $message; ?></p>
<?php }else{ ?>

<!-- admin/layouts/header -->
<?php include_once '../../Templates/admin/layouts/header.php'; ?>
<!-- admin/layouts/header -->

<body>
<div id="wrapper">

    <!-- NAV TOP -->
    <?php include_once '../../Templates/admin/layouts/navTop.php'; ?>
    <!-- /. NAV TOP  -->

    <!-- NAV SIDE -->
    <?php include_once '../../Templates/admin/layouts/navSide.php'; ?>
    <!-- /. NAV SIDE  -->

    <div id="page-wrapper" >
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h2>User <?php echo $userSingle['name'];?></h2>

                </div>
            </div>
            <!-- /. ROW  -->
            <hr />
            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            User table
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>UserId</th>
                                        <th>User Name</th>
                                        <th>User Role</th>
                                        <th>User Permissions</th>
                                        <th>Last Access</th>
                                        <th>Deleted At</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="odd gradeX">
                                            <td><?php echo $userSingle['user_id']; ?></td>
                                            <td><?php echo $userSingle['name']; ?></td>
                                            <td><?php echo $userRole['role_name']; ?></td>
                                            <td><?php foreach ($userSinglePermissions as $perm){ echo $perm['perm_name']." , "; }; ?></td>
                                            <td><?php echo $userSingle['last_access']; ?></td>
                                            <td><?php echo $userSingle['deleted_at']; ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Topics
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" >
                                    <thead>
                                    <tr>
                                        <th>Topic Id</th>
                                        <th>Topic Name</th>
                                        <th>Body</th>
                                        <th>Deleted At</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($topics as $topic) ?>
                                    <tr class="odd gradeX">
                                        <td><?php echo $topic['topic_id']; ?></td>
                                        <td><?php echo $topic['name']; ?></td>
                                        <td><?php echo $topic['body']; ?></td>
                                        <td><?php echo $topic['deleted_at']; ?></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <?php if(!empty($comments)){ ?>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Comments
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>Comment Id</th>
                                        <th>Comment Body</th>
                                        <th>Deleted At</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($comments as $comment) ?>
                                    <tr class="odd gradeX">
                                        <td><?php echo $comment['comment_id']; ?></td>
                                        <td><?php echo $comment['body']; ?></td>
                                        <td><?php echo $comment['deleted_at']; ?></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                    <?php } ?>
                    <!--End Advanced Tables -->

                    <!-- Radiobutton -->
                    <div class="form-group">
                        <label>Here you can change user's role</label>

                        <form action="../../Controllers/admin/userManagementSingle.php">
                            <?php foreach ($roles as $role){ ?>
                                <input type="radio" name="role" value="<?php echo $role['role_id']; ?>"
                                    <?php if($userSingleRole == $role['role_id']){ echo "checked"; }; ?> />
                                <?php echo $role['role_name']; ?><br>
                            <?php } ?>
                            <input type="hidden" name="userId" value="<?php echo $userSingleId ?>">
                            <input type="submit" value="Submit">
                        </form>
                    </div>
                    <!-- End Radiobutton -->
                </div>
            </div>
        </div>
    </div>
    <!-- /. PAGE INNER  -->
</div>
<!-- /. PAGE WRAPPER  -->
<!-- /. WRAPPER  -->
<!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
<?php include_once '../../Templates/admin/layouts/footer.php'; ?>
<!-- JQUERY SCRIPTS -->
<?php } ?>