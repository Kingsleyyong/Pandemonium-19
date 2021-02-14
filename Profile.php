<!DOCTYPE html>
<html>
    <head>
        <title>Edit Profile</title>
        <link rel="stylesheet" href="assets/style2.css"/>
        <script type="text/javascript" src="assets/javascript1.js"></script>
        <!-- NAV UI Import here -->
        <?php require("navbar.html"); ?> 
    </head>
    <body>
        <form name="profileForm" id="profileForm">
            <div>
                <p id="dp">
                    <img src="assets/default.jpg" alt="Default Profile Picture"/><br/>
                    <input type="file" name="displayPicture" accept="image/*" id="dpt" onchange="changeImage();">
                </p>
            </div>
            <div id="field">
                <p><label>Username : </label>
                    <input type="text" name="username" maxlength="24" size="48px" required/>
                </p>
                <p><label>Gender : </label>
                    <input type="radio" name="gender" value="Male" required/> Male
                    <input type="radio" name="gender" value="Female" required/> Female
                </p>
                <p><label>Date of Birth : </label>
                    <input type="date" name="dob" min="1941-01-01" max="2009-12-31" required/>
                </p>
                <p><label>Contact Number : </label>
                    <input type="tel" name="phone" pattern="([0]{1}[1]{1}[0-9]{8})|([0]{1}[1]{1}[0-9]{9})" size="48px" placeholder="01X-(7 to 8 digits)" required>
                </p>
                <p><label>Email Address : </label>
                    <input type="email" name="email" size="48px" required/>
                </p>
                <p><label>Residential Address : </label>
                    <textarea name="address" rows="6" cols="51" required></textarea>
                </p>
                <button type="submit" name="savebtn" id="savebtn" value="SAVE">SAVE</button>
            </div>
        </form>

        <!-- Footer UI Import Here -->
        <?php require("footer.html"); ?> 
    </body>
</html>