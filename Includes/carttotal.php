<?php
    session_start();
    $_SESSION["total"] = 0;
    $merch = $_SESSION["merchPriceList"][0];
    $buttonDisc = 0; // For multiple button discount (2 for 3)
    $stickerDisc = 0; // For multiple sticker discount (3 for 5)
    foreach ($_SESSION["cart"] as $item => $quantity)
    {
        if ($merch[$item]['category'] == 'button')
        {
            $buttonDisc += $quantity;
        }
        if ($merch[$item]['category'] == 'smallsticker')
        {
            $stickerDisc += $quantity;
        }
        $itemTotal = $merch[$item]['price'] * $quantity;
        $_SESSION["total"] += $itemTotal;
    }
    $buttonDisc = intdiv($buttonDisc, 2) * 1; // Calculate discount
    $stickerDisc = intdiv($stickerDisc, 3) * 1; // Calculate disount
    $_SESSION["total"] -= $buttonDisc + $stickerDisc;
    echo $_SESSION["total"];
?>
