<?php
include '../includes/connect.php';
include '../functions/common_function.php';


if(isset($_GET['user_id'])){
    $user_id=$_GET['user_id'];
    
}

// getting total items and total price of all items
$get_ip_address = getIPAddress();
$total_price = 0;
$cart_query_price = "SELECT * FROM `cart_details` WHERE `ip_adress`='$get_ip_address'";
$result_cart_price = mysqli_query($con, $cart_query_price);
$invoice_num = mt_rand();
$status = 'pending';
$count_products=mysqli_num_rows($result_cart_price);
while($row_price = mysqli_fetch_array($result_cart_price)){
    $product_id = $row_price['product_id'];
    $select_product = "SELECT * FROM `products` WHERE `product_id`='$product_id'";
    $run_price=mysqli_query($con, $select_product);
    while($row_product_price = mysqli_fetch_array($run_price)){
        $product_price = array($row_product_price['product_price']);
        $product_values = array_sum($product_price);
        $total_price += $product_values;
    }
}

// getting quantity from cart
$get_cart = "SELECT * FROM `cart_details` WHERE `ip_adress`='$get_ip_address'";
$run_cart = mysqli_query($con, $get_cart);
$get_item_qty = mysqli_fetch_array($run_cart);
$qty = $get_item_qty['quantity'];
if($qty==0){
    $qty=1;
    $sub_total = $total_price;
}else{  
    $qty=$qty;
    $sub_total = $total_price*$qty;
}

$insert_query = "INSERT INTO `user_orders`(`user_id`, `amount_due`, `invoice_number`, `total_products`, `order_date`, `order_status`) VALUES ('$user_id','$sub_total','$invoice_num','$count_products',NOW(),'$status')";
$result_query = mysqli_query($con, $insert_query);
if($result_query){
    echo "<script>alert('Order successfully placed')</script>";
    echo "<script>window.open('profile.php','_self')</script>";
}
?>
