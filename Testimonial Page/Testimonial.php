<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Testimonial</title>
    <link href="../assets/testimonial.css" rel="stylesheet">
    <!-- NAV UI Import here -->
    <?php require("../Navigation Bar and Footer/navbar.html"); ?> 
</head>

<body style="background-color: #30343F">
<hr>
<div class="division_toggle">
<table>
    <tr> <!--to let the color of button remain differential colour-->
        <td><div id="button_remain_color"></div></td>
        <td>
            <button type="button" class="toggle_view_button">Most View Story</button> <!-- for class toggle_view_button-->
        </td>
        <td>
            <button type="button" class="toggle_view_button">Latest Story</button> <!-- for class toggle_view_button-->
        </td>
        <td id="storyboard">
            Story of Frontliners & Covid Patients
        </td>
    </tr>
</table>
</div>
<div>
<!--1 picture contents-->
    <table>
        <tr>
            <td>
                <a><img src="../assets/No_Picture.jpg" alt="NP" id="pic_1"></a>
                <p><span id="title1"></span></p>
                <p style="position: relative;left: 120px"><a href="Story%20page.html">Read More</a></p>
            </td>
            <td>
                <a><img src="../assets/No_Picture.jpg" alt="NP" id="pic_2"></a>
                <p><span id="title2"></span></p>
                <p style="position: relative;left: 370px"><a href="Story%20page.html">Read More</a></p>
            </td>
        </tr>
    </table>
</div>
<hr class="line">
<div>
    <!--2 picture contents-->
    <table>
        <tr>
            <td>
                <a><img src="../assets/No_Picture.jpg" alt="NP" id="pic_3"></a>
                <p><span id="title3"></span></p>
                <p style="position: relative;left: 120px"><a href="Story%20page.html">Read More</a></p>
            </td>
            <td>
                <a><img src="../assets/No_Picture.jpg" alt="NP" id="pic_4"></a>
                <p><span id="title4"></span></p>
                <p style="position: relative;left: 370px"><a href="Story%20page.html">Read More</a></p>
            </td>
        </tr>
    </table>
</div>


<div>
    <table>
        <tr>
            <td >
                <a href="#" class="previous_next">&laquo; Previous</a>
                <a href="#" class="previous_next">Next &raquo;</a>
            </td>
        </tr>
    </table>
</div>

<span id="pad">
</span>

<!-- Footer UI Import Here -->
<?php require("../Navigation Bar and Footer/footer.html"); ?> 
</body>
</html>
