

<form method="post" action="">
    <div class="form-group">
        <label for="Category Title">Edit Category</label>

        <?php
        //////EDIT QUERY
        if(isset($_GET['edit'])) {
            $editCatID = $_GET['edit'];
            $query = "SELECT * FROM categories WHERE cat_id = {$editCatID} ";
            $editQuery = mysqli_query($connection,$query);
            while($row = mysqli_fetch_assoc($editQuery)) {
                $categoryIdEdit = $row['cat_id'];
                $categoryTitleEdit = $row['cat_title'];
                ?>
                <input type="text" class="form-control" value="<?php if (isset($categoryTitleEdit)){ echo $categoryTitleEdit ;} ?>" name="cat_title" >

            <?php } } ?>


        <?php
        //////UPDATE QUERY
        if(isset($_POST['update_category'])) {
            $updateCategoryTitle = $_POST['cat_title'];
            $query = "UPDATE categories SET cat_title = '{$updateCategoryTitle}' WHERE cat_id = {$categoryIdEdit} ";
            $updateQuery = mysqli_query($connection,$query);
            if(!$updateQuery) {
                die("QUERY FAILED" .mysqli_error($connection));
            }
        }
        ?>



    </div>
    <div class="form-group">
        <input class="btn btn-success btn-sm" type="submit" name="update_category" value="Update Category">
    </div>
</form>