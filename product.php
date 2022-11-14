<?php
include('include/connect.php');
include('Functions/functions.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>DairyMart | Products</title>
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
                <li><a href="about.php">About</a></li>
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
    <h3 class="title">All Products</h3>
    <form class="search" action="" method="get">
        <input type="search" placeholder="Search" class="srch" name="search_data">
        <button type="submit" class="button" name="search_data_product">Search</button>
    </form>
    <div class="row">
        <?php
        if(isset($_GET['search_data_product'])){
            search_product();
            cart();
        }else{
            get_products();
            cart();
        }

            //total_price();
            //$ip = getIPAddress();  
            //echo 'User Real IP Address - '.$ip;
        ?>
        <!-------div class="column2">
            <a href="products/milk.html"><img src="images/milk.jpg"></a>
            <a class="line" href="products/milk.html"><h4>Milk 1 Liter</h4></a>
            <p>Milk is a white liquid food produced by the mammary glands of mammals</p>
            <div class="rating">
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-regular fa-star"></i>
            </div>
            <p>₹10.00</p>
            <a href="" class="btn">Add to Cart</a>
        </div>-------->
    </div>      
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