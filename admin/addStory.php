<!DOCTYPE html>
<html>
<head><title>Add New Story</title>
    <link href="#" type="text/css" rel="stylesheet" />
</head>
<body>

<div id="wrapper">

    <div id="left">
    </div>

    <div id="right">

        <h1>Add Story</h1>

        <form name="addStoryfrm" method="post" action="">

            <p><label>Story name</label><input type="text" name="Story_title" size="80" required>

            <p><label>Story Author</label><input type="text" name="Story_author" size="80" required>

            <p><label>Image</label><input type="file" name="img" size="10" accept="image/*" required>

            <p><label>Story</label><textarea cols="60" rows="4" name="story_text" required></textarea>

            <p><label>Posted Date:</label><input type="date" name="story_release_date" required>

            <p><input type="submit" name="savebtnstory" id="button" value="SAVE STORY">

        </form>

    </div>

</div>


</body>
</html>

<?php include "data_connection.php";

if (isset($_POST['savebtnstory']))
{
    $stitle = $_POST["Story_title"];
    $sAuthor = $_POST["Story_author"];
    $sImg = $_POST["img"];
    $spost_date = $_POST["story_release_date"];
    $sStory = $_POST['story_text'];;

    $q = "INSERT INTO story (storyAuthor, storyDate, storyBoard, storyMedia, storyTitle)
          values ('$sAuthor', '$spost_date', '$sStory', '$sImg', '$stitle')";

    if($result = mysqli_query($conn, $q)) {
        ?>
        <script type="text/javascript">
            alert("The Story is saved!");
        </script>
        <?php
    }
}
?>

