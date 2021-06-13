<?php
if(isset($_POST['create_post'])) {
    $post_category_id = $_POST['post_category_id'];
    $post_title = $_POST['post_title'];
    $post_author = $_POST['post_author'];
    $post_date = date('d-m-y');
    $post_image = $_FILES['post_image']['name'];
    $post_image_temp = $_FILES['post_image']['tmp_name'];
    $post_Content = $_POST['post_Content'];
    $post_tags = $_POST['post_tags'];
//    $post_Count_Comment = 4;
    $post_status = $_POST['post_status'];
    move_uploaded_file($post_image_temp, "../images/$post_image");
    $query= "INSERT INTO posts ( post_category_id,post_title,post_author,post_date,post_image,post_content,
                post_tags,post_status) ";
    $query .=
        "VALUES({$post_category_id}, '{$post_title}','{$post_author}',  now(), '{$post_image}', 
          '{$post_Content}', '{$post_tags}','{$post_status}' ) ";
    $createPostQuery = mysqli_query($connection, $query);
    confirmQuery($createPostQuery);
}
?>

<form method="post" action="" enctype="multipart/form-data">
    <div class="form-group">
        <label for="Post Title">Post Title</label>
        <input type="text" class="form-control" name="post_title"  placeholder="Enter Post Title">
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
        <input type="text" class="form-control" name="post_author"  placeholder="Enter Post Author">
    </div>
    <div class="form-group">
        <label for="Post Status">Post Status</label>
        <input type="text" class="form-control" name="post_status"  placeholder="Enter Post Status">
    </div>
    <div class="form-group">
        <label for="exampleFormControlFile1">Post Image</label>
        <input type="file" class="form-control-file" name="post_image">
    </div>
    <div class="form-group">
        <label for="Post Tags">Post Tags</label>
        <input type="text" class="form-control" name="post_tags"  placeholder="Enter Post Tags">
    </div>
    <div class="form-group">
        <label for="Post Content">Post Content</label>
        <textarea class="form-control" name="post_Content"  placeholder="Enter Post Content" rows="2"></textarea>
    </div>
    <div class="form-group">
        <button class="btn btn-primary btn-sm " type="submit" name="create_post"  value="publish_post">Publish Post</button>
    </div>
</form>