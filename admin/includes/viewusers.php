<table class="table table-dark table-bordered table-hover">
    <thead>
    <tr>
        <th scope="col">ID</th>
        <th scope="col">UserName</th>
        <th scope="col">First Name</th>
        <th scope="col">Last Name</th>
        <th scope="col">Email</th>
        <th scope="col">Image</th>
        <th scope="col">Role</th>
        <th scope="col">Subscriber</th>
        <th scope="col">Admin</th>
        <th scope="col">Edit</th>
        <th scope="col">Delete</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $query = "SELECT * FROM users";
    $allUsers= mysqli_query($connection, $query);
    while($row = mysqli_fetch_assoc($allUsers)) {
        $userID = $row['user_id'];
        $userName = $row['username'];
        $userFirstname = $row['user_firstname'];
        $userLastName = $row['user_lastname'];
        $userEmail = $row['email'];
        $userImage = $row['user_image'];
        $userRole = $row['user_role'];

        echo "  <tr>";
        echo "  <td>{$userID}</td>";
        echo "  <td>{$userName}</td>";
        echo "  <td>{$userFirstname}</td>";

//        $query = "SELECT * FROM categories WHERE cat_id = $postIDcategory ";
//        $selectCategoryID = mysqli_query($connection,$query);
//        while($row = mysqli_fetch_assoc($selectCategoryID)) {
//            $categoryId = $row['cat_id'];
//            $categoryTitle = $row['cat_title'];
//        }
        echo "  <td>{$userLastName}</td>";
        echo "  <td>{$userEmail}</td>";
//        echo "  <td> <img width='100' src='../images/$postImage' alt='image'></td>";
        echo "  <td>{$userImage}</td>";
        echo "  <td>{$userRole}</td>";
//        echo "  <td>{$postDate}</td>";
        echo "  <td><a class='btn btn-info btn-sm' href='users.php?make_subscriber={$userID}'> Make Subscriber</a></td>";
        echo "  <td><a class='btn btn-info btn-sm' href='users.php?make_admin={$userID}'> Make Admin</a></td>";
        echo "  <td> <a class='btn-warning btn-sm' href='users.php?source=edit_user&edit_user={$userID}'>Edit</a> </td>";
        echo "  <td> <a class='btn-danger btn-sm' href='users.php?delete={$userID}'>Delete</a> </td>";
        echo "  </tr>";


    }


    if(isset($_GET['delete'])){
        $userID = $_GET['delete'];
        $query = "DELETE FROM users WHERE user_id = $userID  ";
        $deleteUser = mysqli_query($connection,$query);
        header("Location: users.php");
    }

    if(isset($_GET['make_subscriber'])) {
        $userID= $_GET['make_subscriber'];
        $query = "UPDATE users SET user_role = 'subscriber' WHERE user_id = $userID ";
        $subcriber= mysqli_query($connection, $query);
        header("Location: users.php");
    }

    if(isset($_GET['make_admin'])) {
        $userID= $_GET['make_admin'];
        $query = "UPDATE users SET user_role = 'admin' WHERE user_id = $userID ";
        $admin= mysqli_query($connection, $query);
        header("Location: users.php");
    }

    ?>

    </tbody>
</table>

