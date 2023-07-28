<?php
session_start();
session_unset();
session_destroy();
echo "<script>alert('Admin Logout Successful')</script>";
echo "<script>window.open('admin_login.php','_self')</script>";
?>