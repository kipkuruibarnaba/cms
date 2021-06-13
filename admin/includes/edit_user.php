
<?php

if(isset($_GET['edit_user'])){
     $userID=  $_GET['edit_user'];
}
$query = "SELECT * FROM users WHERE user_id = {$userID} ";
$selectedUser= mysqli_query($connection, $query);
while($row = mysqli_fetch_assoc($selectedUser)) {
    $userID = $row['user_id'];
    $userName = $row['username'];
    $userFirstname = $row['user_firstname'];
    $userLastName = $row['user_lastname'];
    $userEmail = $row['email'];
    $userImage = $row['user_image'];
    $userRole = $row['user_role'];
}

if(isset($_POST['update_user'])){
    $userName = $_POST['user_name'];
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
      $query .="WHERE user_id = $userID ";

$updateUser=mysqli_query($connection,$query);
    confirmQuery($updateUser);

}

?>

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
        <button class="btn btn-primary btn-sm " type="submit" name="update_user"  value="update_user">Update User</button>
    </div>
</form>
