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
                        <label class="form-control-lg ml-2"><?php echo "test"; ?></label>
                        <!-- <input type="text" name="username" class="form-control-lg ml-2" maxlength="24" size="48px" /> -->
                    </div>
                    <p><label class="pr-5 mr-5">Gender : </label>
                        <input type="radio" class="mx-3" name="gender" value="Male" /> Male
                        <input type="radio" class="mx-3" name="gender" value="Female" /> Female
                    </p>
                    <div class="form-group">
                        <label class="pr-5 mr-3">Date of Birth : </label>
                        <input type="date" class="form-control-lg" name="dob" min="1941-01-01" max="2009-12-31"/>
                    </div>
                    <div class="form-group">
                        <label class="pr-4 mr-1">Contact Number : </label>
                        <input type="tel" name="phone" class="form-control-lg" 
                            pattern="([0]{1}[1]{1}[0-9]{8})|([0]{1}[1]{1}[0-9]{9})" size="48px" 
                            placeholder="01X-(7 to 8 digits)" >
                    </div>
                    <div class="form-group">
                        <label class="pr-5">Email Address : </label>
                        <input type="email" class="form-control-lg" name="email" size="48px"/>
                    </div>
                    <div class="form-group">
                        <label class="pr-4">User Password : </label>
                        <input type="password" class="form-control-lg" name="password" size="48px" />
                    </div>
                    <p><label>Residential Address : </label>
                        <textarea name="address" class="form-control-lg" rows="6" cols="51" ></textarea>
                    </p>
                </div>
            </form>
            <a href="EditProfile.php"><button name="editbtn" id="editbtn" class="btn btn-primary m-auto" value="EDIT">EDIT</button>
        </div>
        <!-- Footer UI Import Here -->
        <?php require("../Navigation Bar and Footer/footer.html"); ?> 
    </body>
</html>