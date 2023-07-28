<?php
include('../include/connect.php');
include('../Functions/function.php');
@session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
</head>
<style>
    body{
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        overflow:hidden;
    }
</style>
<body>
    <div class="container-fluid m-3">
        <h2 class="text-center mb-5">Admin Login</h2>
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-lg-6 col-xl-5">
                <img src="../images/admin_login.png" alt="" class="img-fluid">
            </div>
            <div class="col-lg-6 col-xl-4">
                <form action="" method="post">
                    <div class="form-outline mb-4">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" name="username" id="username" class="form-control" placeholder="Enter Username">
                    </div>
                    <div class="form-outline mb-4">
                        <label for="Password" class="form-label">Password</label>
                        <input type="password" name="Password" id="Password" class="form-control" placeholder="Enter Password">
                    </div>
                    <div class="form-outline mb-4">
                        <input type="submit" name="admin_login"  class="btn btn-primary text-light" value="Login">
                        <p class="small mt-3 fw-bold">Don't you have a Account?<a href="admin_register.php" class="text-decoration-none text-danger">Register</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php
    if(isset($_POST['admin_login'])){
        $username=$_POST['username'];
        $Password=$_POST['Password'];
        $select_query="select * from `admin_table` where admin_name='$username'";
        $result=mysqli_query($con,$select_query);
        $row_count=mysqli_num_rows($result);
        $data=mysqli_fetch_assoc($result);
        if($row_count>0){
            $_SESSION['username']=$username;
            if(password_verify($Password,$data['admin_password'])){
                $_SESSION['username']=$username;
                echo "<script>alert('Admin Login Successful')</script>";
                echo "<script>window.open('index.php','_self')</script>";
            }else{
                echo "<script>alert('Invalid Password')</script>";
            }
        }else{
            echo "<script>alert('Invalid Credntials')</script>";
        }
    }
    ?>

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script> 
</body>
</html>