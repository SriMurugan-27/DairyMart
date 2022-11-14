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
        td button{
    border:1px solid #ffffff;
    background: #ff0000;
    color: #ffffff;
    margin: 30px 0;
    padding: 8px 30px;
    border-radius: 30px;
    transition: background 0.5s;
}
td button:hover{
    background: #85929E;
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
<!------------------------------------cart--------------------------------------->

<div class="small-container cart-page">
    <form action="" method="post">
    <table>
        <?php
                $total_price=0;
                $ip = getIPAddress();
                $select_cart="select * from `card_deatails` where ip_address='$ip'";
                $result_cart=mysqli_query($con,$select_cart);
                $result_count=mysqli_num_rows($result_cart);
                if($result_count>0){
                    echo "        <tr>
                    <th>Product Title</th>
                    <th>Product Image</th>
                    <th>Quantity</th>
                    <th>Total Price</th>
                    <th>Remove</th>
                    <th>Opeartion</th>
                </tr>";
                while($row=mysqli_fetch_array($result_cart)){
                    $product_id=$row['product_id'];
                    $check_product="select * from `products` where product_id=$product_id";
                    $result_product=mysqli_query($con,$check_product);
                    while($row_product=mysqli_fetch_array($result_product)){
                        $product_price=array($row_product['Product_price']);
                        $price_table=$row_product['Product_price'];
                        $product_title=$row_product['product_title'];
                        $product_image=$row_product['product_image'];
                        $product_value=array_sum($product_price);
                        $total_price+=$product_value;
        ?>
        <tr>
            <td><?php echo $product_title ?></td>
            <td><div class="card-info">
                <img src="admin/product_image/<?php echo $product_image ?>">
            </div></td>
            <td><input type="number" name="quanty" value="1"></td>
            <?php
            $ip = getIPAddress();
            if(isset($_POST['update_cart'])){
                $quantities=$_POST['quanty'];
                $update_cart="update `card_deatails` set quantity=$quantities where ip_address='$ip'";
                $result_products_quantity=mysqli_query($con,$update_cart);
                $total_price=$total_price*$quantities;
            }
            ?>
            <td><?php echo $price_table ?></td>
            <td><input type="checkbox" name="removeitem[]" value="<?php echo $product_id ?>"></td>
            <td><button type="submit" name="update_cart">Update</button><button type="submit" name="remove_cart">Remove</button></td>
        </tr>
        <?php
                            }    
                        }
                    }else{
                        echo "<h2 class='title'>Cart is Empty</h2>";
                    }
        ?>
    </table>
</div>
<div class="small-container">
    <div class="total-price">
        <Table>
        <?php
            $ip = getIPAddress();
            $select_cart="select * from `card_deatails` where ip_address='$ip'";
            $result_cart=mysqli_query($con,$select_cart);
            $result_count=mysqli_num_rows($result_cart);
            if($result_count>0){
            ?>
                <tr>
                    <td>SubTotal</td>
                    <td><?php echo $total_price ?></td>
                </tr>
                <tr>
                    <td><button type="submit" name="continue_shop">Continue Shopping</button><button type="submit" name="checkout">CheckOut</button></td>
                </tr>
                <?php
                }else{
                    echo "<tr>
                    <td><button type='submit' name='continue_shop'>Continue Shopping</button></td>
                        </tr>";
                    }
                if(isset($_POST['continue_shop'])){
                    echo "<script>window.open('product.php','_self')</script>";
                }
                ?>
                <?php
                    if(isset($_POST['checkout'])){
                        echo "<script>window.open('checkout.php','_self')</script>";
                    }
                ?>
        </Table>
    </div>
    </form>
    <?php
    function remove_cart_item(){
        global $con;
        if(isset($_POST['remove_cart'])){
            foreach($_POST['removeitem'] as $remove_id){
                echo $remove_id;
                $delete_query="Delete from `card_deatails` where product_id=$remove_id";
                $run_delete=mysqli_query($con,$delete_query);
                if($run_delete){
                    echo "<script>window.open('cart.php','_self')</script>";
                }
            }
        }
    }
    echo $remove_item=remove_cart_item();
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