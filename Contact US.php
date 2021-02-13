<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contact Us</title>
    <link href="Contact US.css" rel="stylesheet">
</head>
<body style="margin: auto;display: block;width: 600px">

<form action="" name="Contact form" method="post">
    <div class="contact_mail" style="padding-bottom: 30px">
        <p>Contact Us for support or any question at <a href="">www@.gmail.com</a></p> <!--hyperlink for our gmail-->
        <p>GET IN TOUCH AND WE WILL BE IN TOUCH AS SOON AS POSSIBLE</p>
    </div>
    <div class="contact_mail">
        <label>First Name<span class="asterisk">*</span></label><!--do the asterisk red colour-->
        <input type="text" name="fname" id="fname" size="30" required>
        <!-- first name -->
        <label style="position: relative;right: 70px">Last Name<span class="asterisk">*</span></label>
        <!-- last name -->
        <!--do the asterisk red colour-->
        <input type="text" name="lname" id="lname" size="23" required>
    </div>
    <div class="contactmail2">
        <label>Your Email<span class="asterisk">*</span></label>
        <input type="email" name="email" id="email" size="60" required>
        <!-- email -->
    </div>
    <div class="contactmail3">
        <label>Phone Numbers</label>
        <input type="tel" name="phone" id="phone" size="60">
        <!-- phone number -->
    </div>
    <div class="contactmail4">
        <label id="messa">Message</label>
        <textarea name="message" id="message" rows="5" cols="56" placeholder="Leave your message here..."></textarea>
        <!-- message -->
    </div>
    <div id="submission">
        <input type="submit" name="Submission" value="Submit" id="co" >
    </div>
    <div >
        <p><iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15938.441917421716!2d101.6419004!3d2.9277715!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xd0f74e8ad10f1129!2sMultimedia%20University%20-%20MMU%20Cyberjaya!5e0!3m2!1sen!2smy!4v1611408350513!5m2!1sen!2smy"
                width="250" height="250" frameborder="0"
                style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0" id="map"></iframe></p>
        <p id="location">Persiaran Multimedia, 63100 Cyberjaya, Selangor</p>
    </div>
</form>
</body>
</html>

<!-- PHP Side -->
<?php include "contact_us_PHP.php" ?>
