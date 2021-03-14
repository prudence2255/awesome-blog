<?php 
//pagination
$per_page = 4;
if(isset($_GET['page'])) {
    $page = $_GET['page'];
}else{
    $page = 1;
}

$start_from = ($page - 1) * $per_page;

//selecting data form table with limit

$data_query = "SELECT * FROM blog_post ORDER BY 1 DESC LIMIT $start_from, $per_page";
$result = mysqli_query($con, $data_query);
//end of pagnation
?>
<!-- select and view post-->
<div class="row">
    <?php 
        if(!isset($_GET['cat'])) {
            while ($row_posts = mysqli_fetch_array($result)) {
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

    ?>
</div>

    <?php 
    if(!isset($_GET['cat'])) {
        //select all from table

        $query = "SELECT * FROM blog_post";
        $result = mysqli_query($con, $query);
        //count total records
        $total_rows = mysqli_num_rows($result);
        //using ceil function to divide the total records per page;

        $total_pages = ceil($total_rows / $per_page);
      }  //going to first page
    ?> 
         <div class="paging">
            <ul class="pagination">
       <?php         
        for ($i = 1; $i <= $total_pages; $i++ ) {
            echo "
           <li class='page-item'> <a href='index.php?page=".$i."' class='page-link active'>$i</a></li>
                ";
        }
    ?>
            </ul>
         </div>
   



  
   
  
