<?php


function RemoveFromCart($itemToRemove)
{
    unset($_SESSION["cart"][$itemToRemove]);
}
?>