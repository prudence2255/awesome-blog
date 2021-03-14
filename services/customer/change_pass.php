

<h1 class="heading">Change Password</h1>
<form action="" method="post" class="customer_form">
<div class="form-group row">
<label for="" class="control-label col-md-2">Enter Current Password</label>
<div class="col-md-4">
<input required type="text" name="old_pass" class="form-control" placeholder="Enter Current Password">
</div>
</div>
<div class="form-group row">
<label for="" class="control-label col-md-2">Enter New Password</label>
<div class="col-md-4">
<input required type="text" name="new_pass" class="form-control" placeholder="Enter Current Password">
</div>
</div>
<div class="form-group row">
<label for="" class="control-label col-md-2">Confirm New Password</label>
<div class="col-md-4">
<input required type="text" name="c_new_pass" class="form-control" placeholder="Confirm New Password">
</div>
</div>
<div class="form-group row">
<label for="" class="control-label col-md-2"></label>
<div class="col-md-4">
<input type="submit" name="submit" class="form-control btn btn-primary">
</div>
</div>
</form>

<?php  
if(isset($_POST['submit'])) {
    $get_email = $_SESSION['customer_email'];
    $old_pass = mysqli_real_escape_string($con, $_POST['old_pass']);
    $new_pass = mysqli_real_escape_string($con, $_POST['new_pass']);
    $c_new_pass = mysqli_real_escape_string($con, $_POST['c_new_pass']);

    $get_pass = "SELECT * FROM customers WHERE customer_pass = '$old_pass'";

    $run_old_pass = mysqli_query($con, $get_pass);

    $check_old_pass = mysqli_num_rows($run_old_pass);

    if($check_old_pass == 0) {
        echo "<script>alert('Your Old Password Is Not Valid, Please Try Again')</script>";
        exit();
    }
    if($new_pass !== $c_new_pass) {
        echo "<script>alert('Password Did Not Match, Please Try Again')</script>";
        exit();
    }
    else{
        $update_pass = "UPDATE customers SET customer_pass = '$new_pass' WHERE customer_email = 
                    '$get_email'";
        $run_pass = mysqli_query($con, $update_pass);
        
        if($run_pass) {
            echo "<script>alert('Your Password Has Been Changed')</script>";
            echo "<script>window.open('my_account.php?send_order', '_self')</script>";
        }
    }

}
?>