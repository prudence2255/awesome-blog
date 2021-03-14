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
    <title>View Posts</title>
</head>
<body>
    <div class="row">
        <div class="col-lg-12">
            <ol class="breadcrumb">
                <li class="active">
                    <i class="material-icons">dashboard</i> Dashboard / View Posts
                </li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title"><i class="fa fa-money"></i>View Posts</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>Post ID</th>
                                    <th>Post Title</th>
                                    <th>Post Author</th>
                                    <th>Post Image</th>
                                    <th>Post Comments</th>
                                    <th>Post Date</th>
                                    <th>Post Delete</th>
                                    <th>Post Edit</th>
                                </tr>
                                <tbody>
                                  <?php 
                                  $i = 0;
                                  $get_posts = "SELECT * FROM blog_post ORDER BY 1 ASC LIMIT 0, 8";
                                  $run_posts = mysqli_query($con, $get_posts);
                                  while($row_posts = mysqli_fetch_array($run_posts)):
                                        $post_id = $row_posts['post_id'];
                                        $post_title = $row_posts['post_title'];
                                        $post_image = $row_posts['post_image'];
                                        $post_author = $row_posts['post_author'];
                                        $post_date = $row_posts['post_date'];
                                        
                                       $i++;
                                  
                                  ?>  
                                    <tr>
                                       <tr>
                                           <td><?php echo $i; ?></td>
                                           <td><?php echo $post_title ?></td>
                                           <td><?php echo $post_author ?></td>
                                           <td><img src="post_images/<?php echo $post_image ?>" alt=""
                                           style="width: 60px; height:40px;"></td>
                                           <td>
                                               <?php 
                                               $get_comments = "SELECT * FROM comments WHERE post_id = '$post_id'";
                                               $run_comments = mysqli_query($con, $get_comments);
                                               $count = mysqli_num_rows($run_comments);
                                               echo $count
                                               ?>
                                           </td>
                                           <td><?php echo $post_date ?></td>
                                           <td><a href="index.php?delete_post=<?php echo $post_id ?>"><i class="fas fa-trash"></i> Delete</a></td>
                                           <td><a href="index.php?edit_post=<?php echo $post_id ?>"><i class="fa fa-edit"></i> Edit</a></td>
                                       </tr> 
                                  <?php endwhile; ?>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<?php endif;  ?>