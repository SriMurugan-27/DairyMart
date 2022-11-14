<?php
include('include/connect.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>DairyMart</title>
        <link rel="stylesheet" href="stylesheet.css">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    </head>
    <body>
    <div class="container">
        <div class="main">
            <div class="logo">
                <img src="images/logo.png">
            </div>
            <nav>
                <ul id="MenuItems">
                <li><a href="index.php">Home</a></li>
                <li><a href="product.php">Product</a></li>
                <li><a href="about.ph"'>About</a></li>
                <li><a href="Contact.php">Contact</a></li>
                <li><a href="account.php">Account</a></li>
                    <?php 
                    if(isset($_SESSION['username'])){
                        echo "<li><a href='logout.php'>Logout</a></li>";
                    }
                    ?>               
                </ul>
            </nav>
            <a href="cart.php"><img src="images/cart.png" width="30px" height="30px"></a>
            <img src="images/menu.png" class="menu-icon" onclick="menutoggle()">
        </div>
    </div>

    <div class="small-container">
        <h2 class="title">Check Out</h2>
        <?php
         if(!isset($_SESSION['username'])){
            echo "<script>window.open('account.php','_self')</script>";
         }else{
            include('payment.php');
         }
        ?>
    </div>











    <!----------------------------Footer---------------------------------------------------->
<div class="footer">
    <div class="container">
        <div class="row">
            <div class="column5">
                <h3>Download Our App</h3>
                <p>Download Our App for Android and ISO Moblie Phone</p>
                <div class="app-logo">
                    <img src="images/playstore.png">
                    <img src="images/app-store.png">
                </div>
            </div>
            <div class="column6">
                <img src="images/logo-white.png">
                <p>Our Purpose is to sustainably make the dairy market stable.</p>
            </div>
            <div class="column7">
                <h3>Useful links</h3>
                <ul>
                    <li>Coupons</li>
                    <li>Blog Post</li>
                    <li>Return and Replacement Policy</li>
                    <li>join Affilites</li>
                </ul>
            </div>
            <div class="column8">
                <h3>Follow Us</h3>
                <ul>
                    <li>Facebook</li>
                    <li>Twitter</li>
                    <li>Instagram</li>
                    <li>Youtube</li>
                </ul>
            </div>
        </div>
        <hr>
        <p class="copyright">Copyright 2022 - DairyMart</p>
    </div>
</div>

<script>
    var MenuItems = document.getElementById("MenuItems");
    MenuItems.style.maxHeight = "0px";
    function menutoggle(){
        if (MenuItems.style.maxHeight == "0px")
        {
            MenuItems.style.maxHeight = "200px";
        }
        else
        {
            MenuItems.style.maxHeight = "0px";
        }
    }
</script>
    </body>
</html>