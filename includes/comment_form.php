<?php 
    if(isset($_GET['post'])) {
        $post_id = $_GET['post'];

        $get_posts = "SELECT * FROM blog_post where post_id = $post_id";

        $run_posts = mysqli_query($con, $get_posts);
        $row_posts = mysqli_fetch_array($run_posts);
        
        $post_new_id = $row_posts['post_id'];
    }
?>
<?php 
    $get_comments = "SELECT * FROM comments WHERE post_id = '$post_new_id' AND status = 'approved'";
    $run_comments = mysqli_query($con, $get_comments);
    $count = mysqli_num_rows($run_comments);
?>

<aside class="comments"><!--comments-->
    <h2><i class="fa fa-comments"></i><?php echo $count ?> Comment(s)</h2>

<?php  
while ($row_comments = mysqli_fetch_array($run_comments)) {
        $comment_name = $row_comments['comment_name'];
        $comment_date = $row_comments['comment_date'];
        $comment_email = $row_comments['comment_email'];
        $comment_url = $row_comments['comment_url'];
        $comment = $row_comments['comment_text'];
?>

    <article class="comment"><!-- comment-->
        <header class="media"><!-- comment header-->
            <img src="img/avatar.png" alt="" width="72" height="72" class="avatar">
            <div class="meta media-body pl-3 pt-3"><!--comment meta-->
                <h3><a href="<?php echo $comment_url ?>"><?php echo $comment_name ?></a></h3>
                <span class="date"><?php echo $comment_date. ','.$comment_name ?></span>
                <span class="separator">-</span>
            </div>
        </header>
        <div class="body">
        <?php echo $comment ?>
        </div>
    </article>
<?php }?>
</aside>
<aside class="create-comment"><!-- create comment-->
<hr>
<h2><i class="fa fa-heart"></i>Add Comment</h2>
<form action="blog_detail.php?post=<?php echo $post_new_id ?>" method="post"><!--comment form-->
    <div class="row"><!--comment row-->
        <div class="col-md-6">
            <input type="text" name="comment_name" placeholder="Name" 
            class="form-control input-lg">
        </div>
        <div class="col-md-6">
        <input type="email" name="comment_email" placeholder="Email" 
            class="form-control input-lg">
        </div>
    </div>
    <input type="url" name="comment_url" placeholder="Website" class="form-control input-lg">
    <textarea name="comment" id="" cols="30" rows="10" placeholder="Your Comment" 
    class="form-control input-lg"></textarea>
    <div class="button clearfix">
        <button type="submit" name="submit" class="btn btn-xlarge btn-blog-one">Submit</button>
    </div>
</form>

</aside>
<?php 
    if(isset($_POST['submit'])) {
        $post_com_id = $row_posts['post_id'];
        $comment_name = $_POST['comment_name'];
        $comment_email = $_POST['comment_email'];
        $comment_url = $_POST['comment_url'];
        $comment = $_POST['comment'];
        $comment_date = date('d M Y');
        $status = "unapproved";

        if($comment_name == '' or $comment_email == '' or $comment_url == '' or
            $comment == ''){
                echo "<script>alert('please fill all fields')</script>";
                echo "<script>window.open('blog_detail.php?post=$post_com_id','_self')</script>";
                exit();
            }else{
                $insert_comment = "INSERT INTO comments (post_id, comment_name, comment_date, 
                                    comment_email, comment_url, comment_text, status)
                                    VALUES ('$post_com_id', '$comment_name', '$comment_date',
                                 '$comment_email', '$comment_url', '$comment', '$status')";
            $run_query = mysqli_query($con, $insert_comment);
            echo "<script>alert('Your Comment Will Be Published')</script>";
            echo "<script>window.open('blog_detail.php?post=$post_com_id','_self')</script>";    
        }

    }
    
    ?>