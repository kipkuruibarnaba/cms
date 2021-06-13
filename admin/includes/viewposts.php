<table class="table table-dark table-bordered table-hover">
    <thead>
    <tr>
        <th scope="col">ID</th>
        <th scope="col">Author</th>
        <th scope="col">Title</th>
        <th scope="col">Category</th>
        <th scope="col">Status</th>
        <th scope="col">Image</th>
        <th scope="col">Tags</th>
        <th scope="col">Comments</th>
        <th scope="col">Date</th>
        <th scope="col">Action</th>
        <th scope="col">Action</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $query = "SELECT * FROM posts";
    $allPosts= mysqli_query($connection, $query);
    while($row = mysqli_fetch_assoc($allPosts)) {
        $postID = $row['post_id'];
        $postAuthor = $row['post_author'];
        $postTitle = $row['post_title'];
        $postIDcategory = $row['post_category_id'];
        $postStatus = $row['post_status'];
        $postImage = $row['post_image'];
        $postTags = $row['post_tags'];
        $postComment = $row['post_comment_count'];
        $postDate = $row['post_date'];

        echo "  <tr>";
        echo "  <td>{$postID}</td>";
        echo "  <td>{$postAuthor}</td>";
        echo "  <td>{$postTitle}</td>";

        $query = "SELECT * FROM categories WHERE cat_id = $postIDcategory ";
        $selectCategoryID = mysqli_query($connection,$query);
        while($row = mysqli_fetch_assoc($selectCategoryID)) {
            $categoryId = $row['cat_id'];
            $categoryTitle = $row['cat_title'];
        }
        echo "  <td>{$categoryTitle}</td>";
        echo "  <td>{$postStatus}</td>";
        echo "  <td> <img width='100' src='../images/$postImage' alt='image'></td>";
        echo "  <td>{$postTags}</td>";
        echo "  <td>{$postComment}</td>";
        echo "  <td>{$postDate}</td>";
        echo "  <td> <a class='btn-warning btn-sm' href='posts.php?source=edit_post&p_id={$postID}'>Edit</a> </td>";
        echo "  <td> <a class='btn-danger btn-sm' href='posts.php?delete={$postID}'>Delete</a> </td>";
        echo "  </tr>";


    }


    if(isset($_GET['delete'])){
        $postID = $_GET['delete'];
        $query = "DELETE FROM posts WHERE post_id = $postID  ";
        $deleteQuery = mysqli_query($connection,$query);
        header("Location: posts.php");
    }
    ?>

    </tbody>
</table>

