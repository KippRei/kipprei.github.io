<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
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
            $headers = "From: kippsta0@gmail.com";
            mail("kippsta0@gmail.com", "Message", $msg, $headers);
        }
      ?>

      <?php require 'sitemenu.html';?>
      <div class="menuButtonPos">
        <button class="buttonMod" type="button" onclick="OpenMenu()">
          <img id="openButton" class="menuButton" src="/menuButton.png">
        </button>
        <span class="titleText centered">
          Contact<a href="/index.html"><img class="smallLogo" src="/wwwInvert.png"></a>
        </span>
      </div>

      <div class="contentStartBuffer"></div>
      <div class="centered">
        <div class="padding"></div>
        <form action="/contact.php" method="post">
          <textarea placeholder="Message (500 character max)" maxlength="500" cols= "30" rows="4" name="message"></textarea><br>
          <input type="submit" value="Send Message">
        <div>
            <a href="https://www.instagram.com/whenwhaleswalked/"><img class="socialButtons" src="/ig.png" alt="When Whales Walked on Instagram"></a>
        </div>
        <div class="padding"></div>
        <div>
            <a href="https://www.youtube.com/channel/UCbXM0IVVqiWH8CziVgCgv-w"><img class="socialButtons" src="/yt.png" alt="When Whales Walked on YouTube"></a>
        </div>
        <div class="padding"></div>
        <div>
            <a href="https://www.facebook.com/Whenwhaleswalked"><img class="socialButtons" src="/fb.png" alt="When Whales Walked on Facebook"></a>
        </div>
        <div class="padding"></div>
        <div>
            <a href="https://twitter.com/whaleswalked"><img class="socialButtons" src="/twtr.png" alt="When Whales Walked on Twitter"></a>
        </div> 
      </div>
    </body>
    <script src="/js.js"></script>
</html>
