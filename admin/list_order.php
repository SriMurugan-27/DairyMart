<h3 class="text-center text-success">All Order</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-danger text-light">
        <?php
        $get_orders="select * from `user_orders`";
        $result=mysqli_query($con,$get_orders);
        $row_count=mysqli_num_rows($result);

        if($row_count==0){
            echo "<h2 class='text-center text=danger'>No Orders Yet</h2>";
        }else{
            echo "        
            <tr>
            <th>Order No</th>
            <th>Amount</th>
            <th>Invoice Number</th>
            <th>Total Products</th>
            <th>Order Date</th>
            <th>Status</th>
            <th>Delete</th>
            </tr>";
            $number=0;
            while($row_data=mysqli_fetch_assoc($result)){
            $order_id=$row_data['order_id'];
            $user_id=$row_data['user_id'];
            $amount_due=$row_data['amount_due'];
            $invoice_number=$row_data['invoice_number'];
            $total_products=$row_data['total_products'];
            $order_data=$row_data['order_date'];
            $order_status=$row_data['order_status'];
            $number++;
            ?>
<tbody>
<tr>
            <td><?php echo $order_id ?></td>
            <td><?php echo $amount_due ?></td>
            <td><?php echo $invoice_number ?></td>
            <td><?php echo $total_products ?></td>
            <td><?php echo $order_data ?></td>
            <td><?php echo $order_status ?></td>
            <td><a href="index.php?delete_order=<?php echo $order_id ?>"><i class="fa-solid fa-trash"></i></a></td>
            </tr>
</tbody>
<?php
        }
        }
        ?>
    </thead>
</table>