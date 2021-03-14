<?php 
session_start();
include("includes/db.php");
include("functions/function.php");

?>
<!DOCTYPE html>

<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Online Services</title>
    <link rel="stylesheet" type="text/css" href="css/w3.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="fonts/css/all.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
    <script src="fonts/js/all.js"></script>

</head>
<body>
    <div class="container">
        <?php include("includes/header.php") ?>
      
    </div>

   <div class="container mt-2">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title text-center"><i class="fa fa-money-check"></i> Categories</h5>
                    </div>
                    <div class="card-body">
                        <ul class=" nav flex-column nav-pills">
                            <li class="nav-item"><a href="" class="nav-link active">Graphic Designing</a></li>
                            <li class="nav-item"><a href="" class="nav-link ">Web Development</a></li>
                            <li class="nav-item"><a href="" class="nav-link ">Content Writing</a></li>
                            <li class="nav-item"><a href="" class="nav-link ">WordPress</a></li>
                            <li class="nav-item"><a href="" class="nav-link ">Photo Editing</a></li>
                            <li class="nav-item"><a href="" class="nav-link ">Seo For Websites</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-8 gray">
                <h1 class="heading">Register Here</h1>
                <form action="customer_register.php" method="post" class="customer_form" enctype="multipart/form-data">
                    <div class="form-group row">
                        <label for="" class="control-label col-md-2">Name</label>
                        <div class="col-md-4">
                            <input type="text" required name="c_name" placeholder="Full Name" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="control-label col-md-2">Email</label>
                        <div class="col-md-4">
                            <input type="email" required name="c_email" placeholder="email"  class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="control-label col-md-2">Password</label>
                        <div class="col-md-4">
                            <input type="password" required name="c_pass" placeholder="password"  class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="control-label col-md-2">Country</label>
                        <div class="col-md-4">
                            <input type="text" required name="c_country" placeholder="country"  class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="control-label col-md-2">City</label>
                        <div class="col-md-4">
                            <input type="text" required name="c_city" placeholder="city"  class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="control-label col-md-2">Contact</label>
                        <div class="col-md-4">
                            <input type="text" required name="c_contact" placeholder="contact"  class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="control-label col-md-2">Address</label>
                        <div class="col-md-4">
                            <input type="text" required name="c_address" placeholder="address"  class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="control-label col-md-2">Image</label>
                        <div class="col-md-4">
                            <input type="file" required name="c_image"   class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="control-label col-md-2"></label>
                        <div class="col-md-4">
                            <input type="submit" required name="register"  value="Register Now" class="form-control btn btn-primary">
                        </div>
                    </div>
                    
                </form>
             </div>
        </div>

   </div>






   <?php include("includes/footer.php") ?>

    <script src="js/bootstrap.bundle.js"></script>
     <script src="js/jquery-3.3.1.js"></script>
     <script src="js/bootstrap.min.js"></script>
     <script src="js/index.js"></script>
</body>

</html>

<?php 
if(isset($_POST['register'])) {
    $c_name = mysqli_real_escape_string($db, $_POST['c_name']);
    $c_email = mysqli_real_escape_string($db, $_POST['c_email']);
    $c_pass = mysqli_real_escape_string($db, $_POST['c_pass']);
    $c_country = mysqli_real_escape_string($db, $_POST['c_country']);
    $c_contact = mysqli_real_escape_string($db, $_POST['c_contact']);
    $c_address = mysqli_real_escape_string($db, $_POST['c_address']);
    $c_city = mysqli_real_escape_string($db, $_POST['c_city']);
    
   
    if(isset($_FILES['c_image'])) {
        $c_image = $_FILES['c_image']['name'];
        $c_image_tmp = $_FILES['c_image']['tmp_name'];
        move_uploaded_file($c_image_tmp, "customer/customer_images/$c_image");
    }

    $get_email = "SELECT * FROM customers WHERE customer_email = '$c_email'";

    $run_email = mysqli_query($db, $get_email);
    $row_email = mysqli_num_rows($run_email);

    if($row_email > 0) {
        echo "<script>alert('This Email is already Registered')</script>";
    }else{
        
        $insert_customer = "INSERT INTO customers (customer_name, customer_email, customer_pass,
                            customer_country, customer_city, customer_contact, customer_address
                            , customer_image) VALUES ('$c_name', '$c_email','$c_pass',
                            '$c_country', '$c_city', '$c_contact', '$c_address','$c_image')";
        $run_customer = mysqli_query($db, $insert_customer);
        
        if($run_customer) {
            $_SESSION['customer_email'] = $c_email;
            echo "<script>alert('You Have Successfully Registered, Login')</script>";
            echo "<script>window.open('index.php', '_self')</script>";
        }
    }
}
?>