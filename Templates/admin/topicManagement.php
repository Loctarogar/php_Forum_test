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
                    <h2>Topics</h2>

                </div>
            </div>
            <!-- /. ROW  -->
            <hr />

            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Topic table
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                    <tr>
                                        <th>N#</th>
                                        <th>Topic Id</th>
                                        <th>User Id</th>
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
                                            <td><?php echo $topic['user_id']; ?></td>
                                            <td><?php echo $topic['name'] ?></td>
                                            <td class="center"><?php echo substr($topic['body'], 0, 200); ?></td>
                                            <td><?php echo $topic['deleted_at']; ?></td>
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