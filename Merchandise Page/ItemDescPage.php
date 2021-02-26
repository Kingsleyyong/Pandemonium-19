<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap/min/js"></script>
    <link rel="shortcut icon" href="../assets/favicon.png" type="image/x-icon">
    <title>Item Description Page</title>
</head>

<?php
    require ('../Database/connect.php');
    if(isset($_GET['id'])){
        $ID = $_GET['id'];
        $ID = mysqli_real_escape_string($con, $_GET['id']);

        $sql = 'SELECT itemName, itemPrice, itemDescription, itemColour, itemSize, stockNumber, image FROM item WHERE itemID = "$ID"';

        $result = mysqli_query($con, $sql);

        $info = mysqli_fetch_assoc($result);
        
    }
    
?>

<body>
    <div class="bg-dark d-flex justify-content-center">
        <div class="p-3">PANDEMONIUM-19</div>
        <div class="ml-auto p-3"><a href="CartPage.php"><img src="" alt="CartLogo"></a></div>
    </div>

    <div id="picGroup">
        <div id="multiPic">
            <ul>
                <li class="picSelection"><img src="" alt=""></li>
                <li class="picSelection"><img src="" alt=""></li>
                <li class="picSelection"><img src="" alt=""></li>
            </ul>
        </div>
        <div id="mainPic"><?php echo '<img width = 150dp height = 130dp src="data:image/jpeg;base64,'.
                    base64_encode( $info['image'] ).'"/>'; ?>" alt=""></div>
    </div>

    <div id="descriptionGroup">
        <h1> <?php echo $info['itemName'];?> </h1>
        <p id="itemPrice">RM <?php echo $info['itemPrice'];?></p>
        <p id="itemDescription"><?php echo $info['itemDescription'];?></p>
        <br>
        <label for="stockLeft">Stock Left: <?php echo $info['stockNumber'];?></label>

        <form action="">
            <label for="choices">Colour: <?php echo $info['itemColour'];?></label>
            <select name="maskChoices" id="choice">
                <option value=""></option>
            </select>
        </form>

        <label for="quantity">Quantity: </label>
        <button onclick="minus()">-</button>
        <span id="quantityValue"></span>
        <button onclick="plus()">+</button>
        <br>

        <input type="submit" value="Add To Cart">
    </div>
    
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