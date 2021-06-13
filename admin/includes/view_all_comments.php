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
                            <th scope="col">ID</th>
                            <th scope="col">Post ID</th>
                            <th scope="col"> Author</th>
                            <th scope="col">Comment</th>
                            <th scope="col"> Email</th>
                            <th scope="col"> Status</th>
                            <th scope="col">In Response to</th>
                            <th scope="col"> Date</th>
                            <th scope="col">Approve</th>
                            <th scope="col">unapprove</th>
                            <th scope="col">Delete</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php
                        $query = "SELECT * FROM comments";
                        $selectedComments= mysqli_query($connection, $query);
                        while($row = mysqli_fetch_assoc($selectedComments)) {
                            $commentID = $row['comment_id'];
                            $commentID = $row['comment_post_id'];
                            $commentAuthor = $row['comment_author'];
                            $commentContent = $row['comment_content'];
                            $commentEmail = $row['comment_email'];
                            $commentStatus = $row['comment_status'];
                            $commentDate = $row['comment_date'];
                            echo "  <tr>";
                            echo "  <td>{$commentID}</td>";
                            echo "  <td>{$commentAuthor}</td>";
                            echo "  <td>{$commentContent}</td>";
                            echo "  <td>{$commentEmail}</td>";
                            echo "  <td>{$commentStatus}</td>";

                            while($row = mysqli_fetch_assoc($selectedPosts)) {
                                $postID = $row['post_id'];
                                $postTitle = $row['post_title'];
                            }
                            echo "  <td><a  href='../post.php?p_id=$postID'> $postTitle</a></td>";
                            echo "  <td>{$commentDate}</td>";
                            echo "  <td><a class='btn btn-info btn-sm' href='categories.php?delete={$commentID}'> Approve</a></td>";
                            echo "  <td><a class='btn btn-info btn-sm' href='categories.php?delete={$commentID}'> Unapprove</a></td>";
                            echo "  <td><a class='btn btn-warning btn-sm' href='categories.php?delete={$commentID}'> Edit</a></td>";
                            echo "  <td><a class='btn btn-danger btn-sm' href='categories.php?delete={$commentID}'> Delete</a></td>";
                            echo "  </tr>";
                        }

                        ?>
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

