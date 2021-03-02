<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="shortcut icon" href="./assets/favicon.png" type="image/x-icon">
    <title>My Cart</title>
    
    <!-- NAV UI Import here -->
    <?php 
        require("../Navigation Bar and Footer/navbar.php");
        require('../Database/connect.php');
        $uid = $user_data['userID'];
        $num=0;
    ?>

    <?php 
        // delete record from database
        if(isset($_GET['pageset'])) {
            $recordID = $_GET['recordID'];
            $qty = $_GET['qty'];
            //to restore the item amount 
            $restore = mysqli_query($con, "SELECT * FROM cartrecord WHERE recordID = '$recordID'");
            $restore_data = mysqli_fetch_assoc($restore);
            $restore_itemID = $restore_data['itemID'];
            $restore1 = mysqli_query($con, "SELECT * FROM item WHERE itemID = '$restore_itemID'");
            $restore_data1 = mysqli_fetch_assoc($restore1);
            $restoreAmount = $restore_data1['stockNumber'] + $qty;
            mysqli_query($con, "UPDATE item set stockNumber = '$restoreAmount' WHERE itemID = '$restore_itemID'");

            $get_cart = mysqli_query($con, "SELECT * FROM cart WHERE userID = '$uid'");
            $get_cartID = mysqli_fetch_assoc($get_cart);
            $cartid = $get_cartID['cartID'];
            mysqli_query($con, "DELETE FROM cartrecord WHERE recordID='$recordID'");
            $test_empty = mysqli_query($con, "SELECT * FROM cartrecord WHERE cartID = '$cartid'");            
            $numrow = mysqli_num_rows($test_empty);
            if($numrow<=0){
                mysqli_query($con, "DELETE FROM cart WHERE userID = '$uid'");
            }

            header("refresh:0.5; url=CartPage.php?cart&uid=$uid");
        }

        // checkout (delete all)
        if(isset($_POST['checkOut'])) {
            ?>
            <script>alert("Thank you for your payment!");</script> 
            <?php

            if($result = mysqli_query($con, "SELECT * FROM cart WHERE userID='$uid' ")) 
            {
                if($getCartID = mysqli_fetch_assoc($result)) {
                    $cartid = $getCartID['cartID'];
                    mysqli_query($con, "DELETE FROM cartrecord WHERE cartID='$cartid'") or die("Fail");
                    mysqli_query($con, "DELETE FROM cart WHERE userID='$uid'") or die("Fail");
                }
            }
            // go to main
            header("refresh: 0.1; url = ../Index Page/main.php");
        }
    ?>

</head>

<body class="bg-dark"><form name="cartPage" id="cartPage" method="post">
    <div class="container">
        <!-- This is the items that inside the cart,scrollable -->
        <div class="row rounded bg-secondary text-light p-4">
            <div class="col">
<?php
    $merchantTotal = 0;
    if(isset($_GET['cart'])){

        $result = mysqli_query($con, "SELECT * FROM cart WHERE userID=$uid");

        $num = mysqli_num_rows($result); 

        if($num>0){
            foreach($result as $row):
                $cartID = $row ['cartID'];
                $shippingSubtotal = $row['shippingFee'];
                $rslt = mysqli_query($con, "select * from user where userID = $uid");
                $getaddress = mysqli_fetch_assoc($rslt);
                $address = $getaddress['residentialAddress'];
                $rslt2 = mysqli_query($con, "update cart set shippingAddress='$address', shippingFee='$shippingSubtotal' where userID=$uid");

                $result2 = mysqli_query($con,"SELECT * FROM cartrecord WHERE cartID='$cartID'");
                foreach($result2 as $row2):
                    echo '<div class="rounded bg-info p-2 my-3"><div class="container"><div class="row">';
                    $itemID = $row2['itemID'];
                    $itemAmount = $row2['quantity'];
                    $recordID = $row2['recordID'];

                    $result3 = mysqli_query($con, "SELECT * FROM item WHERE itemID = '$itemID'");
                    foreach($result3 as $row3):
                        $itemName = $row3['itemName'];
                        $itemPrice = $row3['itemPrice'];
                        $itemColour = $row3['itemColour'];
                        $itemSize = $row3['itemSize'];
                        $stock = $row3['stockNumber'];
                        $image = '<img class="rounded mx-auto d-block" width="200px" alt="" width = 150dp 
                        height = 130dp src="data:image/jpeg;base64,'.base64_encode( $row3['image'] ).'"/>';
                        $merchantTotal += $itemAmount * $itemPrice;
                        
                        $total = $merchantTotal + $shippingSubtotal;
    ?>
                        <div class="col">
                            <?php echo $image; ?>            
                        </div>
                        <div class="col">
                            <h2> <?php echo $itemName; ?> </h2>

                            <p class="font-weight-bold" id="itemPrice">RM <?php echo $itemPrice; ?></p>

                            <label for="choices">Color: <?php echo $itemColour; ?> </label><br>

                            <label for="size">Size: <?php echo $itemSize; ?> </label><br>

                            <label for="quantity">Quantity: <?php echo $itemAmount; ?></label>

                            <div class="m-3">
                                <a href="?id=<?php echo $uid;?>&recordID=<?php echo $recordID?>&pageset=true&qty=<?php echo $itemAmount?>"
                                    class="btn btn-primary m-auto">Delete item</a> 
                            </div>
                        </div>                
                    </div>
                </div>
            </div>
    <?php
                    endforeach;
            endforeach;
            endforeach;      
        } 
        else {
            ?>
            <div>
                <h4>Your cart is empty!!</h4>
            </div>
            <?php
        }
    }
?>
    </div>
    </div>  
        <!-- Below is Purchase Summary side bar which was not scrollable -->
        <div class="row rounded bg-info text-light p-4">
        <?php if($num>0){ ?>
            <div class="container">
                <form action="#" method="post"></form>
                    <div class="row">
                        <p class="col-sm">
                            Shipping Address: <br>
                            <span id='shipAddress' name='shipAddress'> <?php echo $address ?></span>
                        </p>
                        <p class="col-sm">
                            Merchandse Subtotal: <br>
                            <span id="merchandSubtotal" name="merchandSubtotal">RM <?php echo number_format($merchantTotal, 2, '.', ''); ?></span>
                        </p>
                        <p class="col-sm">
                            Shipping Subtotal: <br> 
                            <span id="shipSubtotal" >RM <?php echo number_format($shippingSubtotal, 2, '.', ''); ?></span>
                        </p>
                        <p class="col-md">
                            Total Payment: <br> 
                            <span id="total">RM <?php echo number_format($total, 2, '.', ''); ?></span>
                        </p>
                    </div>
                    <div class="row justify-content-center">
                        <p class="col-sm"> 
                            <div class="m-3">
                                <a href="../Profile/EditProfile.php?view&uid=<?php echo $uid; ?>" class="btn btn-primary m-auto">Edit Address</a> 
                            </div>
                            <div class="m-3"><input type="submit" class="btn btn-primary m-auto" value="Checkout" name="checkOut"></div>
                        </p>
                        <p class="col-sm"> 
                             
                        </p>
                    </div>
                </form>
            </div>
        <?php 
        }
        else {
            ?>
            <div>
                <h6>Add something to make you happy :)</h6>
                <a href="../Merchandise Page/MerchandiseMenuPage.php" 
                    style="color:rgb(255,204,204); font-style:italic; font-weight:bold;
                            text-shadow: rgb(102,0,51) 1px 1px 3px;">Let's Go!!!</a>
            </div>
            <?php
        }
        ?>
        </div>
    </div>
    <!-- Footer UI Import Here -->
    <?php require("../Navigation Bar and Footer/footer.html"); ?> 
</form>
</body>
</html>
