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
if(isset($_GET['edit_post'])) {
    $edit_id = $_GET['edit_post'];

    $select_post = "SELECT * FROM blog_post WHERE post_id = $edit_id";

    $run_posts = mysqli_query($con, $select_post);
    $row_post = mysqli_fetch_array($run_posts);
    $post_id = $row_post['post_id'];
    $post_title = $row_post['post_title'];
    $post_cat = $row_post['category_id'];
    $post_author = $row_post['post_author'];
    $post_keywords = $row_post['post_keywords'];
    $post_image = $row_post['post_image'];
    $post_content = $row_post['post_content'];
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="tinymce/js/tinymce/tinymce.min.js"></script>
    <title>Edit Post</title>
</head>
<body>
<script>
    tinymce.init({
        selector: '.textarea'
    })
    </script>
    <div class="row">
        <div class="col-lg-12">
            <ol class="breadcrumb">
                <li>
                    <i class="material-icons">dashboard</i> Dashboard / Edit Post
                </li>
            </ol>
        </div>
    </div>
    <div class="row">
            <div class="col-lg-12 mx-auto">
                <div class="card card-default mx-auto w-75">
                    <div class="card-header">
                    <h3><i class="fas fa-money"></i>Edit Post</h3>
                    </div>
                    <div class="card-body">
                        <form action="" method="post" class="mx-auto w-90" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for=""class=" control-label">Post Title</label>
                               
                                <input type="text" name="post_title" id="" class="form-control"
                                value="<?php echo $post_title ?>" required>
                                </div>
                            
                            <div class="form-group">
                                <label for="" class=" control-label">Post Author</label>
                               
                                    <input type="text" class="form-control" name="post_author"
                                    value="<?php echo $post_author ?>" required>
                                
                            </div>
                            <div class="form-group">
                                <label for="" class=" control-label">Post Keywords</label>
                               
                                    <input type="text" class="form-control" name="post_keywords" 
                                   value="<?php echo $post_keywords ?>" required>
                                
                            </div>
                            <div class="form-group">
                                <label for="" class="control-label">Post Category</label>
                                <select name="cat" id="" class="form-control" required>
                                    <?php 
                                        $get_cat = "SELECT * FROM categories WHERE category_id = $post_cat";
                                        $run_cat = mysqli_query($con, $get_cat);
                                        $row_cat = mysqli_fetch_array($run_cat);
                                        $cat_title = $row_cat['category_title'];
                                    ?>
                                    <option value="<?php echo $post_cat ?>"><?php echo $cat_title; ?></option>
                                    <?php 
                                        $get_all_cats = "SELECT * FROM categories";
                                        $run_all_cats = mysqli_query($con, $get_all_cats);
                                        while($row_all_cats = mysqli_fetch_array($run_all_cats)):
                                        $cat_id = $row_all_cats['category_id'];
                                        $category_title = $row_all_cats['category_title'];    
                                    ?>
                            <option value="<?php echo $category_id ?>"><?php echo $category_title; ?></option>
                                        <?php endwhile; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="" class="control-label">Post Image</label>
                                <input type="file" name="post_image" class="form-control" required>
                                <img src="post_images/<?php echo $post_image; ?>" alt="" style="width: 50px;height: 50px;">
                            </div>
                            <div class="form-group">
                                <label for="" class="control-label">Post Content</label>
                                <textarea name="post_content" id="" cols="30" rows="10" class="form-control textarea"
                                ><?php echo $post_content; ?></textarea>
                            </div>
                            <div class="form-group">
                               <input type="submit" name="submit" class="w3-btn btn-primary">
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
    $update_id = $post_id;
    $update_title = $_POST['post_title'];
    $update_cat = $_POST['cat'];
    $update_author = $_POST['post_author'];
    $update_keywords = $_POST['post_keywords'];
    $update_content = $_POST['post_content'];
    $update_date = date("d M Y");
    if(isset($_FILES['post_image'])) {
        $update_image = $_FILES['post_image']['name'];
        $update_tmp = $_FILES['post_image']['tmp_name'];
        move_uploaded_file($update_tmp, "post_images/$update_image");
    }

    $update_post = "UPDATE blog_post SET 
   category_id = '$update_cat', post_title = '$update_title', 
    post_author = '$update_author', post_keywords =' $update_keywords', post_image = '$update_image',
    post_content = '$update_content', post_date = '$update_date' WHERE post_id =' $update_id';
    
    ";
    $update_query = mysqli_query($con, $update_post);
    if($update_query) {
        echo "<script>alert('Post Updated Successfully')</script>";
        echo "<script>window.open('index.php?view_posts', '_self')</script>";
    }
}
    

?>

<?php endif; ?>