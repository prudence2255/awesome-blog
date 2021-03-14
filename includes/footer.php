<footer>
    <div class="widewrapper footer">
        <div class="container">
            <div class="row">
                <div class="col-md-4 footer-widget"><!-- stats starts-->
                    <h3>
                        <span class="fab fa-pied-piper"></span>
                        Statistics
                    </h3>
                    <span>
                    It is a long established fact that a reader will be 
                    distracted by the readable content of a page when
                     looking at its layout. The point of using Lorem Ipsum is that
                    </span>
                    <div class="stats">
                        <?php 
                            $results = "SELECT * FROM comments";
                            $query = mysqli_query($con, $results);

                            $count = mysqli_num_rows($query);
                        
                        ?>
                        <?php 
                        $articles = "SELECT * FROM blog_post";
                        $articles_query = mysqli_query($con, $articles);
                        $articles_count = mysqli_num_rows($articles_query);
                        ?>
                       
                        <div class="line">
                            <span class="number"><?php echo $articles_count ?></span>
                            <span>Articles</span>
                        </div>
                        <div class="line">
                            <span class="number"><?php echo $count ?></span>
                            <span>Comments</span>
                        </div>

                    </div>
                </div><!-- stats ends-->
                <div class="col-md-4 footer-widget"><!-- footer recent posts starts-->
                    <h3>
                        <i class="fa fa-star"></i> Recent Posts
                    </h3>
                    <ul class="blog-list"><!-- blog-list starts-->
                    <?php  
                            $posts = "SELECT * FROM blog_post ORDER BY post_id DESC LIMIT 0, 5";
                            $post_query = mysqli_query( $con, $posts);
                            while($post_rows = mysqli_fetch_array($post_query)){
                                $post_title = $post_rows['post_title'];
                                $post_id = $post_rows['post_id'];
                                echo "
                                <li><a href='blog_detail.php?post=$post_id'>$post_title</a></li>
                                        ";
                            }
                                
                        ?>
                    </ul>
                </div>
                <div class="col-md-4 footer-widget"><!-- footer contact me starts-->
                    <h3>
                        <i class="fa fa-envelope"></i> Contact Me
                    </h3>
                    <span>
                    It is a long established fact that a reader will be 
                    distracted by the readable content of a page when
                     looking at its layout. The point of using Lorem Ipsum is that 
                    </span>
                  <span>  <a href="#">l.alidu@gmail.com</a></span>
                </div>
            </div>
        </div>
    </div>
    <div class="widewrapper copyright"><!--copyright -->
        <div class="container">
           Designed By <a href="www.myblog.com">Ali Latif</a>
        </div>
    </div>
</footer>