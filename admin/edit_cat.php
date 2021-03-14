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
    if(isset($_GET['edit_cat'])) {
        $cat_id = $_GET['edit_cat'];

        $get_cat = "SELECT * FROM categories WHERE category_id = '$cat_id'";

        $run_cat = mysqli_query($con, $get_cat);
        $row_cat = mysqli_fetch_array($run_cat);
        $cat_new_id = $row_cat['category_id'];
        $category_title = $row_cat['category_title'];
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Category</title>
</head>
<body>
    <div class="row">
        <div class="col-lg-12">
            <ol class="breadcrumb">
                <li><i class="material-icons">dashboard</i>Dashboard / Edit Category</li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
        <div class="card">
           <div class="card-header">
           <h3 class="card-title"><i></i>Edit Category</h3>
           </div>
            <div class="card-body">
                <form action="" method="post" class="w-50 mx-auto">
                    <div class="form-group">
                        <label for="" class="control-label">Category Title</label>
                        <input type="text" class="form-control w3-card-2" name="cat_title"
                        value="<?php echo $category_title ?>"
                        required>
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
        $cat_update_id = $cat_new_id;
        $cat_new_title = $_POST['cat_title'];

        $update_cat = "UPDATE categories SET category_title = '$cat_new_title' WHERE category_id
                        = '$cat_update_id'";
        $run_update_cat = mysqli_query($con, $update_cat);
        if($run_update_cat){
            echo "<script>alert('Category Updated successully')</script>";
            echo "<script>window.open('index.php?view_cats', '_self')</script>";
        }                
    }

?>

















<?php endif; ?>