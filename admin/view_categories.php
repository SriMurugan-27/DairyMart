<h3 class="text-center text-success">All Categories</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-danger text-light">
        <tr>
            <th>Category ID</th>
            <th>Category Image</th>
            <th>Category Title</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $get_category="select * from `categories`";
        $result_category=mysqli_query($con,$get_category);
        while($row_categories=mysqli_fetch_assoc($result_category)){
            $category_id=$row_categories['category_id'];
            $category_title=$row_categories['category_title'];
            $category_image=$row_categories['category_image'];
            ?>
            <tr class="text-center">
                <td><?php echo $category_id ?></td>
                <td><?php echo $category_title ?></td>
                <td><img src="category/<?php echo $category_image ?>" width="60px" height="90px"></td>
                <td><a href="index.php?edit_categories=<?php echo $category_id ?>"><i class="fa-solid fa-pen-to-square"></i></a></td>
                <td><a href="index.php?delete_categories=<?php echo $category_id ?>"><i class="fa-solid fa-trash"></i></a></td>
            </tr>
            <?php
        }
        ?>
    </tbody>
</table>