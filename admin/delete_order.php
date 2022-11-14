<?php
if(isset($_GET['delete_order'])){
    $delete_id=$_GET['delete_order'];
    //echo $delete_id;

    $delete_cat="delete from `user_orders` where order_id=$delete_id";
    $result_delete=mysqli_query($con,$delete_cat);
    if($result_delete){
        echo "<script>alert('Order Deleted Successfully')</script>";
        echo "<script>window.open('index.php?list_order','_self')</script>";
    }
}
?>