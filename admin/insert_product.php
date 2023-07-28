<?php
include("../include/connect.php");
if(isset($_POST['insert_product'])){
    $product_title=$_POST['product_title'];
    $description=$_POST['description'];
    $product_keyword=$_POST['product_keyword'];
    $product_category=$_POST['product_category'];
    $product_brand=$_POST['product_brand'];
    $product_image=$_FILES['product_image']['name'];
    $temp_image=$_FILES['product_image']['tmp_name'];
    $product_price=$_POST['product_price'];
    $product_status='True';
    if($product_title=='' or $description=='' or $product_keyword=='' or $product_category=='' or $product_brand=='' or $product_image=='' or $product_price==''){
        echo "<script>alert('please fill all available fields')</script>";
    }else{
        move_uploaded_file($temp_image,"product_image/$product_image");
        $insect_product="insert into `products` (product_title,product_description,product_keyword,category_id,brand_id,product_image,Product_price,Date,Status) values 
        ('$product_title','$description','$product_keyword','$product_category','$product_brand','$product_image','$product_price',NOW(),'$product_status')";
        $result=mysqli_query($con,$insect_product);
        if($result){
            echo "<script>alert('Product Successfully Added')</script>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
</head>
<body class="bg-light">
    <div class="container mt-3">
        <h1 class="text-center">Add Products</h1>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_title" class="form-label">Product Title</label>
                <input type="text" name="product_title" id="product_title" class="form-control" placeholder="Enter Product Name" autocomplete="off" required="required">
            </div>
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="description" class="form-label">Product Description</label>
                <input type="text" name="description" id="description" class="form-control" placeholder="Enter Description" autocomplete="off" required="required">
            </div>
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_keyword" class="form-label">Product Keyword</label>
                <input type="text" name="product_keyword" id="product_keyword" class="form-control" placeholder="Enter Product Name" autocomplete="off" required="required">
            </div>
            <div class="form-outline mb-4 w-50 m-auto">
                <select name="product_category" id="" class="form-select">
                    <option value="">Select Category</option>
                    <?php
                    $select_cat="select * from `categories`";
                    $result=mysqli_query($con,$select_cat);
                    while($cat=mysqli_fetch_assoc($result)){
                        $category_title=$cat['category_title'];
                        $category_id=$cat['category_id'];
                        echo "<option value='$category_id'>$category_title</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="form-outline mb-4 w-50 m-auto">
                <select name="product_brand" id="" class="form-select">
                    <option value="">Select Brands</option>
                    <?php
                    $select_brand="select * from `brands`";
                    $result=mysqli_query($con,$select_brand);
                    while($brand=mysqli_fetch_assoc($result)){
                        $brand_title=$brand['brand_name'];
                        $brand_id=$brand['brand_id'];
                        echo "<option value='$brand_id'>$brand_title</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image" class="form-label">Product Image</label>
                <input type="file" name="product_image" id="product_image" class="form-control" required="required">
            </div>
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_price" class="form-label">Product Price</label>
                <input type="text" name="product_price" id="product_price" class="form-control" placeholder="Enter Product Price" autocomplete="off" required="required">
            </div>
            <div class="form-outline mb-4 w-50 m-auto">
                <button type="submit" name="insert_product" required="required" class="btn btn-primary">Add Product</button>
            </div>
        </form>
        <p class="small mt-3 fw-bold text-center">Back To Dashboard - <a href="index.php" class="text-decoration-none text-danger">Click Here</a></p>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>