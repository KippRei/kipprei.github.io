<?php
    session_start();
    $merchImg = $_SESSION["merchPriceList"][1];
    $item = $_REQUEST["item"];
    $popupImg = $merchImg[$item];
    echo "<img id='popupImg' src='$popupImg' alt='$item'/>";
?>