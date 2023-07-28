<?php
include('include/connect.php');
session_start();

if(isset($_GET['order_id'])){
    $order_id = $_GET['order_id'];
    $select_data = "SELECT * FROM `user_orders` WHERE order_id=$order_id";
    $result = mysqli_query($con, $select_data);
    $row_fetch = mysqli_fetch_assoc($result);
    $invoice_number = $row_fetch['invoice_number'];
    $amount_due = $row_fetch['amount_due'];
}

if(isset($_POST['confirm'])){
    $invoice_number = $_POST['invoice_number'];
    $amount = $_POST['amount'];
    $payment_mode = $_POST['payment_mode'];

    // Validate the amount and payment_mode if needed
    // ...

    $insert_query = "INSERT INTO `user_payments` (order_id, invoice_number, amount, payments_mode, date) VALUES
    ($order_id, $invoice_number, $amount, '$payment_mode', NOW())";

    $result = mysqli_query($con, $insert_query);

    if($result){
        echo "<script>alert('Payment Success')</script>";
        echo "<script>window.open('profile.php?orders','_self')</script>";

        // Update the order status to 'Complete'
        $update_orders = "UPDATE `user_orders` SET order_status='Complete' WHERE order_id=$order_id";
        $result_orders = mysqli_query($con, $update_orders);
    } else {
        echo "<script>alert('Payment Failed')</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirm Payemnt</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body class="bg-secondary">
    <h1 class="text-center text-light">Confirm Payment</h1>
    <div class="container my-5">
        <form action="" method="post">
            <div class="form-outline my-4 text-center w-50 m-auto">
            <label for="" class="text-light">Invoice Number</label>
                <input type="text" class="form-control w-50 m-auto" name="invoice_number" value="<?php echo $invoice_number ?>">
            </div>
            <div class="form-outline my-4 text-center w-50 m-auto">
                <label for="" class="text-light">Amount</label>
                <input type="text" class="form-control w-50 m-auto" name="amount" value="<?php echo $amount_due ?>">
            </div>
            <div class="form-outline my-4 text-center w-50 m-auto">
                <select name="payment_mode" class="form-select w-50 m-auto">
                    <option>Gpay/Phonepay</option>
                    <option>UPI</option>
                    <option>NetBanking</option>
                    <option>Paypal</option>
                    <option>Cash On Delivery</option>
                </select>
            </div>
            <div class="form-outline my-4 text-center w-50 m-auto">
                <input type="submit" name="confirm" class="bg-success py-2 px-3 border-0" value="Confirm">
            </div>
        </form>
    </div>
</body>
</html>