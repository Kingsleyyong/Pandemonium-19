<!DOCTYPE html>
<html>
    <head>
        <title>Game List</title>
        <link rel="stylesheet" href="assets/style1.css"/>
        <!-- NAV UI Import here -->
        <?php require("navbar.html"); ?> 
    </head>
    <body id="gameList">
        <div><p id="gameBox1" name="MINI GAME" onclick=" location.href='MiniGame.html' ">MINI GAME</p></div>
        <div><p id="gameBox2" name="TRIVIA"onclick=" location.href='Trivia.html' ">TRIVIA</p></div>
        <div><p id="gameBox3" name="QUIZ" onclick=" location.href='Quiz.html' ">QUIZ</p></div>
    </body>

    <!-- Footer UI Import Here -->
    <?php require("footer.html"); ?> 
</html>