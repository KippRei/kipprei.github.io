<?php
    session_start();
    $item = $_REQUEST["item"];
    $_SESSION["cart"][$item] -= 1;
    if ($_SESSION["cart"][$item] <= 0)
    {
        unset($_SESSION["cart"][$item]);
    }
?>