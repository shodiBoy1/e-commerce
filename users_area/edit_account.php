<?php
if(isset($_GET['edit_account'])){
    $user_session_name = $_SESSION['username'];
    $select_query = "SELECT * FROM user_table WHERE username='$user_session_name'";
    $result_query = mysqli_query($con,$select_query);
    $row_fetch = mysqli_fetch_assoc($result_query);
    $user_id = $row_fetch['user_id'];
    $user_name = $row_fetch['username'];
    $user_email = $row_fetch['user_email'];
    $user_image = $row_fetch['user_image'];
    $user_address = $row_fetch['user_address'];
    $user_mobile = $row_fetch['user_mobile'];
    
    if(isset($_POST['user_update'])){
        $update_id = $user_id;
        $user_username = $_POST['user_username'];
        $user_email = $_POST['user_email'];
        $user_image = $_FILES['user_image']['name'];
        $user_image_tmp = $_FILES['user_image']['tmp_name'];
        $user_address = $_POST['user_address'];
        $user_mobile = $_POST['user_mobile'];
        move_uploaded_file($user_image_tmp,"./user_images/$user_image");

        //update query

        $update_query = "UPDATE user_table SET username='$user_username',user_email='$user_email',user_image='$user_image',user_address='$user_address',user_mobile='$user_mobile' WHERE user_id='$update_id'";
        $result_query = mysqli_query($con,$update_query);
        if($result_query){
            echo "<script>alert('Your account has been updated successfully')</script>";
            echo "<script>window.open('profile.php','_self')</script>";
        }else{
            echo "<script>alert('Your account has not been updated successfully')</script>";
            echo "<script>window.open('profile.php','_self')</script>";
        }
    }
}

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit account</title>
</head>
<body>
  <h3 class="text-success mb-4">Edit Account</h3>
  <form action="" method="post" enctype="multipart/form-data">
  <div class="form-outline mb-4">
        <input type="text" class="form-control w-50 m-auto" value="<?php echo $user_name?>" name="user_username">
    </div>
    <div class="form-outline mb-4">
        <input type="email" class="form-control w-50 m-auto" value="<?php echo $user_email?>" name="user_email">
    </div> 
    <div class="form-outline mb-4">
        <input type="file" class="form-control w-50 m-auto" name="user_image">
    </div>
    <div class="form-outline mb-4">
        <input type="text" class="form-control w-50 m-auto"value="<?php echo $user_address?>"  name="user_address">
    </div>
    <div class="form-outline mb-4">
        <input type="text" class="form-control w-50 m-auto"value="<?php echo $user_mobile?>"  name="user_mobile">
    </div>
    <input type="submit" value="Update" class="bg-info py-2 px-3 border-0" name="user_update">
  </form>
</body>
</html>