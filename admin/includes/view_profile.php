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
    <title>Profile</title>
</head>
<body>
    <div class="row">
        <div class="col-lg-12">
            <ol class="breadcrumb">
                <li>
                    <i class="material-icons">dashboard</i> Dashboard / Profile
                </li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header w3-green">
                    <h3 class="card-title text-center ">
                        <i class="fa fa-money"></i> Profile
                    </h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>User Name</th>
                                    <th>Comment Name</th>
                                    <th>Comment Email</th>
                                    <th>Comment url</th>
                                    <th>Comment Date</th>
                                    <th>Comment Content</th>
                                    <th>Comment Post</th>
                                    <th>Comment Status</th>
                                    <th>Comment delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php  
                                $i = 0;

                                $get_comments = "SELECT * FROM comments ORDER BY 1 DESC LIMIT 0, 5";

                                $run_comments = mysqli_query($con, $get_comments);
                                while($row_comments = mysqli_fetch_array($run_comments)):
                                    $post_id = $row_comments['post_id'];
                                    $comment_id = $row_comments['comment_id'];
                                    $comment_name = $row_comments['comment_name'];
                                    $comment_date = $row_comments['comment_date'];
                                    $comment_url = $row_comments['comment_url'];
                                    $comment_email = $row_comments['comment_email'];
                                    $comment_status = $row_comments['status'];
                                    $comment_text = $row_comments['comment_text'];
                                    $i++;

                                    $get_posts = "SELECT * FROM blog_post WHERE post_id = $post_id";
                                    $run_posts = mysqli_query($con, $get_posts);
                                    $row_posts = mysqli_fetch_array($run_posts);
                                    $post_title = $row_posts['post_title'];
                                ?>
                                <tr>
                                    <td><?php echo $i;  ?></td>
                                    <td><?php echo $comment_name;  ?></td>
                                    <td><?php echo $comment_email;  ?></td>
                                    <td><?php echo $comment_url;  ?></td>
                                    <td><?php echo $comment_date;  ?></td>
                                    <td><?php echo $comment_text;  ?></td>
                                    <td><?php echo $post_title;  ?></td>
                                    <td><?php
                                    if($comment_status == 'approved') {
                                        echo "<a href='index.php?unapprove=$comment_id'>Unapprove</a>";
                                    }else{
                                        echo "<a href='index.php?approve=$comment_id'>Approve</a>";
                                    }
                                    
                                    ?></td>
                                    <td><a href="index.php?delete_comment=<?php echo $comment_id ?>"><i class="fas fa-trash"></i>delete</a></td>
                                </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

<?php endif; ?>