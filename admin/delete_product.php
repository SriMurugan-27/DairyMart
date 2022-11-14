<?php
if(isset($_GET['delete_product'])){
    $delete_id=$_GET['delete_product'];
    echo $delete_id;

    $delete_product="Delete from `products` where product_id=$delete_id";
    $result_delete=mysqli_query($con,$delete_product);
    if($result_delete){
        echo "<script>alert('Product Deleted Successfully')</script>";
        echo "<script>window.open('index.php?view_products','_self')</script>";
    }
}
?>