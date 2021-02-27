<!DOCTYPE html>
<html>
    <head>
        <title>Edit Profile</title>
        <link rel="stylesheet" href="../assets/style2.css"/>
        <link rel="stylesheet"  href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" 
                                integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" 
                                crossorigin="anonymous">
        <script type="text/javascript" src="../assets/javascript1.js"></script>
        <!-- NAV UI Import here -->
        <?php require("../Navigation Bar and Footer/navbar.html"); ?> 
    </head>
    <body class="bg-dark">
        
        <div class="localbody pb-5">
            <form name="profileForm" id="profileForm" method="post">
                <div class="p-3 pt-4 ml-5">
                    <p id="dp">
                        <img src="../assets/default.jpg" alt="Default Profile Picture"/><br/>
                        <input type="file" name="displayPicture" accept="image/*" id="dpt" onchange="changeImage();">
                    </p>
                </div>
                <div id="field">
                    <div class="form-group">
                        <label class="pr-4 mr-5">Username : </label>
                        <input type="text" name="username" class="form-control-lg ml-2" maxlength="24" size="48px" required/>
                    </div>
                    <p><label class="pr-5 mr-5">Gender : </label>
                        <input type="radio" class="mx-3" name="gender" value="Male" required/> Male
                        <input type="radio" class="mx-3" name="gender" value="Female" required/> Female
                    </p>
                    <div class="form-group">
                        <label class="pr-5 mr-3">Date of Birth : </label>
                        <input type="date" class="form-control-lg" name="dob" min="1941-01-01" max="2009-12-31" required/>
                    </div>
                    <div class="form-group">
                        <label class="pr-4 mr-1">Contact Number : </label>
                        <input type="tel" name="phone" class="form-control-lg" 
                            pattern="([0]{1}[1]{1}[0-9]{8})|([0]{1}[1]{1}[0-9]{9})" size="48px" 
                            placeholder="01X-(7 to 8 digits)" required>
                    </div>
                    <div class="form-group">
                        <label class="pr-5">Email Address : </label>
                        <input type="email" class="form-control-lg" name="email" size="48px" required/>
                    </div>
                    <div class="form-group">
                        <label class="pr-4">User Password : </label>
                        <input type="password" class="form-control-lg" name="password" size="48px" required/>
                    </div>
                    <p><label>Residential Address : </label>
                        <textarea name="address" class="form-control-lg" rows="6" cols="51" required></textarea>
                    </p>
                    <button type="submit" name="savebtn" id="savebtn" class="btn btn-primary m-auto" value="SAVE">SAVE</button>
                </div>
            </form>
        </div>
        <!-- Footer UI Import Here -->
        <?php require("../Navigation Bar and Footer/footer.html"); ?> 
    </body>

    <?php include("data_connection.php");

        if(isset($_POST['savebtn'])){
            $pic = $_POST['displayPicture'];
            $username = $_POST['username'];
            $gender = $_POST['gender'];
            $birthday = $_POST['dob'];
            $contactNumber = $_POST['phone'];
            $email = $_POST['email'];
            $address = $_POST['address'];
            $pass = $_POST['password'];
            $id = ['userID'];

            $query =    "UPDATE user 
                        SET userName = '$username', userEmail = '$gender', userContact = '$contactNumber',
                        userPassword = '$pass',
                        gender = '$gender', dateOfdate = '$birthday', residentalAddress = '$address',
                            profilePicture = '$pic' FROM user WHERE userID = '$id'";

            if ($result = mysqli_query($conn, $query))
            {
                ?>
                <script type="text/javascript">
                    alert("User Details Updated");
                </script>
                <?php
            }
        }
    ?>
</html>