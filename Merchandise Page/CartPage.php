<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    <?php require("navbar.html"); ?> 
</head>

<body>
    <!-- This is the items that inside the cart,scrollable -->
    <div>
        <img id="" src="" alt="">
        <h2>Cotton Mask</h2>
        <p>RM 5</p>
        <label for="quantity">Quantity: </label>
        <button onclick="minus()">-</button>
        <span id="quantityValue">0</span>
        <button onclick="plus()">+</button>
        <br>
    </div>

    <!-- Below is Purchase Summary side bar which was not scrollable -->
    <div>
        <p>
            Shipping Address: <br>
            <textarea name="shipAddress" id="addressInput" cols="30" rows="5"
            placeholder="Please enter your address." onchange="errorMessage()"></textarea>
        </p>

        <p>
            Merchandse Subtotal:
            <span id="merchandSubtotal"></span>
        </p>

        <p>
            Shipping Subtotal:
            <span id="shipSubtotal"></span>
        </p>

        <p>
            Total Payment: 
            <span id="total"></span>
        </p>

        <p> <input type="submit" value="Checkout" onclick="checkoutButton()"> </p>

    </div>
    <!-- Footer UI Import Here -->
    <?php require("footer.html"); ?>
</body>
</html>