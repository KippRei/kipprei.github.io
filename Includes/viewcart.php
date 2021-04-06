<?php
    session_start();
    $merch = $_SESSION["merchPriceList"][0];

    echo    "<div id=\"cartTitle\">Cart</div>";

    if (sizeof($_SESSION["cart"]) == 0 || $_SESSION["cart"] == "") 
    {
        echo "<div class=\"cartItem\">Cart is empty</div>";
    }
    else 
    {
        foreach ($_SESSION["cart"] as $item => $quantity)
        {
            $itemName =  $merch[$item]['name'];
            $itemQuant = $item . "Quant";
            $itemTotal = $merch[$item]['price'] * $quantity;
            $itemImg = $merch[$item]['image'];
            echo   "<div class=\"contentStartBuffer\"></div>
                    <div class=\"cartImgContain\">
                    <img class=\"cartImg\" src='$itemImg'>
                    </div>
                    <p class=\"cartItem\">$itemName</p>
                    <ul class=\"centered itemQuantAdjUl\">
                        <li class=\"itemQuantAdjLi\"><button class=\"minusBtn\" onclick=\"RemoveFromCart('$item')\">-</button></li><!--
                        --><li class=\"itemQuantAdjLi\"><input class=\"quantText\" type=\"text\" readonly=\"readonly\" maxlength=\"2\" size=\"2\" id=\"$itemQuant\" name=\"quant\" value=\"$quantity\"/></li><!--
                        --><li class=\"itemQuantAdjLi\"><button class= \"plusBtn\" onclick=\"AddToCart('$item')\">+</button></li>
                        <li class=\"cartPrice itemQuantAdjLi\">\$$itemTotal</li>
                    </ul>";
        }
        echo "<div style=\"margin-bottom: 200px;\"</div>";
    }
    echo "<script>EnableCartButtons();</script>";
?>