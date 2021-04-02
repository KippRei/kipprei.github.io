<?php
    session_start();
    $itemToAdd = $_REQUEST["item"];
    $_SESSION["cart"][$itemToAdd] += 1;
?>