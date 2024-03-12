<?php
if(isset($_GET['delete_category'])){
    $category_id=$_GET['delete_category'];
    $delete_category="DELETE FROM categories WHERE category_id=$category_id";
    $result_delete=mysqli_query($con, $delete_category);
    if($result_delete){
        echo "<script>alert('Category has been deleted successfully')</script>";
        echo "<script>window.open('index.php?view_categories', '_self')</script>";
    }
    else{
        echo "<script>alert('Category has not been deleted successfully')</script>";
        echo "<script>window.open('index.php?view_categories', '_self')</script>";
    }
} 
?>