<h1 class="heading">Messages</h1>

<div class="table-responsive">

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Number</th>
                <th>Subject</th>
                <th>Description</th>
                <th>Download File</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $i = 0;

            $get_email = $_SESSION['customer_email'];

            $get_orders = "SELECT * FROM answer_order WHERE order_email = '$get_email'";
            $run_orders = mysqli_query($con, $get_orders);

            while ($row_orders = mysqli_fetch_array($run_orders)) {
                    $order_subject = $row_orders['order_subject'];
                    $order_desc = $row_orders['order_desc'];
                    $order_file = $row_orders['order_file'];
                    $order_id = $row_orders['order_id'];
                    $i++;
            

            ?>
            <tr>
                <td><?php echo $i ?></td>
                <td><?php echo $order_subject ?></td>
                <td><?php echo $order_desc ?></td>
                <td><a href="../admin_area/files/<?php echo $order_file ?>" download><?php echo $order_file ?></a></td>
                <td><a href="my_account.php?delete_order=<?php echo $order_id ?>">Delete</a></td>
            </tr>
            <?php }?>
        </tbody>
    </table>
</div>