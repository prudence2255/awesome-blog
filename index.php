<?php include("includes/connection.php"); ?>

<!DOCTYPE html>

<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Complete php tutorials</title>
    <link rel="stylesheet" type="text/css" href="css/w3.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="fonts/css/all.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
    <script src="fonts/js/all.js"></script>

</head>
<body>

 <?php include("includes/header.php") ?>

 <div class="widewrapper main">
    <div class="container">
         <div class="row">
            <div class="col-md-8 blog-main">
            <?php include("includes/get_cat.php") ?>
            <?php include("includes/post_body.php") ?>
            </div>
           
            <?php include("includes/sidebar.php") ?>
           
         </div>
    </div>
   </div>

<?php include("includes/footer.php") ?>









    
     <script src="js/jquery-3.3.1.js"></script>
     <script src="js/bootstrap.min.js"></script>
     <script src="js/index.js"></script>
</body>

</html>