<?php
    require "../sessionBegin.php";
    $item = $_REQUEST["item"];
    $quant = $_REQUEST["quant"];
    $_SESSION["cart"][$item] = $quant;
    if ($_SESSION["cart"][$item] <= 0)
    {
        unset($_SESSION["cart"][$item]);
    }
?>