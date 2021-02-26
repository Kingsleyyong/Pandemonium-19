<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./assets/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Item Description Page</title>
</head>
<body>
    <div class="container">
        <div class="row rounded bg-dark text-light p-4">
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
