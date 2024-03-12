<?php

if(isset($_GET['edit_brands'])){
    $edit_id =$_GET['edit_brands'];
    $get_data = "SELECT * FROM brands WHERE brand_id=$edit_id";
    $result = mysqli_query($con, $get_data);
    $row = mysqli_fetch_assoc($result);
    $brand_id=$row['brand_id'];
    $brand_title=$row['brand_title'];
}

//fetching category title
$get_brand = "SELECT * FROM brands WHERE brand_id=$brand_id";
$result_brand = mysqli_query($con, $get_brand);
if(mysqli_num_rows($result_brand) > 0) {
    $row_brand = mysqli_fetch_assoc($result_brand);
    $brand_title = $row_brand['brand_title'];
} else {
    // handle the case when no category is found
    $brand_title = "Unknown Category";
}
?>

<div class="container-mt-5">
    <h1 class="text-center">Edit Brands</h1>
    <form action="" method="post">
        <div class="form-outline w-50 m-auto mb-4">
                <label for="brand_title" class="form-label">Brand Title</label>
                <input type="text" id="brand_title" value="<?php echo $brand_title?>" name="brand_title" class="form-control" required="required">
            </div>
            <div class="w-50 m-auto">
                <input type="submit" name="edit_brands" value="Update Brand" class="btn btn-info px-3 mb-3">
            </div>
    </form>
</div>

<!-- editing category -->
<?php
    if(isset($_POST['edit_brands'])){
        $brand_title = $_POST['brand_title'];
        $update_brand = "UPDATE brands SET brand_title='$brand_title' WHERE brand_id=$brand_id";
        $result = mysqli_query($con, $update_brand);
        if($result){
            echo "<script>alert('Brand has been updated successfully')</script>";
            echo "<script>window.open('index.php?view_brands','_self')</script>";
        } else {
            echo "<script>alert('Brand updation failed')</script>";
            echo "<script>window.open('index.php?view_brands','_self')</script>";
        }
    }
?>