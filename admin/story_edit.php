<?php include("data_connection.php"); ?>

<html>
<head><title>Edit a Movie</title>
    <link href="design.css" type="text/css" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body class="bg-dark text-light">
    <?php
        $storyId = $_GET["id"];

        if(isset($_GET["pageset"]))
        {
            $result = mysqli_query($conn, "select * from story where storyID = $storyId");
            $row = mysqli_fetch_assoc($result);
            ?>

    <form name="edit_addfrm" method="post" class="m-4" action="">
        <div class="row">
            <h1>Add Story</h1>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label>Story name</label>
                <input type="text" class="form-control" size="80" name="Story_title" value="<?php echo $row['storyTitle']; ?>" required>
            </div>
            <div class="form-group col-md-6">
                <label>Story Author</label>
                <input type="text" name="Story_author" class="form-control" size="80" value="<?php echo $row['storyAuthor']; ?>" required>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md">
                <label>Image</label>
                <input type="file" name="img" size="10" class="form-control-file" accept="image/*" required>
            </div>
            <div class="form-group col-md-6">
                <label>Posted Date:</label>
                <input type="date" name="story_release_date" class="form-control" value="<?php echo $row['storyDate']; ?>" required>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md">
                <label>Story</label>
                <textarea cols="60" rows="4" name="story_text" class="form-control" required><?php echo $row['storyBoard']; ?></textarea>
            </div>
        </div>
        <input type="submit" name="savebtnstory" class="btn btn-primary" id="button" value="UPDATE STORY">
        <input type="submit" id="button1" value="BACK TO MANAGE TESTIMONIAL"  class="btn btn-info" onclick="location.href = 'manage testimonial.php'">
    </form>
    <?php
        }
        ?>


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

