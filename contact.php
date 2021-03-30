<?php require "sessionBegin.php";?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>When Whales Walked</title>
        <meta name="description" content="Send us a message or reach us at the socials!">
        <?php require "sitehead.html";?>    
    </head>

    <body class="contact">
      <?php //phpinfo(); ?>
      <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST")
        {
            $msg = $_REQUEST["message"];
            echo $msg;
            $msg = wordwrap($msg, 70);
            mail("kippsta0@gmail.com", "Message", $msg, $headers);
        }
      ?>

      <?php require 'sitemenu.html';?>
      <div class="menuButtonPos">
        <button class="buttonMod" type="button" onclick="OpenMenu()">
          <img id="openButton" class="menuButton" src="/SiteImages/menuButton.png">
        </button>
        <span class="titleText centered">
          Contact<a href="/index.html"><img class="smallLogo" src="/BandImages/wwwInvert.png"></a>
        </span>
      </div>

      <div class="contentStartBuffer"></div>
      <div class="centered">
        <div class="contentStartBuffer"></div>  
        <div class="contentText">Send Us a Message:</div>
        <form action="/contact.php" method="post">
          <textarea placeholder="Hi!" maxlength="500" cols= "30" rows="4" name="message"></textarea><br>
          <button id="sendBtn" class="contentText" type="submit">Send</button>
        </form>
        <div class="contentStartBuffer"></div>
        <div class="contentText">Or Reach Us At:<br>
          <address>
            <a class= "addressText" href="mailto:whenwhaleswalked@gmail.com">
              WhenWhalesWalked<br>@gmail.com</a>
          </address>
        </div>
      </div>
      <div class="contentStartBuffer"></div>
      <div class="centered">
            <a href="https://www.instagram.com/whenwhaleswalked/"><img class="socialButtons" src="/SiteImages/ig.png" alt="When Whales Walked on Instagram"></a>
            <a href="https://www.youtube.com/channel/UCbXM0IVVqiWH8CziVgCgv-w"><img class="socialButtons" src="/SiteImages/yt.png" alt="When Whales Walked on YouTube"></a>
            <a href="https://www.facebook.com/Whenwhaleswalked"><img class="socialButtons" src="/SiteImages/fb.png" alt="When Whales Walked on Facebook"></a>
            <a href="https://twitter.com/whaleswalked"><img class="socialButtons" src="/SiteImages/twtr.png" alt="When Whales Walked on Twitter"></a>
        </div>
    
    <script src="/js.js"></script>
    </body>
</html>
