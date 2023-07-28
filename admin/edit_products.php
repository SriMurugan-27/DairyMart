<?php
if(isset($_GET['edit_products'])){
    $edit_id=$_GET['edit_products'];
    $get_data="select * from `products` where product_id=$edit_id";
    $result=mysqli_query($con,$get_data);
    $row=mysqli_fetch_assoc($result);
    $product_title=$row['product_title'];
    $product_description=$row['product_description'];
    $product_keyword=$row['product_keyword'];
    $category_id=$row['category_id'];
    $brand_id=$row['brand_id'];
    $product_image=$row['product_image'];
    $Product_price=$row['Product_price'];


    $select_cat="select * from `categories` where category_id=$category_id";
    $result_cat=mysqli_query($con,$select_cat);
    $row_category=mysqli_fetch_assoc($result_cat);
    $category_title=$row_category['category_title'];
    //echo $category_title;       


    $select_brand="select * from `brands` where brand_id=$brand_id";
    $result_brand=mysqli_query($con,$select_brand);
    $row_brand=mysqli_fetch_assoc($result_brand);
    $brand_name=$row_brand['brand_name'];
    // echo $brand_name;
}


?>




<div class="container mt-5">
    <h3 class="text-success text-center">Edit Products</h3>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="from-outline w-50 m-auto mb-4">
            <label for="product_title" class="form-label">Product Title</label>
            <input type="text" id="product_title" name="product_title" class="form-control" value="<?php echo $product_title ?>" required="required">
        </div>
        <div class="from-outline w-50 m-auto mb-4">
            <label for="product_description" class="form-label">Product Description</label>
            <input type="text" id="product_description" name="product_description" class="form-control" value="<?php echo $product_description ?>" required="required">
        </div>
        <div class="from-outline w-50 m-auto mb-4">
            <label for="product_keywords" class="form-label">Product Keywords</label>
            <input type="text" id="product_keywords" name="product_keywords" class="form-control" value="<?php echo $product_keyword ?>" required="required">
        </div>
        <div class="from-outline w-50 m-auto mb-4">
            <label for="product_Category" class="form-label">Product Category</label>
            <select name="product_category" id="" class="form-select">
                <option value="<?php echo $category_id ?>"><?php echo $category_title ?></option>
                <?php
                    $select_cat_all="select * from `categories`";
                    $result_cat_all=mysqli_query($con,$select_cat_all);
                    while($row_category_all=mysqli_fetch_assoc($result_cat_all)){
                        $category_title_all=$row_category_all['category_title'];
                        $category_id_all=$row_category_all['category_id'];
                        echo "<option value='$category_id_all'>$category_title_all</option>";
                    }
                ?>
            </select>
        </div>
        <div class="from-outline w-50 m-auto mb-4">
            <label for="product_brands" class="form-label">Product brands</label>
            <select name="product_brands" id="" class="form-select">
                <option value="<?php echo $brand_id ?>"><?php echo $brand_name ?></option>
                <?php 
                        $select_brand_all="select * from `brands`";
                        $result_brand_all=mysqli_query($con,$select_brand_all);
                        while($row_brand_all=mysqli_fetch_assoc($result_brand_all)){
                            $brand_name_all=$row_brand_all['brand_name'];
                            $brand_id_all=$row_brand_all['btand_id'];
                            echo "<option value='$brand_id_all'>$brand_name_all</option>";
                        }  
                ?>
            </select>
        </div>
        <div class="from-outline w-50 m-auto mb-4">
            <label for="product_image" class="form-label">Product image</label>
            <div class="d-flex">
            <input type="file" id="product_image" name="product_image" class="form-control" required="required">
            <img src="product_image/<?php echo $product_image ?>" alt="" width="50px" height="50px">
            </div>
        </div>
        <div class="from-outline w-50 m-auto mb-4">
            <label for="product_price" class="form-label">Product price</label>
            <input type="text" id="product_price" name="product_price" class="form-control" value="<?php echo $Product_price ?>" required="required">
        </div>
        <div class="text-center">
            <input type="submit" name="edit_product" class="btn btn-primary px-3 mb-3" value="Update Product">
        </div>
    </form>
</div>

 <?php
if(isset($_POST['edit_product'])){
    $product_title=$_POST['product_title'];
    $product_description=$_POST['product_description'];
    $product_keywords=$_POST['product_keywords'];
    $product_category=$_POST['product_category'];
    $product_brands=$_POST['product_brands'];
    $product_image=$_FILES['product_image']['name'];
    $temp_image=$_FILES['product_image']['tmp_name'];
    $product_price=$_POST['product_price'];


    if($product_title=='' or $product_description=='' or $product_keywords=='' or $product_category=='' or $product_brands=='' or
    $product_image=='' or $product_price==''){
        echo "<script>alert('Please Fill all the Fields')</script>";
    }else{
        move_uploaded_file($temp_image,"product_image/$product_image");

        $update_product="update `products` set product_title='$product_title',product_description='$product_description',product_keyword='$product_keywords',
        category_id=$product_category,brand_id=$product_brands,product_image='$product_image',Product_price='$product_price',Date=NOW() where product_id=$edit_id";
        $result_update=mysqli_query($con,$update_product);
        if($result_update){
            echo "<script>alert('Product Updated Successfully')</script>";
            echo "<script>window.open('index.php?view_products','_self')</script>";
        }
    }
}

?>
