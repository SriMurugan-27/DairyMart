<?php
include('include/connect.php');
include('Functions/functions.php');
@session_start();
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
<div class="account-page">
    <div class="container">
            <div class="column">
                <div class="form-container">
                    <div class="form-btn">
                        <span onclick="login()">Login</span>
                        <span onclick="register()">Register</span>
                        <hr id="Indicator">
                    </div>
                    <form id="LoginForm" method="post">
                        <input type="text" placeholder="Username" name="login_username">
                        <input type="password" placeholder="Password" name="login_password">
                        <button type="submit" class="btn" name="user_login">Login</button>
                        <a href="">Forgot password</a>
                    </form>
                    <form id="RegForm" method="post" enctype="multipart/form-data">
                        <input type="text" placeholder="Username" name="user_user_name">
                        <input type="email" placeholder="Email" name="user_email">
                        <label for="">Profile Picture</label>
                        <input type="file" required="required" name="user_image">
                        <input type="password" placeholder="Password" name="user_password">
                        <input type="password" placeholder="Confirm Password" name="con_password">
                        <input type="text" placeholder="Address" name="user_address">
                        <input type="text" placeholder="Mobile Contact" name="user_mobile">
                        <button type="submit" class="btn" name="user_register">Register</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
if(isset($_POST['user_register'])){
    $user_user_name=$_POST['user_user_name'];
    $user_email=$_POST['user_email'];
    $user_image=$_FILES['user_image']['name'];
    $user_image_tmp=$_FILES['user_image']['tmp_name'];
    $user_password=$_POST['user_password'];
    $hash_password=password_hash($user_password,PASSWORD_DEFAULT);
    $con_password=$_POST['con_password'];
    $user_address=$_POST['user_address'];
    $user_mobile=$_POST['user_mobile'];
    $user_ip=getIPAddress();

    $select_query="select * from `user_table` where user_name='$user_user_name' or user_email='$user_email'";
    $results=mysqli_query($con,$select_query);
    $rows_counts=mysqli_num_rows($results);
    if($rows_counts>0){
        echo "<script>alert('Username or Email Already Exist')</script>";
    }else if($user_password!=$con_password){
        echo "<script>alert('Password do not match')</script>";
    }else{
        move_uploaded_file($user_image_tmp,"images/$user_image");
        $inser_query="insert into `user_table` (user_name,user_email,user_password,user_image,user_ip,user_address,user_mobile) 
        values ('$user_user_name','$user_email','$hash_password','$user_image','$user_ip','$user_address','$user_mobile')";
        $sql_execute=mysqli_query($con,$inser_query);
        if($sql_execute){
            echo "<script>alert('You Have Registered Successfully')</script>";
        }
    }
    $select_cart_items="select * from `card_deatails` where ip_address='$user_ip'";
    $result_cart=mysqli_query($con,$select_cart_items);
    $rows_cart=mysqli_num_rows($result_cart);
    if($rows_cart>0){
        $_SESSION['username']=$user_user_name;
        echo "<script>alert('You have item in your Cart')</script>";
        echo "<script>window.open('checkout.php','_self')</script>";
    }else{
        echo "<script>window.open('account.php','_self')</script>";
    }
}
?>
<?php
if(isset($_POST['user_login'])){
    $login_username=$_POST['login_username'];
    $login_password=$_POST['login_password'];
    $select_login="select * from `user_table` where user_name='$login_username'";
    $result_login=mysqli_query($con,$select_login);
    $row_login=mysqli_num_rows($result_login);
    $row_data=mysqli_fetch_assoc($result_login);
    $ip=getIPAddress();
    $select_query_cart="select * from `card_deatails` where ip_address='$ip'";
    $cart=mysqli_query($con,$select_query_cart);
    $row_count_cart=mysqli_num_rows($cart);
    if($row_login>0){
        $_SESSION['username']=$login_username;
        if(password_verify($login_password,$row_data['user_password'])){
            //echo "<script>alert('Login Successful')</script>";
            if($row_login==1 and $row_count_cart==0){
                $_SESSION['username']=$login_username;
                echo "<script>alert('Login Successful')</script>";
                echo "<script>window.open('profile.php','_self')</script>";
            }else{
                $_SESSION['username']=$login_username;
                echo "<script>alert('Login Successful')</script>";
                echo "<script>window.open('payment.php','_self')</script>";
            }
        }else{
            echo "<script>alert('Invalid Password')</script>";
        }
    }else{
        echo "<script>alert('Invalid Credntials')</script>";
    }
}
?>





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
<script>
    var LoginForm = document.getElementById("LoginForm");
    var RegForm = document.getElementById("RegForm");
    var Indicator = document.getElementById("Indicator");
    function register(){
        RegForm.style.transform = "translateX(0px)";
        LoginForm.style.transform = "translateX(0px)";
        Indicator.style.transform = "translateX(100px)";
    }
    function login(){
        RegForm.style.transform = "translateX(300px)";
        LoginForm.style.transform = "translateX(300px)";
        Indicator.style.transform = "translateX(0px)";
    }
</script>
    </body>
</html>