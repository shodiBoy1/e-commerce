<?php
$con = mysqli_connect("localhost", "my_user", "my_password", "my_db");
if (!$con) {
   die("Connection failed: " . mysqli_connect_error($con));
}

?>
