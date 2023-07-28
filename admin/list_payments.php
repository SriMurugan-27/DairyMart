<h3 class="text-center text-success">All Payments</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-danger text-light">
        <?php
        $get_payments="select * from `user_payments`";
        $result=mysqli_query($con,$get_payments);
        $row_count=mysqli_num_rows($result);

        if($row_count==0){
            echo "<h2 class='text-center text=danger'>No Payments received Yet</h2>";
        }else{
            echo "        
            <tr>
            <th>Order No</th>
            <th>Amount</th>
            <th>Invoice Number</th>
            <th>Payment Mode</th>
            <th>Payment Date</th>
            <th>Delete</th>
            </tr>";
            $number=0;
            while($row_data=mysqli_fetch_assoc($result)){
            $payment_id=$row_data['payment_id'];
            $order_id=$row_data['order_id'];
            $invoice_number=$row_data['invoice_number'];
            $amount=$row_data['amount'];
            $payment_mode=$row_data['payments_mode'];
            $date=$row_data['date'];
            $number++;
            ?>
<tbody>
<tr>
            <td><?php echo $order_id ?></td>
            <td><?php echo $amount ?></td>
            <td><?php echo $invoice_number ?></td>
            <td><?php echo $payment_mode ?></td>
            <td><?php echo $date ?></td>
            <td><a href="index.php?delete_payment=<?php echo $payment_id ?>"><i class="fa-solid fa-trash"></i></a></td>
            </tr>
</tbody>
<?php
        }
        }
        ?>
    </thead>
</table>