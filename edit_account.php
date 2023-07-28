<?php
if(isset($_GET['edit_account'])){
    $user_session_name=$_SESSION['username'];
    $select_query="select * from `user_table` where user_name='$user_session_name'";
    $result_query=mysqli_query($con,$select_query);
    $row_fetch=mysqli_fetch_assoc($result_query);
    $user_id=$row_fetch['user_id'];
    $user_name=$row_fetch['user_name'];
    $user_email=$row_fetch['user_email'];
    $user_address=$row_fetch['user_address'];
    $user_mobile=$row_fetch['user_mobile'];
}

    if(isset($_POST['user_update'])){
        $update_id=$user_id;
        $user_name=$_POST['update_name'];
        $user_email=$_POST['update_email'];
        $user_address=$_POST['update_address'];
        $user_mobile=$_POST['update_contact'];
        $user_image=$_FILES['update_image']['name'];
        $user_image_temp=$_FILES['update_image']['tmp_name'];
        move_uploaded_file($user_image_temp,"images/$user_image");

        $update_data="update `user_table` set user_name='$user_name',user_email='$user_email',user_image='$user_image',
        user_address='$user_address',user_mobile='$user_mobile' where user_id=$update_id";
        $result_update=mysqli_query($con,$update_data);
        if($result_update){
            echo "<script>alert('Account Updated Successfully')</script>"; 
            echo "<script>window.open('logout.php','_self')</script>"; 
        }
    }
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Account</title>
</head>
<body>
    <h3 class="title">Edit Account</h3>
    <div class="small-container">
    <form action="" method="post" enctype="multipart/form-data">
        <input type="text" name="update_name" value="<?php echo $user_name ?>">
        <input type="email" name="update_email" value="<?php echo $user_email ?>">
        <input type="file" name="update_image"><img src="user_image/<?php echo $row_image ?>" padding-right="20px" width="50px" height="50px">
        <input type="text" name="update_address" value="<?php echo $user_address ?>">
        <input type="text" name="update_contact" value="<?php echo $user_mobile ?>">
        <button type="submit" class="btn" name="user_update">Update</button>
    </form>
    </div>
</body>
</html>