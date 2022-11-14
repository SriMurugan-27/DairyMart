<h3 class="text-center text-success">All Brands</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-danger text-light">
        <tr>
            <th>Brand No</th>
            <th>Brand Name</th>
            <th>Brand Image</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        <tbody>
            <?php
            $select_brands="select * from `brands`";
            $result_brand=mysqli_query($con,$select_brands);
            while($row_brand=mysqli_fetch_assoc($result_brand)){
                $brand_id=$row_brand['brand_id'];
                $brand_name=$row_brand['brand_name'];
                $brand_logo=$row_brand['brand_logo'];
                ?>
                <tr class="text-center">
                    <td><?php echo $brand_id ?></td>
                    <td><?php echo $brand_name ?></td>
                    <td><img src="brand/<?php echo $brand_logo ?>" width="80px" height="50px"></td>
                    <td><a href="index.php?edit_brand=<?php echo $brand_id ?>"><i class="fa-solid fa-pen-to-square"></i></a></td>
                    <td><a href="index.php?delete_brand=<?php echo $brand_id ?>"><i class="fa-solid fa-trash"></i></a></td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </thead>
</table>