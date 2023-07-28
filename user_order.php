<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders</title>
</head>
<style>
    .text-center{
        text-align : center;
        margin-bottom: 20px;
    }
</style>
<body>
    <?php
    $username=$_SESSION['username'];
    $get_user="select * from `user_table` where user_name='$username'";
    $result=mysqli_query($con,$get_user);
    $row_fetch=mysqli_fetch_assoc($result);
    $user_id=$row_fetch['user_id'];
    ?>
    <h3 class="title">Your Orders</h3>
    <div class="small-container">
        <?php
        $get_order_details="select * from `user_orders` where user_id=$user_id";
        $result_order=mysqli_query($con,$get_order_details);
        $order_check = mysqli_num_rows($result_order);
        if($order_check>0){
            echo "<table>
            <tr>
                <th>S.No</th>
                <th>Order No</th>
                <th>Amount Due</th>
                <th>Total Product</th>
                <th>Invoice Number</th>
                <th>Date</th>
                <th>Complete/Incomplete</th>
                <th>Status</th>
            </tr>";
        }else{
            echo "<h2 class='text-center'>No Orders Yet</h2>";
        }
        $number=1;
        while($row_order=mysqli_fetch_assoc($result_order)){
            $order_id=$row_order['order_id'];
            $amount_due=$row_order['amount_due'];
            $invoice_number=$row_order['invoice_number'];
            $total_products=$row_order['total_products'];
            $order_data=$row_order['order_date'];
            $order_status=$row_order['order_status'];
            if($order_status=='pending'){
                $order_status='Incomplete';
            }else{
                $order_status='complete';
            }
            echo "<tr>
                    <td>$number</td>
                    <td>$order_id</td>
                    <td>$amount_due</td>
                    <td>$total_products</td>
                    <td>$invoice_number</td>
                    <td>$order_data</td>
                    <td>$order_status</td>";
                    ?>
                    <?php
                    if($order_status=='complete'){
                        echo "<td>Paid</td>";
                    }else{
                        echo "<td><a href='confirm_payment.php?order_id=$order_id'>Confirm</a></td></tr>";
                    }   
            $number++;
        }
        ?>

    </table>
    </div>
</body>
</html>