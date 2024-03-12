<?php
if(isset($_GET['delete_orders'])){
    $delete_id=$_GET['delete_orders'];
    $delete_orders="DELETE FROM user_orders WHERE order_id=$delete_id";
    $result_delete=mysqli_query($con, $delete_orders);
    if($result_delete){
        echo "<script>alert('Product has been deleted successfully')</script>";
        echo "<script>window.open('index.php?all_orders', '_self')</script>";
    }
    else{
        echo "<script>alert('Product has not been deleted successfully')</script>";
        echo "<script>window.open('index.php?all_orders', '_self')</script>";
    }
} 
?>