<?php
include('../include/connect.php');
include('../Functions/function.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Registeration</title>
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
        <h2 class="text-center mb-5">Admin Registeration</h2>
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-lg-6 col-xl-5">
                <img src="../images/admin_register.png" alt="" class="img-fluid">
            </div>
            <div class="col-lg-6 col-xl-4">
                <form action="" method="post">
                    <div class="form-outline mb-4 justify-content-center">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" name="username" id="username" class="form-control" placeholder="Enter Username">
                    </div>
                    <div class="form-outline mb-4">
                        <label for="Email" class="form-label">Email</label>
                        <input type="email" name="Email" id="Email" class="form-control" placeholder="Enter Email">
                    </div>
                    <div class="form-outline mb-4">
                        <label for="Password" class="form-label">Password</label>
                        <input type="password" name="Password" id="Password" class="form-control" placeholder="Enter Password">
                    </div>
                    <div class="form-outline mb-4">
                        <label for="con_pass" class="form-label">Confirm Password</label>
                        <input type="password" name="con_pass" id="con_pass" class="form-control" placeholder="Enter Confirm Password">
                    </div>
                    <div class="form-outline mb-4">
                        <input type="submit" name="admin_register"  class="btn btn-primary text-light" value="Register">
                        <p class="small mt-3 fw-bold">Already have a Account?<a href="admin_login.php" class="text-decoration-none text-danger">Login</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php
if (isset($_POST['admin_register'])) {
    $username = $_POST['username'];
    $Email = $_POST['Email'];
    $Password = $_POST['Password'];
    $hash_password = password_hash($Password, PASSWORD_DEFAULT);
    $con_pass = $_POST['con_pass'];

    // Perform proper database connection before executing queries
    // $con = mysqli_connect("your_host", "your_username", "your_password", "your_database");
    // Replace the above line with the actual connection details

    // Sanitize user inputs and use prepared statements to prevent SQL injection
    $username = mysqli_real_escape_string($con, $username);
    $Email = mysqli_real_escape_string($con, $Email);

    $select_query = "SELECT * FROM `admin_table` WHERE admin_name='$username' OR admin_email='$Email'";
    $result = mysqli_query($con, $select_query);
    $row = mysqli_num_rows($result);

    if ($row > 0) {
        echo "<script>alert('Username or Email Already Exist')</script>";
    } else if ($Password != $con_pass) {
        echo "<script>alert('Password do not match')</script>";
    } else {
        $insert_query = "INSERT INTO `admin_table` (admin_name, admin_email, admin_password) VALUES ('$username', '$Email', '$hash_password')";
        $result_insert = mysqli_query($con, $insert_query);
        if ($result_insert) {
            echo "<script>alert('Admin Registered Successfully')</script>";
        }
    }
}
?>

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script> 
</body>
</html>