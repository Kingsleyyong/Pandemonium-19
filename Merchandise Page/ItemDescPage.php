<?php
session_start();
    require ('../Database/connect.php');
	include("../signin_signup_signout_forgetpass_automail/function.php");

	$user_data = check_log($con);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./assets/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Item Description Page</title>
</head>

<script>
        function minus(){
            if(value!=0){
                value -= 1;
                document.getElementById("quantityValue").innerHTML=value;
            }
        }
        function minus()
            {
                document.getElementById('quantityValue').value = parseInt(document.getElementById('quantityValue').value) - 1;

                var checknumifzero = parseInt(document.getElementById('quantityValue').value);

                if(checknumifzero < 1) //preventing to get negative value
                {
                    document.getElementById('quantityValue').value = 0;
                }
            }   

            function plus(max)
            {
                

                if(document.getElementById('quantityValue').value>=max)
                {
                    alert("No more stock left.");
                }
                else{
                    document.getElementById('quantityValue').value = parseInt(document.getElementById('quantityValue').value) + 1;
                }
            }
    </script>

<?php
    
    if(isset($_GET['pagepass'])){
        $ID = mysqli_real_escape_string($con, $_GET['id']);

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
                <?php echo '<img class="rounded mx-auto d-block" width="200px" alt="" width = 150dp 
                height = 130dp src="data:image/jpeg;base64,'.base64_encode( $info['image'] ).'"/>'; ?>
            </div>
            <div class="col-sm mx-4">
                <h1> <?php echo $info['itemName'];?> </h1>
                <div class="rounded bg-info p-2 my-3">
                    <p class="font-weight-bold" id="itemPrice">RM <?php echo $info['itemPrice'];?></p>
                    <p id="itemDescription"><?php echo $info['itemDescription'];?></p>
                    <p for="stockLeft">Stock Left:  <?php echo $info['stockNumber'];?></p>
                    <p for="choices">Color: <?php echo $info['itemColour'];?> </p>
                </div>
                <form action="" method="get">
                    <div class="pb-4">
                        <label for="quantity">Quantity: </label>
                        <input type="button" class="btn btn-danger" onclick="minus()" value="-">
                        <input type="number" id="quantityValue" name="quantity" value = 0 readonly style="background: transparent; border: 0; width:30px; color: white; text-align: center;">
                        <input type="button" class="btn btn-success" onclick="plus(<?php echo $info['stockNumber'];?>)" value="+">
                    </div><br>
                    <input type="submit" name="addToCart" class="btn btn-primary" value="Add To Cart">
                </form>
            </div>
        </div>
    </div>
<?php

    if(isset($_GET['addToCart'])){
        $quantity = $_GET['quantity']

        ?> <script>alert("<?php echo $quantity; ?>");</script> <?php

        $sql_getting_cartID = 'SELECT cartID FROM cart WHERE userID=$ID';

        $result = mysqli_query($con, $sql_getting_cartID);

        ?> <script>alert("<?php echo $result; ?>")</script> <?php

        $cartID = mysqli_fetch_assoc($result);

        ?> <script>alert("<?php echo $cartID; ?>")</script> <?php

        
    }

?>
</body>
</html>
