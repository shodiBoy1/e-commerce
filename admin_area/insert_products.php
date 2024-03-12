<?php
include '../includes/connect.php';

if(isset($_POST['insert_product'])){
    // getting text data from the fields
    $product_title = $_POST['product_title'];
    $product_description = $_POST['product_description'];
    $product_price = $_POST['product_price'];
    $product_keywords = $_POST['product_keywords'];
    $product_category = $_POST['product_categories'];
    $product_brand = $_POST['product_brands'];
    $product_status = true;

    // accessing the image from the fields
    $product_image1 = $_FILES['product_image1']['name'];
    $product_image2 = $_FILES['product_image2']['name'];
    $product_image3 = $_FILES['product_image3']['name'];
    
    // accessing the temporary name of the image
    $product_image1_tmp = $_FILES['product_image1']['tmp_name'];
    $product_image2_tmp = $_FILES['product_image2']['tmp_name'];
    $product_image3_tmp = $_FILES['product_image3']['tmp_name'];

    // checking condition for empty fields
    if($product_title=='' OR $product_description=='' OR $product_price=='' OR $product_keywords=='' OR $product_category=='' OR $product_brand=='' OR $product_image1=='' OR $product_image2=='' OR $product_image3==''){
        echo "<script>alert('Please fill all the fields!')</script>";
        exit();
    }
    else{
        // inserting images into the folder
        move_uploaded_file($product_image1_tmp, "product_images/$product_image1");
        move_uploaded_file($product_image2_tmp, "product_images/$product_image2");
        move_uploaded_file($product_image3_tmp, "product_images/$product_image3");

        // inserting data into the database
        $insert_product = "INSERT INTO products (product_title, product_description, product_price, product_image1, product_image2, product_image3, product_keywords, category_id, brand_id, date, status) VALUES ('$product_title', '$product_description', '$product_price', '$product_image1', '$product_image2', '$product_image3', '$product_keywords', '$product_category', '$product_brand', NOW(), '$product_status')";

        $insert_pro = mysqli_query($con, $insert_product);

        if($insert_pro){
            echo "<script>alert('Product has been inserted!')</script>";
        }
    }
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Products - Admin Dashboard</title>


 <!-- Bootstrap CSS link -->
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


<!-- font awesome link -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<!-- css link -->
<link rel="stylesheet" href="../style.css">

</head>
<body class="bg-light">
    <div class="container mt-3">
        <h1 class="text-center">Insert Products</h1>
       <!-- form  -->
       <form action="" method="post" enctype="multipart/form-data">
        <!-- title -->
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="product_title" class="form-label">Product title</label>
            <input type="text" name="product_title" id="product_title" class="form-control" placeholder="Enter product title" autocomplete="off" required>
        </div>
        <!-- description -->
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="product_description" class="form-label">Product description</label>
            <input type="text" name="product_description" id="product_description" class="form-control" placeholder="Enter product decription" autocomplete="off" required>
        </div>

         <!-- keywords -->
         <div class="form-outline mb-4 w-50 m-auto">
            <label for="product_keywords" class="form-label">Product keywords</label>
            <input type="text" name="product_keywords" id="product_keywords" class="form-control" placeholder="Enter product keywords" autocomplete="off" required>
        </div>


        <!-- categories -->
        <div class="form-outline mb-4 w-50 m-auto">
           <select name="product_categories" id="" class="form-select">
            <option value="">Select a category</option>
            <?php
                $get_categories = "SELECT * FROM categories";
                $result_query = mysqli_query($con, $get_categories);
                while($row_categories = mysqli_fetch_assoc($result_query)){
                    $category_id = $row_categories['category_id'];
                    $category_title = $row_categories['category_title'];
                    echo "<option value='$category_id'>$category_title</option>";
                }
                ?>
           </select>
        </div>
                 <!-- Brands -->
        <div class="form-outline mb-4 w-50 m-auto">
           <select name="product_brands" id="" class="form-select" >
            <option value="">Select a brand</option>
            <?php
                $get_brands = "SELECT * FROM brands";
                $result_query = mysqli_query($con, $get_brands);
                while($row_brands = mysqli_fetch_assoc($result_query)){
                    $brand_id = $row_brands['brand_id'];
                    $brand_title = $row_brands['brand_title'];
                    echo "<option value='$brand_id'>$brand_title</option>";
                }
                ?>
           </select>
        </div>
                <!-- Image 1 -->
                <div class="form-outline mb-4 w-50 m-auto">
            <label for="product_image1" class="form-label">Product Image 1</label>
            <input type="file" name="product_image1" id="product_image1" class="form-control" required>
        </div>
         <!-- Image 2 -->
         <div class="form-outline mb-4 w-50 m-auto">
            <label for="product_image2" class="form-label">Product Image 2</label>
            <input type="file" name="product_image2" id="product_image2" class="form-control" required>
        </div>
         <!-- Image 3 -->
         <div class="form-outline mb-4 w-50 m-auto">
            <label for="product_image3" class="form-label">Product Image 3</label>
            <input type="file" name="product_image3" id="product_image3" class="form-control" required>
        </div>
         <!-- price -->
         <div class="form-outline mb-4 w-50 m-auto">
            <label for="product_price" class="form-label">Product Price</label>
            <input type="text" name="product_price" id="product_price" class="form-control" placeholder="Enter product price" autocomplete="off" required>
        </div>

         <!-- button -->
         <div class="form-outline mb-4 w-50 m-auto">
            <input type="submit" name="insert_product" class="btn bg-info mb-3 px-3" value="Insert Product" >
        </div>
       </form>
    </div>




</body>
</html>