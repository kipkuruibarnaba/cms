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
                        <small>Author</small>
                    </h1>
                    <div class="container col-xs-6">
                     <?php insert_categories(); ?>
                        <form method="post" action="">
                            <div class="form-group">
                                <label for="Category Title">Category Title</label>
                                <input type="text" class="form-control" name="cat_title" id="cat_title" placeholder="Enter Category Title">
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary btn-sm" type="submit" name="submit">Add Category</button>
                            </div>
                        </form>

                        <?php
                        if (isset($_GET['edit'])){
                            $categoryId = $_GET['edit'];
                            include "includes/updatecategories.php";
                        }
                        ?>


                    </div>
                    <div class="container col-xs-6">
                        <table class="table table-dark table-bordered table-hover">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Category Title</th>
                                <th scope="col">Action</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php findAllCategories(); ?>

                            <?php deleteCategories(); ?>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->
    <?php include "includes/admin_footer.php" ?>

