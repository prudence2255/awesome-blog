<?php 
session_start();
include("includes/db.php");
if(!isset($_SESSION['customer_email'])) {
    echo "<script>window.open('../order_now.php','_self')</script>";
}else{

    $customer_email = $_SESSION['customer_email'];
    $get_customer = "SELECT * FROM customers WHERE customer_email = '$customer_email'";

    $run_customer = mysqli_query($con, $get_customer);
    $row_customer = mysqli_fetch_array($run_customer);

    $customer_name = $row_customer['customer_name'];
    $customer_image = $row_customer['customer_image'];
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
               <div class="profile-sidebar">
                    <div class="profile-userpic">
                      <img src="customer_images/<?php echo $customer_image;?>" alt="" class="img-fluid">  
                    </div>
                    <div class="profile-usertitle">
                        <div class="profile-usertitle-name">
                            <?php echo $customer_name ?>
                        </div>
                    </div>
                    <div class="profile-userbuttons">
                        <a type="button" href="logout.php" class="btn btn-success btn-sm">Logout</a>
                        <a type="button" href="my_account.php?answer_order" class="btn btn-danger btn-sm">Messages</a>
                    </div>
                    <div class="profile-usermenu">
                        <ul class="nav flex-column nav-pills">
                            <li class="nav-item"><a href="my_account.php?send_order"
                             class="nav-link <?php if(isset($_GET['send_order'])){echo 'active';} ?>">My Account</a></li>
                             <li class="nav-item"><a href="my_account.php?answer_order"
                             class="nav-link <?php if(isset($_GET['answer_order'])){echo 'active';} ?>">Receiving
                            Answers Messages / Orders Panel From Admin</a></li>
                             <li class="nav-item"><a href="my_account.php?confirm_payment"
                             class="nav-link <?php if(isset($_GET['confirm_payment'])){echo 'active';} ?>">Confirm Payment</a></li>
                             <li class="nav-item"><a href="my_account.php?edit_account"
                             class="nav-link <?php if(isset($_GET['edit_account'])){echo 'active';} ?>">Edit Account</a></li>
                             <li class="nav-item"><a href="my_account.php?change_pass"
                             class="nav-link <?php if(isset($_GET['change_pass'])){echo 'active';} ?>">Change Password</a></li>
                             <li class="nav-item"><a href="my_account.php?delete_account"
                             class="nav-link <?php if(isset($_GET['delete_account'])){echo 'active';} ?>">Delete Account</a></li>
                             <li class="nav-item"><a href="logout.php"
                             class="nav-link">Logout</a></li>
                            </ul>
                    </div>
               </div>
            </div>
            <div class="col-md-8 gray">
                <?php 
                    if(isset($_GET['send_order'])) {
                        include("send_order.php");
                    }

                    if(isset($_GET['answer_order'])) {
                        include("answer_order.php");
                    }
                    if(isset($_GET['delete_order'])) {
                        include("delete_order.php");
                    }
                    if(isset($_GET['confirm_payment'])) {
                        include("confirm_payment.php");
                    }
                    if(isset($_GET['edit_account'])) {
                        include("edit_account.php");
                    }
                    if(isset($_GET['change_pass'])) {
                        include("change_pass.php");
                    }
                    if(isset($_GET['delete_account'])) {
                        include("delete_account.php");
                    }
                ?>
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
                <?php };?>