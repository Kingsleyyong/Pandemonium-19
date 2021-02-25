<<?php include("data_connection.php"); ?>

<html>
<head><title>Edit a Movie</title>
    <link href="design.css" type="text/css" rel="stylesheet" />
</head>
<body>

<div id="wrapper">

    <div id="left">
    </div>

    <div id="right">

        <?php
        $storyId = $_GET["id"];

        if(isset($_GET["pageset"]))
        {
            $result = mysqli_query($conn, "select * from story where storyID = $storyId");
            $row = mysqli_fetch_assoc($result);
            ?>

            <h1>Edit a Story</h1>

            <form name="edit_addfrm" method="post" action="">

                <p><label>Story name</label><input type="text" name="Story_title" size="80"
                    value="<?php echo $row['storyTitle']; ?>">

                <p><label>Story Author</label><input type="text" name="Story_author" size="80"
                                                     value="<?php echo $row['storyAuthor']; ?>">

                <p><label>Image</label><input type="file" name="img" size="10" accept="image/*"
                        value="<?php echo $row['storyMedia']; ?>">

                <p><label>Story</label><textarea cols="60" rows="4" name="story_text"
                    ><?php echo $row['storyBoard']; ?></textarea>

                <p><label>Posted Date:</label><input type="date" name="story_release_date"
                        value="<?php echo $row['storyDate']; ?>">

                <p><input type="submit" name="savebtnstory" id="button" value="UPDATE STORY">
                <p><input type="submit" id="button1" value="BACK TO MANAGE TESTIMONIAL"
                          onclick="location.href = 'manage testimonial.php'"></p>
            </form>
            <?php
        }
        ?>
    </div>

</div>


</body>
</html>

<?php

if(isset($_POST['savebtnstory']))
{
    $stitle = $_POST["Story_title"];
    $sAuthor = $_POST["Story_author"];
    $sImg = $_POST["img"];
    $spost_date = $_POST["story_release_date"];
    $sStory = $_POST['story_text'];

    if ($result = mysqli_query($conn, "UPDATE story set storyAuthor = 
'$sAuthor', storyDate = '$spost_date', 
                 storyMedia = '$sImg', storyTitle = '$stitle',storyBoard = '$sStory' WHERE storyID = '$storyId'"))
    {
        ?>
        <script type="text/javascript">
            alert("Story Details Updated");
        </script>
        <?php
    }
    else{
        echo "Update Failed";
    }
    header("refresh:0.5; url= manage testimonial_edit.php");
}
?>

