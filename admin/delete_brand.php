<?php
if(isset($_GET['delete_brand'])){
    $delete_id=$_GET['delete_brand'];
    //echo $delete_id;

    $delete_cat="delete from `brands` where brand_id=$delete_id";
    $result_delete=mysqli_query($con,$delete_cat);
    if($result_delete){
        echo "<script>alert('Brand Deleted Successfully')</script>";
        echo "<script>window.open('index.php?view_brands','_self')</script>";
    }
}
?>