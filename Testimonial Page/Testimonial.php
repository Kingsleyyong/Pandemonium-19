<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Testimonial</title>
    <link href="../assets/CSS/testimonial.css" rel="stylesheet">
    <!-- NAV UI Import here -->
    <?php require("../Navigation Bar and Footer/navbar.php"); ?> 
</head>

<body class="bg-dark text-light">
<div class="division_toggle">
<table>
        <tr> <!--to let the color of button remain differential colour-->
        <td><div id="button_remain_color"></div></td>
        <td>
            <button type="button" class="btn btn-primary">Most View Story</button> <!-- for class toggle_view_button-->
        </td>
        <td>
            <button type="button" class="btn btn-primary">Latest Story</button> <!-- for class toggle_view_button-->
        </td>
        <td id="storyboard">
            Story of Frontliners & Covid Patients
        </td>
    </tr>
</table>
</div>

<div class="container-fluid my-3">
    <div class="row p-3">
        <!--- Since 1 row got 4 col, when print 4 column close div tag (line 52) and start a new row (line 30)  
              Every story (1 column) have starting tag of line 33 and ending tag of line 37--->
        <div class="col px-4 mx-4">
            <a><img src="../assets/No_Picture.jpg" class="mx-auto d-block" alt="NP" id="pic_1">
            <p class="text-center"><span id="title1">Title</span></p>
            <p class="text-right">Read More</p></a>
        </div>
        <div class="col px-4 mx-4">
            <a><img src="../assets/No_Picture.jpg" class="mx-auto d-block" alt="NP" id="pic_1">
            <p class="text-center"><span id="title1">Title</span></p>
            <p class="text-right">Read More</p></a>
        </div>
        <div class="col px-4 mx-4">
            <a><img src="../assets/No_Picture.jpg" class="mx-auto d-block" alt="NP" id="pic_1">
            <p class="text-center"><span id="title1">Title</span></p>
            <p class="text-right">Read More</p></a>
        </div>
        <div class="col px-4 mx-4">
            <a><img src="../assets/No_Picture.jpg" class="mx-auto d-block" alt="NP" id="pic_1">
            <p class="text-center"><span id="title1">Title</span></p>
            <p class="text-right">Read More</p></a>
        </div>
    </div>
    <div class="row p-3">
        <!--- Since 1 row got 4 col, when print 4 column close div tag (line 52) and start a new row (line 30)  
              Every story (1 column) have starting tag of line 33 and ending tag of line 37--->
        <div class="col px-4 mx-4">
            <a><img src="../assets/No_Picture.jpg" class="mx-auto d-block" alt="NP" id="pic_1">
            <p class="text-center"><span id="title1">Title</span></p>
            <p class="text-right">Read More</p></a>
        </div>
        <div class="col px-4 mx-4">
            <a><img src="../assets/No_Picture.jpg" class="mx-auto d-block" alt="NP" id="pic_1">
            <p class="text-center"><span id="title1">Title</span></p>
            <p class="text-right">Read More</p></a>
        </div>
        <div class="col px-4 mx-4">
            <a><img src="../assets/No_Picture.jpg" class="mx-auto d-block" alt="NP" id="pic_1">
            <p class="text-center"><span id="title1">Title</span></p>
            <p class="text-right">Read More</p></a>
        </div>
        <div class="col px-4 mx-4">
            <a><img src="../assets/No_Picture.jpg" class="mx-auto d-block" alt="NP" id="pic_1">
            <p class="text-center"><span id="title1">Title</span></p>
            <p class="text-right">Read More</p></a>
        </div>
    </div>
    <!-- don't touch below code (for navigation)-->
    <div class="row my-3">
        <div class="col">
            <a href="#"><p class="text-center">&laquo; Previous</p></a>
        </div>
        <div class="col">
            <a href="#"><p class="text-center">Next &raquo;</p></a>
        </div>
    </div>
</div>


                


<span id="pad">
</span>

<!-- Footer UI Import Here -->
<?php require("../Navigation Bar and Footer/footer.html"); ?> 
</body>
</html>
