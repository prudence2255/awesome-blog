<?php 
session_start();
include("includes/connection.php");

if(!isset($_SESSION['admin_email'])):
    echo "
        <script>window.open('login.php', '_self')</script>
        ";
else:

?>
<?php

$admin_session = $_SESSION['admin_email'];

$get_admin = "SELECT * FROM admins WHERE admin_email = '$admin_session'";
    $run_admin = mysqli_query($con, $get_admin);

    $row_admin = mysqli_fetch_array($run_admin);
    $admin_id = $row_admin['admin_id'];
    $admin_name = $row_admin['admin_name'];
?>
<?php 
$get_posts = "SELECT * FROM blog_post";

$run_posts = mysqli_query($con, $get_posts);

$count_posts = mysqli_num_rows($run_posts);

?>
<?php 
$get_comments = "SELECT * FROM comments";
$run_comments = mysqli_query($con, $get_comments);

$count_comments = mysqli_num_rows($run_comments);
?>
<?php 
$get_categories = "SELECT * FROM categories";
$run_categories = mysqli_query($con, $get_categories);

$count_categories = mysqli_num_rows($run_categories);
?>

<?php 
$get_admins = "SELECT * FROM admins";
$run_admins = mysqli_query($con, $get_admins);

$count_admins = mysqli_num_rows($run_admins);
$row_admins = mysqli_fetch_array($run_admins);

?>
<?php 
$get_admins = "SELECT * FROM admins WHERE admin_email = '$admin_session'";
$run_admins = mysqli_query($con, $get_admins);
$row_admins = mysqli_fetch_array($run_admins);
$admin_image = $row_admins['admin_image'];
$admin_name = $row_admins['admin_name'];
$admin_id = $row_admins['admin_id'];
$admin_job = $row_admins['admin_job'];
$admin_about = $row_admins['admin_about'];
$admin_country = $row_admins['admin_country'];
$admin_email = $row_admins['admin_email'];
$admin_contact = $row_admins['admin_contact'];
?>
<?php 
if(isset($_GET['delete_post'])){
    $get_delete = $_GET['delete_post'];

    $del_post = "DELETE FROM blog_post WHERE post_id = '$get_delete'";

    $del_query = mysqli_query($con, $del_post);

    if($del_query) {
        echo "<script> alert('Post deleted Successfully')</script>";
        echo "<script>window.open('index.php?view_posts', '_self')</script>";
    }else{
        echo "Failed to delete post";
    }
}



if(isset($_GET['unapprove'])){
    $unapprove_id = $_GET['unapprove'];

    $unapprove_comment = "UPDATE comments SET status = 'unapproved' WHERE comment_id = '$unapprove_id'";

    $run_unapprove = mysqli_query($con, $unapprove_comment);

    echo "<script>alert('Comment Unapproved Successfully')</script>";
    echo "<script>window.open('index.php?view_comments', '_self')</script>";
}
if(isset($_GET['approve'])){
    $approve_id = $_GET['approve'];

    $approve_comment = "UPDATE comments SET status = 'approved' WHERE comment_id = '$approve_id'";

    $run_approve = mysqli_query($con, $approve_comment);

    echo "<script>alert('Comment approved Successfully')</script>";
    echo "<script>window.open('index.php?view_comments', '_self')</script>";
}

if(isset($_GET['delete_comment'])){
    $delete = $_GET['delete_comment'];

    $del_comment = "DELETE FROM comments WHERE comment_id = '$delete'";

    $delete_query = mysqli_query($con, $del_comment);

    if($delete_query) {
        echo "<script> alert('Comment deleted Successfully')</script>";
        echo "<script>window.open('index.php?view_comments', '_self')</script>";
    }else{
        echo "Failed to delete Comment";
    }
}

if(isset($_GET['delete_cat'])) {
    $del_cat = $_GET['delete_cat'];

    $del_query = "DELETE FROM categories WHERE category_id = '$del_cat'";

    $del_run = mysqli_query($con, $del_query);
    if($del_run) {
        echo "<script>alert('Category deleted successfully')</script>";
        echo "<script>window.open('index.php?view_cats', '_self')</script>";
    }
}

if(isset($_GET['delete_user'])) {
    $delete_user_id = $_GET['delete_user'];
    $check_admin = "SELECT * FROM admins WHERE admin_id = '$delete_user_id'";
    $admin_query = mysqli_query($con, $check_admin);
    $admin_row = mysqli_fetch_array($admin_query);
    $admin_email = $admin_row['admin_email'];

    if($_SESSION['admin_email'] == $admin_email){
        echo "<script>alert('User is logged in and cannot be deleted')</script>";
        echo "<script>window.open('index.php?view_users', '_self')</script>";
    }else{
        $delete_user = "DELETE FROM admins WHERE admin_id = '$delete_user_id'";
    $delete_user_query = mysqli_query($con, $delete_user);

    if($delete_user_query) {
        echo "<script>alert('User deleted successfully')</script>";
        echo "<script>window.open('index.php?view_users', '_self')</script>";
    }
    }
    
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Panel</title>
    <link rel="stylesheet" type="text/css" href="css/w3.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="fonts/css/all.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
    <script src="fonts/js/all.js"></script>

</head>
<body>
<div id="wrapper">
<?php include("includes/sidebar.php") ?>

    <div class="container-fluid">
        <?php 
        if(isset($_GET['dashboard'])) {
            include("dashboard.php");
        }

        if(isset($_GET['insert_post'])){
            include("insert_post.php");
        }

        if(isset($_GET['view_posts'])) {
            include("view_posts.php");
        }
        if(isset($_GET['edit_post'])) {
            include("edit_post.php");
        }

        if(isset($_GET['view_comments'])) {
            include("view_comments.php");
        }

       if(isset($_GET['insert_cat'])) {
           include("insert_cat.php");
       }
       if(isset($_GET['view_cats'])) {
           include("view_cats.php");
       }

       if(isset($_GET['edit_cat'])) {
           include("edit_cat.php");
       }
       if(isset($_GET['insert_user'])) {
           include("insert_user.php");
       }
       if(isset($_GET['view_users'])) {
           include("view_users.php");
       }

       if(isset($_GET['edit_profile'])) {
           include("edit_profile.php");
       }
        ?>
    
    </div>
</div>
 










    
     <script src="js/jquery-3.3.1.js"></script>
     <script src="js/bootstrap.min.js"></script>
     <script src="js/index.js"></script>
</body>

</html>
    <?php endif; ?>