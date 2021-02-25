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
<table>
    <tr>
        <td style="padding-left: 50px" >
        <td style="padding-left: 20px"><button class="_button" onclick="location.href = 'manage testimonial_edit.php'">Edit</button></td>
        <td style="padding-left: 20px"><button class="_button" onclick="location.href='manage testimonial_delete.php'">Delete</button></td>
        <td style="padding-left: 20px" ><button class="_button" onclick="location.href = 'addStory.php'">Add Story</button></td>
        <td style="padding-left: 20px">
            <form class="search_box" name="search_testimonial">
                <input type="search" spellcheck="false" placeholder="Search..." style="width:200px;
                 border-bottom-left-radius: 30px;border-top-left-radius: 30px"
                       name="search" id="search_text">
                <button class="_button">Search</button>
            </form>
        </td>
        </td>
    </tr>
</table>
<hr>
<div>
    <table>
        <tr>
            <td style="padding-left: 50px">
                <p style="word-spacing: 4cm;"><span style="word-spacing: normal">Page ID</span>
                    <span style="word-spacing: normal">Date  Posted</span>
                    <span style="word-spacing: normal">Page Title</span>
                    <span style="word-spacing: normal;padding-left: 300px">Manage</span>
                </p>
            </td>
        </tr>
        <?php include "data_connection.php";
        ob_start();
        if (isset($_GET['page_delete']))
        {
            $id = $_GET['id'];
            $delete = "DELETE FROM story WHERE storyID = $id";
            mysqli_query($conn, $delete);
            header("refresh:0.5; url= manage testimonial_delete.php"); //refresh the page
            if ($conn -> query($delete)==TRUE && $conn->affected_rows > 0) {
                ?>
                <script>
                    alert("Story Deleted Successfully!");
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

        $query = "SELECT * FROM story";

        $result = mysqli_query($conn, $query) or die( mysqli_error($conn));;
        $number_of_result = mysqli_num_rows($result);//used to count number of rows results

        //to know the number page available
        $num_page = ceil($number_of_result/$per_page);

        // to know which page number user is on
        if (!isset($_POST['p']))
        {
            $p = 1;
        }
        else
        {
            $p = $_POST['p'];
        }

        $first_page_result = ($p - 1) * $per_page;

        $query = 'SELECT * FROM story LIMIT ' . $first_page_result . ',' . $per_page;

        $result = mysqli_query($conn, $query) or die( mysqli_error($conn));;

        while($row = mysqli_fetch_array($result))
        {
            $id = $row["storyID"];
            $date = $row["storyDate"];
            $title = $row["storyTitle"];

            ?>
            <tr>
                <td style="padding-left: 95px">
                    <p style="word-spacing: 4cm;"><span style="word-spacing: normal" ><?php echo $id;?></span>
                        <span style="word-spacing: normal"><?php echo $date;?></span>
                        <span style="word-spacing: normal;" class="dots"><?php echo $title;?></span>
                        <span style="word-spacing: normal;padding-left: 1px">
                        <a style="text-decoration: none;" href="?page_delete=true&id=<?php echo $id;?>" onclick="confirmation()">DELETE</a>
                    </span>
                    </p>
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
        echo '<a style="padding-left: 100px;" href="manage testimonial_delete.php?page=' . $p . '">' . $p . '</a> ';
    }?>

</div>
</body>
</html>
