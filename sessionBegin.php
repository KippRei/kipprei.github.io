<?php
    session_start();
    if (!$_SESSION["cart"]) {
        $_SESSION["cart"] = array();
    }
    if (!$_SESSION["merchList"]) {
        $openFile = fopen("merch.json", "r") or die("Loading Error");
        $readFile = fread($openFile, filesize("merch.json"));
        $_SESSION["merchList"] = json_decode($readFile, $associative = true, $depth = 512, $flags = 0);
        fclose($openFile);
    }
    if (!$_SESSION["total"]) {
        $_SESSION["total"] = 0;
    }
?>