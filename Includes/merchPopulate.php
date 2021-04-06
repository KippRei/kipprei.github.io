<?php
    session_start();
    $merch = $_SESSION["merchPriceList"][0];
    $i = 1;
    foreach ($merch as $item=>$value)
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
                                    <img class='merchItemImg' src='$value[image]' alt='Merch $value[name]'/>
                                </div>
                            </a>
                            <div class='centered'>
                                <div class='merchName'>$value[name]</div>
                                <div class='itemPrice'>$$value[price]</div>
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
                                <img class='merchItemImg' src='$value[image]' alt='Merch '$value[name]''/>
                            </div>
                        </a>
                        <div class='centered'>
                            <div class='merchName'>$value[name]</div>
                            <div class='itemPrice'>$$value[price]</div>
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