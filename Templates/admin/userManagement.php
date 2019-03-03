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
    <!-- NAV TOP  -->

    <!-- NAV SIDE -->
    <?php include_once '../../Templates/admin/layouts/navSide.php'; ?>
    <!-- /. NAV SIDE  -->

    <div id="page-wrapper" >
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h2>Users</h2>

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
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                    <tr>
                                        <th>N#</th>
                                        <th>User Id</th>
                                        <th>User Name</th>
                                        <th>User Role</th>
                                        <th>User Permissions</th>
                                        <th>Last Access</th>
                                        <th>Deleted At</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $i = 1; foreach ($users as $userItem){ ?>
                                        <tr class="odd gradeX">
                                            <td><?php echo $i; $i ++; ?></td>
                                            <td><a href="../../Controllers/admin/userManagementSingle.php?userId=<?php echo $userItem['user_id']?>"><?php echo $userItem['user_id']; ?></a></td>
                                            <td><a href="../../Controllers/admin/userManagementSingle.php?userId=<?php echo $userItem['user_id']?>"><?php echo $userItem['name'] ?></a></td>
                                            <td><?php echo $userItem['role']; ?></td>
                                            <td><?php foreach ($userItem['permissions'] as $perm){ echo $perm['perm_name']." , "; } ; ?></td>
                                            <td class="center"><?php echo $userItem['last_access']; ?></td>
                                            <td><?php echo $userItem['deleted_at']; ?></td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
            </div>
            <!-- /. ROW  -->
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

