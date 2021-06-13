
<?php include "includes/db.php"?>

<?php include "includes/header.php"; ?>

<!-- Navigation -->
<?php include "includes/navigationbar.php"; ?>

<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">
            <?php

            if (isset($_GET['p_id'])){
                $post_ID= $_GET['p_id'];
            }

            $query = "SELECT * FROM posts WHERE post_id = $post_ID ";
            $selectedPosts= mysqli_query($connection, $query);

            while($row = mysqli_fetch_assoc($selectedPosts)) {
                $post_title = $row['post_title'];
                $post_author = $row['post_author'];
                $post_date = $row['post_date'];
                $post_image = $row['post_image'];
                $post_title = $row['post_title'];
                $post_content = $row['post_content'];

                ?>


                <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>

                <!-- First Blog Post -->
                <h2>
                    <a href="#"> <?php echo  $post_title  ?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php echo  $post_author?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> <?php echo  $post_date  ?></p>
                <hr>
                <img class="img-responsive" src="images/<?php echo $post_image ?>" alt="">
                <hr>
                <p><?php echo  $post_content  ?>.</p>
                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>


            <?php } ?>

            <?php
            if(isset($_POST['create_comment'])){
                $post_ID= $_GET['p_id'];
                $authorName= $_POST['authorName'];
                $authorEmail= $_POST['authorEmail'];
                $commentContent= $_POST['commentContent'];

                $query = "INSERT INTO comments (comment_post_id,comment_author,comment_email,comment_content,comment_status,
                comment_date) ";
                $query .= "VALUES  ($post_ID,'{$authorName}', '{$authorEmail}','{$commentContent}','unapproved',
                now())";
                $createComment = mysqli_query($connection, $query);
                if (!$createComment){
                    die('QERY FAILED' .mysqli_error($connection));
                }
            }
            ?>

            <?php
            $query = "UPDATE posts SET post_comment_count = post_comment_count + 1 ";
            $query .= "WHERE post_id = $post_ID ";
            $updateCommentCount= mysqli_query($connection, $query);
            if( !$updateCommentCount) {
                die('Query Failed' .mysqli_error($connection));
            }
            ?>



            <!-- Blog Comments -->

            <!-- Comments Form -->
            <div class="well">
                <h4>Leave a Comment:</h4>
                <form action="" method="post" role="form">
                    <div class="form-group">
                        <label>Author Name</label>
                        <input type="text" class="form-control" name="authorName" placeholder="Enter Author Name">
                    </div>
                    <div class="form-group">
                        <label>Author Email</label>
                        <input type="email" class="form-control" name="authorEmail" placeholder="Enter Email">
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" name="commentContent" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary" name="create_comment">Submit</button>
                </form>
            </div>

            <hr>

            <!-- Posted Comments -->

            <?php
            $query = "SELECT * FROM comments WHERE comment_post_id = $post_ID ";
            $query .= "AND comment_status = 'approved' ";
            $query .= "ORDER BY comment_id DESC ";
            $selectedComment= mysqli_query($connection, $query);
            if( !$selectedComment) {
                die('Query Failed' .mysqli_error($connection));
            }
            while($row = mysqli_fetch_assoc($selectedComment)) {

                $commentID = $row['comment_id'];
                $commentPostID = $row['comment_post_id'];
                $commentAuthor = $row['comment_author'];
                $commentEmail = $row['comment_email'];
                $commentContent = $row['comment_content'];
                $commentStatus = $row['comment_status'];
                $commentDate = $row['comment_date'];
            ?>



            <!-- Comment -->
            <div class="media">
                <a class="pull-left" href="#">
                    <img class="media-object" src="http://placehold.it/64x64" alt="">
                </a>
                <div class="media-body">
                    <h4 class="media-heading"> <?php echo $commentAuthor ?>
                        <small><?php echo  $commentDate ?></small>
                    </h4>
                    <?php echo  $commentContent ?>
                </div>
            </div>

            <?php  } ?>

            <!-- Comment -->


        </div>

        <!-- Blog Sidebar Widgets Column -->
        <?php include "includes/sidebar.php"; ?>

    </div>
    <!-- /.row -->

    <hr>
    <?php
    include "includes/footer.php";

    ?>

