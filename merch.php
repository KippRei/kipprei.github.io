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

        <div id="menuButtonPos" class="menuButtonPos hideOnDesk">
            <button class="buttonMod" type="button" onclick="OpenMenu()">
                <img id="openButton" class="menuButton" src="/SiteImages/menuButton.png">
            </button>
            <span class="titleText centered">
            Merch<a href="/index.php"><img class="smallLogo" src="/BandImages/wwwInvert.png"></a>
            </span>
        </div>

        <div id="deskTitle" class="hideOnMobile centered">
            Merch
        </div>

        <!-- Featured Item -->
        <div class="contentStartBuffer"></div>
        <div class="contentStartBuffer"></div>
        <div>
            <div class="featuredTitle centered">Featured Item</div>
            <a href="javascript: ViewItem('tshirt_m');"> 
                <div class="featuredItem">
                    <img class="featuredItemImg" src="/MerchImages/merchTshirt.png" alt="Merch T-Shirt">
                </div>
            </a>
            <div class="centered">
                <div class="merchName">When Whales Walked T-Shirt</div>
                <div class="itemPrice">$15</div>
                <div style="margin-top: -5px; margin-bottom: 5px;">
                    <select id="getsize" name="sizes" class="sizes">
                        <option value="s">S</option>
                        <option value="m">M</option>
                        <option value="l">L</option>
                        <option value="xl">XL</option>
                        <option value="xxl">XXL</option>
                    </select>
                </div>
                <div>
                    <button type="button" class="addToCart" onclick="AddToCart('tshirt')">Add To Cart</button>                
                </div>
            </div>
        </div>

        <?php include 'Includes/merchPopulate.php';?>

        <!-- Item Popup Window -->
        <div id="itemPopupBg">

            <div id="itemPopup"></div>

            <button id="closeCartBtn" class="buttonMod" type="button" onclick="ClosePopupImg()">
                <img id="closeBtnImg" src="/SiteImages/cartClose.png" alt="Close Popup Image"/>
            </button>
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
                    <p class="noBuffer">
                        Total: $<span id="cartTotalPrice"></span>
                    </p>
                    <div>
                        (+$4.20 Flat-Rate Shipping)
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
