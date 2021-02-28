<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="shortcut icon" href="./assets/favicon.png" type="image/x-icon">
    <title>Add to Cart</title>
    
    <script>
        window.addEventListener('DOMContentLoaded', errorMessage);

        function errorMessage(){
            var length = document.getElementsByTagName('textarea')['shipAddress'].innerHTML.length;
            if(length==0){
                document.getElementById('shipSubtotal').style.cssText='color: red; font-weight: bold;';
                document.getElementById('total').style.cssText='color: red; font-weight: bold;';
                document.getElementById('shipSubtotal').innerHTML='Please enter your address.';
                document.getElementById('total').innerHTML='Please enter your address.';
                
            }
            else{
                var shippingFees = length*0.5;
                var total = <?php echo json_encode($merchantTotal); ?>;
                console.log(total);
                document.getElementById('shipSubtotal').innerHTML='RM '+shippingFees.toFixed(2);
                document.getElementById('total').innerHTML='RM '+total.toFixed(2);
            } 
        }
        
    </script>
    
    <!-- NAV UI Import here -->
    <?php require("../Navigation Bar and Footer/navbar.php") ?>
</head>

<body class="bg-dark">
    <div class="container">
        <!-- This is the items that inside the cart,scrollable -->
        <div class="row rounded bg-secondary text-light p-4">
            <div class="col-sm mx-4">
                <div class="rounded bg-info p-2 my-3">
<?php
    require ('../Database/connect.php');
    $merchantTotal = 0;
    if(isset($_REQUEST['id'])){
        $userID = $_REQUEST['id'];

        $result = mysqli_query($con, "SELECT cartID, shippingAddress FROM cart WHERE userID=$userID");

        foreach($result as $row):
            $cartID = $row ['cartID'];
            $address = $row ['shippingAddress'];
            // $address = "";

            $result2 = mysqli_query($con,"SELECT itemID, quantity FROM cartrecord WHERE cartID='$cartID'");
            foreach($result2 as $row2):
                $itemID = $row2['itemID'];
                $itemAmount = $row2['quantity'];

                $result3 = mysqli_query($con, "SELECT * FROM item WHERE itemID = '$itemID'");
                foreach($result3 as $row3):
                    $itemName = $row3['itemName'];
                    $itemPrice = $row3['itemPrice'];
                    $itemColour = $row3['itemColour'];
                    $itemSize = $row3['itemSize'];
                    $stock = $row3['stockNumber'];
                    $image = '<img class="rounded mx-auto d-block" width="200px" alt="" width = 150dp 
                    height = 130dp src="data:image/jpeg;base64,'.base64_encode( $row3['image'] ).'"/>';
                    $merchantTotal += $itemPrice;
?>
                    <?php echo $image; ?>            

                    <h2> <?php echo $itemName; ?> </h2>

                    <p class="font-weight-bold" id="itemPrice">RM <?php echo $itemPrice; ?></p>
                    
                    <label for="choices">Color: <?php echo $itemColour; ?> </label><br>

                    <label for="size">Size: <?php echo $itemSize; ?> </label><br>

                    <label for="quantity">Quantity: <?php echo $itemAmount; ?></label>

<?php
                endforeach;
            endforeach;
        endforeach;        
    }
?>
                </div>
            </div>
        </div>  

        <!-- Below is Purchase Summary side bar which was not scrollable -->
        <div class="row rounded bg-info text-light p-4">
            <div class="container">
                <form action="#" method="post"></form>
                    <div class="row">
                        <p class="col-sm">
                            Shipping Address: <br>
                            <textarea name="shipAddress" id="addressInput" cols="30" rows="5" placeholder="Please enter your address." onchange='errorMessage()'><?php echo $address;?></textarea>
                        </p>
                        <p class="col-sm">
                            Merchandse Subtotal: <br>
                            <span id="merchandSubtotal" name="merchandSub">RM <?php echo number_format($merchantTotal, 2, '.', ''); ?></span>
                        </p>
            
                        <p class="col-sm">
                            Shipping Subtotal: <br>
                            <span id="shipSubtotal" name="shipSub"></span>
                        </p>
                    </div>
                    <div class="row">
                        <p class="col-md">
                            Total Payment: <br>
                            <span id="total" name="total"></span>
                        </p>
                        <p class="col-sm"> 
                            <input type="submit" class="btn btn-primary" name="checkoutBtn" value="Checkout" > 
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Footer UI Import Here -->
    <?php require("../Navigation Bar and Footer/footer.html"); ?> 
</body>
</html>

<!-- Store data into databse-->
<?php 
    $shipAddress = $_POST['shipAddress'];
    $shipSub = $_POST['shipSub'];
    $subTotal = $_POST['merchandSub'];
    $total = $_POST['total'];

    if(!$_POST('checkoutBtn')){}else{
        $sql = 'UPDATE cart 
                SET shippingAddress = "$shipAddress", shippingFee = "$shipSub", subTotal = "$subTotal", TotalPayment = "$total" 
                WHERE cartID = "$cartID" AND userID = "$userID"';

        if($sqlResult){
            $sqlResult = mysqli_query($con, $sql);?>
            <script>alert("Done, please proceed to checkout at our partner bank.")</script>
            <?php }else{?>
            <script>alert("Error.")</script>    
<?php
        }
    }
    


?>