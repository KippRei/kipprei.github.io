<!DOCTYPE html>
<html lang="en">
    <head>
        <meta content="text/html;charset=utf-8" http-equiv="Content-Type">
        <meta content="utf-8" http-equiv="encoding">      
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
        <link rel="stylesheet" href="/styles.css">
        <link href="https://fonts.cdnfonts.com/css/metal-head" rel="stylesheet">
        <link href="https://fonts.cdnfonts.com/css/rolina" rel="stylesheet">
    </head>

    <body class="merch">
        <?php
            $cart = array();
            if ($_SERVER["REQUEST_METHOD"] == "POST")
            {
                $item = $_REQUEST['itemName'];
                array_push($cart, $item);
                for ($i = 0; $i < count($cart); $i++)
                {
                    echo $cart[$i];
                }
            }
        ?>
        <?php require 'sitemenu.html';?>

        <div class="menuButtonPos">
            <button class="buttonMod" type="button" onclick="OpenMenu()">
            <img id="openButton" class="menuButton" src="/menuButton.png">
            </button>
            <span class="titleText centered">
            Merch<a href="/index.php"><img class="smallLogo" src="/wwwInvert.png"></a>
            </span>
        </div>

        <div class="contentStartBuffer"></div>
            <div class="centered">
                <div class="merchTitle">Buttons</div>
                <div>
                    <img class="merchItem" src="/merchButton1.png" alt="Button style WWW">
                    <p>Style 1: WWW</p>
                    <img class="merchItem" src="/merchButton2.png" alt="Button style Whale">
                    <p>Style 2: Whale Hug</p>
                </div>

                <div>
                    <form action="/merch.php" method="post">
                        <table>
                            <tr><td>Options</td></tr>
                            <tr><td>
                                <select>
                                <option>1 for $2.00 USD</option>
                                <option>2 for $3.00 USD</option>
                                </select>
                            </td></tr>
                            <tr><td>Let us know which style(s):</td></tr><tr><td><input type="text" name="itemName" maxlength="200"></td></tr>
                        </table>
                    <input type="submit" value="Add To Cart">
                    </form>
                </div>
            </div>
            
    <script src="/js.js"></script>
    </body>
</html>
