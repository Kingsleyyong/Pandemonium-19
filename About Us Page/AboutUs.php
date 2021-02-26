<!DOCTYPE html>
<html>
    <head>
        <title>About Us</title>
        <link rel="shortcut icon" href="../assets/favicon.png" type="image/x-icon">
        <link rel="stylesheet" href="../assets/CSS/style1.css"/>
    </head>
    <body class="bg-dark">
        <?php require("../Navigation Bar and Footer/navbar.html") ?>
        <div class="loc text-light text-center">
            <img src="../assets/logo.png" id="aboutUsLogo" alt="Pandemonium 19" onclick="location.href='main.php'"/>
            <div id="aboutUs">
                <h3 id="aboutTitle">About Us</h3>
                <div class="about" style="margin-left: 4.8%;">
                    <img src="../assets/Matt.jpg" id="us" alt="Matt"><br/>
                    <p>MATTHEW<br/>LABIAL JOHN</p><p>1191202516</p>
                </div>
                <div class="about">
                    <img src="../assets/Jamond.jpg" id="us" alt="Jamond"><br/>
                    <p>CHEW<br/>ZHI PENG</p><p>1191202464</p>
                </div>
                <div class="about">
                    <img src="../assets/Lyn.jpg" id="us" alt="Lyn"><br/>
                    <p>CHAN<br/>LIN CHEE</p><p>1191202546</p>
                </div>
                <div class="about">
                    <img src="../assets/Kingsley.jpg" id="us" alt="Kingsley"><br/>
                    <p>YONG<br/>JING PING</p><p>1191202279</p>
                </div>
                <div class="about">
                    <img src="../assets/Koee.jpeg" id="us" alt="KoEe"><br/>
                    <p>HO<br/>KO EE</p><p>1191202709</p>
                </div>
            </div>
            <div id="vision" style="clear: both;">
                <h3 id="aboutTitle">Our Vision</h3>
                <p>
                    As we all know, the COVID-19 pandemic in Malaysia has become more and more serious. 
                    In order to raise Malaysians’ awareness of the COVID-19 outbreak, we decided to share knowledge on this topic through 
                    <span id="topic" onclick="location.href='#aboutUsLogo'">'PANDEMONIUM 19'</span> website.<br/><br/>
                    Let's break the COVID-19 chain together!
                </p>
                <!-- <h1>Slogan</h1> -->
                <p id="slogan">STAYING APART IS THE BEST WAY TO STAY SAFE</p>
            </div>
        </div>
        <button id="unmute">
            <img src="http://upload.wikimedia.org/wikipedia/commons/2/21/Speaker_Icon.svg" id="unnmute" width="100px" onclick="changeImage()">
        </button>
    </body>
</html>

<script>
    var audio;
    var play_button;

    function allow_music_on(){
        audio = new Audio();
        audio.src = "funmusic.mp3";
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
