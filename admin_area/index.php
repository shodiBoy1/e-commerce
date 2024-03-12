<?php 
include '../includes/connect.php';
include '../functions/common_function.php';
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- Bootstrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- css link -->
    <link rel="stylesheet" href="../style.css">
<style>
    .footer{
    position: absolute;
    bottom: 0;
    width: 100%;
}  
body{
    overflow-x: hidden;
}   
.product_img{
    width: 100px;
    object-fit: contain;
}  
    </style>
</head>
<body>
    
    <!-- navbar -->
    <div class="container-fluid p-0">
        <!-- first child -->
        <nav class="navbar navbar-expand-lg navbar-light bg-info">
            <div class="container-fluid">
                 <a class="navbar-brand" href="#">HOZMAG</a>  <!--logo later can add a custom logo-->
                    <nav class="navbar navbar-expand-lg">
                        <ul class="navbar-nav">
                             <li class="nav-item">
                                <a href="" class="nav-link">Welcome Guest</a>
                            </li>
                        </ul>

                    </nav>
             </div>
        </nav>

        <!-- second child -->
            <div class="gb-light">
                <h3 class="text-center p-2">Manage Content</h3>
                </h3>
            </div>
        <!-- third child -->
        <div class="row">
            <div class="col-md-12 bg-secondary p-1 d-flex align-items-center">
                <div class="p-3">
                    <a href="#"><img src="../images/.." alt="" class="admin_image"></a>
                    <p class="text-light text-center">Admin Name</p>
                </div>
                <div class="button text-center">
                    <button class="my-3"><a href="insert_products.php" class="nav-link text-light bg-info my-1">Insert Products</a></button>
                    <button><a href="index.php?view_products" class="nav-link text-light bg-info my-1">View Products</a></button>
                    <button><a href="index.php?insert_categories" class="nav-link text-light bg-info my-1">Insert Categories</a></button>
                    <button><a href="index.php?view_categories" class="nav-link text-light bg-info my-1">View Categories</a></button>
                    <button><a href="index.php?insert_brands" class="nav-link text-light bg-info my-1">Insert Brands</a></button>
                    <button><a href="index.php?view_brands" class="nav-link text-light bg-info my-1">View Brands</a></button>
                    <button><a href="index.php?all_orders" class="nav-link text-light bg-info my-1">All orders</a></button>
                    <button><a href="" class="nav-link text-light bg-info my-1">All Payments</a></button>
                    <button><a href="" class="nav-link text-light bg-info my-1">List users</a></button>
                    <button><a href="" class="nav-link text-light bg-info my-1">Logout</a></button>
                </div>
            </div>
        </div>


        <!-- fourth child -->
            <div class="container my-3">
                <?php
                    if(isset($_GET['insert_categories'])){
                        include("insert_categories.php");
                    }
                    if(isset($_GET['insert_brands'])){
                        include("insert_brands.php");
                    }
                    if(isset($_GET['view_products'])){
                        include("view_products.php");
                    }
                    if(isset($_GET['edit_products'])){
                        include("edit_products.php");
                    }
                    if(isset($_GET['delete_products'])){
                        include("delete_products.php");
                    }
                    if(isset($_GET['view_categories'])){
                        include("view_categories.php");
                    }
                    if(isset($_GET['view_brands'])){
                        include("view_brands.php");
                    }
                    if(isset($_GET['edit_categories'])){
                        include("edit_categories.php");
                    }
                    if(isset($_GET['edit_brands'])){
                        include("edit_brands.php");
                    }
                    if(isset($_GET['delete_category'])){
                        include("delete_category.php");
                    }
                    if(isset($_GET['delete_brands'])){
                        include("delete_brands.php");
                    }
                    if(isset($_GET['all_orders'])){
                        include("all_orders.php");
                    }
                    if(isset($_GET['delete_orders'])){
                        include("delete_orders.php");
                    }
                    ?>
            </div>



        <!-- last child -->
<!-- <div class="bg-info p-3 text-center footer"> 
    <p>All rights reserved ©- Designed by HOZMAG.tj-2023</p>
</div>
         </div> -->

    




 <!-- Bootstrap JS link -->
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>