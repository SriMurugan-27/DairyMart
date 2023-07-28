<h3 class="text-center text-success">All Users</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-danger text-light">
        <?php
        $get_users="select * from `user_table`";
        $result=mysqli_query($con,$get_users);
        $row_count=mysqli_num_rows($result);

        if($row_count==0){
            echo "<h2 class='text-center text=danger'>No User registered Yet</h2>";
        }else{
            echo "        
            <tr>
            <th>User No</th>
            <th>Customer Name</th>
            <th>Email</th>
            <th>User Image</th>
            <th>IP Address</th>
            <td>Address</td>
            <th>Mobile</th>
            <th>Delete</th>
            </tr>";
            $number=0;
            while($row_data=mysqli_fetch_assoc($result)){
            $user_id=$row_data['user_id'];
            $user_name=$row_data['user_name'];
            $user_email=$row_data['user_email'];
            $user_image=$row_data['user_image'];
            $user_ip=$row_data['user_ip'];
            $user_address=$row_data['user_address'];
            $user_mobile=$row_data['user_mobile'];
            $number++;
            ?>
<tbody>
<tr>
            <td><?php echo $number ?></td>
            <td><?php echo $user_name ?></td>
            <td><?php echo $user_email ?></td>
            <td><img src="../images/<?php echo $user_image ?>" width="50px" height="50px"></td>
            <td><?php echo $user_ip ?></td>
            <td><?php echo $user_address ?></td>
            <td><?php echo $user_mobile ?></td>
            <td><a href="index.php?delete_user=<?php echo $user_id ?>"><i class="fa-solid fa-trash"></i></a></td>
            </tr>
</tbody>
<?php
        }
        }
        ?>
    </thead>
</table>