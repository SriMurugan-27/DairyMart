<?php
include('include/connect.php');
include('Functions/functions.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>DairyMart | Contact</title>
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
        </div>
        <div class="profile">
            <div class="contact-container">
                <h2>Contact Us</h2>
                <p class="contact-heading">Having trouble locating the solution in our Help section?<br>
                    Fill out this form, please: <br>
                    * indicates necessary fields.</p>
                    <div class="form-1">
                    <p>Full Name</p>
                    <input type="text">
                    <p>Email Account</p>
                    <input type="email">
                    <p>Postcode/Zip</p>
                    <input type="number">
                    <p>Order Number</p>
                    <input type="number">
                    <p>Reason</p>
                    <select name="" id="">
                    <option value="">My Order</option>
                    <option value="">My Pre-Order</option>
                    <option value="">Change My Order</option>
                    <option value="">Cancel and Return My Order</option>
                    <option value="">Damaged Item</option>
                    <option value="">Incorrect Item</option>
                    <option value="">Payment</option>
                    <option value="">My Account</option>
                    <option value="">Website Issues</option>
                    <option value="">Press and Media</option>
                    <option value="">Other</option>
                    </select>
                    <div class="message">
                    <p>Your Message</p>
                    <input type="text"><br>
                    <a href="">Send</a>
                    </div>
                    </div>
                </div>
        </div>
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