<?php

if(isset($_GET['edit_categories'])){
    $edit_id =$_GET['edit_categories'];
    $get_data = "SELECT * FROM categories WHERE category_id=$edit_id";
    $result = mysqli_query($con, $get_data);
    $row = mysqli_fetch_assoc($result);
    $category_id=$row['category_id'];
    $category_title=$row['category_title'];
}

//fetching category title
$get_category = "SELECT * FROM categories WHERE category_id=$category_id";
$result_category = mysqli_query($con, $get_category);
if(mysqli_num_rows($result_category) > 0) {
    $row_category = mysqli_fetch_assoc($result_category);
    $category_title = $row_category['category_title'];
} else {
    // handle the case when no category is found
    $category_title = "Unknown Category";
}
?>

<div class="container-mt-5">
    <h1 class="text-center">Edit Categories</h1>
    <form action="" method="post">
        <div class="form-outline w-50 m-auto mb-4">
                <label for="category_title" class="form-label">Category Title</label>
                <input type="text" id="category_title" value="<?php echo $category_title?>" name="category_title" class="form-control" required="required">
            </div>
            <div class="w-50 m-auto">
                <input type="submit" name="edit_categories" value="Update Category" class="btn btn-info px-3 mb-3">
            </div>
    </form>
</div>

<!-- editing category -->
<?php
    if(isset($_POST['edit_categories'])){
        $category_title = $_POST['category_title'];
        $update_category = "UPDATE categories SET category_title='$category_title' WHERE category_id=$category_id";
        $result = mysqli_query($con, $update_category);
        if($result){
            echo "<script>alert('Category has been updated successfully')</script>";
            echo "<script>window.open('index.php?view_categories','_self')</script>";
        } else {
            echo "<script>alert('Category updation failed')</script>";
            echo "<script>window.open('index.php?view_categories','_self')</script>";
        }
    }
?>