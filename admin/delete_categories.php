<?php
if(isset($_GET['delete_categories'])){
    $delete_id=$_GET['delete_categories'];
    //echo $delete_id;

    $delete_cat="delete from `categories` where category_id=$delete_id";
    $result_delete=mysqli_query($con,$delete_cat);
    if($result_delete){
        echo "<script>alert('Category Deleted Successfully')</script>";
        echo "<script>window.open('index.php?view_categories','_self')</script>";
    }
}
?>