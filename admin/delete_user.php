<?php
if(isset($_GET['delete_user'])){
    $delete_id=$_GET['delete_user'];
    //echo $delete_id;

    $delete_cat="delete from `user_table` where user_id=$delete_id";
    $result_delete=mysqli_query($con,$delete_cat);
    if($result_delete){
        echo "<script>alert('User Deleted Successfully')</script>";
        echo "<script>window.open('index.php?view_categories','_self')</script>";
    }
}
?>