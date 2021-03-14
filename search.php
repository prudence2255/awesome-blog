<?php include("includes/connection.php"); ?>

<!DOCTYPE html>

<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Complete php tutorials</title>
    <link rel="stylesheet" type="text/css" href="css/w3.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="fonts/css/all.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
    <script src="fonts/js/all.js"></script>

</head>
<body>

 <?php include("includes/header.php") ?>

 <div class="widewrapper main">
    <div class="container">
         <div class="row">
            <div class="col-md-8 blog-main">
                <div class="row">
                   <?php 
                        if(isset($_GET['search'])) {
                            $get_query = $_GET['search_query'];
                            $get_posts = "SELECT * FROM blog_post WHERE post_title like 
                                            '$get_query'";
                             $run_posts = mysqli_query($con, $get_posts);
                             $count = mysqli_num_rows($run_posts);
                             if($count == 0) {
                                 echo "
                                 No Search Results
                                        ";
                             }else{
                                 while($row_posts = mysqli_fetch_array($run_posts)) {
                                    $post_id = $row_posts['post_id'];
                                    $post_title = $row_posts['post_title'];
                                    $post_date = $row_posts['post_date'];
                                    $post_author = $row_posts['post_author'];
                                    $post_keywords = $row_posts['post_keywords'];
                                    $post_image = $row_posts['post_image'];
                                    $post_content = substr($row_posts['post_content'], 0, 300);

                                    echo "
                                    <div class='col-md-6 col-sm-6'>
                                    <article class='blog-teaser'>
                                  <header>
                                     <img src='admin/post_images/$post_image' alt= '' class='featured-image'>
                                    <h3><a href='blog_detail.php?post=$post_id'>$post_title</a></h3>
                                         <span class='meta'>$post_date, $post_author</span>
                                         </header>
                                            <hr>
                                    <div class='body'>
                                 $post_content
                                 </div>
                             <div class='clearfix'>
                                <a href='blog_detail.php?post=$post_id' class='btn btn-blog-one'>Read more</a>
                             </div>
                        </article>
                        </div>
                         ";
                         }
                         }        
                        }
                   ?> 
                </div>
            </div>
           
            <?php include("includes/sidebar.php") ?>
           
         </div>
    </div>
   </div>

<?php include("includes/footer.php") ?>









    
     <script src="js/jquery-3.3.1.js"></script>
     <script src="js/bootstrap.min.js"></script>
     <script src="js/index.js"></script>
</body>

</html>