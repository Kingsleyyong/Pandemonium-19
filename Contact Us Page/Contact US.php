<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contact Us</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!--<link href="../assets/CSS/Contact Us.css" rel="stylesheet">-->
</head>
<body class="bg-dark text-light">
    <div class="col">
        <p class="text-center">Contact Us for support or any question at <a href="mailto:www@gmail.com">www@gmail.com</a></p> <!--hyperlink for our gmail-->
        <p class="text-center">GET IN TOUCH AND WE WILL BE IN TOUCH AS SOON AS POSSIBLE</p>
    </div>
    <div class="container">
        <div class="row">
            <div class="col">
                <form action="" name="Contact form" method="post">
                    <div class="container form-group">
                        <div class="row mb-3">
                            <div class="col">
                                <label>First Name<span>*</span></label><!--do the asterisk red colour-->
                                <input type="text" class="form-control" name="fname" id="fname" size="30" required>
                            </div>
                            <div class="col">
                                <label>Last Name<span class="asterisk">*</span></label>
                                <input type="text" class="form-control" name="lname" id="lname" size="23" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <label>Your Email<span class="asterisk">*</span></label>
                                <input type="email" class="form-control" name="email" id="email" size="60" required> 
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <label>Phone Numbers</label>
                                <input type="tel" class="form-control" name="phone" id="phone" size="60">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <label id="messa">Message</label>
                                <textarea name="message" class="form-control" id="message" rows="5" cols="56" placeholder="Leave your message here..."></textarea>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <input type="submit" class="btn btn-primary" name="Submission" value="Submit" id="co">  
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col">
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15938.441917421716!2d101.6419004!3d2.9277715!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xd0f74e8ad10f1129!2sMultimedia%20University%20-%20MMU%20Cyberjaya!5e0!3m2!1sen!2smy!4v1611408350513!5m2!1sen!2smy"
                width="250" height="250" frameborder="0"
                style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0" id="map" class="d-block mx-auto"></iframe>
                <p class="text-center">Persiaran Multimedia, 63100 Cyberjaya, Selangor</p>
            </div>
        </div>
    </div>
</body>
</html>

<!-- PHP Side -->
<?php include("data_connection.php");

if(isset($_POST["Submission"]))
{
    $first_name = $_POST["fname"];
    $last_name = $_POST["lname"];
    $email = $_POST["email"];
    $phone_number = $_POST["phone"];
    $message = $_POST["message"];

    $info = "INSERT INTO contact (firstName, lastName, contactNumber, contactEmail, message)
            values ('$first_name', '$last_name', '$phone_number', '$email', '$message')";

    if ($result = mysqli_query($conn, $info))
    {
        ?>
        <script type="text/javascript">
            alert("Thank You " + "<?php echo $first_name?>" + " for responding!");
        </script>
        <?php
    }
}
?>
