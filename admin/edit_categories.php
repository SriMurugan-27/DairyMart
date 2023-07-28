<?php
if(isset($_GET['edit_categories'])){
    $category_id=$_GET['edit_categories'];
    //echo $category_id;
    $get_categories="select * from `categories` where category_id=$category_id";
    $result_categories=mysqli_query($con,$get_categories);
    $row_categories=mysqli_fetch_assoc($result_categories);
    $category_title=$row_categories['category_title'];
    $category_image=$row_categories['category_image'];
}
?>
<h3 class="text-success text-center">Edit Categories</h3>
<form action="" method="post" enctype="multipart/form-data">
    <div class="from-outline w-50 m-auto mb-4">
        <label for="category_image" class="form-label">Category image</label>
        <div class="d-flex">
            <input type="file" id="category_image" name="category_image" class="form-control" required="required">
            <img src="category/<?php echo $category_image ?>" alt="" width="50px" height="50px">
        </div>
    </div>
        <div class="from-outline w-50 m-auto mb-4">
            <label for="categoty_title" class="form-label">Category Title</label>
            <input type="text" id="categoty_title" name="categoty_title" class="form-control" value="<?php echo $category_title ?>" required="required">
        </div>
        <div class="text-center">
            <input type="submit" name="edit_category" class="btn btn-primary px-3 mb-3" value="Update Category">
        </div>
</form>

<?php
if(isset($_POST['edit_category'])){
    $get_category=$_POST['categoty_title'];
    $get_image=$_FILES['category_image']['name'];
    $temp_image=$_FILES['category_image']['tmp_name'];

    if($get_category=='' or $get_image==''){
        echo "<script>alert('Please Fill all the Fields')</script>";
    }else{
        move_uploaded_file($temp_image,"category/$get_image");

        $update_cat="update `categories` set category_title='$get_category',category_image='$get_image' where category_id=$category_id";
        $result_update=mysqli_query($con,$update_cat);
        if($result_update){
            echo "<script>alert('Category Updated Successfully')</script>";
            echo "<script>window.open('index.php?view_categories','_self')</script>";
        }
    }
}
?>