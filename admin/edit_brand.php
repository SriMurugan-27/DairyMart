<?php
if(isset($_GET['edit_brand'])){
    $brand_id=$_GET['edit_brand'];
    //echo $category_id;
    $get_brand="select * from `brands` where brand_id=$brand_id";
    $result_brand=mysqli_query($con,$get_brand);
    $row_brand=mysqli_fetch_assoc($result_brand);
    $brand_name=$row_brand['brand_name'];
    $brand_logo=$row_brand['brand_logo'];
}
?>
<h3 class="text-success text-center">Edit Brands</h3>
<form action="" method="post" enctype="multipart/form-data">
    <div class="from-outline w-50 m-auto mb-4">
        <label for="brand_logo" class="form-label">Brand Logo</label>
        <div class="d-flex">
            <input type="file" id="brand_logo" name="brand_logo" class="form-control" required="required">
            <img src="brand/<?php echo $brand_logo ?>" width="80px" height="50px">
        </div>
    </div>
        <div class="from-outline w-50 m-auto mb-4">
            <label for="brand_name" class="form-label">Brand Title</label>
            <input type="text" id="brand_name" name="brand_name" class="form-control" value="<?php echo $brand_name ?>" required="required">
        </div>
        <div class="text-center">
            <input type="submit" name="edit_brand" class="btn btn-primary px-3 mb-3" value="Update brand">
        </div>
</form>

<?php
if(isset($_POST['edit_brand'])){
    $get_brand=$_POST['brand_name'];
    $get_image=$_FILES['brand_logo']['name'];
    $temp_image=$_FILES['brand_logo']['tmp_name'];

    if($get_brand=='' or $get_image==''){
        echo "<script>alert('Please Fill all the Fields')</script>";
    }else{
        move_uploaded_file($temp_image,"brand/$get_image");

        $update_brand="update `brands` set brand_name='$get_brand',brand_logo='$get_image' where brand_id=$brand_id";
        $result_update=mysqli_query($con,$update_brand);
        if($result_update){
            echo "<script>alert('Brand Updated Successfully')</script>";
            echo "<script>window.open('index.php?view_brands','_self')</script>";
        }
    }
}
?>