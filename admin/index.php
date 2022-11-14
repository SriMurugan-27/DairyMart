<?php
include('../include/connect.php');
include('../Functions/function.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
</head>
<style>
    button a{
    display: inline-block;
    text-decoration: none;
    background: #ff0000;
    color: #ffffff;
    margin: 30px 0;
    padding: 8px 30px;
    border : 0;
    border-radius: 30px;
    list-style: none;
    transition: background 0.5s;
    }
    button a:hover{
        background: #85929E;
    }
</style>
<body>
    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid p-0">
                <div class="navbar-brand">
                    <a href="index.php"><img src="../images/logo.png"></a>
                </div>
                <nav class="navbar">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                        <a href="" class="nav-link">Welcome <?php echo $_SESSION['username'] ?></a>
                        </li>
                    </ul>
                </nav>
            </div>
        </nav>
        <div class="background">
            <p class="text-center">Manage Details</p>
        </div>
        <div class="row">
            <div class="col-md-12 bg-light p-1 d-flex align-item-center">
                <div class="px-5">
                    <a href=""><img src="../images/cute.ico" class="admin_user"></a>
                    <p class="text-secondary text-center"><?php echo $_SESSION['username'] ?></p>
                </div>
                <div class="button text-center">
                    <button class="border-0"><a href="insert_product.php">Insert Product</a></button>
                    <button class="border-0"><a href="index.php?view_products">View Products</a></button>
                    <button class="border-0"><a href="index.php?insert_category">Add Categories</a></button>
                    <button class="border-0"><a href="index.php?view_categories">View Categories</a></button>
                    <button class="border-0"><a href="index.php?insert_brand">Add Brands</a></button>
                    <button class="border-0"><a href="index.php?view_brands">View Brands</a></button>
                    <button class="border-0"><a href="index.php?list_order">All Orders</a></button>
                    <button class="border-0"><a href="index.php?list_payments">Payments</a></button>
                    <button class="border-0"><a href="index.php?list_users">Customers</a></button>
                    <button class="border-0"><a href="logout.php">Logout</a></button>
                </div>
            </div>
        </div>
        <div class="container my-5">
            <?php 
            if(isset($_GET['insert_category'])){
                include('insert_categories.php');
            }
            ?>
        </div>
        <div class="container my-5">
            <?php 
            if(isset($_GET['insert_brand'])){
                include('insert_brand.php');
            }
            if(isset($_GET['view_products'])){
                include('view_products.php');
            }
            if(isset($_GET['edit_products'])){
                include('edit_products.php');
            }
            if(isset($_GET['delete_product'])){
                include('delete_product.php');
            }
            if(isset($_GET['view_categories'])){
                include('view_categories.php');
            }
            if(isset($_GET['edit_categories'])){
                include('edit_categories.php');
            }
            if(isset($_GET['delete_categories'])){
                include('delete_categories.php');
            }
            if(isset($_GET['view_brands'])){
                include('view_brands.php');
            }
            if(isset($_GET['edit_brand'])){
                include('edit_brand.php');
            }
            if(isset($_GET['delete_brand'])){
                include('delete_brand.php');
            }
            if(isset($_GET['list_order'])){
                include('list_order.php');
            }
            if(isset($_GET['delete_order'])){
                include('delete_order.php');
            }
            if(isset($_GET['list_payments'])){
                include('list_payments.php');
            }
            if(isset($_GET['delete_payment'])){
                include('delete_payment.php');
            }
            if(isset($_GET['list_users'])){
                include('list_user.php');
            }
            if(isset($_GET['delete_user'])){
                include('delete_user.php');
            }
            ?>
        </div>
    </div>
    <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>