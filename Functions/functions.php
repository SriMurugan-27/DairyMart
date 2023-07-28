<?php
include('./include/connect.php');

// category

function get_category(){
    global $con;
    $select_category="select * from `categories`";
    $result=mysqli_query($con,$select_category);
    while($category=mysqli_fetch_assoc($result)){
?>
     <div class="column1"><img src="admin/category/<?=$category['category_image']?>"></div>
<?php
    }
}

// brand

function get_brand(){
    global $con;
    $select_brand='select * from `brands`';
    $result_query=mysqli_query($con,$select_brand);
    while($row_data=mysqli_fetch_assoc($result_query)){
    ?>
    <div class="column4">
        <img src="admin/brand/<?=$row_data['brand_logo']?>">
    </div>
    <?php    
    }
}


// Display product from Database

function get_products(){
    global $con;
    $select_products="select * from `products` order by rand()";
    $result_query=mysqli_query($con,$select_products);
    while($prdt=mysqli_fetch_assoc($result_query)){
        $product_id=$prdt['product_id'];
        $product_title=$prdt['product_title'];
        $product_description=$prdt['product_description'];
        $product_keyword=$prdt['product_keyword'];
        $category_id=$prdt['category_id'];
        $brand_id=$prdt['brand_id'];
        $product_image=$prdt['product_image'];
        $Product_price=$prdt['Product_price'];
        echo "<div class='column2'>
        <a href=''><img src='admin/product_image/$product_image'></a>
        <a class='line' href=''><h4>$product_title</h4></a>
        <p>$product_description</p>
        <div class='rating'>
            <i class='fa-solid fa-star'></i>
            <i class='fa-solid fa-star'></i>
            <i class='fa-solid fa-star'></i>
            <i class='fa-solid fa-star'></i>
            <i class='fa-regular fa-star'></i>
        </div>
        <p>₹$Product_price</p>
        <a href='product.php?add_to_cart=$product_id' class='btn'>Add to Cart</a>
    </div>";
    }
}


// searching the product
function search_product(){
    global $con;
    if(isset($_GET['search_data_product'])){
        $search_value=$_GET['search_data'];
        $search_query="select * from `products` where product_keyword like '%$search_value%'";
        $result_query=mysqli_query($con,$search_query);
        while($prdt=mysqli_fetch_assoc($result_query)){
            $product_id=$prdt['product_id'];
            $product_title=$prdt['product_title'];
            $product_description=$prdt['product_description'];
            $product_keyword=$prdt['product_keyword'];
            $category_id=$prdt['category_id'];
            $brand_id=$prdt['brand_id'];
            $product_image=$prdt['product_image'];
            $Product_price=$prdt['Product_price'];
            echo "<div class='column2'>
            <a href=''><img src='admin/product_image/$product_image'></a>
            <a class='line' href=''><h4>$product_title</h4></a>
            <p>$product_description</p>
            <div class='rating'>
                <i class='fa-solid fa-star'></i>
                <i class='fa-solid fa-star'></i>
                <i class='fa-solid fa-star'></i>
                <i class='fa-solid fa-star'></i>
                <i class='fa-regular fa-star'></i>
            </div>
            <p>₹$Product_price</p>
            <a href='product.php?add_to_cart=$product_id' class='btn'>Add to Cart</a>
        </div>";
        }
    }
}

// IP address
function getIPAddress() {  
    //whether ip is from the share internet  
     if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                $ip = $_SERVER['HTTP_CLIENT_IP'];  
        }  
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
     }  
//whether ip is from the remote address  
    else{  
             $ip = $_SERVER['REMOTE_ADDR'];  
     }  
     return $ip;  
}  
//$ip = getIPAddress();  
//echo 'User Real IP Address - '.$ip; 

// cart function
function cart(){
    if(isset($_GET['add_to_cart'])){
        global $con;
        $ip = getIPAddress();
        $get_product_id=$_GET['add_to_cart'];
        $select_query="select * from `card_deatails` where ip_address='$ip' and product_id=$get_product_id";
        $result_query=mysqli_query($con,$select_query);
        $num_of_rows=mysqli_num_rows($result_query);
        if($num_of_rows>0){
            echo "<script>alert('This product already added to cart')</script>";
            echo "<script>window.open('product.php','_self')</script>";
        }else{
            $insert_query="insert into `card_deatails` (product_id,ip_address,quantity) values ($get_product_id,'$ip',0)";
            $result_query=mysqli_query($con,$insert_query);
            echo "<script>alert('Product is Added to the Cart')</script>";
            echo "<script>window.open('product.php','_self')</script>";
        }
    }
}

// Total Price 
function total_price(){
    global $con;
    $total_price=0;
    $ip = getIPAddress();
    $select_cart="select * from `card_deatails` where ip_address='$ip'";
    $result_cart=mysqli_query($con,$select_cart);
    while($row=mysqli_fetch_array($result_cart)){
        $product_id=$row['product_id'];
        $check_product="select * from `products` where product_id=$product_id";
        $result_product=mysqli_query($con,$check_product);
        while($row_product=mysqli_fetch_array($result_product)){
            $product_price=array($row_product['Product_price']);
            $product_value=array_sum($product_price);
            $total_price+=$product_value;
        }
    }
    echo $total_price;
}

//getiing user details

function get_user_order_details(){
    global $con;
    $username=$_SESSION['username'];
    $get_details="select * from `user_table` where user_name='$username'";
    $result_get=mysqli_query($con,$get_details);
    while($row_query=mysqli_fetch_array($result_get)){
        $user_id=$row_query['user_id'];
        if(!isset($_GET['edit_account'])){
            if(!isset($_GET['orders'])){
                if(!isset($_GET['delete'])){
                    $get_orders="select * from `user_orders` where user_id=$user_id and order_status='pending'";
                    $result_order_query=mysqli_query($con,$get_orders);
                    $row_count=mysqli_num_rows($result_order_query);
                    if($row_count>0){
                        echo "<h3 class='title'>You have $row_count pending Orders</h3>
                                <div class='column title'><a href='profile.php?orders'>Order Details</a></div>";
                    }else{
                        echo "<h3 class='title'>You have Zero pending Orders</h3>
                        <div class='column title'><a href='index.php'>Explore Products</a></div>";
                    }
                }
            }
        }
    }
}
?>