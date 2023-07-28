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
        <title>Welcome  <?php echo $_SESSION['username'] ?> </title>
        <link rel="stylesheet" href="stylesheet.css">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    </head>
    <style>
        .pro-img{
            display: flex;
            justify-content: center;
            align-items: center;
            width:100%;
            height: 30vh;
        }
        .pro-img img{
            border:1px solid ;
            border-radius : 250px;
        }
        .pro-img a{
            text-decoration:none;
            margin:10px;
            border:1px solid;
            padding:5px;
            background:#ff0000;
            color:#ffffff;
            border-radius:50px;
            cursor:pointer;
            transition:0.5s;
        }
        .pro-img a:hover{
            background:#85929E;
        }
        form input{
            width: 600px;
            height: 30px;
            margin: 10px 0 0 230px;
            padding: 0 10px;
            border: 1px solid #ccc;
        }
        form .btn{
            width: 200px;
            border: none;
            cursor: pointer;
            margin: 20px 0 50px 400px;
        }
        .column-style{
            display: flex;
            flex-direction: row;
            width: 700px;   
        }
    </style>
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
                    if(!isset($_SESSION['username'])){
                        echo "<li><a href='logout.php'>Logout</a></li>";
                    }
                    ?>                     
                </ul>
            </nav>
            <a href="cart.php"><img src="images/cart.png" width="30px" height="30px"></a>
            <img src="images/menu.png" class="menu-icon" onclick="menutoggle()">
        </div>
    </div>
    <div>
        <h2 class="title">Profile</h2>
            <div class="pro-img">
                <?php
                    $username=$_SESSION['username'];
                    $select_query="select * from `user_table` where user_name='$username'";
                    $result_query=mysqli_query($con,$select_query);
                    $user_image=mysqli_fetch_array($result_query);
                    $row_image=$user_image['user_image'];
                    echo "<img src='images/$row_image' width='100px' height='100px'>";
                ?>
            </div>
            <div class="pro-img">
                <div class="column-style">
                    <a href="profile.php">Orders Pending</a>
                    <a href="profile.php?edit_account">Edit Account</a>
                    <a href="profile.php?orders">My orders</a>
                    <a href="profile.php?delete">Delete Account</a>
                    <a href="logout.php">Logout</a>
                </div>
            </div>
            <div class="pro_img">
                <?php
                get_user_order_details();
                if(isset($_GET['edit_account'])){
                    include('edit_account.php');
                }
                if(isset($_GET['orders'])){
                    include('user_order.php');
                }
                if(isset($_GET['delete'])){
                    include('delete_account.php');
                }
                ?>
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
    
</body>
</html>