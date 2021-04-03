<?php
    session_start();
    $merchLi = $_SESSION["merchPriceList"][0];
    $merchImg = $_SESSION["merchPriceList"][1];
    $i = 1;
    foreach ($merchImg as $item=>$img)
    {
        if (preg_match("/^tshirt/", $item))
        {
            $i++;
            continue;
        }
        else if ($i % 2 == 1)
        {
            echo   "<div class='contentStartBuffer'></div>
                    <div class='contentStartBuffer'></div>
                    <div class='myRow'>
                        <div class='myCol'>  
                            <a href='javascript: ViewItem(\"$item\");'>              
                                <div class='merchItem'>
                                    <img class='merchItemImg' src='$img' alt='Merch '$item''/>
                                </div>
                            </a>
                            <div class='centered'>
                                <div class='merchName'>$item</div>
                                <div class='itemPrice'>$$merchLi[$item]</div>
                                <div>
                                    <button type='button' class='addToCart' onclick='AddToCart(\"$item\")'>Add To Cart</button>                
                                </div>
                            </div>
                        </div>";
        }
        else
        {

            echo       "<div class='myCol'>
                        <a href='javascript: ViewItem(\"$item\");'>
                            <div class='merchItem'>
                                <img class='merchItemImg' src='$img' alt='Merch '$item''/>
                            </div>
                        </a>
                        <div class='centered'>
                            <div class='merchName'>$item</div>
                            <div class='itemPrice'>$$merchLi[$item]</div>
                            <div>
                                <button type='button' class='addToCart' onclick='AddToCart(\"$item\")'>Add To Cart</button>                
                            </div>
                        </div>
                    </div>
                </div>";
        }
        $i++;
    }
?>