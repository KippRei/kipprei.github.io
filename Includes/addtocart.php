<?php
    session_start();
    $itemToAdd = $_REQUEST["item"];
    echo "adding $itemToAdd";
    $_SESSION["cart"][$itemToAdd] += 1;
?>