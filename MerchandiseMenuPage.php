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
    require ('connect.php');

    //query from database's table
    $sql = 'SELECT ItemName, ItemPrice, ItemDescription, ItemMedia FROM item ORDER BY ItemID'; 
    
    //make query & get result
    $result = mysqli_query($con, $sql); 

    //fetch the result's row as an array
    $items = mysqli_fetch_all($result, MYSQLI_ASSOC);

    
?>
<body>

    <?php foreach ($items as $item){ ?>
   
        <div class="container-fluid p-5">
            <div class="row bg-light justify-content-md-center rounded my-2">
                <!-- This div is for one product (above this line) -->
                <div class="col m-auto">
                    <!-- Product Image goes here -->
                    <?php echo '<img src="data:image/jpeg;base64,'.base64_encode( $item['ItemMedia'] ).'"/>'; ?>
                </div>
                <div class="col-8">
                    <h3><?php echo $item["ItemName"]; ?></h3>
                    <p><?php echo $item["ItemDescription"]; ?></p>
                </div>
                <div class="col my-auto">
                    <!-- Product price and edit logic -->
                    <p>RM <?php echo $item["ItemPrice"]; ?> </p>
                    <a href="CartPage.php"><input type="button" value="Add to cart" class="btn btn-primary"></a> 
                </div>
            </div>
        </div>

    <?php } ?>

    <!-- Footer UI Import Here -->
    <?php require("footer.html"); ?> 
</body>
</html>