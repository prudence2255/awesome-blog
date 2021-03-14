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
    <title>View Categories</title>
</head>
<body>
    <div class="row">
        <div class="col-lg-12">
           
                <ol  class="breadcrumb">
                    <li><i class="material-icons">dashboard</i> Dashboard / View Categories</li>
                </ol>
         
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"><i></i>View Categories</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>Category ID</th>
                                    <th>Category title</th>
                                    <th>Edit Category</th>
                                    <th>delete category</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $i = 0;
                                $get_cats = "SELECT * FROM  categories";
                                $run_cats = mysqli_query($con, $get_cats);

                                while($row_cats = mysqli_fetch_array($run_cats)):
                                    $cat_id = $row_cats['category_id'];
                                    $cat_title = $row_cats['category_title'];
                                    $i++;
                                ?>
                                <tr>
                                    <td><?php echo $i ?></td>
                                    <td><?php echo $cat_title ?></td>
                                    <td><a href="index.php?edit_cat=<?php echo $cat_id ?>"><i class="fas fa-edit"></i> Edit</a></td>
                                    <td><a href="index.php?delete_cat=<?php echo $cat_id ?>"><i class="fas fa-trash"></i> delete</a></td>
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