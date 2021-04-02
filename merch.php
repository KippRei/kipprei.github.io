<?php require "sessionBegin.php";?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>When Whales Walked</title>
        <meta name="description" content="Get your When Whales Walked merch here!">
        <?php require "sitehead.html";?>
    </head>

    <body class="merch">
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
        <div class="myRow">
        <div class="centered myCol">
            <div>
                <img class="merchItem" src="/MerchImages/merchKeychain.png" alt="Merch Keychain">
                <p>Keychain (2")</p>
            </div>
            <div>
                <input type="hidden" name="itemName" value="keychain">
                <button type="button" class="addToCart" onclick="AddToCart('keychain')">Add To Cart</button>                
            </div>
        </div>

        <div class="centered myCol">
            <div>
                <img class="merchItem" src="/MerchImages/merchMagnet1.png" alt="Merch Magnet">
                <p>Magnet (3")</p>
            </div>
            <div>
                <input type="hidden" name="itemName" value="smlMagnet">
                <button type="button" class="addToCart" onclick="AddToCart('smlMagnet')">Add To Cart</button>                
            </div>
        </div>
        </div>

        <!-- Shopping Cart -->
        <div id="viewCartBtn">
            <button class="buttonMod" type="button" onclick="ViewCart()">
                <img class="menuButton" src="/SiteImages/cart.png">
            </button>
        </div>
        <div id="shoppingCartBg">
            <div id="shoppingCart">
            </div>

            <button id="closeCartBtn" class="buttonMod" type="button" onclick="CloseCart()">
                <img id="closeBtnImg" src="/SiteImages/cartClose.png" alt="Close Cart">
            </button>
            <div id="buyBtnLoc">
                <div id="cartTotal" class="centered">
                    <p>
                        Total: $<span id="cartTotalPrice"></span>
                    </p>
                    <div>
                        (+$4.95 Flat-Rate Shipping)
                    </div>
                    <div style="text-align: center;">
                        <form action="/Includes/checkout.php" method="post">
                            <input type="hidden" id="totalPrice" name="totalPrice" value="0">
                            <button id="buyBtn" type="submit">
                                Pay Now
                            </button>
                        </form>
                    </div>
                    <div class="smallPrint">
                        Secure Checkout with
                        <img class="smallPrintImg" src="/SiteImages/squareLogo.png">
                    </div>
                </div>
            </div>
        </div>
            

    <div class="contentStartBuffer"></div>
    <div class="contentStartBuffer"></div>
    <div class="contentStartBuffer"></div>
    <div class="contentStartBuffer"></div>
    <div class="contentStartBuffer"></div>

    <script src="/js.js"></script>
    </body>
</html>
