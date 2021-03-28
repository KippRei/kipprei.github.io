<?php require "sessionBegin.php";?>

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
                    <button type="submit">Add To Cart</div>
                </form>
            </div>
        </div>

        <div class="contentStartBuffer"></div>
        <div class="centered">
            <div class="merchTitle">Keychain</div>
            <div>
                <img class="merchItem" src="/MerchImages/merchKeychain.png" alt="Merch Keychain">
                <p>Keychain (2")</p>
            </div>
            <div>
                <form action="/merch.php" method="post">
                    <input type="hidden" name="itemName" value="keychain">
                    <button type="submit">Add To Cart</button>
                </form>
            </div>
        </div>

        <div id="viewCartBtn">
            <button type="button" onclick="ViewCart()">Cart</button>
        </div>
        <div id="shoppingCartBg">
            <div id="shoppingCart">
                <?php
                    //$_SESSION["cart"] = "";
                    $_SESSION["total"] = 0;
                    $merchLi = $_SESSION["merchList"][0];
                    if (sizeof($_SESSION["cart"]) == 0 || $_SESSION["cart"] == "") 
                    {
                        echo "<div class=\"cartItem\">Cart is empty</div>";
                    }
                    foreach ($_SESSION["cart"] as $value)
                    {
                        $_SESSION["total"] += $merchLi[$value];
                        echo "<p class=\"cartItem\">$value
                            <span class=\"cartPrice\">\$$merchLi[$value]</span>
                            </p>";
                    }
                    echo "<br><br><br><br><br><br><br>";
                ?>
            </div>

            <button id="closeCartBtn" class="buttonMod" type="button" onclick="CloseCart()">
                <img id="closeBtnImg" src="/SiteImages/cartClose.png" alt="Close Cart">
            </button>
            <div id="paypalBtnLoc">
                <div id="cartTotal" class="centered">
                    <p>Total: $
                    <?php
                        echo $_SESSION["total"];
                    ?></p>
                </div>
                <div id="paypalBtn" style="text-align: center;"></div>
            </div>
        </div>
            

    <div class="contentStartBuffer"></div>
    <div class="contentStartBuffer"></div>
    <div class="contentStartBuffer"></div>
    <div class="contentStartBuffer"></div>
    <div class="contentStartBuffer"></div>
    <script src="https://www.paypal.com/sdk/js?client-id=sb&currency=USD" data-sdk-integration-source="button-factory"></script>
    <script src="/js.js"></script>
    <script> price = <?php echo $_SESSION["total"];?></script>
    </body>
</html>
