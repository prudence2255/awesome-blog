
<script src="tinymce/js/tinymce/tinymce.min.js"></script>
<script>
    tinymce.init({
        selector: '#textarea'
    })
    </script>

<h1 class="heading">Panel For Sending messages or orders to admin</h1>
<form action="my_account.php?send_order" method="post" enctype="multipart/form-data" class="form-horizontal">
    <div class="form-group row">
        <label for="" class="control-label col-md-2">Subject</label>
        <div class="col-md-7">
            <input type="text" class="form-control" name="subject" placeholder="subject">
        </div>
    </div>
    <div class="form-group row">
        <label for="" class="control-label col-md-2">Description</label>
        <div class="col-md-7">
           <textarea name="desc" id="textarea" cols="30" rows="10"></textarea>
        </div>
    </div>
    
    <div class="form-group row">
        <label for="" class="control-label col-md-2">Image / File</label>
        <div class="col-md-7">
            <input type="file" class="form-control" name="file">
        </div>
    </div>
    <div class="form-group row">
        <label for="" class="control-label col-md-2"></label>
        <div class="col-md-7">
            <input type="submit" class="form-control btn btn-primary" name="submit" value="send">
        </div>
    </div>
    

</form>

<?php

if(isset($_POST['submit'])) {
    $subject = mysqli_real_escape_string($con, $_POST['subject']);
    $desc = mysqli_real_escape_string($con, $_POST['desc']);
    $file = $_FILES['file']['name'];
    $tmp = $_FILES['file']['tmp_name'];
    
    move_uploaded_file($tmp, "files/$file");
    $get_email = $_SESSION['customer_email'];
    
    $insert_oredr = "INSERT INTO customer_order (order_subject, order_desc, order_file, order_email)
                    VALUES ('$subject', '$desc', '$file', '$get_email')";
    
    $run_order = mysqli_query($con, $insert_oredr);
    
    if($run_order) {
    echo "
        <script> alert('Your Message Has Been Sent, We Will Respond To You Shortly')</script>
        ";
     echo 
           " <br>
            <table class='table table-bordered table-striped '>
                <thead>
                <tr>
                <th>Subject</th>
                <th>Description</th>
                <th>File / Image</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                <td>$subject</td>
                <td>$desc</td>
                <td><a href='files/$file' download>$file</a></td>
                </tr>
                </tbody>
            </table>
            <h2 class='heading'><a href='my_account.php?send_order'>Go Back</a></h2>";
     
           
    }
}

?>