<div class="col-md-4">


    <!-- Blog Search Well -->
    <div class="well">
        <h4>Blog Search</h4>
        <form action="search.php" method="post">
            <div class="input-group">
                <input type="text" name="search" class="form-control">
                <span class="input-group-btn">
                            <button name="submit" class="btn btn-default" type="submit">
                                <span class="glyphicon glyphicon-search"></span>
                            </button>
                                </span>
            </div>
        </form>
        <!-- /.input-group -->
    </div>

    <div class="well">
        <h4>Login</h4>
        <form action="includes/login.php" method="post">
            <div class="form-group">
                <input type="username" name="username" class="form-control" placeholder="Enter username">
                <span class="input-group-btn">
                </span>
            </div>
            <div class="input-group">
                <input type="password" name="password" class="form-control" placeholder="Enter password">
                <span class="input-group-btn">
                    <button type="submit" class="btn btn-primary" name="login">Submit</button>
                </span>
            </div>
        </form>
        <!-- /.input-group -->
    </div>



    <!-- Blog Categories Well -->
    <div class="well">
        <?php

        $query = "SELECT * FROM categories";
        $selected_data= mysqli_query($connection, $query);

        ?>
        <h4>Blog Categories</h4>
        <div class="row">
            <div class="col-lg-12">
                <ul class="list-unstyled">

                    <?php

                    while($row = mysqli_fetch_assoc($selected_data)) {
                        $catid = $row['cat_id'];
                        $category_title = $row['cat_title'];
                        echo "<li> <a href='category.php?category=$catid'> {$category_title} </a></li>";
                    }

                    ?>
                </ul>
            </div>
            <!-- /.col-lg-6 -->
        </div>
        <!-- /.row -->
    </div>

    <!-- Side Widget Well -->
<?php include "widget.php"?>

</div>