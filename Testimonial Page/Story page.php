<?php include("data_connection.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Stroy Page</title>
    <link rel="shortcut icon" href="../assets/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<script src="story%20page.js"></script>

<?php

    if(isset($_GET["pageSet"])) {
        /*if(isset($_GET["id"]))
        {
            $story_id = $_GET["id"];
            setcookie('count', isset($_COOKIE['count']) ? $_COOKIE['count']++ : 1);

            $visitCount = $_COOKIE['count'];
            $query = "UPDATE story SET storyView = '$visitCount' WHERE storyID = '$story_id'";
            $result = mysqli_query($conn, $query) or die("HELLO CANNOT");

        }*/

        $story_id = $_GET["id"];
        $result = mysqli_query($conn, "SELECT * FROM story WHERE storyID=$story_id") or die("die");
        $row = mysqli_fetch_assoc($result);

        $title = $row['storyTitle'];
        $author = $row['storyAuthor'];
        $board = $row['storyBoard'];
        $date = $row['storyDate'];
    }
?>

<body class="bg-dark text-light">
    <?php require("../Navigation Bar and Footer/navbar.php") ?>

    <div class="container">
        <div class="row p-3 bg-secondary">
            <div class="col">
                <?php
                    if($row['storyMedia']!=null) {
                        $pic = $row['storyMedia'];
                        echo '<img class="d-block mx-auto img-fluid" src="data:image/*;base64,'
                            .base64_encode($pic).'" alt="Default Profile Picture"/>';
                    }
                    else {
                        echo '<img src="../assets/storyDefault.png" class="mx-auto d-block img-fluid" alt="article image">';
                    }
                ?>
            </div>
        </div>
        <div class="row mb-4 p-3 bg-secondary">
            <div class="col">
                <h1 class="text-center"><?php echo $story_id; ?></h1>
                <h4 class="text-center"><?php echo "Author : ".$author; ?></h4>
                <h5 class="text-center"><?php echo "[ ".$date," ]"; ?></h5>
                <p class="my-3"><?php echo $board?></p>
            </div>
        </div>
    </div>
    <?php require("../Navigation Bar and Footer/footer.html"); ?>
</body>
</html>