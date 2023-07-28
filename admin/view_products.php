<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
</head>
<body>
    <h3 class="text-center text-success">All Products</h3>
    <table class="table table-bordered mt-5">
        <thead class="bg-danger text-light">
            <tr>            
            <th>Product ID</th>
            <th>Product Title</th>
            <th>Product Image</th>
            <th>Product Price</th>
            <th>Total Sold</th>
            <th>Status</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody>


            <?php
            $get_products="select * from `products`";
            $result=mysqli_query($con,$get_products);
            while($row=mysqli_fetch_assoc($result)){
                $product_id=$row['product_id'];
                $product_title=$row['product_title'];
                $product_image=$row['product_image'];
                $Product_price=$row['Product_price'];
                $Status=$row['Status'];
                ?>            
                <tr class="text-center">
                <td><?php echo $product_id; ?></td>
                <td><?php echo $product_title; ?></td>
                <td><img src="product_image/<?php echo $product_image; ?>" width="60px" height="90px"></td>
                <td><?php echo $Product_price; ?></td>
                <td><?php
                    $get_count="select * from `order_pending` where product_id=$product_id";
                    $result_count=mysqli_query($con,$get_count);
                    $row_count=mysqli_num_rows($result_count);
                    echo $row_count;?></td>
                <td><?php echo $Status; ?></td>
                <td><a href="index.php?edit_products=<?php echo $product_id; ?> "><i class="fa-solid fa-pen-to-square"></i></a></td>
                <td><a href="index.php?delete_product=<?php echo $product_id; ?>"><i class="fa-solid fa-trash"></i></a></td>
            </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</body>
</html>