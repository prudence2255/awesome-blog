<?php 
@session_start();

include("includes/connection.php");
if(!isset($_SESSION['admin_email'])):
    echo "
        <script>window.open('login.php', '_self')</script>
        ";
else:

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>View Users</title>
</head>
<body>
    <div class="row">
        <div class="col-lg-12">
            <ol class="breadcrumb">
                <li>
                    <i class="material-icons">dashboard</i> Dashboard / View Users
                </li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header w3-blue">
                    <h3 class="card-title text-center w-100">
                        <i class="fa fa-users"></i> View Users
                    </h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>User ID</th>
                                    <th>User Name</th>
                                    <th>User Email</th>
                                    <th>User Contact</th>
                                    <th>User Country</th>
                                    <th>User Job</th>
                                    <th>User About</th>
                                    <th>User Image</th>
                                    <th>Remove User</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php  
                                $i = 0;

                                $get_users = "SELECT * FROM admins";

                                $run_users = mysqli_query($con, $get_users);
                                while($row_users = mysqli_fetch_array($run_users)):
                                    $user_id = $row_users['admin_id'];
                                    $user_name = $row_users['admin_name'];
                                    $user_contact = $row_users['admin_contact'];
                                    $user_email = $row_users['admin_email'];
                                    $user_country = $row_users['admin_country'];
                                    $user_job = $row_users['admin_job'];
                                    $user_image = $row_users['admin_image'];
                                    $user_about = $row_users['admin_about'];
                                    $i++;

        
                                ?>
                                <tr>
                                    <td><?php echo $i;  ?></td>
                                    <td><?php echo $user_name;  ?></td>
                                    <td><?php echo $user_email;  ?></td>
                                    <td><?php echo $user_contact;  ?></td>
                                    <td><?php echo $user_country;  ?></td>
                                    <td><?php echo $user_job;  ?></td>
                                    <td><?php echo $user_about;  ?></td>
                                    <td><img src="admin_images/<?php echo $user_image ?>" alt="" style="width:50px; heght:50px;"></td>
                                    <td><a href="index.php?delete_user=<?php echo $user_id ?>">
                                    <i class="fas fa-trash"></i>delete</a></td>
                                </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

<?php endif; ?>