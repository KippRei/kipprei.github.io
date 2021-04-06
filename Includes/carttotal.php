<?php
    session_start();
    $_SESSION["total"] = 0;
    $merch = $_SESSION["merchPriceList"][0];
    
    foreach ($_SESSION["cart"] as $item => $quantity)
    {
        $itemTotal = $merch[$item]['price'] * $quantity;
        $_SESSION["total"] += $itemTotal;
    }
    echo $_SESSION["total"];
?>
