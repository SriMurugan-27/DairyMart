<?php
include('../include/connect.php');
if(isset($_POST['insert_cat'])){
    $category_title=$_POST['cat_title'];
    $category_image=$_FILES['cat_image']['name'];
    $temp_category=$_FILES['cat_image']['tmp_name'];
    $select_query="Select * from `categories` where category_title='$category_title'";
    $result_select=mysqli_query($con,$select_query);
    $number=mysqli_num_rows($result_select);
    if($number>0){
        echo "<script>alert('This Categoty Already Presented')</script>";
    }else{
        move_uploaded_file($temp_category,"./category/$category_image");
        $insert_categories="insert into `categories` (category_title,category_image) values ('$category_title','$category_image')";
        $result_query=mysqli_query($con,$insert_categories);
        if($result_query){
        echo "<script>alert('Category Successfully Added')</script>";
        }
    }
}  
?>
<div class="background">
    <p class="text-center">Add Categories</p>
</div>
<form action="" method="post" class="mb-2" enctype="multipart/form-data">
    <div class="input-group w-50 mb-4 m-auto">
        <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-receipt"></i>
        </span>
        <input type="text" class="form-control" name="cat_title" placeholder="Category Name" aria-label="Username" aria-describedby="basic-addon1" required="required">
    </div>
    <div class="input-group w-50 mb-2 m-auto">
        <input type="file" class="form-control" name="cat_image" required="required">
    </div>
    <div class="input-group w-50 mb-2 m-auto">
        <button type="submit" name="insert_cat" required="required" class="btn btn-primary">Add </button>
    </div>
</form>