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

        <!-- Featured Item -->
        <div class="contentStartBuffer"></div>
        <div class="contentStartBuffer"></div>
        <div class="centered">
            <div>
                <div class="merchTitle">Featured Item</div>
                <img class="featuredItem" src="/MerchImages/merchTshirt.png" alt="Merch T-Shirt">
                <div class="merchName">When Whales Walked T-Shirt</div>
            </div>
            <div>
                <select id="getsize" name="sizes" class="sizes">
                    <option value="s">S</option>
                    <option value="m">M</option>
                    <option value="l">L</option>
                    <option value="xl">XL</option>
                    <option value="xxl">XXL</option>
                </select>
            </div>
            <div>
                <input type="hidden" name="itemName" value="tshirt">
                <button type="button" class="addToCart" onclick="AddToCart('tshirt')">Add To Cart</button>                
            </div>
        </div>

        <!-- First Row of Merch -->
        <div class="contentStartBuffer"></div>
        <div class="contentStartBuffer"></div>
        <div class="myRow">
            <div class="myCol">                
                <div class="merchItem">
                    <img class="merchItemImg" src="/MerchImages/merchKeychain.png" alt="Merch Keychain"/>
                </div>
                <div class="centered">
                    <div class="merchName">Keychain (2")</div>
                    <div>
                        <input type="hidden" name="itemName" value="keychain">
                        <button type="button" class="addToCart" onclick="AddToCart('keychain')">Add To Cart</button>                
                    </div>
                </div>
            </div>

            <div class="myCol">
                <div class="merchItem">
                    <img class="merchItemImg" src="/MerchImages/merchMagnet1.png" alt="Merch Magnet">
                </div>
                <div class="centered">
                    <div class="merchName">Magnet (3")</div>
                    <div>
                        <input type="hidden" name="itemName" value="magnet1">
                        <button type="button" class="addToCart" onclick="AddToCart('magnet1')">Add To Cart</button>                
                    </div>
                </div>
            </div>
        </div>

        <!-- Second Row of Merch -->
        <div class="contentStartBuffer"></div>
        <div class="contentStartBuffer"></div>
        <div class="myRow">
            <div class="centered myCol">
                <div>
                    <img class="merchItem" src="/MerchImages/merchBigMagnet1.png" alt="Merch Magnet">
                    <div class="merchName">Magnet (4")</div>
                </div>
                <div>
                    <input type="hidden" name="itemName" value="bigMagnet1">
                    <button type="button" class="addToCart" onclick="AddToCart('bigMagnet1')">Add To Cart</button>                
                </div>
            </div>

            <div class="centered myCol">
                <div>
                    <img class="merchItem" src="/MerchImages/merchBigMagnet2.png" alt="Merch Magnet">
                    <div class="merchName">Magnet (4")</div>
                </div>
                <di>
                    <input type="hidden" name="itemName" value="bigMagnet2">
                    <button type="button" class="addToCart" onclick="AddToCart('bigMagnet2')">Add To Cart</button>                
                </div>
            </div>
        </div>

        <!-- Third Row of Merch -->
        <div class="contentStartBuffer"></div>
        <div class="contentStartBuffer"></div>
        <div class="myRow">
            <div class="centered myCol">
                <div>
                    <img class="merchItem" src="/MerchImages/merchSticker1.png" alt="Merch Sticker">
                    <div class="merchName">Sticker (4")</div>
                </div>
                <div>
                    <input type="hidden" name="itemName" value="sticker1">
                    <button type="button" class="addToCart" onclick="AddToCart('sticker1')">Add To Cart</button>                
                </div>
            </div>

            <div class="centered myCol">
                <div>
                    <img class="merchItem" src="/MerchImages/merchSticker2.png" alt="Merch Sticker">
                    <div class="merchName">Sticker (4")</div>
                </div>
                <di>
                    <input type="hidden" name="itemName" value="sticker2">
                    <button type="button" class="addToCart" onclick="AddToCart('sticker2')">Add To Cart</button>                
                </div>
            </div>
        </div>

        <!-- Fourth Row of Merch -->
        <div class="contentStartBuffer"></div>
        <div class="contentStartBuffer"></div>
        <div class="myRow">
            <div class="centered myCol">
                <div>
                    <img class="merchItem" src="/MerchImages/merchSticker3.png" alt="Merch Sticker">
                    <div class="merchName">Sticker (4")</div>
                </div>
                <div>
                    <input type="hidden" name="itemName" value="sticker3">
                    <button type="button" class="addToCart" onclick="AddToCart('sticker3')">Add To Cart</button>                
                </div>
            </div>

            <div class="centered myCol">
                <div>
                    <img class="merchItem" src="/MerchImages/merchBigSticker.png" alt="Merch Big Sticker">
                    <div class="merchName">Big Sticker (4")</div>
                </div>
                <di>
                    <input type="hidden" name="itemName" value="bigSticker">
                    <button type="button" class="addToCart" onclick="AddToCart('bigSticker')">Add To Cart</button>                
                </div>
            </div>
        </div>

        <!-- Fifth Row of Merch -->
        <div class="contentStartBuffer"></div>
        <div class="contentStartBuffer"></div>
        <div class="myRow">
            <div class="centered myCol">
                <div>
                    <img class="merchItem" src="/MerchImages/merchButton1.png" alt="Merch Button">
                    <div class="merchName">Button (2")</div>
                </div>
                <div>
                    <input type="hidden" name="itemName" value="button1">
                    <button type="button" class="addToCart" onclick="AddToCart('button1')">Add To Cart</button>                
                </div>
            </div>

            <div class="centered myCol">
                <div>
                    <img class="merchItem" src="/MerchImages/merchButton2.png" alt="Merch Button">
                    <div class="merchName">Button (2")</div>
                </div>
                <di>
                    <input type="hidden" name="itemName" value="button2">
                    <button type="button" class="addToCart" onclick="AddToCart('button2')">Add To Cart</button>                
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
