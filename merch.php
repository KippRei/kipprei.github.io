<?php require "sessionBegin.php";?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>When Whales Walked</title>
        <meta name="description" content="Get your When Whales Walked merch here!">
        <?php require "sitehead.html";?>
    </head>

    <body class="merch">
        <?php var_dump($_SESSION["cart"]);?>

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

        <div class="contentStartBuffer"></div>
        <div class="centered">
            <div class="merchTitle">Magnets</div>
            <div>
                <img class="merchItem" src="/MerchImages/merchMagnet1.png" alt="Merch Magnet">
                <p>Magnet (3")</p>
            </div>
            <div>
                <input type="hidden" name="itemName" value="smlMagnet">
                <button type="button" onclick="AddToCart('smlMagnet')">Add To Cart</button>                
            </div>
        </div>

        <div id="viewCartBtn">
            <button type="button" onclick="ViewCart()">Cart</button>
        </div>
        <div id="shoppingCartBg">
            <div id="shoppingCart">
            </div>

            <button id="closeCartBtn" class="buttonMod" type="button" onclick="CloseCart()">
                <img id="closeBtnImg" src="/SiteImages/cartClose.png" alt="Close Cart">
            </button>
            <div id="paypalBtnLoc">
                <div id="cartTotal" class="centered">
                    <p>Total: $
                        <span id="cartTotalPrice"></span>
                    </p>
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
    </body>
</html>
