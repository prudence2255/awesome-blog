<?php 
session_start();
include("includes/connection.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Login</title>
    <link rel="stylesheet" type="text/css" href="css/w3.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <link rel="stylesheet" type="text/css" href="fonts/css/all.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
    <script src="fonts/js/all.js"></script>

</head>
<body>
    <div class="container">
        <form action="" method="post" class="form-login" target="_self">
            <h2 class="form-login-heading">Admin Login</h2>
            <label for="" class="sr-only">Email Address</label>
            <input type="text" required class="form-control" name="admin_email" placeholder="Email Address">
            <label class="sr-only">Password</label>
            <input type="password" required class="form-control" name="admin_pass" placeholder="Password">
            <button class="btn btn-lg btn-primary btn-block" type="submit" name="admin_login">
                Log In
            </button>
        </form>
    </div>
    
 <script src="js/jquery-3.3.1.js"></script>
 <script src="js/bootstrap.min.js"></script>
 <script src="js/index.js"></script>
</body>

</html>

<?php 
if(isset($_POST['admin_login'])) {
    $admin_email = mysqli_real_escape_string($con, $_POST['admin_email']);
    $admin_pass =  mysqli_real_escape_string($con, $_POST['admin_pass']);
    $encrypt = md5($admin_pass);
   
    $get_admin = "SELECT * FROM admins WHERE admin_email = '$admin_email' AND
                 admin_pass = '$admin_pass' ";
$run_admin = mysqli_query($con, $get_admin);
$count = mysqli_num_rows($run_admin);

if($count == 1) {
    $_SESSION['admin_email'] = $admin_email;
    echo "
    <script>alert('You are logged in into admin panel')</script>
    <script>window.open('index.php?dashboard', '_self')</script>
            ";
}else{
    echo "
    <script>alert('Email or Password invalid')</script>    
        ";
}
}
?>