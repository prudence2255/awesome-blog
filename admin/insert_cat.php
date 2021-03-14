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
    <title>Insert Category</title>
</head>
<body>
    <div class="row">
        <div class="col-lg-12">
            <ol class="breadcrumb">
                <li><i class="material-icons">dashboard</i>Dashboard / Insert Category</li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
        <div class="card">
           <div class="card-header">
           <h3 class="card-title"><i></i>Insert Category</h3>
           </div>
            <div class="card-body">
                <form action="" method="post" class="w-50 mx-auto">
                    <div class="form-group">
                        <label for="" class="control-label">Category Title</label>
                        <input type="text" class="form-control w3-card-2" name="cat_title" required>
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
    $cat_title = $_POST['cat_title'];

    $insert_cat = "INSERT INTO categories (category_title) VALUES ('$cat_title')";

    $run_cat = mysqli_query($con, $insert_cat);
    if($run_cat) {
        echo "<script>alert('Category Added Successfully')</script>";
        echo "<script>window.open('index.php?view_cats', '_self')</script>";
    }else{
        echo "<script>alert('Failed to Add category')</script>";
    }
}

?>



















<?php endif; ?>