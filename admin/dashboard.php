<?php 
@session_start();
include("includes/connection.php");

if(!isset($_SESSION['admin_email'])):
    echo "
        <script>window.open('login.php', '_self')</script>
        ";
else:

?>

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Dashboard
        </h1>
        <ol class="breadcrumb">
            <li class="active">
                <i class="material-icons">dashboard</i>Dashboard
            </li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-lg-3 col-md-6">
         <div class="card card-green">
            <div class="card-header w3-blue">
                <div class="row">
                    <div class="col-sm-3">
                        <i class="fa fa-comments fa-5x"></i>
                    </div>
                    <div class="col-sm-9">
                        <div class="huge text-right"><?php echo $count_comments ?></div>
                        <div class="text-right">Comments</div>
                    </div>
                </div>
            </div>
            <a href="index.php?view_comments">
                <div class="card-footer clearfix">
                    <span class="float-left">View Details</span>
                    <span class="float-right"><i class="fa fa-arrow-circle-right"></i></span>
                </div>
            </a>

         </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="card card-green">
            <div class="card-header w3-green">
                <div class="row">
                    <div class="col-sm-3">
                        <i class="fa fa-tasks fa-5x"></i>
                    </div>
                    <div class="col-sm-9 text-right">
                        <div class="huge"> <?php echo $count_posts ?></div>
                        <div>Posts</div>
                    </div>
                </div>
            </div>
                <a href="index.php?view_posts">
                    <div class="card-footer clearfix">
                        <span class="float-left">View details</span>
                        <span class="float-right"><i class="fa fa-arrow-circle-right"></i></span>
                    </div>
                </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
    <div class="card card-green">
            <div class="card-header w3-yellow">
                <div class="row">
                    <div class="col-sm-3">
                        <i class="fa fa-shopping-cart fa-5x"></i>
                    </div>
                    <div class="col-sm-9 text-right">
                        <div class="huge "><?php echo $count_categories  ?></div>
                        <div>Categories</div>
                    </div>
                </div>
            </div>
                <a href="index.php?view_cats">
                    <div class="card-footer clearfix">
                        <span class="float-left">View details</span>
                        <span class="float-right"><i class="fa fa-arrow-circle-right"></i></span>
                    </div>
                </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
    <div class="card card-green">
            <div class="card-header w3-red">
                <div class="row">
                    <div class="col-sm-3">
                        <i class="fa fa-support fa-5x"></i>
                    </div>
                    <div class="col-sm-9 text-right">
                        <div class="huge "><?php echo $count_admins ?></div>
                        <div>Users</div>
                    </div>
                </div>
            </div>
                <a href="index.php?view_users">
                    <div class="card-footer clearfix">
                        <span class="float-left">View details</span>
                        <span class="float-right"><i class="fa fa-arrow-circle-right"></i></span>
                    </div>
                </a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-8 mt-3">
        <div class="card">
            <div class="card-header w3-blue">
                <h3 class="card-title"><i class="fas fa-money-bill fa-fw"></i>New Comments</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th>Comment Name</th>
                                <th>Comment Email</th>
                                <th>Comment Url</th>
                                <th>Comment Date</th>
                                <th>Comment Post</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $get_comments = "SELECT * FROM comments WHERE status = 'unapproved' 
                                            ORDER BY 1 DESC LIMIT 0, 4";
                              $run_comments = mysqli_query($con, $get_comments);
                              while($row_comments = mysqli_fetch_array($run_comments)):
                                $post_id = $row_comments['post_id'];
                                $comment_name = $row_comments['comment_name'];
                                $comment_date = $row_comments['comment_date'];
                                $comment_email = $row_comments['comment_email'];
                                $comment_url = $row_comments['comment_url'];               
                                
                            
                               $get_posts = "SELECT * FROM blog_post WHERE post_id = '$post_id'";
                               $run_posts = mysqli_query($con, $get_posts);
                              
                               $row_posts = mysqli_fetch_array($run_posts);
                        
                               $post_title = $row_posts['post_title'];
                            ?>
                           <tr>
                               <td><?php echo $comment_name ?></td>
                               <td><?php echo $comment_email?></td>
                               <td><?php echo $comment_url ?></td>
                               <td><?php echo $comment_date ?></td>
                               <td><?php echo $post_title ?></td>
                           </tr>
                              <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
                <div class="text-right">
                    <a href="index.php?view_comments">View All Comments</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card mt-3">
            <img src="admin_images/<?php echo $admin_image ?>" alt="" class="card-img-top rounded img-fliud">
            <div class="card-body">
                <div class="card-title thumb-info mb-md">
                    <span class="card-text info-title"><?php echo $admin_name ?></span><br>
                    <span class="card-text info-type"><?php echo $admin_job  ?></span>
                </div>
                <div class="card-text mb-md">
                    <div class="widget-content-expanded">
                        <i class="fa fa-user"></i>
                        <span>Email: </span> <?php echo $admin_email  ?> <br>
                        <i class="fa fa-user"></i> <span>Country: </span> <span><?php echo $admin_country   ?></span><br>
                        <i class="fa fa-user"></i> <span>Contact: </span> <span><?php echo $admin_contact  ?></span><br>
                    </div>
                    <hr class="dotted short">
                    <h5 class="text-muted">About</h5>
                    <div>
                        <?php echo $admin_about  ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>