<?php require "sessionBegin.php";?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>When Whales Walked</title>
        <meta name="description" content="When Whales Walked! We are a 3 piece Pop-Punk band from Central California.">
        <?php require "sitehead.html";?>
    </head>

    <body class="home">
      <?php require "sitemenu.html";?>
      <div class="menuButtonPos">
        <button class="buttonMod" type="button" onclick="OpenMenu()">
          <img id="openButton" class="menuButton" src="/SiteImages/menuButton.png">
        </button>
      </div>

      <div>
        <a href="/index.php"><img class="logo" src="/BandImages/wwwLrg.png" alt="When Whales Walked"></a>
      </div>
      <div class="centered">
        <p></p>
        <div id="bandnameTitle">When Whales Walked</div>
        <p></p>
      </div>
      <div class="socialBar">
        <!--Social Button Bar-->
        <div class="centered">
        <a href="https://www.instagram.com/whenwhaleswalked/"><img class="socialBarButton" src="/SiteImages/igBW.png" alt="When Whales Walked on Instagram"></a>
        <a href="https://www.youtube.com/channel/UCbXM0IVVqiWH8CziVgCgv-w"><img class="socialBarButton" src="/SiteImages/ytBW.png" alt="When Whales Walked on YouTube"></a>
        <a href="https://www.facebook.com/Whenwhaleswalked"><img class="socialBarButton" src="/SiteImages/fbBW.png" alt="When Whales Walked on Facebook"></a>
        <a href="https://twitter.com/whaleswalked"><img class="socialBarButton" src="/SiteImages/twtrBW.png" alt="When Whales Walked on Twitter"></a>
        </div>
      </div>


      <div class="contentStartBuffer"></div>
      <div class="contentStartBuffer"></div>
      <div class="centered">
        <div class="contentText">
          Check out our first single!
        </div>
        <div class="contentText">
          "Mom and Dad"
        </div>
        <div class="contentStartBuffer"></div>
        <div>
          <button class="buttonMod" onclick="PlayMomDad()">
            <div class="imgParent">
              <img id="mdPP" class="playPauseButton" src="/SiteImages/playButton.png">
              <img class="albumThumb" src="/BandImages/wwwSml.png">
            </div>
          </button>
        </div>
        <audio id="momdadmp3">
          <source src="/Media/momdad.mp3" type="audio/mpeg">
          Your Browser Does Not Support The Audio Element.
        </audio>

        <div class="contentStartBuffer"></div>
        <div class="contentStartBuffer"></div>
        <div class="contentStartBuffer"></div>
          <div class="contentText">
            Merry Christmas everyone!
          </div>
          <div class="contentText">
            "Jingle Bells"
          </div>
          <div class="contentStartBuffer"></div>
          <div>
            <button class="buttonMod" onclick="PlayJingle()">
              <div class="imgParent">
                <img id="jPP" class="playPauseButton" src="/SiteImages/playButton.png">
                <img class="albumThumb" src="/BandImages/wwwJingle.jpg">
              </div>
            </button>
          </div>
          <audio id="jinglemp3">
            <source src="/Media/jingle.mp3" type="audio/mpeg">
              Your Browser Does Not Support The Audio Element.
          </audio>

    <script src="/js.js"></script>
    </body>
</html>
