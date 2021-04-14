<?php require "sessionBegin.php"; ?>
<?php require "cartClear.php"; ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>When Whales Walked</title>
        <meta name="description" content="Your order is confirmed!">
        <?php require "sitehead.html";?>   
    </head>
    <body class="orderconfirm">
    <?php require "Includes/orderconfirmation.php"; ?>
    <div class="centered">
    <div class="contentStartBuffer"></div>
    <div class="contentStartBuffer"></div>
        <div id="orderConfirmedTitle">Your Order is Confirmed!</div>
    </div>
    <div class="contentStartBuffer"></div>
    <div class="contentStartBuffer"></div>
    <div class="orderConfirmText">
        Thank you for your order!<br>
        You will receive an email shortly with the order details.<br>
        Redirecting back to <a href="https://kippreitzel.com">WhenWhalesWalked.com</a> in <span id="redirect">5</span>
    </div>
    <!-- <script src="/Includes/orderconfirm.js"></script> -->
    </body>
</html>
