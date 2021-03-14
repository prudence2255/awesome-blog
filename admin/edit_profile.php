<?php 
@session_start();
include("includes/connection.php");

if(!isset($_SESSION['admin_email'])):
    echo "
        <script>window.open('login.php', '_self')</script>
        ";
else:

?>




<?php 
if(isset($_GET['edit_profile'])) {
    $profile_id = $_GET['edit_profile'];

    $select_admin = "SELECT * FROM admins WHERE admin_id = '$profile_id'";

    $run_admin = mysqli_query($con, $select_admin);
    $row_admin = mysqli_fetch_array($run_admin);
    $admin_id = $row_admin['admin_id'];
    $admin_name = $row_admin['admin_name'];
    $admin_email = $row_admin['admin_email'];
    $admin_pass = $row_admin['admin_pass'];
    $admin_contact = $row_admin['admin_contact'];
    $admin_country = $row_admin['admin_country'];
    $admin_job = $row_admin['admin_job'];
    $admin_about = $row_admin['admin_about'];
    $admin_image = $row_admin['admin_image'];
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Post</title>
</head>
<body>
    <div class="row">
        <div class="col-lg-12">
            <ol class="breadcrumb">
                <li>
                    <i class="material-icons">dashboard</i> Dashboard / Edit Profile
                </li>
            </ol>
        </div>
    </div>
    <div class="row">
            <div class="col-lg-12 mx-auto">
                <div class="card card-default mx-auto w-75">
                    <div class="card-header">
                    <h3 class="text-center"><i class="fas fa-money"></i>Edit Profile</h3>
                    </div>
                    <div class="card-body">
                        <form action="" method="post" class="mx-auto w-90" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for=""class=" control-label">User Name</label>
                               
                                <input type="text" name="admin_name" id="" class="form-control"
                                value="<?php echo $admin_name ?>" required>
                                </div>
                            
                            <div class="form-group">
                                <label for="" class=" control-label">User Email</label>
                               
                                    <input type="email" class="form-control" name="admin_email"
                                    value="<?php echo $admin_email ?>" required>
                                
                            </div>
                            <div class="form-group">
                                <label for="" class="control_label">User Password</label>
                                <input type="password" name="admin_pass" class="form-control" value="<?php echo $admin_pass ?>">
                            </div>
                            <div class="form-group">
                                <label for="" class=" control-label">User Contact</label>
                               
                                    <input type="text" class="form-control" name="admin_contact" 
                                   value="<?php echo $admin_contact?>" required>
                                
                            </div>
                            <div class="form-group">
                                <label for="" class="control-label">User Country</label>
                                <input type="text" class="form-control" name="admin_country" value="<?php echo $admin_country ?>">
                            </div>
                            <div class="form-group">
                                <label for="" class="control-label">User Image</label>
                                <input type="file" name="admin_image" class="form-control" required 
                                value="<?php echo $admin_image; ?>">
                                <img src="admin_images/<?php echo $admin_image; ?>" alt="" style="width: 50px;height: 50px;">
                            </div>
                            <div class="form-group">
                                <label for="" class="control-label">User Job</label>
                                <input type="text" class="form-control" name="admin_job" value="<?php echo $admin_job ?>">
                            </div>
                            <div class="form-group">
                                <label for="" class="control-label">User About</label>
                                <textarea name="admin_about" id="" class="form-control textarea"
                                ><?php echo $admin_about; ?></textarea>
                            </div>
                            <div class="form-group">
                               <input type="submit" name="submit" class="w3-btn btn-primary" value="update">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</body>
</html>
<?php 
if(isset($_POST['submit'])){
    $update_name= $_POST['admin_name'];
    $update_email = $_POST['admin_email'];
    $update_pass = $_POST['admin_pass'];
    $update_contact = $_POST['admin_contact'];
    $update_country = $_POST['admin_country'];
    $update_job = $_POST['admin_job'];
    $update_about = $_POST['admin_about'];
    $encrypt = md5($update_pass);
    if(isset($_FILES['admin_image'])) {
        $update_image = $_FILES['admin_image']['name'];
        $update_tmp = $_FILES['admin_image']['tmp_name'];
        move_uploaded_file($update_tmp, "admin_images/$update_image");
    }

    $update_admin = "UPDATE admins SET 
                admin_id = '$update_id', admin_name = '$update_name', 
    admin_email = '$update_email', admin_pass ='$update_pass', admin_image = '$update_image',
    admin_contact = '$update_contact', admin_country = '$update_country',
    admin_job = '$update_job',admin_about = '$update_about' WHERE admin_id =' $admin_id';
    
    ";
    $update_query = mysqli_query($con, $update_admin);
    if($update_query) {
        echo "<script>alert('User Updated Successfully, Login again')</script>";
        echo "<script>window.open('index.php?view_users', '_self')</script>";
        session_destroy();
    }else{
        echo "<script>alert('User Update failed')</script>".mysqli_error($con);
    }
}
    

?>

<?php endif; ?>