<?php
include('../include/connect.php');
if(isset($_POST['insert_brand'])){
    $brand_name=$_POST['brand_name'];
    $brand_logo=$_FILES['brand_logo']['name'];
    $temp_brand=$_FILES['brand_logo']['tmp_name'];
    $select_query="Select * from `brands` where brand_name='$brand_name'";
    $result_select=mysqli_query($con,$select_query);
    $number=mysqli_num_rows($result_select);
    if($number>0){
        echo "<script>alert('This Brand Already Presented')</script>";
    }else{
        move_uploaded_file($temp_brand,"./brand/$brand_logo");
        $insert_brand="insert into `brands` (brand_name,brand_logo) values ('$brand_name','$brand_logo')";
        $result_query=mysqli_query($con,$insert_brand);
        if($result_query){
        echo "<script>alert('Brand Successfully Added')</script>";
        }
    }
}  
?>
<div class="background">
    <p class="text-center">Add Brands</p>
</div>
<form action="" method="post" class="mb-2" enctype="multipart/form-data">
    <div class="input-group w-50 mb-4 m-auto">
        <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-receipt"></i>
        </span>
        <input type="text" class="form-control" name="brand_name" placeholder="Brand Name" aria-label="Username" aria-describedby="basic-addon1" required="required">
    </div>
    <div class="input-group w-50 mb-2 m-auto">
        <input type="file" class="form-control" name="brand_logo" required="required">
    </div>
    <div class="input-group w-50 mb-2 m-auto">
        <button type="submit" name="insert_brand" required="required" class="btn btn-primary">Add </button>
    </div>
</form>