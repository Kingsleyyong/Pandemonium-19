<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link href="manage%20testimonial.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        ._button:hover{
            background-color: #232F57;
            color: #FAFFFF;
            cursor: pointer;
            outline: none;
            border: none;
        }

        ._button:active{
            background-color: #E4D9FF;
            color: #FAFFFF;
            cursor: pointer;
        }
        .dots {
            display: inline-block;
            width: 400px;
            white-space: nowrap;
            overflow: hidden !important;
            text-overflow: ellipsis;
        }
    </style>

    <script type="text/javascript">
        function confirmation() {
            confirm("Do you want to delete this story?");
        }

    </script>
</head>
<body>
<hr>
<div>
    <table>
        <tr>
            <td><th>Contact ID</th></td>
            <td><th>Name</th></td>
            <td><th>Email</th></td>
            <td><th>Phone Number</th></td>
            <td ><th colspan="3">Manage</th></td>
            </td>
        </tr>
        <?php include "data_connection.php";
        ob_start();
        if (isset($_GET['_delete']))
        {
            $id = $_GET['Cid'];
            $delete = "DELETE FROM contact WHERE contactID = $id";
            mysqli_query($conn, $delete);
            header("refresh:0.5; url= Contact List.php"); //refresh the page
            if ($conn -> query($delete)==TRUE && $conn->affected_rows > 0) {
                ?>
                <script>
                    alert("Person Information Deleted Successfully!");
                </script>
                <?php
            } else {
                echo "Error: " . $delete . "<br>" . $conn->error;
            }
        }
        ob_end_flush();
        ?>
        <?php include "data_connection.php";

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
                <td><?php echo $f_name . " " . $l_name;?></td>
                <td><?php echo $email;?></th></td>
                <td><?php echo $number_contact;?></td>
                <td>
                        <a style="text-decoration: none;" href="?_delete=true&id=<?php echo $Cid;?>" onclick="confirmation()">DELETE</a>
                </td>
                        <td>
                        <a style="text-decoration: none;word-spacing: normal;"
                           href="Contact%20View%20More%20Detail.php?id=<?php echo $Cid;?>&pageset=true">
                            VIEW MORE DETAILS</a>
                        </td>
            </tr>
            <tr>
                <td><hr></td>
            </tr>
            <?php
        }
        ?>
    </table>
    <p>Story Posted Records : <?php echo $number_of_result?></p>
    <?php
    for ($p = 1; $p <= $num_page; $p++)
    {
        echo '<a style="padding-left: 100px;" href="Contact List.php?page=' . $p . '">' . $p . '</a> ';
    }?>

</div>
</body>
</html>

