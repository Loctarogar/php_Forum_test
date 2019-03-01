<?php if(false == $userPermission){ ?>
    <p>The page doesn't exists</p>
<?php }else{ ?>

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
<?php include_once '../../Templates/admin/layouts/footer.php'; ?>
<!-- JQUERY SCRIPTS -->

<?php } ?>