<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mechandise</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="shortcut icon" href="./assets/favicon.png" type="image/x-icon">
    <!-- NAV UI Import here -->
    <?php require("navbar.html"); ?> 
</head>
<body class="bg-dark">
<?php
    include('connect.php');
    $sql = 'SELECT ItemPrice FROM item order by ItemID';
    $result = mysqli_query($con, $sql);
    $items = mysqli_fetch_assoc($result);
?>
<body>
    <div class="container-fluid p-5">
        <div class="row bg-light justify-content-md-center rounded my-2">
            <!-- This div is for one product (above this line) -->
            <div class="col m-auto">
                <!-- Product Image goes here -->
                <img src="assets/default-image.png" width="100px" alt="product image">
            </div>
            <div class="col-8">
                <h3>Product Name</h3>
                <p>Product Description here <br>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            </div>
            <div class="col my-auto">
                <!-- Product price and edit logic -->
                <p>RMXX.XX</p>
                <input type="button" value="Add to cart" class="btn btn-primary">
            </div>
        </div>
    </div>
    <!-- Footer UI Import Here -->
    <?php require("footer.html"); ?> 
</body>
</html>