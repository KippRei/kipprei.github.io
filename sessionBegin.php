<?php
    session_start();
    if (!isset($_SESSION["merchPriceList"])) {
        $openFile = fopen("merch.json", "r") or die("Loading Error");
        $readFile = fread($openFile, filesize("merch.json"));
        $_SESSION["merchPriceList"] = json_decode($readFile, $associative = true, $depth = 512, $flags = 0);
        fclose($openFile);
    }
    if (!isset($_SESSION["cart"])) {
        $_SESSION["cart"] = array();
    }
    if (!isset($_SESSION["total"])) {
        $_SESSION["total"] = 0;
    }
?>