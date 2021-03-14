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
                <div class="text-section">
                    <h1>Buy our themes with free installation facility</h1>
                    <p>
                        You can buy our paid themes for just 20 dollars and you can install the theme on 
                        your website according o your choice.
                    </p>
                </div>
                <div class="row flex-wrap">
                    <div class="col-lg-4 col-md-6">
                        <div class="theme-body">
                            <h3>Honey Theme 7</h3>
                            <img src="themes_images/7.jpg" alt="" class="img-fluid">
                            <p>Price: $50</p>
                            <a href="#" class="btn btn-primary" target="blank">Preview</a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="theme-body">
                            <h3>Honey Theme 8</h3>
                            <img src="themes_images/8.jpg" alt="" class="img-fluid">
                            <p>Price: $50</p>
                            <a href="#" class="btn btn-primary" target="blank">Preview</a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="theme-body">
                            <h3>Honey Theme 9</h3>
                            <img src="themes_images/9.jpg" alt="" class="img-fluid">
                            <p>Price: $50</p>
                            <a href="#" class="btn btn-primary" target="blank">Preview</a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="theme-body">
                            <h3>Honey Theme 10</h3>
                            <img src="themes_images/10.jpg" alt="" class="img-fluid">
                            <p>Price: $50</p>
                            <a href="#" class="btn btn-primary" target="blank">Preview</a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="theme-body">
                            <h3>Honey Theme 11</h3>
                            <img src="themes_images/11.jpg" alt="" class="img-fluid">
                            <p>Price: $50</p>
                            <a href="#" class="btn btn-primary" target="blank">Preview</a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="theme-body">
                            <h3>Honey Theme 12</h3>
                            <img src="themes_images/12.jpg" alt="" class="img-fluid">
                            <p>Price: $50</p>
                            <a href="#" class="btn btn-primary" target="blank">Preview</a>
                        </div>
                    </div>
                </div>

                <nav>
                        <ul class="pagination justify-content-center">
                            <li class="page-item"><a href="themes.php" class="page-link">first page</a></li>
                            <li class="page-item"><a href="themes.php" class="page-link">1</a></li>
                            <li class="page-item"><a href="themes2.php" class="page-link active">2</a></li>
                            <li class="page-item"><a href="#" class="page-link">last page</a></li>
                        </ul>
                </nav>
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