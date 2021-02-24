<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mechandise</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" 
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" 
    crossorigin="anonymous">
    <script>
        function describePageOpen(){
            window.open("ItemDescPage.php");
        }
    </script>

    <!-- NAV UI Import here -->
    <?php require("../Navigation Bar and Footer/navbar.html"); ?> 
</head>
<body class="bg-dark">
<?php
    require ('../Database/connect.php');

    //query from item table
    $sql = 'SELECT ItemName, ItemPrice, ItemDescription FROM item ORDER BY ItemID'; 
    $sql_image = 'SELECT itemID, image FROM itemimg ORDER BY itemID';
    
    //make query & get result
    $result = mysqli_query($con, $sql); 

    //fetch the result's row as an array
    $items = mysqli_fetch_all($result, MYSQLI_ASSOC);

    
?>
<body>
        <div class="container-fluid p-5" >
        <div class="row row-cols-3">
            <?php foreach ($items as $item){ ?>
   
        
                <div class="row-cols-1 bg-light rounded m-2 p-2" onclick="describePageOpen()">
                    <!-- This div is for one product (above this line) -->
                    <div class="col m-auto">
                        <!-- Product Image goes here -->
                        <?php echo '<img src="data:image/jpeg;base64,'.base64_encode( $item['ItemMedia'] ).'"/>'; ?>
                    </div>
                    <div class="col">
                        <h3><?php echo $item["ItemName"]; ?></h3>
                        <p><?php echo $item["ItemDescription"]; ?></p>
                    </div>
                    <div class="col my-auto">
                        <!-- Product price and edit logic -->
                        <p>RM <?php echo $item["ItemPrice"]; ?> </p>
                    </div>
                </div>
            

    <?php } ?>
    </div>
        </div>

    <!-- Footer UI Import Here -->
    <?php require("../Navigation Bar and Footer/footer.html"); ?> 
</body>
</html>