<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin | Contact Us List</title>
    <?php include("data_connection.php"); ?>
	<link rel="shortcut icon" href="../assets/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" 
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <script type="text/javascript">
        function confirmation() {
            confirm("Do you want to delete this story?");
        }
    </script>

    <!-- NAV UI Import here -->
    <?php require("adminNav.php"); ?> 

    <?php 
        if (isset($_GET['delete']))
        {
            $id = $_GET['id'];
            $delete = "DELETE FROM contact WHERE contactID = '$id'";
            mysqli_query($conn, $delete);
            header("refresh:0.5; url= Contact List.php"); //refresh the page
        }
    ?>

</head>
<body class="bg-dark text-light">
<form method="post">
<div class="container-fluid">
    <div class="row mr-2 my-3">
        <div class="col">
            <h1>Contact Us List</h1>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <table class="table">
                <tr>
                    <th scope="col" class="text-center">Contact ID</th>
                    <th scope="col" class="text-center">Name</th>
                    <th scope="col" class="text-center">Email</th>
                    <th scope="col" class="text-center">Phone Number</th>
                    <th scope="col" colspan="3" class="text-center">Manage</th>
                </tr>
            
                <?php 
                $per_page = 6; //the page we want per page

                $q = "SELECT * FROM contact";

                $res = mysqli_query($conn, $q) or die( mysqli_error($conn));;
                $number_of_result = mysqli_num_rows($res);//used to count number of rows results

                //to know the number page available
                $num_page = ceil($number_of_result/$per_page);

                // to know which page number user is on
                if (!isset($_GET["page"]))
                {
                    $p = 1;
                }
                else
                {
                    $p = $_GET["page"];
                }

                $first_page_result = ($p - 1) * $per_page;

                $query = 'SELECT * FROM contact LIMIT ' . $first_page_result . ',' . $per_page;

                $result = mysqli_query($conn, $query) or die( mysqli_error($conn));;

                while($row = mysqli_fetch_array($result))
                {
                    $Cid = $row["contactID"];
                    $f_name = $row["firstName"];
                    $l_name = $row["lastName"];
                    $email = $row["contactEmail"];
                    $number_contact = $row["contactNumber"];

                    ?>
                    <tr>
                        <td class="text-center"><?php echo $Cid;?></td>
                        <td class="text-center"><?php echo $f_name . " " . $l_name;?></td>
                        <td class="text-center"><?php echo $email;?></th></td>
                        <td class="text-center"><?php echo $number_contact;?></td>
                        <td class="text-center">
                            <a style="text-decoration: none;" href="Contact List.php?delete&id=<?php echo $Cid;?>" 
                                onclick="confirmation()">DELETE</a>
                        </td>
                        <td class="text-center">
                        <a style="text-decoration: none;word-spacing: normal;"
                        href="Contact%20View%20More%20Detail.php?id=<?php echo $Cid;?>&pageset=true">
                            VIEW MORE DETAILS</a>
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col">
        <p>Records : <?php echo $number_of_result?></p>
        <?php
        for ($p = 1; $p <= $num_page; $p++)
        {
            echo '<a style="padding-left: 100px;" href="Contact List.php?page=' . $p . '">' . $p . '</a> ';
        }?>
        </div>
    </div>
</div>
</form>
</body>
</html>

