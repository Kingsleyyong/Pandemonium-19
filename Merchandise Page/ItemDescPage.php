<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./assets/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Item Description Page</title>
</head>

<?php
    require ('../Database/connect.php');
    if(isset($_GET['pageMerchan'])){
        $ID = mysqli_real_escape_string($con,$_GET['id']);

        $sql = "SELECT itemName, itemPrice, itemDescription, itemColour, itemSize, stockNumber, image FROM item WHERE itemID = '$ID'";

        $result = mysqli_query($con, $sql) or die("error");

        $info = mysqli_fetch_assoc($result);
        
    }
    else{
        echo "not connected";
    }
    
?>

<body>
    <div class="container">
        <div class="row rounded bg-dark text-light p-4">
            <div id="col-sm">
                <img src="../assets/cloth mask.png" class="rounded mx-auto d-block" width="200px" alt="">
            </div>
            <div class="col-sm mx-4">
                <h1> <?php echo $info['itemName'];?> </h1>
                <div class="rounded bg-info p-2 my-3">
                    <p class="font-weight-bold" id="itemPrice">RM <?php echo $info['itemPrice'];?></p>
                    <p id="itemDescription"><?php echo $info['itemDescription'];?></p>
                    <p for="stockLeft">Stock Left:  <?php echo $info['stockNumber'];?></p>
                    <p for="choices">Color: <?php echo $info['itemColour'];?> </p>
                </div>
                <form action="CartPage.php" method="post" class="pb-4">
                    <div>
                        <label for="quantity">Quantity: </label>
                        <button class="btn btn-danger" onclick="minus()">-</button>
                        <span id="quantityValue" name="quantity"></span>
                        <button class="btn btn-success" onclick="plus()">+</button>
                    </div>
                    <br>
                    <input type="submit" name="addToCart" class="btn btn-primary" value="Add To Cart">
                </form>
            </div>
        </div>
    </div>

    <?php
        if(isset($_POST['addTocart'])){
            $quantity = $_POST['quantity'];
            
        }
    ?>
    
    <script>
        var value=0;
        document.getElementById("quantityValue").innerHTML=value;
        function minus(){
            if(value!=0){
                value -= 1;
                document.getElementById("quantityValue").innerHTML=value;
            }
        }
        function plus(){
            value += 1;
            document.getElementById("quantityValue").innerHTML=value;
        }
    </script>
</body>
</html>
