<?php include "includes/admin_header.php"?>

<div id="wrapper">

    <!-- Navigation -->
    <?php include "includes/admin_navigation.php"?>

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Welcome to Admin
                        <small>Comments</small>
                    </h1>
                    <table class="table table-dark table-bordered table-hover">
                        <thead>
                        <tr>
                            <th scope="col"> ID</th>
                            <th scope="col"> Author</th>
                            <th scope="col"> Comment</th>
                            <th scope="col"> Email</th>
                            <th scope="col"> Status</th>
                            <th scope="col"> In Response To</th>
                            <th scope="col"> Date</th>
                            <th scope="col">Approve</th>
                            <th scope="col">Unapprove</th>
                            <th scope="col">Delete</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php findAllComments(); ?>
                        <?php deleteComments(); ?>
                        <?php approveComments(); ?>
                        <?php unapproveComments(); ?>

                        </tbody>
                    </table>


                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->
    <?php include "includes/admin_footer.php" ?>

