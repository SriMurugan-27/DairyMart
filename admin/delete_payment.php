<?php
if(isset($_GET['delete_payment'])){
    $delete_id=$_GET['delete_payment'];
    //echo $delete_id;

    $delete_cat="delete from `user_payments` where payment_id=$delete_id";
    $result_delete=mysqli_query($con,$delete_cat);
    if($result_delete){
        echo "<script>alert('Payment Deleted Successfully')</script>";
        echo "<script>window.open('index.php?list_order','_self')</script>";
    }
}
?>