<div class="row">
    <div class="col-md-8 offset-md-2" id="contact">
        <h1 style="text-align:center;">Contact</h1>
        <form action="about.php" method="post" class="contact-form">
            <div class="row">
                <div class="col-md-6">
                    <input type="text" name="name" placeholder="Name" class="form-control input-lg">
                </div>
                <div class="col-md-6">
                    <input type="text" name="subject" placeholder="Subject" class="form-control input-lg">
                </div>
            </div>
            <input type="email" name="email" placeholder="email" class="form-control input-lg">
            <textarea name="message" id="" cols="30" rows="10" placeholder="Your Thoughts..."
            class="form-control input-lg"></textarea>
            <div class="button clearfix">
                <button type="submit" name="submit" class="btn btn-xlarge btn-blog-one">Submit</button>
            </div>
            <br>
        </form>
    </div>
</div>

<?php 
if(isset($_POST['submit'])) {
    $sender_name = $_POST['name'];
    $sender_subject = $_POST['subject'];
    $sender_email = $_POST['email'];
    $sender_message = $_POST['message'];
    $reciever_email = "alidubakpatalatif@gmail.com";
    if($sender_name = '' || $sender_subject = '' || $sender_email = '' || $sender_message = ''){
            echo "<script>alert('Please fill the required fields')</script>";
            header("location: about.php");
    }
    mail($reciever_email, $sender_name, $sender_subject, $sender_message, $sender_email);

    $email = $_POST['email'];
    $subject = "Welcome to my website";
    $msg = "I shall get to you soon, Thanks for sending us email";
    $from = "alidubakpatalatif@gmail.com";
    mail($email,$subject,$msg,$from);

    echo "<h3>Your Message has been sent!</h3>";
}

?>