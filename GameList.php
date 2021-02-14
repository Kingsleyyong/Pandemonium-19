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

    <iframe src="game%20music.mp3" type="audio/mp3" allow="autoplay" style="display:none"></iframe>
    <audio id="Audio" autoplay controls style="visibility: hidden" loop="loop">
        <source src="game%20music.mp3" type="audio/mp3">
    </audio>
    <input type="checkbox" name="umute" id="umute" onclick="allow_music_on()">
    <label for="umute" class="umute">
        <img src="http://upload.wikimedia.org/wikipedia/commons/3/3f/Mute_Icon.svg" alt="Mute_Icon.svg"
             title="Mute" style="position: relative; right: 770px;width: 100px;height: 100px">
    </label>
    <label for="umute" class="mute">
        <img src="http://upload.wikimedia.org/wikipedia/commons/2/21/Speaker_Icon.svg"
             alt="Speaker_Icon.svg" title="Unmute"
        style="position: relative; right: 800px;width: 100px;height: 100px" id="mute">
    </label>
    
     <!-- Footer UI Import Here -->
     <?php require("footer.html"); ?>
</html>

<script>
    var audio = document.getElementById("Audio");

    var Playing = true;

    function allow_music_on() {
        Playing ? audio.pause() : audio.play();
    };

    audio.onplaying = function() {
        Playing = true;
    };
    audio.onpause = function() {
        Playing = false;
    };
</script>
