<div class="form-login">
    <h1>Login Area</h1>
    <br>
    <form action="order_now.php" method="post">
        <input type="email" placeholder="Email" name="c_email">
        <input type="password" placeholder="Password" name="c_password">
        <button type="submit" name="login" class="btn ">Login</button>
        <p class="message"><a href="order_now.php?forgot_pass">Forgot Password</a></p>
        <p class="message">Not Registered? <a href="customer_register.php">
            Create an account
        </a></p>
    </form>
</div>

<?php 
if(isset($_GET['forgot_pass'])):
?>
<div class="w3-center">
    <h3 class="heading">Enter Your Email Below, We Will Send You, Your Password</h3>

    <form action="" method="post">
        <div class="form-group">
        <input type="text" class="form-control" placeholder="Enter Your Email" name="c_email">
        </div>
       <button type="submit" name="c_submit" class="btn btn-primary">Send me password</button>
    </form>
</div>
<?php endif; ?>

<?php 
if(isset($_POST['c_submit'])) {
    $c_email = mysqli_real_escape_string($db, $_POST['c_email']);
    $select_email = "SELECT * FROM customers WHERE customer_email = '$c_email'";
    $select_c = mysqli_query($db, $select_email);

    $run_email = mysqli_num_rows($select_c);
    if($run_email == 0) {
        echo "<script>alert('Email Not Registered')</script>";
        exit();
    }else{
        $row_c = mysqli_fetch_array($select_c);
        $c_name = $row_c['customer_name'];
        $c_pass = $row_c['customer_pass'];
        $c_email = $row_c['customer_email'];
        $from = "www.enthusiast.com";
        $subject = "Your Password";
        $message =" <html>
                    <center>
                    <h2>Your requested rassword has been sent to your mailbox</h2>
                    <h3>Dear $c_name</h3>
                    <h4>Your requested password is: <b>$c_pass</b> </h4>
                    <h5>Thank you for using our website</h5>
                    </center>
                    </html>";
         $headers = "From: $from\r\n";
         $headers .= "Content-type: text/html\r\n";
         
         mail($c_email, $subject, $message, $headers);

         echo "<script>alert('Your Password has been sent to your email, check your inbox')</script>";
         echo "<script>window.open('order_now.php','_self')</script>";
    }




}
?>


<?php 
if(isset($_POST['login'])) {
    $c_email = mysqli_real_escape_string($db, $_POST['c_email']);
    $c_pass = mysqli_real_escape_string($db, $_POST['c_password']);

    $select_customer = "SELECT * FROM customers WHERE customer_email = '$c_email' AND customer_pass = '$c_pass'";
    $run_customer = mysqli_query($db, $select_customer);
    $row_customer = mysqli_num_rows($run_customer);

    if($row_customer == 0) {
        echo "<script>alert('Password or Email is Invalid')</script>";
    }else {
        $_SESSION['customer_email'] = $c_email;
        echo "<script>alert('You Have Successfuly Logged In')</script>";
        echo "<script>window.open('customer/my_account.php?send_order', '_self')</script>";
    }
}

?>