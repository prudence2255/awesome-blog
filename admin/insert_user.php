<?php 
@session_start();
include("includes/connection.php");

if(!isset($_SESSION['admin_email'])):
    echo "
        <script>window.open('login.php', '_self')</script>
        ";
else:

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Insert user</title>
</head>
<body>
<div class="row">
        <div class="col-lg-12">
            <ol class="breadcrumb">
                <li><i class="material-icons">dashboard</i>Dashboard / Insert User</li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
        <div class="card">
           <div class="card-header text-center">
           <h3 class="card-title"><i></i>Insert User</h3>
           </div>
            <div class="card-body">
                <form action="" method="post" class="w-50 mx-auto" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="" class="control-label">User Name</label>
                        <input type="text" class="form-control w3-card-2" name="user_name" required>
                    </div>
                    <div class="form-group">
                        <label for="" class="control-label">User Email</label>
                        <input type="email" class="form-control w3-card-2" name="user_email" required>
                    </div>
                    <div class="form-group">
                        <label for="" class="control-label">User password</label>
                        <input type="password" class="form-control w3-card-2" name="user_pass" required>
                    </div>
                    <div class="form-group">
                        <label for="" class="control-label">User Image</label>
                        <input type="file" class="form-control w3-card-2" name="user_image" required>
                    </div>
                    <div class="form-group">
                        <label for="" class="control-label">User Contact</label>
                        <input type="text" class="form-control w3-card-2" name="user_contact" required>
                    </div>
                    <div class="form-group">
                        <label for="" class="control-label">User Country</label>
                        <input type="text" class="form-control w3-card-2" name="user_country" required>
                    </div>
                    <div class="form-group">
                        <label for="" class="control-label">User Job</label>
                        <input type="text" class="form-control w3-card-2" name="user_job" required>
                    </div>
                    <div class="form-group">
                        <label for="" class="control-label">User About</label>
                        <textarea type="text" class="form-control w3-card-2" name="user_about" required></textarea>
                    </div>
                    <div class="form-group">
                       <input type="submit" class="w3-btn btn-primary" name="submit">
                    </div>
                </form>
            </div>
        </div>  
        </div>
         
    </div>
</body>
</html>
<?php 
if(isset($_POST['submit'])) {
    $user_name = $_POST['user_name'];
    $user_email = $_POST['user_email'];
    $user_pass = $_POST['user_pass'];
    $user_contact = $_POST['user_contact'];
    $user_country = $_POST['user_country'];
    $user_job = $_POST['user_job'];
    $user_about = $_POST['user_about'];

if(isset($_FILES['user_image'])){
    $user_image = $_FILES['user_image']['name'];
    $user_image_tmp = $_FILES['user_image']['tmp_name'];
    move_uploaded_file($user_image_tmp, "admin_images/$user_image");

}

$check_user = "SELECT * FROM admins WHERE admin_email = '$user_email'";
$check_query = mysqli_query($con, $check_user);
$count_user = mysqli_num_rows($check_query);
if($count_user == 0) {
    $insert_user = "INSERT INTO admins (admin_name, admin_email,admin_pass, admin_image, admin_contact, admin_country,
                                admin_job, admin_about)
                    VALUES('$user_name', '$user_email', '$user_pass','$user_image', '$user_contact',
                            '$user_country', '$user_job', '$user_about')";
     $insert_user_query = mysqli_query($con, $insert_user);
     

     if($insert_user_query) {
         echo "<script>alert('user added successfully')</script>";
         echo "<script>window.open('index.php?dashboard', '_self')</script>";
     }else{
        echo "<script>alert('Failed to upload Image')</script>".mysqli_error($con);
    }

}else{
    echo "<script>alert('User already exist')</script>";
}
  
}

?>


<?php endif; ?>