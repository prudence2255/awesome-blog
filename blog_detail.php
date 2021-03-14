<?php include("includes/connection.php");
if(isset($_GET['post'])) {
    $post_id = $_GET['post'];
    $get_posts = "SELECT * FROM blog_post WHERE post_id = $post_id";
    $run_posts = mysqli_query($con, $get_posts);
    $row_posts = mysqli_fetch_array($run_posts);

    $post_id = $row_posts['post_id'];
    $post_title = $row_posts['post_title'];
    $post_date = $row_posts['post_date'];
    $post_author = $row_posts['post_author'];
    $post_keywords = $row_posts['post_keywords'];
    $post_image = $row_posts['post_image'];
    $post_content = $row_posts['post_content'];
    $post_cat = $row_posts['category_id'];

    //select categories from table

    $sel_cat = "SELECT * FROM categories WHERE category_id = '$post_cat'";

    $run_cat = mysqli_query($con, $sel_cat);
    $row_cats = mysqli_fetch_array($run_cat);

    $category_id = $row_cats['category_id'];
    $category_title = $row_cats['category_title'];
}
?>

<!DOCTYPE html>

<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Complete php tutorials</title>
    <link rel="stylesheet" type="text/css" href="css/w3.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="fonts/css/all.css">
    <script src="fonts/js/all.js"></script>

</head>
<body>
<div class="header-box">
<header>
<div class="wrapper">
    <div class="nav-wrapper">
    <div class="container">
        <div class="navbar-header">
            <nav class="navbar navbar-expand-lg">
            <a href="index.php" class="navbar-brand home">Blog</a>
                <button type="button" class="navbar-toggler w3-btn" data-toggle="collapse"
                 data-target="#collapse-box">
                    <span class="fa fa-bars fa-lg toggle-bars"></span>
                </button>
                <div class="collapse navbar-collapse" id="collapse-box">
                    <ul class="navbar-nav nav-list">
                        <li><a href="index.php">Home</a></li>
                        <?php 
                        $get_cat = "SELECT * FROM categories";
                        $run_cat = mysqli_query($con, $get_cat);
                        while ($row_cat = mysqli_fetch_array($run_cat)) {
                            $cat_id = $row_cat['category_id'];
                             $cat_title = $row_cat['category_title'];
                             echo "<li><a href='index.php?cat=$cat_id'>$cat_title</a></li>";
                        }
                       ?>
                        <li><a href="about.php">About Us</a></li>
                    </ul>
                </div>
            </nav>
           
        </div>
    </div>
    </div>
    <div class="navbar-bottom">
                <div class="container search-box">
                <a href="index.php">Blog</a>
                <span classs="separator">&#x2F</span>
                <a href="index.php?cat=<?php echo $category_id ?>"><?php echo $category_title ?></a>
                    <form action="" class="searchform">
                    <div class="input-group">
                    <input type="text" class="form-control" class="searchfield">
                    <div class="input-group-prepend">

                    <button type="button" class="btn btn-outline-primary">
                        <i class="fa fa-search"></i>
                    </button>
                </div>
            </div>
            </form>
        </div>
         </div>

</div>


</header>

</div>
 
<div class="widewrapper main"><!-- Widewrapper main starts -->
<div class="container"><!--- Container Starts --->
<div class="row"><!--- Row Starts -->
<div class="col-md-8 blog-main"><!--- col-md-8 blog-main starts -->

<article class="blog-post"><!-- Article Starts -->
<header><!-- Article Header Starts -->
<h1><?php echo $post_title ?></h1>

<div class="lead-image"><!--- Article lead-image Starts -->
<img src='admin/post_images/<?php echo $post_image ?>' class="img-fliud detail_image">
<div class="meta clearfix"><!--- Article meta clearfix Starts --->
<div class="author"><!--- Article author Starts --->
<i class="fa fa-user"></i>
<span class="data"><?php echo $post_author ?></span>

</div><!--- Article author Ends --->

<div class="date"><!--- Article date Starts --->
<i class="fa fa-calendar"></i>
<span class="data"><?php echo $post_date.", " .$post_author ?></span>
</div><!--- Article date Ends --->

<div class="comments"><!--- Article comments Starts --->
<i class="fa fa-comments"></i>
<span class="data"><a href="#">4 Comments</a></span>
</div><!--- Article comments Ends --->

</div><!--- Article meta clearfix Ends --->
</div><!--- Article lead-image Ends -->

</header><!-- Article Header Ends -->

<div class="body">
    <div>
    <?php  echo $post_content ?>
    </div>
</div>

</article><!-- Article Ends -->
<?php include("includes/comment_form.php") ?>

</div><!--- col-md-8 blog-main Ends -->
<?php include("includes/sidebar.php") ?>
</div>
</div>





<?php include("includes/footer.php") ?>









    
     <script type="text/javascript" src="js/jquery-3.3.1.js"></script>
     <script type="text/javascript" src="js/bootstrap.min.js"></script>
     <script type="text/javascript" src="js/index.js"></script>
</body>

</html>