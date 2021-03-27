<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <?php require "sitehead.html";?>
    </head>

    <body class="merch">
        <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST")
            {
                $item = $_REQUEST["itemName"];
                array_push($_SESSION["cart"], $item);
            }
        ?>
        <?php require 'sitemenu.html';?>

        <div class="menuButtonPos">
            <button class="buttonMod" type="button" onclick="OpenMenu()">
            <img id="openButton" class="menuButton" src="/SiteImages/menuButton.png">
            </button>
            <span class="titleText centered">
            Merch<a href="/index.php"><img class="smallLogo" src="/BandImages/wwwInvert.png"></a>
            </span>
        </div>

        <div class="contentStartBuffer"></div>
        <div class="centered">
            <div class="merchTitle">Buttons</div>
            <div>
                <img class="merchItem" src="/MerchImages/merchButton1.png" alt="Button style WWW">
                <p>Style 1: WWW</p>
                <img class="merchItem" src="/MerchImages/merchButton2.png" alt="Button style Whale">
                <p>Style 2: Whale Hug</p>
            </div>

            <div>
                <form action="/merch.php" method="post">
                    <table>
                        <tr><td>Options</td></tr>
                        <tr><td>
                            <select>
                            <option>1 for $2.00 USD</option>
                            <option>2 for $3.00 USD</option>
                            </select>
                        </td></tr>
                        <tr><td>Let us know which style(s):</td></tr><tr><td><input type="text" name="itemName" maxlength="200"></td></tr>
                    </table>
                    <input type="submit" value="Add To Cart">
                </form>
            </div>
            <button type="button" onclick="ViewCart()">View Cart</button>
        </div>
        <div id="shoppingCartBg">
            <div id="shoppingCart">
                <?php
                    foreach ($_SESSION["cart"] as $value)
                    {
                        echo "<div>$value</div>";
                    }
                ?>
                <button id="closeCartBtn" type="button" onclick="CloseCart()">Close</button>
            </div>
        </div>
            
    <script src="/js.js"></script>
    </body>
</html>
