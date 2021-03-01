<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Testimonial</title>
    <!-- NAV UI Import here -->
    <?php require("../Navigation Bar and Footer/navbar.php"); ?>
    <?php include("data_connection.php"); ?>
    <style>
        a p {
            text-decoration: none !important;
            color: white !important;
        }
        #pageNum a:hover {
            font-size: 1.2em;
            font-weight: bold;
            color: white;
        }
    </style>
</head>

<body class="bg-dark text-light">
<form name="storyHead" id="storyHead" method="post">
    <div class="division_toggle">
        <table>
            <tr> <!--to let the color of button remain differential colour-->
            <td><div id="button_remain_color"></div></td>
            <td>
                <input type="submit" class="btn btn-primary" name="mostView" value="Most View Story"> <!-- for class toggle_view_button-->
            </td>
            <td>
                <input type="submit" class="btn btn-primary" name="latestStory" value="Latest Story"> <!-- for class toggle_view_button-->
            </td>
            <td id="storyboard" style="font-size: 1.2em; ">
                Story of Frontliners & Covid Patients
            </td>
            </tr>
        </table>
    </div>

<div class="container-fluid my-3">
    <div class="row p-3">
        <!--- Since 1 row got 4 col, when print 4 column close div tag (line 52) and start a new row (line 30)  
              Every story (1 column) have starting tag of line 33 and ending tag of line 37--->
        <?php
        $per_page = 4; //the page we want per page

        $query = "SELECT * FROM story";
        $result = mysqli_query($conn, $query) or die( mysqli_error($conn));
        $number_of_result = mysqli_num_rows($result);       //used to count number of rows results
        $num_page = ceil($number_of_result/$per_page);      //to know the number page available

        // to know which page number user is on
        if (!isset($_GET["page"]))  {   $page = 1;  }
        else                        {   $page = $_GET["page"];  }

        $first_page_result = ($page - 1) * $per_page;

        $query = 'SELECT * FROM story ORDER BY storyView DESC LIMIT ' . $first_page_result . ',' . $per_page;
        $result = mysqli_query($conn, $query) or die( mysqli_error($conn));

        if(isset($_POST['latestStory'])){
            $query = 'SELECT * FROM story ORDER BY storyView DESC LIMIT ' . $first_page_result . ',' . $per_page;
            $result = mysqli_query($conn, $query) or die( mysqli_error($conn));
            ?><script>
                window.location.replace("Testimonial.php?story");
            </script><?php
        }

        while($row = mysqli_fetch_array($result))
        {       ?>
            <div class="col px-4 mx-4">
                <a href="Story page.php?id=<?php echo $row['storyID'];?>&pageSet=true">
                <?php 
                    if($row['storyMedia']!=null) {
                        $pic = $row['storyMedia'];
                        $viewNum = $row['storyView'];
                        echo '<img class="mx-auto d-block" width = "350dp" height="240dp" src="data:image/*;base64,'.
                                base64_encode($row['storyMedia']).'" alt=""/>';
                    }
                    else {
                        echo '<img src="../assets/storyDefault.png" width = "350dp" height="240dp" class="mx-auto d-block" alt="article image">';
                    } 
                ?>
                <p class="text-center"><span id="title1"><?php echo $row['storyTitle'];?></span></p>
                <p class="text-center">Read More</p></a>
                <p class="text-center"><< Number of Views : <?php echo $viewNum; ?> >> </p>
            </div>
            <?php
        }   ?>
        </div>
    </div>
    
    <div class="row my-3" id="pageNum">
        <div class="col">
            <?php
            if ($page != 1)
            {
                ?>
                <a href="mostView.php?page=<?php echo 1; ?>"><p class="text-center">&laquo; Previous</p></a>
                <?php
            }
            ?>
        </div>
        <?php
        for ($p = 1; $p <= $num_page; $p++)
        {
        echo '<a style="padding: 0px 80px;" href="mostView.php?page=' . $p . '">' . $p . '</a> ';
        }
        ?>
        <div class="col">
            <?php
            if ($page < $num_page)
            {
            ?>
            <a href="mostView.php?page=<?php echo ($page + 1);?>"><p class='text-center'>Next &raquo;</p></a>
            <?php
            }
            ?>
        </div>
    </div>
</div>
</form>

<!-- Footer UI Import Here -->
<?php require("../Navigation Bar and Footer/footer.html"); ?> 
</body>
</html>
