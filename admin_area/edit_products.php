<?php 
if(isset($_GET['edit_products'])){
    $edit_id =$_GET['edit_products'];
    $get_data = "SELECT * FROM products WHERE product_id=$edit_id";
    $result = mysqli_query($con, $get_data);
    $row = mysqli_fetch_assoc($result);
    $product_title=$row['product_title'];
    $product_desc=$row['product_description'];
    $product_keywords=$row['product_keywords'];
    $category_id=$row['category_id'];
    $brand_id=$row['brand_id'];
    $product_image1=$row['product_image1'];
    $product_image2=$row['product_image2'];
    $product_image3=$row['product_image3'];
    $product_price=$row['product_price'];
    $product_status=$row['status'];


 // fetching category name
$get_category = "SELECT * FROM categories WHERE category_id=$category_id";
$result_category = mysqli_query($con, $get_category);
if(mysqli_num_rows($result_category) > 0) {
    $row_category = mysqli_fetch_assoc($result_category);
    $category_title = $row_category['category_title'];
} else {
    // handle the case when no category is found
    $category_title = "Unknown Category";
}

// fetching brand name
$get_brand = "SELECT * FROM brands WHERE brand_id=$brand_id";
$result_brand = mysqli_query($con, $get_brand);
if(mysqli_num_rows($result_brand) > 0) {
    $row_brand = mysqli_fetch_assoc($result_brand);
    $brand_title = $row_brand['brand_title'];
} else {
    // handle the case when no brand is found
    $brand_title = "Unknown Brand";
}
}
?>

<div class="container mt-5">
    <h1 class="text-center">Edit Products</h1>
    <form action="" method="post" enctype="multipart/form-data">
            <div class="form-outline w-50 m-auto mb-4">
                <label for="product_title" class="form-label">Product Title</label>
                <input type="text" id="product_title" value="<?php echo $product_title?>" name="product_title" class="form-control" required="required">
            </div>
            <div class="form-outline w-50 m-auto mb-4">
                <label for="product_desc" class="form-label">Product Description</label>
                <input type="text" id="product_desc" value="<?php echo $product_desc?>"  name="product_desc" class="form-control" required="required">
            </div>
            <div class="form-outline w-50 m-auto mb-4">
                <label for="product_keywords" class="form-label">Product Keywords</label>
                <input type="text" id="product_keywords" value="<?php echo $product_keywords?>"  name="product_keywords" class="form-control" required="required">
            </div>
            <div class="form-outline w-50 m-auto mb-4">
            <label for="product_category" class="form-label">Product Categories</label>
                <select name="product_category"  class="form-select">
                    <!-- <option value="<?php echo $category_title?>"><?php echo $category_title?></option> -->
                     <?php 
                         $get_category_all = "SELECT * FROM categories";
                         $result_category_all = mysqli_query($con, $get_category_all);
                         while( $row_category_all = mysqli_fetch_assoc($result_category_all)){
                             $category_title = $row_category_all['category_title'];
                             $category_id = $row_category_all['category_id'];
                             echo "<option value='$category_title'>$category_title</option>";
                         }
                    ?>
                </select>
            </div>
            <div class="form-outline w-50 m-auto mb-4">
            <label for="product_brands" class="form-label">Product Brands</label>
                <select name="product_brands" class="form-select">   
                    <!-- <option value="<?php echo $brand_title?>"><?php echo $brand_title?></option> -->
                <?php 
                         $get_brands_all = "SELECT * FROM brands";
                         $result_brands_all = mysqli_query($con, $get_brands_all);
                         while( $row_brands_all = mysqli_fetch_assoc($result_brands_all)){
                             $brand_title = $row_brands_all['brand_title'];
                                $brand_id = $row_brands_all['brand_id'];
                             echo "<option value='$brand_title'>$brand_title</option>";
                         }
                    ?>
                </select>
            </div>
            <div class="form-outline w-50 m-auto mb-4">
                <label for="product_image1" class="form-label">Product Image1</label>
                <div class="d-flex">
                <input type="file" id="product_image1" name="product_image1" class="form-control">
                <img src="./product_images/<?php echo $product_image1?>" alt="" width="50" height="50">
                </div>
            </div>
            <div class="form-outline w-50 m-auto mb-4">
                <label for="product_image2" class="form-label">Product Image2</label>
                <div class="d-flex">
                <input type="file" id="product_image2" name="product_image2" class="form-control">
                <img src="./product_images/<?php echo $product_image2?>" alt="" width="50" height="50">
                </div>
            </div>
            <div class="form-outline w-50 m-auto mb-4">
                <label for="product_image3" class="form-label">Product Image3</label>
                <div class="d-flex">
                <input type="file" id="product_image3" name="product_image3" class="form-control">
                <img src="./product_images/<?php echo $product_image3?>" alt="" width="50" height="50">
                </div>
            </div>
            <div class="form-outline w-50 m-auto mb-4">
                <label for="product_price" class="form-label">Product Price</label>
                <input type="text" id="product_price"  value="<?php echo $product_price?>" name="product_price" class="form-control" required="required">
            </div>
            <div class="w-50 m-auto">
                <input type="submit" name="edit_product" value="Update Product" class="btn btn-info px-3 mb-3">
            </div>
    </form>
</div>

<!-- editing products -->
<?php
if(isset($_POST['edit_product'])){
    //update product data
    $product_title = $_POST['product_title'];
    $product_desc = $_POST['product_desc'];
    $product_keywords = $_POST['product_keywords'];
    $product_category = $_POST['product_category'];
    $product_category = (int)$product_category;
    $product_brands = $_POST['product_brands'];
    $product_brands = (int)$product_brands;
    $product_price = $_POST['product_price'];

    // getting image names
    $product_image1 = $_FILES['product_image1']['name'];
    $product_image2 = $_FILES['product_image2']['name'];
    $product_image3 = $_FILES['product_image3']['name'];

    // getting image temp names
    $temp_name1 = $_FILES['product_image1']['tmp_name'];
    $temp_name2 = $_FILES['product_image2']['tmp_name'];
    $temp_name3 = $_FILES['product_image3']['tmp_name'];

    if($product_title=='' or $product_desc=='' or $product_keywords=='' or $product_category=='' or $product_brands=='' or $product_price=='' or $product_image1=='' or $product_image2=='' or $product_image3==''){
        echo "<script>alert('Please fill all the fields')</script>";
    }else{
         // uploading images to its folder
        move_uploaded_file($temp_name1, "./product_images/$product_image1");
        move_uploaded_file($temp_name2, "./product_images/$product_image2");
        move_uploaded_file($temp_name3, "./product_images/$product_image3");

        $update_product = "UPDATE products SET product_title='$product_title', product_description='$product_desc', product_keywords='$product_keywords', category_id='$product_category', brand_id='$product_brands', product_price='$product_price', product_image1='$product_image1', product_image2='$product_image2', product_image3='$product_image3', date=NOW() WHERE product_id='$edit_id'";
         $result_update_product = mysqli_query($con, $update_product);
     if($result_update_product){
        echo "<script>alert('Product Updated Successfully')</script>";
        echo "<script>window.open('index.php', '_self')</script>";
    }
    }
}
?>