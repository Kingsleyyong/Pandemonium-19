<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Admin | View ContactUs Detail</title>
        <?php include("data_connection.php"); ?>
        <link rel="shortcut icon" href="../assets/favicon.png" type="image/x-icon">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" 
            integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <script>
		    function goBack() {		window.history.back();		}
	    </script>

    </head>

<body class="bg-dark text-light"> 
<div id="container" style="padding:20px;">
    <div class="row mx-2 my-3">
        <div class="col">
            <h1>Details of The 'Contact Us'</h1>
        </div>
    </div>
    <hr style="border: 1px solid white;">
        <?php
        if(isset($_GET['pageset']))
        {
            $id = $_GET["id"];
            $result = mysqli_query($conn, "select * from contact where contactID = $id");
            $row = mysqli_fetch_assoc($result);

            echo '<div class="row mx-2 my-3"><div class="col">Contact ID</div><div class="col">';
            echo $row["contactID"];
            ?>
        <?php
            echo '</div></div><div class="row mx-2 my-3"><div class="col">First Name</div><div class="col">';
            echo $row["firstName"];
            ?>
            <?php
            echo '</div></div><div class="row mx-2 my-3"><div class="col">Last Name</div><div class="col">';
            echo $row["lastName"];
            ?>
            <?php
            echo '</div></div><div class="row mx-2 my-3"><div class="col">Contact Email</div><div class="col">';
            echo $row["contactEmail"];
            ?>
            <?php
            echo '</div></div><div class="row mx-2 my-3"><div class="col">Contact Number</div><div class="col">';
            echo $row["contactNumber"];
            ?>
            <?php
            echo '</div></div><div class="row mx-2 my-3"><div class="col">Message Leave</div><div class="col">';
            echo $row["message"];
            ?>
            <?php
        echo '</div></div>';
        }
        ?> 
    <button onclick="goBack();" class="btn btn-primary m-auto" style="float:right;">Go Back</button>
</div>


</body>
</html>

