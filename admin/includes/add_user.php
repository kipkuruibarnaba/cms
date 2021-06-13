<?php
if(isset($_POST['create_user'])) {
    $firstName = $_POST['first_name'];
    $lastName = $_POST['last_name'];
    $userName = $_POST['user_name'];
    $userEmail = $_POST['user_email'];
    $password = $_POST['user_password'];
    $userRole = $_POST['user_role'];

//    move_uploaded_file($post_image_temp, "../images/$post_image");
    $query= "INSERT INTO users (username,user_password,user_firstname,user_lastname,email,user_role) ";
    $query .=
        "VALUES('{$userName}', '{$password}', '{$firstName}','{$lastName}','{$userEmail}','{$userRole}') ";
    $createUserQuery = mysqli_query($connection, $query);
    confirmQuery($createUserQuery);

}
?>

<form method="post" action="" enctype="multipart/form-data">
    <div class="form-group">
        <label for="Post Title">First Name</label>
        <input type="text" class="form-control" name="first_name"  placeholder="Enter First Name">
    </div>

    <div class="form-group">
        <label for="Post Title">Last Name</label>
        <input type="text" class="form-control" name="last_name"  placeholder="Enter Last Name">
    </div>
    <div class="form-group">
        <label for="User Role">User Role</label>
        <select class="form-control" name="user_role" id="user_role">
            <option value="subscriber">Select Option</option>
            <option value="admin"> Admin</option>
            <option value="subscriber"> Subscriber</option>
        </select>
    </div>
    <div class="form-group">
        <label for="Post Title">User Name</label>
        <input type="text" class="form-control" name="user_name"  placeholder="Enter User Name">
    </div>
    <div class="form-group">
        <label for="Post Title">Email</label>
        <input type="email" class="form-control" name="user_email"  placeholder="Enter Email ">
    </div>
    <div class="form-group">
        <label for="Post Title">Password</label>
        <input type="password" class="form-control" name="user_password"  placeholder="Enter Password ">
    </div>
    <div class="form-group">
        <button class="btn btn-primary btn-sm " type="submit" name="create_user"  value="create_user">Add User</button>
    </div>
</form>