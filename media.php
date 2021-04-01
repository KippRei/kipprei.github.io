<?php require "sessionBegin.php";?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>When Whales Walked</title>
        <meta name="description" content="Find our newest videos and songs here!">
        <?php require "sitehead.html";?>
    </head>

    <body class="media">
      <?php require 'sitemenu.html';?>
      <div class="menuButtonPos">
        <button class="buttonMod" type="button" onclick="OpenMenu()">
          <img id="openButton" class="menuButton" src="/SiteImages/menuButton.png">
        </button>
        <span class="titleText centered">
          Media<a href="/index.php"><img class="smallLogo" src="/BandImages/wwwInvert.png"></a>
        </span>
      </div>

      <div class="contentStartBuffer"></div>
      <div class="centered">
          <div><iframe class="videos" src="https://www.youtube.com/embed/ZUKWkLRJ6L4" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>
          <div><iframe class="videos" src="https://www.youtube.com/embed/_eNnXSCglh4" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>
      </div>

    <script src="/js.js"></script>
    </body>
</html>
