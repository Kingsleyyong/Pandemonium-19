<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link href="manage 20testimonial.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- NAV UI Import here -->
    <?php require("adminNav.php"); ?>
</head>
<body class="bg-dark text-light">
<div class="container-fluid">
        <div class="row">
            <div class="col">
                <button class="btn btn-light mx-auto d-block" onclick="location.href = 'manage testimonial.php'">ALL</button>
            </div>
            <div class="col">
                <button class="btn btn-warning mx-auto d-block" onclick="location.href = 'manage testimonial_edit.php'">Edit</button>
            </div>
            <div class="col">
                <button class="btn btn-danger mx-auto d-block" onclick="location.href='manage testimonial_delete.php'">Delete</button>
            </div>
            <div class="col">
                <button class="btn btn-info mx-auto d-block" onclick="location.href = 'addStory.php'">Add Story</button>
            </div>
            <div class="col mx-auto d-block">
                <form name="search_testimonial" method="post">
                    <input type="search" class="form-control-sm" spellcheck="false" placeholder="Search..." name="search" id="search_text">
                    <input class="btn-sm btn-primary" type="submit" value="Search">
                </form>
            </div>
        </div>
    </div>
<div class="testiEdit">
    <table class="table">
        <tr>
            <th scope="col" class="text-center">Page ID</th>
            <th scope="col" class="text-center">Date Posted</th>
            <th scope="col" class="text-center">Page Title</th>
            <th scope="col" class="text-center">Manage</th>
        </tr>
        <?php include "data_connection.php";

        $per_page = 6; //the page we want per page

        $query = "SELECT * FROM story";

        $result = mysqli_query($conn, $query) or die( mysqli_error($conn));;
        $number_of_result = mysqli_num_rows($result);//used to count number of rows results

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

        $query = 'SELECT * FROM story LIMIT ' . $first_page_result . ',' . $per_page;

        $result = mysqli_query($conn, $query) or die( mysqli_error($conn));

        if (!isset($_POST['search']))
        {
        $query = "SELECT * FROM story";

        $result = mysqli_query($conn, $query) or die( mysqli_error($conn));;
        $number_of_result = mysqli_num_rows($result);//used to count number of rows results

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

        $query = 'SELECT * FROM story LIMIT ' . $first_page_result . ',' . $per_page;

        $result = mysqli_query($conn, $query) or die( mysqli_error($conn));
        while($row = mysqli_fetch_array($result))
        {
            $id = $row["storyID"];
            $date = $row["storyDate"];
            $title = $row["storyTitle"];

            ?>
            <tr>
                <td class="text-center"><?php echo $id;?></td>
                <td class="text-center"><?php echo $date;?></td>
                <td class="text-center"><?php echo $title;?></td>
                <td class="text-center"><a href="story_edit.php?id=<?php echo $id;?>&pageset=true"
                                           class="no_underline">Edit</a></td>
            </tr>
            <?php
        }
        ?>
    </table>
    <p>Story Posted Records : <?php echo $number_of_result?></p>
    <?php
    for ($p = 1; $p <= $num_page; $p++)
    {
        echo '<a style="padding-left: 100px;" href="manage testimonial_edit.php?page=' . $p . '">' . $p . '</a> ';
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
                    <td class="text-center"><?php echo $id;?></td>
                    <td class="text-center"><?php echo $date;?></td>
                    <td class="text-center"><?php echo $title;?></td>
                    <td class="text-center"><a href="story_edit.php?id=<?php echo $id;?>&pageset=true"
                                               class="no_underline">Edit</a></td>
                </tr>
                <?php
            }
        }
    }
    ?>

</div>
</body>
</html>
