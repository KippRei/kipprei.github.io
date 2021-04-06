<?php
    session_start();
    $item = $_REQUEST["item"];
    $_SESSION["cart"][$item] += 1;
?>