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
               <?php details(); ?>
            </div>
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