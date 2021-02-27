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
        .no_underline {
            text-decoration: none;
        }

        .testiEdit th, .testiEdit td, .testiEdit tr ,.testiEdit table{
            border: 1pt solid black;
            border-collapse: collapse;
            padding: 10px;
        }
    </style>
</head>
<body>
<table>
    <tr>
        <td style="padding-left: 50px" >
        <td style="padding-left: 20px"><button class="_button">Edit</button></td>
        <td style="padding-left: 20px"><button class="_button" onclick="location.href ='manage testimonial_delete.php'">Delete</button></td>
        <td style="padding-left: 20px" ><button class="_button" onclick="location.href = 'addStory.php'">Add Story</button></td>
        <td style="padding-left: 20px">
            <form class="search_box" name="search_testimonial" method = "POST">
                <input type="search" spellcheck="false" placeholder="Search..." style="width:200px;
                 border-bottom-left-radius: 30px;border-top-left-radius: 30px"
                       name="search" id="search_text">
                <input class="_button" type="submit" value="SEARCH">
            </form>
        </td>
        </td>
    </tr>
</table>
<hr>
<div class="testiEdit">
    <table>
        <tr>
            <th>Page ID</th>
            <th>Date Posted</th>
            <th>Page Title</th>
            <th>Manage</th>
        </tr>
        <?php include "data_connection.php";

        $per_page = 6; //the page we want per page

        $query = "SELECT * FROM story";

        $result = mysqli_query($conn, $query) or die( mysqli_error($conn));;
        $number_of_result = mysqli_num_rows($result);//used to count number of rows results

        //to know the number page available
        $num_page = ceil($number_of_result/$per_page);

        // to know which page number user is on
        if (!isset($_GET['page']))
        {
            $p = 1;
        }
        else
        {
            $p = $_GET['page'];
        }

        $first_page_result = ($p - 1) * $per_page;

        $query = 'SELECT * FROM story LIMIT ' . $first_page_result . ',' . $per_page;

        $result = mysqli_query($conn, $query) or die( mysqli_error($conn));


        if(!isset($_POST['search']))
        {
            while($row = mysqli_fetch_array($result))
            {
                $id = $row["storyID"];
                $date = $row["storyDate"];
                $title = $row["storyTitle"];

                ?>
                <tr>
                    <td><?php echo $id;?></td>
                    <td><?php echo $date;?></td>
                    <td><?php echo $title;?></td>
                    <td><a href="story_edit.php?id=<?php echo $id;?>&pageset=true" class="no_underline">Edit</a></td>
                </tr>
                
                <?php
            }
        }
        else
        {
            $search_item = $_POST['search'];
            $search_item = preg_replace("#[^0-9a-z]#i", "", $search_item);
            $query = mysqli_query($conn,"SELECT * FROM story WHERE storyID LIKE '%$search_item%'
                    or storyAuthor LIKE '%$search_item%' or storyTitle LIKE '%$search_item%'") or die("No data find");
            $count = mysqli_num_rows($query);

            if ($count == 0)
            {
                ?>
                <tr>
                    <td colspan="4" style="text-align: center;">NO RESULT</td>
                </tr>
        <?php
            }
            else
            {
                while ($row = mysqli_fetch_array($query))
                {
                    $id = $row["storyID"];
                    $date = $row["storyDate"];
                    $title = $row["storyTitle"];
                    ?>
                    <tr>
                        <td><?php echo $id;?></td>
                        <td><?php echo $date;?></td>
                        <td><?php echo $title;?></td>
                        <td><a href="story_edit.php?id=<?php echo $id;?>&pageset=true" class="no_underline">Edit</a></td>
                    </tr>
                    <?php
                }
            }
        }
        ?>
    </table>
    <p>Story Posted Records : <?php echo $number_of_result?></p>
    <?php
    for ($p = 1; $p <= $num_page; $p++)
    {

        echo '<a style="padding-left: 100px;" href="manage testimonial_edit.php?page=' . $p . '">' . $p . '</a> ';
    }?>

</div>
</body>
</html>
