
<?php 
if(isset($_GET['edit_account'])) {
    $get_email = $_SESSION['customer_email'];

    $get_customer  = "SELECT * FROM customers WHERE customer_email = '$get_email'";

    $run_customer = mysqli_query($con, $get_customer);

    $row_customer = mysqli_fetch_array($run_customer);

    $customer_id = $row_customer['customer_id'];
    $customer_name = $row_customer['customer_name'];
    $customer_email = $row_customer['customer_email'];
    $customer_country = $row_customer['customer_country'];
    $customer_city = $row_customer['customer_city'];
    $customer_contact = $row_customer['customer_contact'];
    $customer_address = $row_customer['customer_address'];
    $customer_image = $row_customer['customer_image'];
  
}
?>

<h1 class="heading">Edit Your Account</h1>

<form action="" method="post" class="customer_form" enctype="multipart/form-data">
<div class="form-group row">
<label for="" class="col-md-2 control-label">Name</label>
<div class="col-md-4">
<input type="text" name="c_name" value="<?php echo $customer_name ?>" class="form-control">
</div>
</div>
<div class="form-group row">
<label for="" class="col-md-2 control-label">Email </label>
<div class="col-md-4">
<input type="email" name="c_email" value="<?php echo $customer_email ?>" class="form-control">
</div>
</div>
<div class="form-group row">
<label for="" class="col-md-2 control-label">Country</label>
<div class="col-md-4">
<input type="text" name="c_country" value="<?php echo $customer_country ?>" class="form-control">
</div>
</div>
<div class="form-group row">
<label for="" class="col-md-2 control-label">City</label>
<div class="col-md-4">
<input type="text" name="c_city" value="<?php echo $customer_city ?>" class="form-control">
</div>
</div>
<div class="form-group row">
<label for="" class="col-md-2 control-label">Contact</label>
<div class="col-md-4">
<input type="text" name="c_contact" value="<?php echo $customer_contact ?>" class="form-control">
</div>
</div>
<div class="form-group row">
<label for="" class="col-md-2 control-label">Address</label>
<div class="col-md-4">
<input type="text" name="c_address" value="<?php echo $customer_address?>" class="form-control">
</div>
</div>
<div class="form-group row">
<label for="" class="col-md-2 control-label">Image</label>
<div class="col-md-4">
<input type="file" name="c_image" class="form-control"><br>
<img src="customer_images/<?php echo $customer_image ?>" alt="" style="width:50px; height:50px">
</div>
</div>
<div class="form-group row">
<label for="" class="col-md-2 control-label"></label>
<div class="col-md-4">
<input type="submit" name="update" value="update" class="form-control  btn btn-primary">
</div>
</div>
</form>

<?php 
    if(isset($_POST['update'])) {
        $c_id = $customer_id;
        $c_name = $_POST['c_name'];
    $c_email = $_POST['c_email'];
    $c_country = $_POST['c_country'];
    $c_city = $_POST['c_city'];
    $c_contact = $_POST['c_contact'];
    $c_address = $_POST['c_address'];

    $c_image = $_FILES['c_image']['name'];
    $c_image_tmp = $_FILES['c_image']['tmp_name'];

    if(empty($c_image)) {
        $c_image = $customer_image['c_image'];
    }
    move_uploaded_file($c_image_tmp, "customer_images/$c_image");

    $update_customer = "UPDATE customers SET customer_name = '$c_name', customer_email='$c_email',
                        customer_country='$c_country', customer_city='$c_city', customer_contact=
                        '$c_contact', customer_address='$c_address', customer_image='$c_image'
                        WHERE customer_id = '$customer_id'";
               
      $run_customer = mysqli_query($con, $update_customer);
      
      if($run_customer) {
          echo "<script>alert('Your Acount Has Been Updated, Login again')</script>";
        echo "<script>window.open('logout.php', '_self')</script>";
      }
    }

    ?>