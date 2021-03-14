<h1 class="heading">Please Confirm Your Payment</h1>

<form action="" method="post" class="customer_form" id="form">
    <div class="form-group row">
<label for="" class="control-label col-md-3">Invoice No:</label>
<div class="col-md-4">
    <input type="text" class="form-control" name="incoice_no" required>
</div>
    </div>
    <div class="form-group row">
<label for="" class="control-label col-md-3">Amount Sent:</label>
<div class="col-md-4">
    <input type="text" class="form-control" name="amount" placeholder="Amount" required>
</div>
    </div>
    <div class="form-group row">
<label for="" class="control-label col-md-3">Select Payment Mode:</label>
<div class="col-md-4">
    <select name="payment_mode" id="" class="form-control" required>
        <option value="">Select Payment</option>
        <option value="mobile money">Mobile Money</option>
        <option value="western unoin">Western union</option>
    </select>
</div>
    </div>
    <div class="form-group row">
<label for="" class="control-label col-md-3">Transaction / Reference ID:</label>
<div class="col-md-4">
    <input type="text" class="form-control" name="ref_no" placeholder="Reference_Id" required>
</div>
    </div>
    
    <div class="form-group row">
<label for="" class="control-label col-md-3">Payment Date:</label>
<div class="col-md-4">
    <input type="text" class="form-control" name="payment_date" placeholder="Payment Date" required>
</div>
    </div>
    
    <div class="form-group row">
<label for="" class="control-label col-md-3"></label>
<div class="col-md-4">
    <input type="submit"  class="form-control btn btn-primary" name="confirm_payment" value="confirm payment">
</div>
</div>
</form>

<?php 
if(isset($_POST['confirm_payment'])) {
    $invoice_no = mysqli_real_escape_string($con, $_POST['invoice_no']);
    $amount = mysqli_real_escape_string($con, $_POST['amount']);
    $payment_mode = mysqli_real_escape_string($con, $_POST['payment_mode']);
    $ref_no = mysqli_real_escape_string($con, $_POST['ref_no']);
    $payment_date = mysqli_real_escape_string($con, $_POST['payment_date']);

    $insert_payment = "INSERT INTO payments (invoice_no, amount, payment_mode, ref_no, payment_date)
                       VALUES ('$invoice_no', '$amount', '$payment_mode', '$ref_no', '$payment_date')";
    $run_payment = mysqli_query($con, $insert_payment);

    if($run_payment) {
        echo 
        "<script>alert('you will recieve a confirmation message in your account with 24 hours')</script>";
        echo "<script>window.open('my_account.php?confirm_payment', '_self')</script>";
    }

}
?>