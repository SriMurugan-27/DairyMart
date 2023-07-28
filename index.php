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
        <title>DairyMart</title>
        <link rel="stylesheet" href="stylesheet.css">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    </head>
    <style>
    .fa-quote-left{
        font-size: 32px;                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            l lll,                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      ;
    }
    </style>
    <body>
<div class="header">
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
        <div class="row">
            <div class="column">
                <h2>World's First Online Platform for the Dairy Products</h2>
                <p>A online platform for selling milk <br> product for Domestic and <br> International Vendors</p>
                <a href="product.html" class="btn">Explore Now &#8594;</a>
            </div>
            <div class="column">
                <img class="first" src="images/background.png">
            </div>
        </div>
    </div>
</div>

<!-----------------Featured Dairy Products--------------------->
<div class="categories">
    <div class="small-container">
        <h3 class="title">categories</h3>
        <div class="row">
            <?php
                get_category();
            ?>
        </div>
    </div>
</div>
<div class="small-container">
    <h3 class="title">Feature Dairy Products</h3>
    <div class="row">
        <div class="column2">
            <img src="images/milk.jpg">
             <a href="milk.html"><h4>Milk 1 Liter</h4></a>
             <div class="rating">
                 <i class="fa-solid fa-star"></i>
                 <i class="fa-solid fa-star"></i>
                 <i class="fa-solid fa-star"></i>
                 <i class="fa-solid fa-star"></i>
                 <i class="fa-regular fa-star"></i>
             </div>
             <p>₹50.00</p>
             </div>
             <div class="column2">
            <img src="images/yogurt.jpg">
             <h4>Yogurt</h4>
             <div class="rating">
                 <i class="fa-solid fa-star"></i>
                 <i class="fa-solid fa-star"></i>
                 <i class="fa-solid fa-star"></i>
                 <i class="fa-solid fa-star"></i>
                 <i class="fa-regular fa-star"></i>
             </div>
             <p>₹200.00</p>
             </div>
             <div class="column2">
                 <img src="images/butter.jpg">
                  <h4>Butter</h4>
                  <div class="rating">
                      <i class="fa-solid fa-star"></i>
                      <i class="fa-solid fa-star"></i>
                      <i class="fa-solid fa-star"></i>
                      <i class="fa-solid fa-star"></i>
                      <i class="fa-regular fa-star"></i>
                  </div>
                  <p>₹400.00</p>
             </div>
             <div class="column2">
                 <img src="images/chesse.jpg">
                  <h4>Chesse</h4>
                  <div class="rating">
                      <i class="fa-solid fa-star"></i>
                      <i class="fa-solid fa-star"></i>
                      <i class="fa-solid fa-star"></i>
                      <i class="fa-solid fa-star"></i>
                      <i class="fa-regular fa-star"></i>
                  </div>
                  <p>₹350.00</p>
            </div>
        </div>
    </div>      
</div>
<!------------------------------LATEST OFFER----------------------->
<div class="small-container">
    <h3 class="title">Lastest Dairy Products</h3>
    <div class="row">
        <div class="column2">
            <img src="images/custerd.jpg">
             <h4>Custurd</h4>
             <div class="rating">
                 <i class="fa-solid fa-star"></i>
                 <i class="fa-solid fa-star"></i>
                 <i class="fa-solid fa-star"></i>
                 <i class="fa-solid fa-star"></i>
                 <i class="fa-regular fa-star"></i>
             </div>
             <p>₹65.00</p>
        </div>
        <div class="column2">
            <img src="images/ghee.jpg">
             <h4>Ghee</h4>
             <div class="rating">
                 <i class="fa-solid fa-star"></i>
                 <i class="fa-solid fa-star"></i>
                 <i class="fa-solid fa-star"></i>
                 <i class="fa-solid fa-star"></i>
                 <i class="fa-regular fa-star"></i>
             </div>
             <p>₹400.00</p>
        </div>
        <div class="column2">
            <img src="images/ice-cream.jpg">
             <h4>Ice-Cream</h4>
             <div class="rating">
                 <i class="fa-solid fa-star"></i>
                 <i class="fa-solid fa-star"></i>
                 <i class="fa-solid fa-star"></i>
                 <i class="fa-solid fa-star"></i>
                 <i class="fa-regular fa-star"></i>
             </div>
             <p>₹120.00</p>
        </div>
        <div class="column2">
            <img src="images/paneer.jpg">
             <h4>Paneer</h4>
             <div class="rating">
                 <i class="fa-solid fa-star"></i>
                 <i class="fa-solid fa-star"></i>
                 <i class="fa-solid fa-star"></i>
                 <i class="fa-solid fa-star"></i>
                 <i class="fa-regular fa-star"></i>
             </div>
             <p>₹300.00</p>
        </div>
    </div>      
</div>
<!--------------------------------------------offer------------------>
<div class="offer">
    <div class="small-container">
        <div class="row">
            <div class="column">
                <img src="images/cream.jpg" class="offer-img">
            </div>
            <div class="column">
                <p>Exclusive offer on Dairy Mart</p>
                <h1>Full Cream Milk</h1>
                <small>Full Cream Milk is defined as milk, a combination of cow and buffalo milk,
                    or a product made from the combination of both, that has been standardised <br>
                    to the fat and solids-not-fat percentage given in the table below in 1.0, <br>
                    by adjustment or addition of milk solids. Full Cream Milk must also <br>
                    be pasteurised. A negative phosphatase test result is required. It must be <br>
                    packaged in hygienic, sound, and clean containers that are tightly sealed <br>
                    to prevent contamination.</small><br>
                    <a href="" class="btn">Buy Now &#8594;</a>
            </div>
        </div>
    </div>
</div>
<!-------------------------------testimonial-------------------------------------------->
<div class="testimonial">
    <div class="small-container">
        <div class="row">
            <div class="column3">
                <i class="fa-solid fa-quote-left"></i>
                <p>Try the fresh milk and ice cream, <br>as well as the unsalted white butter and <br> the most delicious  paneer on the market.<br> </p>
                <div class="rating">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-regular fa-star"></i>
                </div>
                <img src="images/profile_1.jpg" width="100px">
                <h3>Ketut Subiyanto</h3>
            </div>
            <div class="column3">
                <i class="fa-solid fa-quote-left"></i>
                <p>All of the merchandise is of  high quality, <br> and the establishment is spotless.</p>
                <div class="rating">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-regular fa-star"></i>
                </div>
                <img src="images/profile_2.jpg" width="100px">
                <h3>Kiyan Mirzaei</h3>
            </div>
            <div class="column3">
                <i class="fa-solid fa-quote-left"></i>
                <p>Everything from milk, ghee, butter, and panner is <br> available at reasonable prices and of high <br> quality. Hygiene is given special attention.</p>
                <div class="rating">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-regular fa-star"></i>
                </div>
                <img src="images/profile_3.jpg" width="100px">
                <h3>Muhd Emir</h3>
            </div>
        </div>
    </div>
</div>
<!----------------------------------------Brands--------------------------------------->
<div class="brand">
    <div class="small-container">
        <div class="row">
            <?php
            get_brand();
            ?>
        </div>
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