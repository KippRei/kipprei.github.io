<?php
    session_start();
    $merch = $_SESSION["merchPriceList"][0];
    $item = $_REQUEST["item"];
    $popupImg = $merch[$item][image];
    echo "<img id='popupImg' src='$popupImg' alt='$merch[$item][name]'/>";
?>