<?php  
$db = mysqli_connect("localhost", "root", "", "my_blog");
?>
<?php


   
   


//get cats
function get_cats(){
    global $db;
    $get_cats = "SELECT * FROM services_categories";
    $run_cats = mysqli_query($db, $get_cats);

    while($row_cats = mysqli_fetch_array($run_cats)){

    $cat_id = $row_cats['cat_id'];
    $cat_title = $row_cats['cat_title'];

    echo "
    <li class='nav-item'><a href='index.php?cat=$cat_id' class='nav-link  ";
    if($_GET['cat'] == $cat_id) {echo " active ";}
   echo" '>$cat_title</a></li> ";
    }
}

//get jobs

function get_jobs() {
global $db;

if(!isset($_GET['cat'])) {
    $get_jobs = "SELECT * FROM jobs where status = 'approved' LIMIT 0, 6";

    $run_jobs = mysqli_query($db, $get_jobs);
    while($row_jobs = mysqli_fetch_array($run_jobs)){
        $job_id = $row_jobs['job_id'];
        $job_title = $row_jobs['job_title'];

        $job_price = $row_jobs['job_price'];

        $job_img1 = $row_jobs['job_img1'];



?>
 <div class="col-lg-4 col-md-6">
                    <div class="job-body">
                        <h3><?php echo $job_title ?></h3>
                        <img src="admin_area/job_images/<?php echo $job_img1?>" alt="" class="img-fluid">
                        <p>Price: $<?php echo $job_price ?></p>
                        <a href="details.php?job_id=<?php echo $job_id ?>" class="btn btn-warning">Details</a>
                        <a href="order_now.php?job_id=<?php echo $job_id ?>" class="btn btn-success">Order Now</a>
                    </div>
                </div>

<?php }}}?>

<?php 

function get_cat_jobs () {
    global $db;

    if(isset($_GET['cat'])){
        $cat_id = $_GET['cat'];

        $get_cat_job = "SELECT * FROM jobs WHERE cat_id = '$cat_id' AND status = 'approved'";
        $run_cat_job = mysqli_query($db, $get_cat_job);
        $count = mysqli_num_rows($run_cat_job);
        if($count == 0){
            echo "<h2>There Are No Jobs In This Category</h2>";
        
        }else{
            while($row_cat_job = mysqli_fetch_array($run_cat_job)){
                $job_id = $row_cat_job['job_id'];
                $job_title = $row_cat_job['job_title'];
                $job_price = $row_cat_job['job_price'];
                $job_img1 = $row_cat_job['job_img1'];
               
                echo "
                <div class='col-lg-4 col-md-6'>
                <div class='job-body'>
                    <h3> $job_title</h3>
                    <img src='admin_area/job_images/$job_img1' alt='' class='img-fluid'>
                    <p>Price: $ $job_price </p>
                    <a href='details.php?job_id=$job_id' class='btn btn-warning'>Details</a>
                    <a href='order_now.php?job_id=$job_id' class='btn btn-success'>Order Now</a>
                </div>
            </div>
                        
                    ";
            }
        }
    }
}

function details () {
    global $db;
    if(isset($_GET['job_id'])) {
        $details = $_GET['job_id'];

        $get_details = "SELECT * FROM jobs WHERE job_id = '$details' AND status = 'approved'";
        $run_details = mysqli_query($db, $get_details);

        $row_details = mysqli_fetch_array($run_details);
        $job_id = $row_details['job_id'];
        $job_title = $row_details['job_title'];
        $job_img1 = $row_details['job_img1'];
        $job_img2 = $row_details['job_img2'];
        $job_img3 = $row_details['job_img3'];
        $job_price = $row_details['job_price'];
        $job_desc = $row_details['job_desc'];
        echo "
        <div class=''>
        <div class='job'>
            <h3 class='text-center'> $job_title</h3>
            <img src='admin_area/job_images/$job_img1' alt='' class='img-fluid' class='d-block'>
            <img src='admin_area/job_images/$job_img2' alt='' class='img-fluid' class='d-block'>
            <img src='admin_area/job_images/$job_img3' alt='' class='img-fluid'class='d-block'>
            <p class='text-center mt-5'>Price: $ $job_price </p>
            <p class='mx-auto text-center'> $job_desc</>
                <p class='clearfix mt-3'> <a href='order_now.php?job_id=$job_id' class='w3-btn btn-success float-right'>Order Now</a>
                <a href='index.php' class='w3-btn btn-success float-left'>Back</a>
                </p>
                
        </div>
    </div>
                
            ";
    }

}





?>

