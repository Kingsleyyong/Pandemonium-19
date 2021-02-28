<?php
// session_start();
//     require ('../Database/connect.php');
// 	include("../signin_signup_signout_forgetpass_automail/function.php");

// 	$user_data = check_log($con);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./assets/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Item Description Page</title>
    <!-- NAV UI Import here -->
    <?php require("../Navigation Bar and Footer/navbar.php"); ?>
    
</head>
<style>
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
}
</style>
<script>
        function minus(){
            if(value!=0){
                value -= 1;
                document.getElementById("quantityValue").innerHTML=value;
            }
        }

        function plus(max){
            if(document.getElementById('quantityValue').value>=max){
                alert("No more stock left.");
            }else{
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

<body class="bg-dark">
    <div class="container ">
        <div class="row rounded bg-secondary text-light p-4">
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
                    <p for="size">Size: <?php echo $info['itemSize'];?> </p>

                </div>
                <form action="" method="get">
                    <div class="pb-4">
                        <input type=hidden id="itemID" name="itemID" value="<?php echo $ID;?>">
                        <label for="quantity">Quantity: </label>
                        <input type="button" class="btn btn-danger" onclick="minus()" value="-">
                        <input type="number" id="quantityValue" name="quantity" value = 0 readonly style="background: transparent; border: 0; 
                        width:30px; color: white; text-align: center; ">
                        <input type="button" class="btn btn-success" onclick="plus(<?php echo $info['stockNumber'];?>)" value="+">
                    </div><br>
                    <input type="submit" name="addToCart" class="btn btn-primary" value="Add To Cart">
                </form>
            </div>
        </div>
    </div>
<?php

    if(isset($_GET['addToCart'])){
        $quantity = $_GET['quantity'];
        $itemID = $_GET['itemID'];
        $userID = $user_data['userID'];


        $sql_getting_cartID = "SELECT * FROM cart WHERE userID = $userID ";

        $result = mysqli_query($con, $sql_getting_cartID);
        $cartID_record = mysqli_fetch_assoc($result);
        
        //if there is no record in the cart table for this userID
        if(!$cartID_record['cartID'])
        {
           $result3 = mysqli_query($con, "insert into cart (userID) value ($userID)") or die("Error inserting data to cart");
           $result4 = mysqli_query($con, "select * from cart where userID = $userID" or die("Error selecting data"));
           $cartID_record = mysqli_fetch_assoc($result4);
        }

        
        $cartID = $cartID_record['cartID'];

        $sql_item_add = "insert into cartrecord (cartID, itemID, quantity) value ('$cartID','$itemID', '$quantity')";
        
        $result2 = mysqli_query($con, $sql_item_add);

        if(!$result2){
            ?> <script>alert("<?php echo "Unsucessful, please try again."; ?>")</script> <?php
            header("location: MerchandiseMenuPage.php?result=0");
        }else{
            ?> <script>alert("<?php echo "Sucessful add item to cart!"; ?>")</script> <?php
            header("location: MerchandiseMenuPage.php?result=1");
        }

       
        
    }

?>
<!-- Footer UI Import Here -->
<?php require("../Navigation Bar and Footer/footer.html"); ?> 
</body>
</html>
