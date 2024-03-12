<?php
if(isset($_GET['delete_brands'])){
    $brand_id=$_GET['delete_brands'];
    $delete_brand="DELETE FROM brands WHERE brand_id=$brand_id";
    $result_delete=mysqli_query($con, $delete_brand);
    if($result_delete){
        echo "<script>alert('Brand has been deleted successfully')</script>";
        echo "<script>window.open('index.php?view_brands', '_self')</script>";
    }
    else{
        echo "<script>alert('Brand has not been deleted successfully')</script>";
        echo "<script>window.open('index.php?view_brands', '_self')</script>";
    }
} 
?>