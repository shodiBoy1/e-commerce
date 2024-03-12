<?php
//include 'includes/connect.php';
// getting products
function getproducts(){
   global $con;

   //condition to check if category is selected
   if(!isset($_GET['categories'])){
    if(!isset($_GET['brand'])){
    $select_query = "SELECT * FROM products ORDER BY rand() LIMIT 0,9";  //remove limit and will get all products displyed
    $result_query = mysqli_query($con, $select_query);
    while($row = mysqli_fetch_assoc($result_query)){
   $product_id=$row['product_id'];
    $product_title=$row['product_title'];
    $product_description=$row['product_description'];
    $product_category=$row['category_id'];
    $product_brand=$row['brand_id'];
    $product_image1=$row['product_image1'];
    $product_price=$row['product_price'];
    echo "<div class='col-md-4 mb-2'>
    <div class='card'>
    <img src='admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
    <div class='card-body'>
     <h5 class='card-title'>$product_title</h5>
    <p class='card-text'>$product_description</p>
    <p class='card-text'>Price: $product_price/-</p>
    <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
    <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
    </div>
    </div>
    </div>";
        }
    }
}
}

//getting all products
function getallproducts(){
    global $con;

    //condition to check if category is selected
    if(!isset($_GET['categories'])){
     if(!isset($_GET['brand'])){
     $select_query = "SELECT * FROM products ORDER BY rand()";  //remove limit and will get all products displyed
     $result_query = mysqli_query($con, $select_query);
     while($row = mysqli_fetch_assoc($result_query)){
    $product_id=$row['product_id'];
     $product_title=$row['product_title'];
     $product_description=$row['product_description'];
     $product_category=$row['category_id'];
     $product_brand=$row['brand_id'];
     $product_image1=$row['product_image1'];
     $product_price=$row['product_price'];
     echo "<div class='col-md-4 mb-2'>
     <div class='card'>
     <img src='admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
     <div class='card-body'>
      <h5 class='card-title'>$product_title</h5>
     <p class='card-text'>$product_description</p>
     <p class='card-text'>Price: $product_price/-</p>
     <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
     <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
     </div>
     </div>
     </div>";
         }
     }
 }
}

//getting unique categories 
function get_unique_categories(){
    global $con;
 
    //condition to check if category is selected
    if(isset($_GET['categories'])){
        $category_id = $_GET['categories'];
     $select_query = "SELECT * FROM products WHERE category_id=$category_id";  
     $result_query = mysqli_query($con, $select_query);
     $num_of_rows=mysqli_num_rows($result_query);
        if($num_of_rows==0){
            echo "<h2 class='text-center text-danger'>No products found in this category</h2>";
        }
     while($row = mysqli_fetch_assoc($result_query)){
    $product_id=$row['product_id'];
     $product_title=$row['product_title'];
     $product_description=$row['product_description'];
     $product_category=$row['category_id'];
     $product_brand=$row['brand_id'];
     $product_image1=$row['product_image1'];
     $product_price=$row['product_price'];
     echo "<div class='col-md-4 mb-2'>
     <div class='card'>
     <img src='admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
     <div class='card-body'>
      <h5 class='card-title'>$product_title</h5>
     <p class='card-text'>$product_description</p>
     <p class='card-text'>Price: $product_price/-</p>
     <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
     <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
     </div>
     </div>
     </div>";
         }
     }
 }
 
 //getting unique categories 
function get_unique_brands(){
    global $con;
 
    //condition to check if category is selected
    if(isset($_GET['brand'])){
        $brand_id = $_GET['brand'];
     $select_query = "SELECT * FROM products WHERE brand_id=$brand_id";  
     $result_query = mysqli_query($con, $select_query);
     $num_of_rows=mysqli_num_rows($result_query);
        if($num_of_rows==0){
            echo "<h2 class='text-center text-danger'>No brands found in this category</h2>";
        }
     while($row = mysqli_fetch_assoc($result_query)){
    $product_id=$row['product_id'];
     $product_title=$row['product_title'];
     $product_description=$row['product_description'];
     $product_category=$row['category_id'];
     $product_brand=$row['brand_id'];
     $product_image1=$row['product_image1'];
     $product_price=$row['product_price'];
     echo "<div class='col-md-4 mb-2'>
     <div class='card'>
     <img src='admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
     <div class='card-body'>
      <h5 class='card-title'>$product_title</h5>
     <p class='card-text'>$product_description</p>
     <p class='card-text'>Price: $product_price/-</p>
     <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
     <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
     </div>
     </div>
     </div>";
         }
     }
 }

//displaying brands in sidenav
function getbrands(){
    global $con;
            $select_brands = "SELECT * FROM brands";
            $result_brands = mysqli_query($con, $select_brands);
            while($row_data=mysqli_fetch_assoc($result_brands)){
                $brand_id = $row_data['brand_id'];
                $brand_title = $row_data['brand_title'];
                echo "<li class='nav-item'>
                <a class='nav-link text-light' href='index.php?brand=$brand_id'>$brand_title</a>
            </li>"; 
        }    
}

//displaying categories in sidenav
function getcategories(){
    global $con;
    $select_categories = "SELECT * FROM categories";
            $result_categories = mysqli_query($con, $select_categories);
            while($row_data=mysqli_fetch_assoc($result_categories)){
                $category_id = $row_data['category_id'];
                $category_title = $row_data['category_title'];
                echo "<li class='nav-item'>
                <a class='nav-link text-light' href='index.php?categories=$category_id'>$category_title</a>
            </li>";
        }
}

//searching products function

function search_products(){
    global $con;
    if(isset($_GET['search_data_product'])){
        $search_data = $_GET['search_data'];
        $search_query = "SELECT * FROM products WHERE product_keywords LIKE '%$search_data%'";
        $result_query = mysqli_query($con, $search_query);
        $num_of_rows=mysqli_num_rows($result_query);
        if($num_of_rows==0){
            echo "<h2 class='text-center text-danger'>No products found</h2>";
        }
        while($row = mysqli_fetch_assoc($result_query)){
            $product_id=$row['product_id'];
             $product_title=$row['product_title'];
             $product_description=$row['product_description'];
             $product_category=$row['category_id'];
             $product_brand=$row['brand_id'];
             $product_image1=$row['product_image1'];
             $product_price=$row['product_price'];
             echo "<div class='col-md-4 mb-2'>
             <div class='card'>
             <img src='admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
             <div class='card-body'>
              <h5 class='card-title'>$product_title</h5>
             <p class='card-text'>$product_description</p>
             <p class='card-text'>Price: $product_price/-</p>
             <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
             <a href='#' class='btn btn-secondary'>View more</a>
             </div>
             </div>
             </div>";
                 }
    }
}


// //view details function
// function viewdetails(){
//     global $con;
//     //condition to check if product is selected
//     if(isset($_GET['product_id'])){
//         if(!isset($_GET['category'])){
//             if(!isset($_GET['brand'])){
//         $product_id = $_GET['product_id'];
//         $select_query = "SELECT * FROM products WHERE product_id=$product_id";
//         $result_query = mysqli_query($con, $select_query);
//         while($row = mysqli_fetch_assoc($result_query)){
//             $product_id=$row['product_id'];
//              $product_title=$row['product_title'];
//              $product_description=$row['product_description'];
//              $product_image1=$row['product_image1'];
//              $product_image2=$row['product_image2'];
//              $product_image3=$row['product_image3']; 
//              echo "<div class='col-md-4 mb-2'>
//              <div class='card'>
//              <img src='admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
//              <div class='card-body'>
//               <h5 class='card-title'>$product_title</h5>
//              <p class='card-text'>$product_description</p>
//              <p class='card-text'>Price: $product_price/-</p>
//              <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
//              <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
//              </div>
//              </div>
//              </div>
             
//              <div class='col-md-8'>
//             <div class='row'>
//                 <div class='col-md-12'>
//                    <h4 class='text-center text-info mb-5'>Related Products</h4>
//                 </div>
//                 <div class='col-md-6'>
//                     <img src='admin_area/product_images/$product_image2' alt='$product_title' class='img-img-top'>
//                 </div>
//                 <div class='col-md-6'>
//                     <img src='admin_area/product_images/$product_image3' alt='$product_title' class='img-img-top'>
//                 </div>
//             </div>
//             </div>";
//                  }
//                 }
//             }
                
//     }
// }

   // get ip daress function 
function getIPAddress() {  
    //whether ip is from the share internet  
     if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                $ip = $_SERVER['HTTP_CLIENT_IP'];  
        }  
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
     }  
//whether ip is from the remote address  
    else{  
             $ip = $_SERVER['REMOTE_ADDR'];  
     }  
     return $ip;  
}  
// $ip = getIPAddress();  
// echo 'User Real IP Address - '.$ip;  



//cart fucntion 
function cart()
{
    if (isset($_GET['add_to_cart'])) {
        global $con;
        $get_ip_add = getIPAddress();
        $get_product_id = $_GET['add_to_cart'];

        $select_query = "SELECT * FROM cart_details WHERE ip_adress = '$get_ip_add' AND product_id = '$get_product_id'";
        $result_query = mysqli_query($con, $select_query);
        $num_of_rows = mysqli_num_rows($result_query);

        if ($num_of_rows > 0) {
            echo "<script>alert('Product already added to cart')</script>";
            echo "<script>window.open('index.php','_self')</script>";
        } else {
            $insert_query = "INSERT INTO cart_details (product_id, ip_adress, quantity) VALUES ('$get_product_id', '$get_ip_add', 0)";

            $result_query = mysqli_query($con, $insert_query);

            if ($result_query) {
                echo "<script>alert('Product added to cart')</script>";
                echo "<script>window.open('index.php','_self')</script>";
            } else {
                $error = mysqli_error($con);
                if (strpos($error, 'Duplicate entry') !== false) {
                    echo "<script>alert('Product is already in the cart')</script>";
                    echo "<script>window.open('index.php','_self')</script>";
                } else {
                    echo "<script>alert('Failed to add product to cart')</script>";
                }
            }
        }
    }
}

// function to get cart items
function cart_item(){
    if (isset($_GET['add_to_cart'])) {
        global $con;
        $get_ip_add = getIPAddress();
        $product_id = $_GET['add_to_cart'];
        $select_query = "SELECT * FROM cart_details WHERE ip_adress = '$get_ip_add' AND product_id = '$product_id'";
        $result_query = mysqli_query($con, $select_query);
        $count_cart_items = mysqli_num_rows($result_query);
        if ($count_cart_items > 0) {
            // Product already exists, update the quantity
            $update_query = "UPDATE cart_details SET quantity = quantity + 1 WHERE ip_adress = '$get_ip_add' AND product_id = '$product_id'";
            mysqli_query($con, $update_query);
        } else {
            // Product does not exist, insert a new row with quantity 1
            $insert_query = "INSERT INTO cart_details (ip_adress, product_id, quantity) VALUES ('$get_ip_add', '$product_id', 1)";
            mysqli_query($con, $insert_query);
        }
    }
       
        global $con;
        $get_ip_add = getIPAddress();
        $select_query = "SELECT * FROM cart_details WHERE ip_adress = '$get_ip_add'";
        $result_query = mysqli_query($con, $select_query);
        $count_cart_items = mysqli_num_rows($result_query);
    
    echo $count_cart_items;
}

//total price function 

function total_cart_price(){
    global $con;
    $total_price= 0;
    $get_ip_add = getIPAddress();
    $cart_query = "SELECT * FROM cart_details WHERE ip_adress = '$get_ip_add'";
    $result = mysqli_query($con, $cart_query);
    while($row = mysqli_fetch_array($result)){
        $product_id = $row['product_id'];
        $quantity = $row['quantity'];
        $select_products = "SELECT * FROM products WHERE product_id = '$product_id'";
        $result_products = mysqli_query($con, $select_products);
        while($row_product_price = mysqli_fetch_assoc($result_products)){
            $product_price = array($row_product_price['product_price']);
            $product_values=array_sum($product_price);
            $total_price += ($product_values * $quantity);
        }
    }
    echo $total_price;
}


//get user order details

function get_user_order_details(){
    global $con;
    $username = $_SESSION['username'];
    $get_dtails="SELECT * FROM user_table WHERE username='$username'";
    $result_query = mysqli_query($con, $get_dtails);
    while($row_query = mysqli_fetch_array($result_query)){
        $user_id = $row_query['user_id'];
        if(!isset($_GET['edit_account'])){
            if(!isset($_GET['my_orders'])){
                if(!isset($_GET['delete_account'])){
                    $get_orders = "SELECT * FROM user_orders WHERE user_id = '$user_id' AND order_status = 'pending'";
                    $result_orders_query = mysqli_query($con, $get_orders);
                    $row_count = mysqli_num_rows($result_orders_query);
                    if($row_count>0){
                        echo "<h3 class='text-center text-success mt-5 mb-2'>You have <span 
                        class='text-danger'>$row_count</span> pending orders</h3>
                        <p class='text-center'><a href='profile.php?my_orders' class='text-dark'>Order Details</a></p>";
                    }else{
                        echo "<h3 class='text-center text-success mt-5 mb-2'>You have zero pending orders</h3>
                        <p class='text-center'><a href='../index.php' class='text-dark'>Explore products</a></p>";
                    }
                }
            }
        }
    }
}
?>