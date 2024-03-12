<?php
include '../includes/connect.php';

if(isset($_POST['insert_cat'])){
    $title = $_POST['cat_title'];
    // select data from database
    $select_query = "select * from categories where category_title='$title'";
    $result = mysqli_query($con,$select_query);
    $number=mysqli_num_rows($result);
    if($number>0){
        echo "<script>alert('This category is already exist')</script>";
    }else{
    $insert_query = "insert into categories (category_title) values ('$title')";
    $result = mysqli_query($con,$insert_query);
    if($result){
        echo "<script>alert('New category has been inserted successfully')</script>";
    }
}}
?>
<h2 class="text-center">Insert Categories</h2>

<form action="" method="post" class="mb-2">
<div class="input-group w-90 mb-3">
  <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
  <input type="text" class="form-control" name="cat_title" placeholder="Insert categories" aria-label="Categories" aria-describedby="basic-addon1">
</div>
<div class="input-group w-10 mb-2 m-auto">


<input type="submit" class="bg-info border-0 p-2 my-3" name="insert_cat" 
  value="Insert categories"> 

</div>
</form> 
