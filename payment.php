<?php
include('include/connect.php');
include('Functions/functions.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Payment</title>
        <link rel="stylesheet" href="stylesheet.css">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
</head>
<style>
.row{
        justify-content:center;
}
.column img{
        padding:80px;
}
.column a{
        margin-left:50px;
        text-decoration:none;
        font-size:20px;
}
</style>
<body>
        <?php
        $user_ip=getIPAddress();
        $get_user="select * from `user_table` where user_ip='$user_ip'";
        $result=mysqli_query($con,$get_user);
        $run_query=mysqli_fetch_array($result);
        $user_id=$run_query['user_id'];
        ?>
        <div class="small-container">
                <h2 class="title">Payment Options</h2>
                <div class="main">
                        <div class="row">
                                <div class="column">
                                     <a href="https://www.paypal.com/" target="_blank"><img src="images/upi.png"></a>
                                </div>
                                <div class="column">
                                        <a href="order.php?user_id=<?php echo $user_id ?>">Cash ON Delivery</a>
                                </div>
                        </div>
                </div>
        </div>
</body>
</html>