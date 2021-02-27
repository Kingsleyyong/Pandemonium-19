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
                    <img src="../assets/default.jpg" class="d-block mx-auto" alt="Default Profile Picture"/><br/>
                    <input type="file" name="displayPicture" accept="image/*" id="dpt" onchange="changeImage();">
                </div>
                <div class="col">
                    <form name="profileForm" id="profileForm" method="post">
                        <div class="container form-group">
                            <div class="row my-2">
                                <div class="col">
                                    <label>Username : </label>
                                    <input type="text" name="username" class="form-control" maxlength="24" size="48px" required/>
                                </div>
                            </div>
                            <div class="row my-2">
                                <div class="col">
                                    <label class="mr-4 pr-4">Gender : </label>
                                    <input type="radio" class="ml-4 mr-2"name="gender" value="Male" required/> Male
                                    <input type="radio" class="ml-4 mr-2"name="gender" value="Female" required/> Female
                                </div>
                            </div>
                            <div class="row my-2">
                                <div class="col">
                                    <label>Date of Birth : </label>
                                    <input type="date" class="form-control" name="dob" min="1941-01-01" max="2009-12-31" required/>
                                </div>
                            </div>
                            <div class="row my-2">
                                <div class="col">
                                    <label>Contact Number : </label>
                                    <input type="tel" name="phone" class="form-control" 
                                        pattern="([0]{1}[1]{1}[0-9]{8})|([0]{1}[1]{1}[0-9]{9})" size="48px" 
                                        placeholder="01X-(7 to 8 digits)" required>
                                </div>
                            </div>
                            <div class="row my-2">
                                <div class="col">
                                    <label>Email Address : </label>
                                    <input type="email" class="form-control" name="email" size="48px" required/>
                                </div>
                            </div>
                            <div class="row my-2">
                                <div class="col">
                                    <label class="pr-4">User Password : </label>
                                    <input type="password" class="form-control-lg" name="password" size="48px" required/>
                                </div>
                            </div>
                            <div class="row my-2">
                                <div class="col">
                                    <label>Residential Address : </label>
                                    <textarea name="address" class="form-control" rows="6" cols="51" required></textarea>
                                </div>
                            </div>
                            <div class="row my-2">
                                <div class="col">
                                    <button type="submit" name="savebtn" id="savebtn" class="btn btn-primary m-auto" value="SAVE">SAVE</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Footer UI Import Here -->
        <?php require("../Navigation Bar and Footer/footer.html"); ?> 
    </body><body class="bg-dark text-light">
        <div class="container-fluid">
            <div class="row">
                <div class="col-4">
                    <img src="../assets/default.jpg" class="d-block mx-auto" alt="Default Profile Picture"/><br/>
                    <input type="file" name="displayPicture" accept="image/*" id="dpt" onchange="changeImage();">
                </div>
                <div class="col">
                    <form name="profileForm" id="profileForm" method="post">
                        <div class="container form-group">
                            <div class="row my-2">
                                <div class="col">
                                    <label>Username : </label>
                                    <input type="text" name="username" class="form-control" maxlength="24" size="48px" required/>
                                </div>
                            </div>
                            <div class="row my-2">
                                <div class="col">
                                    <label class="mr-4 pr-4">Gender : </label>
                                    <input type="radio" class="ml-4 mr-2"name="gender" value="Male" required/> Male
                                    <input type="radio" class="ml-4 mr-2"name="gender" value="Female" required/> Female
                                </div>
                            </div>
                            <div class="row my-2">
                                <div class="col">
                                    <label>Date of Birth : </label>
                                    <input type="date" class="form-control" name="dob" min="1941-01-01" max="2009-12-31" required/>
                                </div>
                            </div>
                            <div class="row my-2">
                                <div class="col">
                                    <label>Contact Number : </label>
                                    <input type="tel" name="phone" class="form-control" 
                                        pattern="([0]{1}[1]{1}[0-9]{8})|([0]{1}[1]{1}[0-9]{9})" size="48px" 
                                        placeholder="01X-(7 to 8 digits)" required>
                                </div>
                            </div>
                            <div class="row my-2">
                                <div class="col">
                                    <label>Email Address : </label>
                                    <input type="email" class="form-control" name="email" size="48px" required/>
                                </div>
                            </div>
                            <div class="row my-2">
                                <div class="col">
                                    <label class="pr-4">User Password : </label>
                                    <input type="password" class="form-control-lg" name="password" size="48px" required/>
                                </div>
                            </div>
                            <div class="row my-2">
                                <div class="col">
                                    <label>Residential Address : </label>
                                    <textarea name="address" class="form-control" rows="6" cols="51" required></textarea>
                                </div>
                            </div>
                            <div class="row my-2">
                                <div class="col">
                                    <button type="submit" name="savebtn" id="savebtn" class="btn btn-primary m-auto" value="SAVE">SAVE</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Footer UI Import Here -->
        <?php require("../Navigation Bar and Footer/footer.html"); ?> 
    </body>
</html>