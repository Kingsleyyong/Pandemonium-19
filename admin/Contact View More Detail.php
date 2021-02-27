<?php include("data_connection.php"); ?>

<html>
<head><title>Movie Detail</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
<body class="bg-dark text-light"> 

<div id="container">
    <div class="row mx-2 my-3">
        <div class="col">
            <h1>Details of The Contact</h1>
        </div>
    </div>
            <?php
            if(isset($_GET['pageset']))
            {
                $id = $_GET["id"];
                $result = mysqli_query($conn, "select * from contact where contactID = $id");
                $row = mysqli_fetch_assoc($result);

                echo '<div class="row mx-2 my-3"><div class="col">Contact ID</div></div><div class="row mx-2 my-3"><div class="col">';
                echo $row["contactID"];
                ?>
            <?php
                echo '</div></div><div class="row mx-2 my-3"><div class="col">First Name</div></div><div class="row mx-2 my-3"><div class="col">';
                echo $row["firstName"];
                ?>
                <?php
                echo '</div></div><div class="row mx-2 my-3"><div class="col">Last Name</div></div><div class="row mx-2 my-3"><div class="col">';
                echo $row["lastName"];
                ?>
                <?php
                echo '</div></div><div class="row mx-2 my-3"><div class="col">Contact Email</div></div><div class="row mx-2 my-3"><div class="col">';
                echo $row["contactEmail"];
                ?>
                <?php
                echo '</div></div><div class="row mx-2 my-3"><div class="col">Contact Number</div></div><div class="row mx-2 my-3"><div class="col">';
                echo $row["contactNumber"];
                ?>
                <?php
                echo '</div></div><div class="row mx-2 my-3"><div class="col">Message Leave</div></div><div class="row mx-2 my-3"><div class="col">';
                echo $row["message"];
                ?>
                <?php
            echo '</div></div>';
            }
            ?>  
</div>


</body>
</html>

