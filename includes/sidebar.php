<aside class="blog-aside col-md-4">
    <div class="">
    <div class="aside-widget">
        <header>
            <h3>Subscribe Us</h3>
        </header>
        <div class="body">
        <form style="border:1px solid #ccc;padding:3px;text-align:center;"
         action="https://feedburner.google.com/fb/a/mailverify" method="post"
          target="popupwindow" 
          onsubmit="window.open('https://feedburner.google.com/fb/a/mailverify?uri=computerfever', 
          'popupwindow', 'scrollbars=yes,width=550,height=520');return true">
          <p>Enter your email address:</p><p><input type="text" style="width:140px" name="email"/>
        </p><input type="hidden" value="computerfever" name="uri"/><input type="hidden" name="loc"
         value="en_US"/><input type="submit" value="Subscribe" /><p>Delivered by
         <a href="https://feedburner.google.com" target="_blank">FeedBurner</a></p></form>
        </div>
    </div>
    <div class="aside-widget">
        <header>
            <h3>Recent Posts</h3>
        </header>
        <div class="body">
            <ul class="blog-list">
                <?php 
                    $get_post = "SELECT * FROM blog_post LIMIT 0, 5";
                    $run_posts = mysqli_query($con, $get_post);
                    while($row_posts = mysqli_fetch_array($run_posts)){
                        $post_id = $row_posts['post_id'];
                        $post_title = substr($row_posts['post_title'],0, 50);
                        $post_date = $row_posts['post_date'];
                        $post_author = $row_posts['post_author'];
                        $post_image = $row_posts['post_image'];

                        echo "
                        <li class='media'>
                            <img src='admin/post_images/$post_image' class='media-img recent-image'>
                            
                            <span class='media-body pl-3'>
                            <a href='post_detail.php?post=$post_id'>$post_title</a>
                            <br> $post_date, $post_author
                            </span>
                        </li>
                            ";
                    }
                ?>
            </ul>
        </div>
    </div>
    <div class="aside-widget">
        <header>
            <h3>Facebook Like Box</h3>
        </header>
        <div class="body clearfix">
        <script async defer crossorigin="anonymous" 
        src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.3"></script>
        <div class="fb-page" data-href="https://www.facebook.com/facebook"
         data-tabs="timeline" data-width="" data-height="" data-small-header="true"
         data-adapt-container-width="true" data-hide-cover="true" data-show-facepile="false">
        <blockquote cite="https://www.facebook.com/facebook" class="fb-xfbml-parse-ignore">
        <a href="https://www.facebook.com/facebook">Facebook</a></blockquote></div>    
    </div>
    </div>
    </div>
   
</aside>