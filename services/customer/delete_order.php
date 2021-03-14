<?php 
if(isset($_GET['delete_order'])) {
    $delete_id = $_GET['delete_order'];

    $delete_order = "DELETE FROM answer_order WHERE order_id = '$delete_id'";

    $run_delete = mysqli_query($con, $delete_order);
    if($run_delete) {
        echo  "<script>alert('One order has been deleted')</script>";

        echo "<script>window.open('my_account.php?send_order', '_self')</script>";
    }
}
?>