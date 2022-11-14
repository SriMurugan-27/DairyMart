<?php
include('include/connect.php');
include('Functions/functions.php');

if(isset($_GET['user_id'])){
    $user_id=$_GET['user_id'];
}

$get_ip_address=getIPAddress();
$total_price=0;
$cart_query_price="select * from `card_deatails` where ip_address='$get_ip_address'";
$result_cart_price=mysqli_query($con,$cart_query_price);
$invoice_number=mt_rand();
$status='pending';
$count_product=mysqli_num_rows($result_cart_price);
while($row_price=mysqli_fetch_array($result_cart_price)){
    $product_id=$row_price['product_id'];
    $select_product="select * from `products` where product_id=$product_id";
    $run_price=mysqli_query($con,$select_product);
    while($row_product_price=mysqli_fetch_array($run_price)){
        $product_price=array($row_product_price['Product_price']);
        $product_values=array_sum($product_price);
        $total_price+=$product_values;
    }

}


$get_cart="select * from `card_deatails`";
$run_cart=mysqli_query($con,$get_cart);
$get_item_quantity=mysqli_fetch_array($run_cart);
$quantity=$get_item_quantity['quantity'];
if($quantity==0){
    $quantity=1;
    $subtotal=$total_price;
}else{
    $quantity=$quantity;
    $subtotal=$total_price*quantity;
}


$insert_orders="insert into `user_orders` (user_id,amount_due,invoice_number,total_products,order_data,order_status) 
values ($user_id,$subtotal,$invoice_number,$count_product,NOW(),'$status')";
$result_query=mysqli_query($con,$insert_orders);
if($result_query){
    echo "<script>alert('Orders Placed Successfully')</script>";
    echo "<script>window.open('profile.php','_self')</script>";
}

$insert_pending_orders="insert into `pending_orders` (user_id,invoice_number,product_id,quantity,order_status) values ($user_id,$invoice_number,$product_id,$quantity,'$status')";
$result_pending=mysqli_query($con,$insert_pending_orders);


$empty_cart="Delete from `card_deatails` where ip_address='$get_ip_address'";
$result_empty=mysqli_query($con,$empty_cart);


?>

