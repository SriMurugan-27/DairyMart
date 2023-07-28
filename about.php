<?php
include('include/connect.php');
include('Functions/functions.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>DairyMart | About</title>
        <link rel="stylesheet" href="stylesheet.css">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    </head>
    <body>
<div class="header">
    <div class="container">
        <div class="main">
            <div class="logo">
                <img src="images/logo.png">
            </div>
            <nav>
                <ul>
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
        </div>
    </div>
</div>
<!---------------------about------------------------->
<div class="about">
    <h1>About Us</h1>
    <div class="para-1">
        <p>A Platform that links the major dairy products with potential dairy importers from around the world. Because of rising earnings, population expansion, urbanization, and dietary changes, there is an increase in demand for milk and milk products in developing nations. In East and Southeast Asia, this trend is particularly noticeable in densely populated nations like China, Indonesia, and Vietnam. To keep up with demand, we link up worldwide importers with the countries that are in demand to stop the price of dairy products made with milk from growing.</p>
    </div>
    <div class="para-2">
           <p>           According to USDA estimates, global milk consumption in 2020 will be around 190 million tones. With 81 million tones of milk consumed, India leads the world. In 2021, India is expected to consume approximately 83 million tones. Based on this analysis and the growth of the population in countries, milk products are in high demand. It may increase the risk of milk price increases in the future.</p> 
    </div>
</div>

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
    </body>
</html>