<!DOCTYPE html>
<html>
    <head>
        <title>Game List</title>
        <link rel="stylesheet" href="assets/style1.css"/>
        <!-- NAV UI Import here -->
        <?php require("navbar.html"); ?>
    </head>
    <body id="gameList">
        <div><p id="gameBox1" name="MINI GAME" onclick=" location.href='MiniGame.html'">MINI GAME</p></div>
        <div><p id="gameBox2" name="TRIVIA"onclick=" location.href='Trivia.html' ">TRIVIA</p></div>
        <div><p id="gameBox3" name="QUIZ" onclick=" location.href='Quiz.html' ">QUIZ</p></div>
    </body>
    <button id="unmute"><img src="http://upload.wikimedia.org/wikipedia/commons/2/21/Speaker_Icon.svg" id="unnmute"
        onclick="changeImage()"></button>

     <!-- Footer UI Import Here -->
     <?php require("footer.html"); ?>
</html>

<script>
    var audio;
    var play_button;

function allow_music_on(){
    audio = new Audio();
    audio.src = "game%20music.mp3";
    audio.loop = true;
    audio.play();
    play_button = document.getElementById("unmute");
    play_button.addEventListener("click", playPause);

    function playPause()
    {
        if(audio.paused)
        {
            audio.play();
        }
        else
        {
            audio.pause();
        }
    }


}
function changeImage()
    {
        if (document.getElementById("unnmute").src == "http://upload.wikimedia.org/wikipedia/commons/2/21/Speaker_Icon.svg")
        {
            document.getElementById("unnmute").src = "http://upload.wikimedia.org/wikipedia/commons/3/3f/Mute_Icon.svg";
        }
        else
        {
            document.getElementById("unnmute").src = "http://upload.wikimedia.org/wikipedia/commons/2/21/Speaker_Icon.svg";
        }
    }
    window.addEventListener("load", allow_music_on);
</script>
