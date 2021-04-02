<?php
    session_start();
    $_SESSION["total"] = 0;
    $merchLi = $_SESSION["merchPriceList"][0];
    
    if (!$_SESSION["cart"] == null)
    {
        foreach ($_SESSION["cart"] as $item => $quantity)
        {
            $itemTotal = $merchLi[$item] * $quantity;
            $_SESSION["total"] += $itemTotal;
        }
    }
    echo $_SESSION["total"];
?>
