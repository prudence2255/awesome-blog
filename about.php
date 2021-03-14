<?php include("includes/connection.php") ?>

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

    <script src="fonts/js/all.js"></script>

</head>
<body>

 <?php include("includes/header.php") ?>

 <div class="widewrapper main">
    <div class="container about"><!-- about container-->
        <h1>Hello There, I am <span class="about-bold">Latif Alidu</span></h1>
        <span class="about-large">
        <span class="about-italic">
        It is a long established fact that a reader will be 
     distracted by the readable content of a page when
        </span><br>
        <img src="img/about-me.jpg" alt="" class="about-portrait img-fluid" width="200" height="200">
        </span>
        <div>
        <span class="about-small">
       It is a long established fact that a reader will be 
     distracted by the readable content of a page when
    looking at its layout. The point of using Lorem Ipsum is that
     it has a more-or-less normal distribution of letters, as opposed to 
    using 'Content here, content here', making it look like readable English.
    Many desktop publishing packages and web page editors now use Lorem Ipsum
    as their default model text, and a search for 'lorem ipsum' will
    It is a long established fact that a reader will be 
     distracted by the readable content of a page when
       </span>
        </div>
       <div class="about-button">
            <a href="#contact" class="btn btn-xlarge btn-blog-one">Drop Me A Line</a>
       </div>
       <hr>
    </div>
    <div class="container">
        <?php include("includes/contact.php") ?>
    </div>
   </div>

<?php include("includes/footer.php") ?>









    
     <script src="js/jquery-3.3.1.js"></script>
     <script src="js/bootstrap.min.js"></script>
     <script src="js/index.js"></script>
</body>

</html>