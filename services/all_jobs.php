<?php 
include("includes/db.php");
include("functions/function.php");
?>
<!DOCTYPE html>

<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Online Services</title>
    <link rel="stylesheet" type="text/css" href="css/w3.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="fonts/css/all.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
    <script src="fonts/js/all.js"></script>

</head>
<body>
    <div class="container">
        <?php include("includes/header.php") ?>
      
    </div>

   <div class="container mt-2">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title text-center"><i class="fa fa-money-check"></i> Categories</h5>
                    </div>
                    <div class="card-body">
                        <ul class=" nav flex-column nav-pills">
                           <?php get_cats(); ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-8 gray">
            <div class="row flex-wrap">
                <?php 
                 $per_page = 3;

                 if(isset($_GET['page'])) {
                     $page = $_GET['page'];
                 }else{
                     $page = 1;
                 }
                 $start = ($page - 1) * $per_page;
                 $get_jobs = "SELECT * FROM jobs WHERE status = 'approved' LIMIT $start, $per_page";
                 $run_jobs = mysqli_query($db, $get_jobs);
             
                 while($row_jobs = mysqli_fetch_array($run_jobs)) {
                     $job_id = $row_jobs['job_id'];
                     $job_title = $row_jobs['job_title'];
             
                     $job_price = $row_jobs['job_price'];
             
                     $job_img1 = $row_jobs['job_img1'];
                     echo "
                     <div class='col-lg-4 col-md-6'>
                     <div class='job-body'>
                         <h3>$job_title </h3>
                         <img src='admin_area/job_images/$job_img1'' alt='' class='img-fluid'>
                         <p>Price: $ $job_price </p>
                         <a href='details.php?job_id=$job_id' class=btn btn-warning>Details</a>
                         <a href='order_now.php?job_id=echo $job_id' class='btn btn-success'>Order Now</a>
                     </div>
                 </div>
                         ";
                         
                 }
                ?>
            </div>
            <nav>
                <ul class="pagination justify-content-center">
                  <?php
                    $query = "SELECT * FROM jobs WHERE status = 'approved'";
                    $get_query = mysqli_query($db, $query);

                    $num_jobs = mysqli_num_rows($get_query);
                    $num_pages = ceil($num_jobs / $per_page);

                    for($i=1;$i<=$num_pages;$i++){
                        echo "
                            <li class='page-item ";
                            if(@$_GET['page'] == $i){echo "active";}
                              echo "  '><a href='all_jobs.php?page=$i' class='page-link'>$i</a></li>
                            ";
                    }

                  ?>
                </ul>
            </nav>
        </div>
        </div>

   </div>






   <?php include("includes/footer.php") ?>

    <script src="js/bootstrap.bundle.js"></script>
     <script src="js/jquery-3.3.1.js"></script>
     <script src="js/bootstrap.min.js"></script>
     <script src="js/index.js"></script>
</body>

</html>