<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mechandise</title>
    <link rel="shortcut icon" href="./assets/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="assets/CSS/style_Mechandise.css">
    <!-- NAV UI Import here -->
    <?php require("navbar.html"); ?> 
</head>
<?php
    include('connect.php');
    $sql = 'SELECT ItemPrice FROM item order by ItemID';
    $result = mysqli_query($con, $sql);
    $items = mysqli_fetch_assoc($result);
?>
<body>
    <h1>Maybe will something here.</h1>
    <h6>
        Tal something about the money we get will be donate to somewhere.
        (Low power from 3 to 8; medium from 5 to 14; high from 7 to 21.) 
        Each eyepiece is provided with a dummy eyepiece which comes opposite 
        to the eye which is not observing and permits of it being kept open.
    </h6>

    
    <div class="container">
        <?php 
            for($i=0; $i<count($items); $i++){
               echo $items['ItemPrice'];
            }
        ?>
    </div>
    

    <!-- <div>
        <figure>
            <img src="images/cloth mask.png" alt="">
            <figcaption>Cotton Mask</figcaption>
        </figure>
        <figure>
            <img src="images/hat.png" alt="">
            <figcaption>Hat</figcaption>
        </figure>
        <figure>
            <img src="images/shirt.png" alt="">
            <figcaption>T-Shirt</figcaption>
        </figure>
    </div> -->
    
    <!-- Footer UI Import Here -->
    <?php require("footer.html"); ?> 
</body>
</html>