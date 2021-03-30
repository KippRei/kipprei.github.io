<?php
    require "../sessionBegin.php";
    $_SESSION["total"] = 0;
    $merchLi = $_SESSION["merchPriceList"][0];
    if (sizeof($_SESSION["cart"]) == 0 || $_SESSION["cart"] == "") 
    {
        echo "<div class=\"cartItem\">Cart is empty</div>";
    }
    foreach ($_SESSION["cart"] as $item => $quantity)
    {
        $itemQuant = $item . "Quant";
        $itemTotal = $merchLi[$item] * $quantity;
        echo   "<p class=\"cartItem\">$item.....
                <span>
                    <input type=\"hidden\" value=\"$item\"/>
                    <input type=\"number\" id=\"$itemQuant\" name=\"quant\" value=\"$quantity\" size=\"2\"/>
                    <button type=\"button\" 
                    onclick=\"UpdateCart('$item')\">Update</button>
                </span>
                <span class=\"cartPrice\">\$$itemTotal</span>
                </p>";
        $_SESSION["total"] += $itemTotal;
    }
    echo "<br><br><br><br><br><br><br>";
?>