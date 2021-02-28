<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="shortcut icon" href="../assets/favicon.png" type="image/x-icon">
</head>
<body>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="../Index Page/main.php">PANDEMONIUM-19</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mx-auto">
            <li class="nav-item">
              <a class="nav-link mx-3" href="../Index Page/main.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link mx-3" href="../Merchandise Page/MerchandiseMenuPage.php">Merchandise</a>
            </li>
            <li class="nav-item">
                <a class="nav-link mx-3" href="../Testimonial Page/Testimonial.php">Testimonials</a>
            </li>
            <li class="nav-item">
                <a class="nav-link mx-3" href="../About Us Page/AboutUs.php">About Us</a>
            </li>
          </ul>
              <input type="button" class="btn btn-primary mx-2" value="Register">
              <input type="button" class="btn btn-light mx-2" value="Log In">

            <div class="dropdown-menu col align-self-end">
              <div style="font-weight: bold; "><?php echo "Hi, ".$uname?></div>
              <a class="dropdown-item" href="../Profile/ViewProfile.php?view&uid=<?php echo $user_data["userID"]; ?>">View Profile</a>
              <a class="dropdown-item" href="../Profile/EditProfile.php?view&uid=<?php echo $user_data["userID"]; ?>">Edit Profile</a>
              <a class="dropdown-item" href="../Merchandise Page/CartPage.php?id=<?php echo $uID; ?>">Your Cart</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="../signin_signup_signout_forgetpass_automail/SignInUp_UI.php">Log In</a>
            </div>
        </div>
      </nav>
</body>
</html>