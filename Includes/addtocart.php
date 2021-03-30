<?php
    require "../sessionBegin.php";
    $itemToAdd = $_REQUEST["item"];
    $_SESSION["cart"][$itemToAdd] += 1;
?>