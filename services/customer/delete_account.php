<h2 class="heading">Do You Really Want To Delete Your Account!</h2>
<div class="row mt-5">
<div class="mx-auto clearfix col-md-6">
    <form action="" method="post">
    <button class="btn btn-sm btn-danger float-right p-2" type="submit" name="yes">
    Yes, I Want To Delete
</button>
<button class="btn btn-sm btn-success float-left p-2" type="submit" name="no">
    No, I Don't Want To Delete
</button>
    </form>

</div>
</div>
<?php 
if(isset($_POST['yes'])) {
    $get_email = $_SESSION['customer_email'];

    $delete_customer = "DELETE FROM customers WHERE customer_email = '$get_email'";

    $run_delete = mysqli_query($con, $delete_customer);
    if($run_delete) {
        session_destroy();
        echo "<script>alert('Your Account Has Been Deleted')</script>";
        echo "<script>window.open('../index.php', '_self')</script>";
    }
}

if(isset($_POST['no'])) {
    echo "<script>window.open('my_account.php?send_order', '_self')</script>";
}
?>