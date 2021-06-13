<?php include "db.php";
session_start();
if(isset($_POST['login'])){
    $username=$_POST['username'];
    $password=$_POST['password'];
}

$username= mysqli_real_escape_string($connection, $username);
$password= mysqli_real_escape_string($connection, $password);

$query = "SELECT * FROM users WHERE username = '{$username}' ";
//$query .= "SELECT * FROM users WHERE user_password = '{$password}' ";

$selectUserQuery= mysqli_query($connection, $query);
if(!$selectUserQuery){
    die("QUERY ERROR".mysqli_error($connection));
}

while($row = mysqli_fetch_assoc($selectUserQuery)) {
    $dbUser_id = $row['user_id'];
    $db_username = $row['username'];
    $db_firstname = $row['user_firstname'];
    $db_lastname = $row['user_lastname'];
    $db_user_role = $row['user_role'];
    $db_email = $row['email'];
    $db_userpassword = $row['user_password'];
}

if($username === $db_username && $password === $db_userpassword){
    $_SESSION['username']= $db_username;
    $_SESSION['firstname']= $db_firstname;
    $_SESSION['lastname']= $db_lastname;
    $_SESSION['user_role']= $db_user_role;
    $_SESSION['email']= $db_email;
    header("Location: ../admin");
} else{
    header("Location: ../index.php");
}


?>