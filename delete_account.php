<h3 class="title">Confirm Your Delete Account</h3>
    <div class="small-container">
        <form action="" method="post">
            <button type="submit" name="yes" class="btn">Yes</button>
            <button type="submit" name="no" class="btn">No</button>
        </form>
    </div>

    <?php
    $username_session=$_SESSION['username'];
    if(isset($_POST['yes'])){
        $delete_query="Delete from `user_table` where user_name='$username_session'";
        $result=mysqli_query($con,$delete_query);
        if($result){
            session_destroy();
            echo "<script>alert('Account Deleted Successfully')</script>";
            echo "<script>window.open('index.php','_self')</script>";
        }
    }
    if(isset($_POST['no'])){
        echo "<script>window.open('profile.php','_self')</script>";
    }
    ?>