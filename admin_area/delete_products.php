<?php
if(isset($_GET['delete_products'])){
    $delete_id=$_GET['delete_products'];
    $delete_product="DELETE FROM products WHERE product_id=$delete_id";
    $result_delete=mysqli_query($con, $delete_product);
    if($result_delete){
        echo "<script>alert('Product has been deleted successfully')</script>";
        echo "<script>window.open('index.php?view_products', '_self')</script>";
    }
    else{
        echo "<script>alert('Product has not been deleted successfully')</script>";
        echo "<script>window.open('index.php?view_products', '_self')</script>";
    }
} 
?>