
<?php

function confirmQuery($result) {
    global $connection;
    if (!$result) {
        die('QUERY FAILED .' . mysqli_error($connection));
    }
}

function insert_categories () {
    global $connection;

    if (isset($_POST['submit'])) {
        $catTitle = $_POST['cat_title'];
        if ($catTitle == "" || empty($catTitle)) {
            echo 'This field should not be empty';
        } else {
            $query = "INSERT INTO categories(cat_title) ";
            $query .= "VALUES ('{$catTitle}') ";
            $createCategoryQuery = mysqli_query($connection, $query);
            if (!$createCategoryQuery) {
                die('QUERY FAILED' . mysqli_error($connection));
            }
        }
    }
}

function findAllCategories() {
    global $connection;

    $query = "SELECT * FROM categories";
    $selected_data= mysqli_query($connection, $query);
    while($row = mysqli_fetch_assoc($selected_data)) {
        $categoryTitle = $row['cat_title'];
        $categoryId = $row['cat_id'];
        echo "  <tr>";
        echo "  <td>{$categoryId}</td>";
        echo "  <td>{$categoryTitle}</td>";
        echo "  <td> <a class='btn btn-danger btn-sm' href='categories.php?delete={$categoryId}'> Delete</a></td>";
        echo "  <td> <a class='btn btn-warning btn-sm' href='categories.php?edit={$categoryId}'> Edit</a></td>";
        echo "  </tr>";
    }

}

function findAllComments() {
    global $connection;

    $query = "SELECT * FROM comments";
    $selectedComments= mysqli_query($connection, $query);
    while($row = mysqli_fetch_assoc($selectedComments)) {
        $commentID = $row['comment_id'];
        $commentAuthor = $row['comment_author'];
        $commentContent = $row['comment_content'];
        $commentEmail = $row['comment_email'];
        $commentStatus = $row['comment_status'];
        $commentPostID = $row['comment_post_id'];
        $commentDate = $row['comment_date'];
        echo "  <tr>";
        echo "  <td>{$commentID}</td>";
        echo "  <td>{$commentAuthor}</td>";
        echo "  <td>{$commentContent}</td>";
        echo "  <td>{$commentEmail}</td>";
        echo "  <td>{$commentStatus}</td>";

        $queryposts = "SELECT * FROM posts WHERE post_id = $commentPostID ";
        $selectedPosts= mysqli_query($connection, $queryposts);
        while($row = mysqli_fetch_assoc($selectedPosts)) {
            $postID = $row['post_id'];
            $postTitle = $row['post_title'];
        }
        echo "  <td><a  href='../post.php?p_id=$postID'> $postTitle</a></td>";
        echo "  <td>{$commentDate}</td>";
        echo "  <td><a class='btn btn-info btn-sm' href='comments.php?approve={$commentID}'> Approve</a></td>";
        echo "  <td><a class='btn btn-info btn-sm' href='comments.php?unapprove={$commentID}'> Unapprove</a></td>";
        echo "  <td><a class='btn btn-danger btn-sm' href='comments.php?delete={$commentID}'> Delete</a></td>";
        echo "  </tr>";
    }

}

function viewAllComments() {
    global $connection;

    $query = "SELECT * FROM comments";
    $selectedComments= mysqli_query($connection, $query);
    while($row = mysqli_fetch_assoc($selectedComments)) {
        $commentID = $row['comment_id'];
        $commentPostID = $row['comment_post_id'];
        $commentAuthor = $row['comment_author'];
        $commentEmail = $row['comment_email'];
        $commentContent = $row['comment_content'];
        $commentStatus = $row['comment_status'];
        $commentDate = $row['comment_date'];
        echo "  <tr>";
        echo "  <td>{$commentID}</td>";
        echo "  <td>{$commentPostID}</td>";
        echo "  <td>{$commentAuthor}</td>";
        echo "  <td>{$commentEmail}</td>";
        echo "  <td>{$commentContent}</td>";
        echo "  <td>{$commentStatus}</td>";
        echo "  <td>{$commentDate}</td>";
        echo "  <td> 
                <a class='btn btn-danger btn-sm' href='categories.php?delete={$commentID}'> Delete</a>
                <a class='btn btn-warning btn-sm' href='categories.php?edit={$commentID}'> Edit</a></td>
                </td>";
        echo "  </tr>";
    }

}

function deleteCategories () {
    global $connection;
    if(isset($_GET['delete'])) {
        $deleteCatID = $_GET['delete'];
        $query = "DELETE FROM categories WHERE cat_id = {$deleteCatID}";
        $deleteQuery = mysqli_query($connection,$query);
        header("Location: categories.php");
    }

}

function deleteComments () {
    global $connection;
    if(isset($_GET['delete'])) {
        $deleteCommentID = $_GET['delete'];
        $query = "DELETE FROM comments WHERE comment_id = {$deleteCommentID}";
        $deleteQuery = mysqli_query($connection,$query);
        header("Location: comments.php");
    }

}

function unapproveComments () {
    global $connection;
    if(isset($_GET['unapprove'])) {
        $commentID= $_GET['unapprove'];
        $query = "UPDATE comments SET comment_status = 'unapproved' WHERE comment_id = $commentID ";
        $unapproveComments= mysqli_query($connection, $query);
        header("Location: comments.php");
    }

}

function approveComments () {
    global $connection;
    if(isset($_GET['approve'])) {
        $commentID= $_GET['approve'];
        $query = "UPDATE comments SET comment_status = 'approved' WHERE comment_id = $commentID";
        $approveComments= mysqli_query($connection, $query);
        header("Location: comments.php");
    }

}

?>