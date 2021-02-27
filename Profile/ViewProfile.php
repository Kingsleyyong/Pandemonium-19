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
                    <?php echo '<img class="d-block mx-auto img-fluid" src="data:image/jpeg;base64,'
                            .base64_encode($upic).'" alt="Default Profile Pictur"/>'?>
                </div>
                <div class="col">
                    <div class="container-fluid">
                            <div class="row">
                                <div class="col-3 collttr">
                                    <label class="mx-2">Username : </label>
                                </div>
                                <div class="col">
                                    <label class="mx-2"><?php echo $uname; ?></label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-3 collttr">
                                    <label class="mx-2">Gender : </label>
                                </div>
                                <div class="col">
                                    <label class="mx-2"><?php echo $ugender; ?></label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-3 collttr">
                                    <label class="mx-2">Date of Birth : </label>
                                </div>
                                <div class="col">
                                    <label class="mx-2"><?php echo $udob; ?></label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-3 collttr">
                                    <label class="mx-2">Contact Number : </label>
                                </div>
                                <div class="col">
                                    <label class="mx-2"><?php echo $ucontact; ?></label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-3 collttr">
                                    <label class="mx-2">Email Address : </label>
                                </div>
                                <div class="col">
                                    <label class="mx-2"><?php echo $uemail; ?></label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-3 collttr">
                                    <label class="mx-2">Residential Address : </label>
                                </div>
                                <div class="col">
                                    <textarae rows="6" cols="51" class="form-control-lg"><?php echo $uaddress; ?></textarea>
                                </div>
                            </div>

                            <a href="EditProfile.php"><button name="editbtn" id="editbtn" class="btn btn-primary m-auto" value="EDIT">EDIT</button>
                            
                        </div>
                </div>
                
            </form>
        </div>
        <!-- Footer UI Import Here -->
        <?php require("../Navigation Bar and Footer/footer.html"); ?> 
    </body>
</html>