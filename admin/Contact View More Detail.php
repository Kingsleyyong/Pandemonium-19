<?php include("data_connection.php"); ?>

<html>
<head><title>Movie Detail</title>
    <link href="design.css" type="text/css" rel="stylesheet" />
</head>
<body>

<div id="wrapper">

    <div id="left">
    </div>

    <div id="right">

        <h1>Details of The Contact</h1>

        <?php
        if(isset($_GET['pageset']))
        {
            $id = $_GET["id"];
            $result = mysqli_query($conn, "select * from contact where contactID = $id");
            $row = mysqli_fetch_assoc($result);

            echo "<br><b>Contact ID</b><br>";
            echo $row["contactID"];
            ?>
            <hr>
        <?php
            echo "<br><br><b>First Name</b><br>";
            echo $row["firstName"];
            ?>
            <hr>
            <?php
            echo "<br><br><b>Last Name</b><br>";
            echo $row["lastName"];
            ?>
            <hr>
            <?php
            echo "<br><br><b>Contact Email</b><br>";
            echo $row["contactEmail"];
            ?>
        <hr>
            <?php
            echo "<br><br><b>Contact Number</b><br>";
            echo $row["contactNumber"];
            ?>
            <hr>
            <?php
            echo "<br><br><b>Message Leave</b><br>";
            echo $row["message"];
            ?>
        <hr>
            <?php
        }
        ?>


    </div>

</div>


</body>
</html>

