<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="shortcut icon" href="./assets/favicon.png" type="image/x-icon">
    <title>Document</title>
    
    <script>
        window.addEventListener('DOMContentLoaded', errorMessage);

        function errorMessage(){
            if(document.getElementsByTagName('textarea')['shipAddress'].value==''){
                document.getElementById('shipSubtotal').style.cssText='color: red; font-weight: bold;';
                document.getElementById('total').style.cssText='color: red; font-weight: bold;';
                document.getElementById('shipSubtotal').innerHTML='Please enter your address.';
                document.getElementById('total').innerHTML='Please enter your address.';
                
            }
            else{
                document.getElementById('shipSubtotal').innerHTML='';
                document.getElementById('total').innerHTML='';
            }  
        }
        var value=0;
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
    <!-- NAV UI Import here -->
    <?php require("../Navigation Bar and Footer/navbar.html"); ?> 
</head>

<body class="bg-dark">
    <div class="container">
        <!-- This is the items that inside the cart,scrollable -->
        <div class="row rounded bg-secondary text-light p-4">
            <div id="col-sm">
                <img src="../assets/cloth mask.png" class="rounded mx-auto d-block" width="200px" alt="">
            </div>
            <div class="col-sm mx-4">
                <h1>Cotton Mask</h1>
                <div class="rounded bg-info p-2 my-3">
                    <p class="font-weight-bold" id="itemPrice">RM 5</p>
                    <p id="itemDescription">Here is the item description.</p>
                    <br>
                    
                    <label for="stockLeft">Stock Left: </label>
                </div>
                <form action="" class="pb-4">
                    <label for="choices">Color: </label>
                    <select name="maskChoices" class="form-control" id="choice">
                        <option value=""></option>
                    </select>
                </form>
                <div>
                    <label for="quantity">Quantity: </label>
                    <button class="btn btn-danger" onclick="minus()">-</button>
                    <span id="quantityValue"></span>
                    <button class="btn btn-success" onclick="plus()">+</button>
                </div>
                <br>
                <input type="submit" class="btn btn-primary" value="Add To Cart">
            </div>
        </div>
    

        <!-- Below is Purchase Summary side bar which was not scrollable -->
        <div class="row rounded bg-info text-light p-4">
            <div class="container">
                <div class="row">
                    <p class="col-sm">
                        Shipping Address: <br>
                        <textarea name="shipAddress" id="addressInput" cols="30" rows="5"
                        placeholder="Please enter your address." onchange="errorMessage()"></textarea>
                    </p>
                    <p class="col-sm">
                        Merchandse Subtotal: <br>
                        <span id="merchandSubtotal"></span>
                    </p>
        
                    <p class="col-sm">
                        Shipping Subtotal: <br>
                        <span id="shipSubtotal"></span>
                    </p>
                </div>
                <div class="row">
                    <p class="col-md">
                        Total Payment: <br>
                        <span id="total"></span>
                    </p>
                    <p class="col-sm"> <input type="submit" class="btn btn-primary" value="Checkout" onclick="checkoutButton()"> </p>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer UI Import Here -->
    <?php require("../Navigation Bar and Footer/footer.html"); ?>
</body>
</html>