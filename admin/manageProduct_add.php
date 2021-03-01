<?php
	include("../database/connect.php");
	include("../signin_signup_signout_forgetpass_automail/function.php");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin | Add Product Details</title>
    <link rel="shortcut icon" href="../assets/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" 
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body class="bg-dark text-light" style="padding:20px;">
	<form name="add-product" method="POST">
        <div class="row mx-2 my-3">
            <div class="col">
                <h1>Add Product</h1>
            </div>
        </div>
        <hr style="border: 1px solid white;">
        <div class="container">
            <div class="row my-3">
            </div>
            <div class="row my-3">
                <div class="col">
                    Item Name:
                </div>
                <div class="col">
                    <input type = "text" name = "item_name" class="form-control" size =50 required>
                </div>
            </div>
            <div class="row my-3">
                <div class="col">
                    Item Price :
                </div>
                <div class="col">
                    <input type ="number" step="0.01" name="item_price" min="1" max="200" class="form-control" size=50 required>
                </div>
            </div>
            <div class="row my-3">
                <div class="col">
                    Item Description :
                </div>
                <div class="col">
                    <input type = "text" name="item_desc" class="form-control" size=50 required>
                </div>
            </div>
            <div class="row my-3">
                <div class="col">
                    Item Colour :
                </div>
                <div class="col">
                    <input type = "text" name="item_colour" class="form-control" size=5 required>
                </div>
            </div>
            <div class="row my-3">
                <div class="col">
                    Item Size :
                </div>
                <div class="col">
                    <input type = "text" name="item_size" class="form-control" size=5 required>
                </div>
            </div>
            <div class="row my-3">
                <div class="col">
                    Stock Number :
                </div>
                <div class="col">
                    <input type = "number" step="1" name="stock_number" min="1" max="200" class="form-control" size=5 required>
                </div>
            </div>
            <div class="row my-3">
                <div class="col">
                    <input type="submit" class="btn btn-primary" name="addbtn" value="ADD">
                </div>
                <div class="col">
                    <input type="submit" value="BACK TO MANAGE PRODUCT"
                           class="btn btn-info" onclick="location.href = 'manageProduct.php'">
                </div>
            </div>
        </div>
    </form>
    <?php
    if (isset($_POST['addbtn']))
    {
        $item_name = $_POST["item_name"];
        $item_price = $_POST["item_price"];
        $item_desc = $_POST["item_desc"];
        $item_color = $_POST['item_colour'];
        $item_size = $_POST['item_size'];
        $stock_number = $_POST['stock_number'];

        $q = "INSERT INTO item (itemName, itemPrice, itemDescription, itemColour, stockNumber)
          values ('$item_name', '$item_price', '$item_desc', '$item_color', '$stock_number')";

        if($result = mysqli_query($con, $q)) {
            ?>
            <script type="text/javascript">
                alert("The item is saved!");
            </script>
        <?php
        }
        else
        {
        ?>
            <script>
                alert("Save Unsuccessful");
            </script>
            <?php
        }
    }
    ?>
</body>
</html>