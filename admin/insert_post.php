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
    <title>Add Post</title>
    
    
   <script src="tinymce/js/tinymce/tinymce.min.js"></script>

</head>
<body>
    <script>
    tinymce.init({
        selector: '#textarea'
    })
    </script>
<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li class="active"><i class="material-icons">dashboard</i>Dashboard / Add Post</li>
        </ol>
    </div>
</div>
 <div class="row">
    <div class="col-lg-12">
        <div class="card mx-auto">
            <div class="card-header">
                <h3 class="card-title"><i class="fa fa-money fa-fw">&#xf0d6;</i> Add Post</h3>
            </div>
            <div class="card-body">
                <form action="insert_post.php" method="post" class="form-horizontal" 
                enctype="multipart/form-data">
                <div class="form-group">
                    <label for="" class="col-md-3 control-label">Post Title</label>
                    <div class="col-md-6">
                        <input type="text" required name="post_title" class="form-control">
                    </div>
                    
                </div>
                <div class="form-group">
                    <label for="" class="control-label col-md-3">Post Author</label>
                    <div class="col-md-6">
                        <input type="text" required name="post_author" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-md-3 control-label">Post Keywords</label>
                    <div class="col-md-6">
                        <input type="text" required name="post_keywords" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="control-label col-md-3">Post Category</label>
                    <div class="col-md-6">
                        <select name="cat" id="" class="form-control">
                            <option value="">Select a Category</option>
                            <?php $get_cat = "SELECT * FROM categories";
                            $run_cat = mysqli_query($con, $get_cat);
                            while($row_cat = mysqli_fetch_array($run_cat)){
                                $cat_id = $row_cat['category_id'];
                                $cat_title = $row_cat['category_title'];

                                echo "<option value='$cat_id'>$cat_title</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="control-label col-md-3">Add Image</label>
                    <div class="col-md-6">
                        <input  required type="file" name="post_image" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="control-label col-md-3">Post Content</label>
                    <div class="col-md-6">
                        <textarea name="post_content" class="form-control" rows="15" cols="20" id="textarea">

                        </textarea>    
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-md-3" class="control-label"></label>
                    <div class="col-md-6">
                        <input type="submit" name="submit" class="btn btn-primary form-control" value="Post">
                    </div>
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
        $post_title = $_POST['post_title'];
        $post_author = $_POST['post_author'];
        $post_keywords = $_POST['post_keywords'];
        $post_cat = $_POST['cat'];
        $post_content = $_POST['post_content'];
        $post_date = date("d M Y");
        if(isset($_FILES['post_image'])){
            $post_image = $_FILES['post_image']['name'];
        $temp_name = $_FILES['post_image']['tmp_name'];

        move_uploaded_file($temp_name, "post_images/$post_image");
        
        }
        

        $insert_post = "INSERT INTO blog_post (category_id, post_title, post_date,
                                    post_author, post_keywords, post_image, post_content)
                             VALUES ('$post_cat', '$post_title', '$post_date',
                                 '$post_author', '$post_keywords', '$post_image', '$post_content')";
        $run_insert = mysqli_query($con, $insert_post);
        if($run_insert) {
            echo "<script>alert('Post has been added'); </script>";
            echo "<script>window.open('index.php?view_posts','_self')</script>";
        }else{
            echo "<script>alert('failed to add post')</script>";
            echo mysqli_error($con);
        }
    }
?>
<?php endif; ?>