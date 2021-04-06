<?php
    session_start();
    $merch = $_SESSION["merchPriceList"][0];
    $item = $_REQUEST["item"];
    $popupImg = $merch[$item][image];
    $itemDescription = $merch[$item][description];
    echo "<div id='popupLoc'>
                <img id='popupImg' src='$popupImg' alt='$merch[$item][name]'/>
                <div id='popupDescript'>$itemDescription</div>
          </div>";
?>