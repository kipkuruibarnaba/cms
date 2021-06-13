
<?php

if(isset($_GET['p_id'])){
    $postID=  $_GET['p_id'];
}
$query = "SELECT * FROM posts WHERE post_id = {$postID} ";
$selectedPost= mysqli_query($connection, $query);
while($row = mysqli_fetch_assoc($selectedPost)) {
    $postID = $row['post_id'];
    $postAuthor = $row['post_author'];
    $postTitle = $row['post_title'];
    $postIDcategory = $row['post_category_id'];
    $postStatus = $row['post_status'];
    $postImage = $row['post_image'];
    $postTags = $row['post_tags'];
    $postComment = $row['post_comment_count'];
    $postDate = $row['post_date'];
    $post_Content = $row['post_content'];
}

if(isset($_POST['update_post'])){
    $postAuthor = $_POST['post_author'];
    $postTitle = $_POST['post_title'];
    $postIDcategory = $_POST['post_category_id'];
    $postStatus = $_POST['post_status'];
    $post_image = $_FILES['post_image']['name'];
    $post_image_temp = $_FILES['post_image']['tmp_name'];
    $postTags = $_POST['post_tags'];
    $post_Content = $_POST['post_content'];

    move_uploaded_file($post_image_temp, "../images/$post_image");
    if(empty($post_image)) {
        $query = "SELECT * FROM posts WHERE post_id = {$postID} ";
        $select_image = mysqli_query($connection,$query);
        while($row = mysqli_fetch_assoc($select_image)) {
            $post_image = $row['post_image'];
        }
    }

    $query = "UPDATE posts SET ";
      $query .="post_category_id = '{$postIDcategory}', ";
      $query .="post_category_id = '{$postIDcategory}', ";
      $query .="post_title = '{$postTitle}', ";
      $query .="post_author = '{$postAuthor}', ";
      $query .="post_date = now(), ";
      $query .="post_image = '{$post_image}', ";
      $query .="post_Content = '{$post_Content}', ";
      $query .="post_status = '{$postStatus}' ";
      $query .="WHERE post_id = {$postID} ";

$updatePost=mysqli_query($connection,$query);
    confirmQuery($updatePost);

}

?>

<form method="post" action="" enctype="multipart/form-data">
    <div class="form-group">
        <label for="Post Title">Post Title</label>
        <input type="text" class="form-control" name="post_title" value="<?php echo $postTitle ?>">
    </div>

    <div class="form-group">
        <label for="Post Category Title">Post Category ID</label>
        <select class="form-control" name="post_category_id" id="post_category_id">
            <?php
            $query = "SELECT * FROM categories ";
//            $query = "SELECT * FROM categories WHERE cat_id = $postIDcategory ";
            $selectedCategories = mysqli_query($connection,$query);
            confirmQuery($selectedCategories);
            while($row = mysqli_fetch_assoc($selectedCategories)) {
                $categoryId = $row['cat_id'];
                $categoryTitle = $row['cat_title'];
                echo " <option value='{$categoryId}'>{$categoryTitle}</option>";
            }

            ?>
        </select>
    </div>

    <div class="form-group">
        <label for="Post Author">Post Author</label>
        <input type="text" class="form-control" name="post_author" value="<?php echo $postAuthor ?>"  >
    </div>
    <div class="form-group">
        <label for="Post Status">Post Status</label>
        <input type="text" class="form-control" name="post_status"  value="<?php echo $postStatus ?>">
    </div>
    <div class="form-group">
        <img  width="100" src="../images/<?php echo $postImage ?>">
        <input type="file" name="post_image">
    </div>
    <div class="form-group">
        <label for="Post Tags">Post Tags</label>
        <input type="text" class="form-control" name="post_tags" value="<?php echo $postTags ?>">
    </div>
    <div class="form-group">
        <label for="Post Content">Post Content</label>
        <textarea class="form-control" name="post_content" rows="2">
             <?php echo $post_Content ?>
        </textarea>
    </div>
    <div class="form-group">
        <button class="btn btn-primary btn-sm " type="submit" name="update_post"  value="publish_post">Update Post</button>
    </div>
</form>