<?php
	include("../database/connect.php");
	include("../signin_signup_signout_forgetpass_automail/function.php");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin | Edit User Detail</title>
    <link rel="shortcut icon" href="../assets/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" 
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <?php 
        if(isset($_POST['savebtn']))
        {
            $itemId = $_POST['item_id'];
            $itemName = $_POST['item_name'];
            $itemPrice = $_POST['item_price'];
            $itemDesc = $_POST['item_desc'];
            $itemColor = $_POST['item_colour'];
            $itemSize = $_POST['item_size'];
            $stkNum = $_POST['stock_number'];
            


            $result = mysqli_query($con,"UPDATE item SET itemName = '$itemName', itemPrice = '$itemPrice', 
                itemDescription = '$itemDesc', itemColour='$itemColor', itemSize ='$itemSize', stockNumber = '$stkNum' where itemID = '$itemId'");
            if($result)
            {   ?>
                <script type="text/javascript">
                    alert("Succecfully updated");
                </script>
                <?php
            }
            else{
                echo "error updating";
            }

            header("refresh:0.5; url = manageProduct.php");
        }
    ?>

</head>

<body class="bg-dark text-light" style="padding:20px;">
    <form method="post">
    <div class="row mx-2 my-3">
        <div class="col">
            <h1>Edit Item</h1>
        </div>
    </div>
    <hr style="border: 1px solid white;">
    <div class="container">
        <div class="row my-3">
            <div class="col">
                <?php 
                if(isset($_GET['pageedit']))
                {
                    $itemid = $_GET['id'];
                    $result = mysqli_query($con,"select * from item where itemID = $itemid");
                    $details = mysqli_fetch_assoc($result);
                    
                ?>
            </div>
        </div>
        <div class="row my-3">
            <div class="col">
                Item ID: 
            </div>
            <div class="col">
                <input type = "number" name = "item_id" class="form-control" size =50 value = "<?php echo $details['itemID']?>" readonly>
            </div>
        </div>
        <div class="row my-3">
            <div class="col">
                Item Name: 
            </div>
            <div class="col">
                <input type = "text" name = "item_name" class="form-control" size =50 value = "<?php echo $details['itemName']?>">
            </div>
        </div>
        <div class="row my-3">
            <div class="col">
                Item Price : 
            </div>
            <div class="col">
                <input type ="number" step="0.01" name="item_price" class="form-control" size=50 value="<?php echo $details['itemPrice'];?>">
            </div>
        </div>
        <div class="row my-3">
            <div class="col">
                Item Description : 
            </div>
            <div class="col">
                <input type = "text" name="item_desc" class="form-control" size=50 value="<?php echo $details['itemDescription'];?>">
            </div>
        </div>
        <div class="row my-3">
            <div class="col">
                Item Colour : 
            </div>
            <div class="col">
                <input type = "text" name="item_colour" class="form-control" size=5 value="<?php echo $details['itemColour'];?>">
            </div>
        </div>
        <div class="row my-3">
            <div class="col">
                Item Size : 
            </div>
            <div class="col">
                <input type = "text" name="item_size" class="form-control" size=5 value="<?php echo $details['itemSize'];?>">
            </div>
        </div>
        <div class="row my-3">
            <div class="col">
                Stock Number : 
            </div>
            <div class="col">
                <input type = "number" step="1" name="stock_number" class="form-control" size=5 value="<?php echo $details['stockNumber'];?>">
            </div>
        </div>
        <div class="row my-3">
            <div class="col">
            </div>
            <div class="col">
                <input type="submit" class="btn btn-primary" name="savebtn" value="Update">
            </div>
        </div>
    </div>
    <?php
            }
        ?>
    </form>
</body>
</html>