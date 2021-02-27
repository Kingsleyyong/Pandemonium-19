<?php
session_start();

	include("../database/connect.php");
	include("../signin_signup_signout_forgetpass_automail/function.php");

	$user_data = check_log($con);
    $upic = $user_data["profilePicture"];
    $uname = $user_data["userName"];
    $ugender = $user_data["gender"];
    $udob = $user_data["dateOfBirth"];
    $ucontact = $user_data["userContact"];
    $uemail = $user_data["userEmail"];
    $uaddress = $user_data["residentialAddress"];
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Profile</title>
        <link rel="stylesheet" href="../assets/style2.css"/>
        <link rel="stylesheet"  href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" 
                                integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" 
                                crossorigin="anonymous">
        <script type="text/javascript" src="../assets/javascript1.js"></script>
        <!-- NAV UI Import here -->
        <?php require("../Navigation Bar and Footer/navbar.html"); ?> 
    </head>
    <body class="bg-dark text-light">
        <div class="container-fluid">
            <div class="row">
                <div class="col-4">
                    <?php echo '<img class="d-block mx-auto" src="data:image/jpeg;base64,'
                            .base64_encode($upic).'" alt="Default Profile Pictur"/>'?>
                </div>
                <div id="field">
                    <div class="form-group">
                        <label class="pr-4 mr-5">Username : </label>
                        <label class="form-control-lg ml-2"><?php echo $uname; ?></label>
                    </div>
                    <p><label class="pr-5 mr-5">Gender : </label>
                        <label class="mx-3"><?php echo $ugender; ?></label>
                    </p>
                    <div class="form-group">
                        <label class="pr-5 mr-3">Date of Birth : </label>
                        <label class="form-control-lg"><?php echo $udob; ?></label>
                    </div>
                    <div class="form-group">
                        <label class="pr-4 mr-1">Contact Number : </label>
                        <label class="form-control-lg"><?php echo $ucontact; ?></label>
                    </div>
                    <div class="form-group">
                        <label class="pr-5">Email Address : </label>
                        <label class="form-control-lg"><?php echo $uemail; ?></label>
                    </div>
                    <p><label>Residential Address : </label>
                        <textarae rows="6" cols="51" class="form-control-lg"><?php echo $uaddress; ?></textarea>
                    </p>
                </div>
            </form>
            <a href="EditProfile.php"><button name="editbtn" id="editbtn" class="btn btn-primary m-auto" value="EDIT">EDIT</button>
        </div>
        <!-- Footer UI Import Here -->
        <?php require("../Navigation Bar and Footer/footer.html"); ?> 
    </body>
</html>