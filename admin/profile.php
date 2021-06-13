<?php include "includes/admin_header.php"?>


<?php if(isset($_SESSION['username'])) {
    $username= $_SESSION['username'];
    $query = "SELECT * FROM users WHERE username= '{$username}' ";
    $selected_user=mysqli_query($connection, $query);
    while ($row=mysqli_fetch_assoc($selected_user)){
        $userID = $row['user_id'];
        $userName = $row['username'];
        $userFirstname = $row['user_firstname'];
        $userLastName = $row['user_lastname'];
        $userEmail = $row['email'];
        $userImage = $row['user_image'];
        $userRole = $row['user_role'];
    }

    if(isset($_POST['update_profile'])){
        echo $_POST['user_name'];
        $userFirstname = $_POST['first_name'];
        $userLastName = $_POST['last_name'];
        $userEmail = $_POST['user_email'];
        $userRole = $_POST['user_role'];

//    move_uploaded_file($post_image_temp, "../images/$post_image");
//    if(empty($post_image)) {
//        $query = "SELECT * FROM posts WHERE post_id = {$userID} ";
//        $select_image = mysqli_query($connection,$query);
//        while($row = mysqli_fetch_assoc($select_image)) {
//            $post_image = $row['post_image'];
//        }
//    }

        $query = "UPDATE users SET  ";
        $query .="username = '{$userName}', ";
        $query .="user_firstname = '{$userFirstname}', ";
        $query .="user_lastname = '{$userLastName}', ";
        $query .="email = '{$userEmail}', ";
        $query .="user_role = '{$userRole}' ";
        $query .="WHERE username = '{$username}' ";

        $updateUser=mysqli_query($connection,$query);
        confirmQuery($updateUser);

    }

}
?>

<div id="wrapper">

    <!-- Navigation -->
    <?php include "includes/admin_navigation.php"?>

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Welcome
                        <?php echo $userFirstname; ?>
                        Update Profile
                    </h1>
                    <form method="post" action="" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="Post Title">First Name</label>
                            <input type="text" class="form-control" name="first_name"  value="<?php echo $userFirstname; ?>">
                        </div>

                        <div class="form-group">
                            <label for="Post Title">Last Name</label>
                            <input type="text" class="form-control" name="last_name"   value="<?php echo $userLastName; ?>">
                        </div>
                        <div class="form-group">
                            <label for="Post Category Title">User Role</label>
                            <select class="form-control" name="user_role" id="user_role">
                                <option value="subscriber"><?php echo $userRole; ?></option>
                                <?php
                                if($userRole == 'admin'){
                                    echo "<option value='subscriber'>Subscriber</option>";
                                }else {
                                    echo "<option value='admin'>Admin</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="Post Title">User Name</label>
                            <input type="text" class="form-control" name="user_name" value="<?php echo $userName; ?>">
                        </div>
                        <div class="form-group">
                            <label for="Post Title">Email</label>
                            <input type="email" class="form-control" name="user_email"  value="<?php echo $userEmail; ?>">
                        </div>
                        <div class="form-group">
                            <label for="Post Title">Password</label>
                            <input type="password" class="form-control" name="user_password"  value="<?php echo $userLastName; ?>">
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary btn-sm " type="submit" name="update_profile"  value="update_profile">Update Prpofile</button>
                        </div>
                    </form>

                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->
    <?php include "includes/admin_footer.php" ?>

