var momdad = document.getElementById("momdadmp3");
var jingle = document.getElementById("jinglemp3");
var menu = document.getElementById("menu");
var body = document.getElementsByTagName("body")[0];
var mdPP = document.getElementById("mdPP"); //play/pause button for mom and dad
var jPP = document.getElementById("jPP"); //play/pause button for jingle bells
var cartBg = document.getElementById("shoppingCartBg");
var cart = document.getElementById("shoppingCart");
var buyBtn = document.getElementById("buyBtnLoc");
var itemPopupBg = document.getElementById("itemPopupBg")
var total = 0;
var id; //Used to setInterval for Whale logo shake animation. Declared here so animation can be stopped on mouseleave event by calling LogoNormal()
var mainLogo = document.getElementById("mainLogo");
mainLogo.addEventListener("mousedown", LogoSoundHit);

if (window.innerWidth > 769)
{
    mainLogo.addEventListener("mouseover", LogoShake);
    mainLogo.addEventListener("mouseleave", LogoNormal);
}

function PlayMomDad() {
    if (momdad.paused) 
    {
        momdad.play();
        mdPP.src = "/SiteImages/pauseButton.png";
    }
    else 
    {
        momdad.pause();
        mdPP.src = "/SiteImages/playButton.png";
    }
}

function PlayJingle() {
    if (jingle.paused) 
    {
        jingle.play();
        jPP.src = "/SiteImages/pauseButton.png";
    }
    else 
    {
        jingle.pause();
        jPP.src = "/SiteImages/playButton.png";
    }
}

function OpenMenu() {
    document.getElementById("openButton").style.visibility="hidden";
    menu.style.visibility = "visible";
    menu.style.backgroundColor = "rgba(0, 0, 0, .6)";
}

function CloseMenu() {
    document.getElementById("openButton").style.visibility="visible";
    menu.style.visibility = "hidden";
    menu.style.backgroundColor = "rgba(0,0,0,0)";
}

// Cart Stuff
function AddToCart(itemName) {
    DisableCartButtons();
    if (itemName == 'tshirt')
    {
        // Concat size of tshirt to get proper size from json and for itemizing for Square Checkout
        let a = document.getElementById("getsize").value;
        itemName = itemName.concat("_", a);
    }

    $.ajax({
        type: "POST",
        url: 'Includes/addtocart.php',
        data: {item: itemName},
        success: function(response)
        {
          ViewCart();
        },
        error: function(response)
        {
            console.log(response);
        }
    });
}

function RemoveFromCart(itemName) {
    DisableCartButtons();
    $.ajax({
      type: "POST",
      url: '/Includes/removefromcart.php',
      data: {item: itemName},
      success: function(response)
      {
        ViewCart();
      }
  });
}

function ViewCart() {
    cartBg.style.visibility = "visible";
    cartBg.style.backgroundColor = "rgba(0, 0, 0, .6)";
    cart.style.visibility = "visible";
    cart.style.backgroundColor = "rgba(255, 255, 255, 1)";
    buyBtn.style.visibility = "visible";
    buyBtn.style.backgroundColor = "rgb(90, 243, 52)";
    cart.style.left = "50%";
    buyBtn.style.left = "50%";
    $.ajax({
      type: "GET",
      url: "/Includes/viewcart.php",
      success: function(response) {
        document.getElementById("shoppingCart").innerHTML = response;
      }
    });
    CartTotal();
}

function CartTotal() {
    // This is so the price total ["total"] php session variable updates and
    // displays correctly when cart is viewed and updated
    $.ajax({
      type: "GET",
      url: "/Includes/carttotal.php",
      success: function(response) {
        document.getElementById("cartTotalPrice").innerHTML = response; // Displays total in cart
        document.getElementById("totalPrice").value = response * 100; // For POSTing totalPrice to Square
        if (response <= 0)
        {
            document.getElementById("buyBtn").disabled = true;
        }
        else
        {
            document.getElementById("buyBtn").disabled = false;
        }
      }
    })
}

function CloseCart() {
    if (window.innerWidth > 769)
    {
        cartBg.style.visibility = "hidden";
        cartBg.style.backgroundColor = "rgba(0, 0, 0, 0)";
        cart.style.left = "-40%";
        buyBtn.style.left = "-40%";
        var menuLocation = cart.getBoundingClientRect();
        let closing = setInterval(() => {
            if ((menuLocation.x + menuLocation.width) < 0)
            {
                cart.style.visibility = "hidden";
                cart.style.backgroundColor = "rgba(255, 255, 255, 0)";
                buyBtn.style.visibility = "hidden";
                buyBtn.style.backgroundColor = "rgba(255, 255, 255, 0)";
                clearInterval(closing);
            }
            else
            {
                menuLocation = cart.getBoundingClientRect();
            }
        }, 100);
    }
    else
    {
        cartBg.style.visibility = "hidden";
        cartBg.style.backgroundColor = "rgba(0, 0, 0, 0)";
        cart.style.visibility = "hidden";
        cart.style.backgroundColor = "rgba(255, 255, 255, 0)";
        buyBtn.style.visibility = "hidden";
        buyBtn.style.backgroundColor = "rgba(255, 255, 255, 0)";
    }
}

function EnableCartButtons() {
    document.getElementById("buyBtn").disabled = false;
    let plus = document.getElementsByClassName("plusBtn");
    let minus = document.getElementsByClassName("minusBtn");
    for (var i = 0; i < plus.length; i++)
    {
        plus[i].disabled = false;
        minus[i].disabled = false;
    }
}

function DisableCartButtons() {
    document.getElementById("buyBtn").disabled = true;
    let plus = document.getElementsByClassName("plusBtn");
    let minus = document.getElementsByClassName("minusBtn");
    for (var i = 0; i < plus.length; i++)
    {
        plus[i].disabled = true;
        minus[i].disabled = true;
    }
}

function ViewItem(itemName) {
    itemPopupBg.style.visibility = "visible";
    itemPopupBg.style.backgroundColor = "rgba(0, 0, 0, .6)";
    itemPopupBg.addEventListener("mousedown", ClosePopupImg);
    $.ajax({
      type: "GET",
      url: "/Includes/itemPopup.php",
      data: {item: itemName},
      success: function(response) {
        document.getElementById("itemPopup").innerHTML = response;
      }
    });
}

function ClosePopupImg() {
    let img = document.getElementById("popupImg");
    itemPopupBg.removeEventListener("mousedown", ClosePopupImg);
    itemPopupBg.style.visibility = "hidden";
    itemPopupBg.style.backgroundColor = "rgba(255, 255, 255, 0)";
    img.remove();
}

function LogoShake() {
    var logo = document.getElementById("mainLogo");
    var toShake = true;
    id = setInterval(() => {
        if (toShake)
        {
            logo.style.translate = '-.45%';
            toShake = false
        }
        else
        {
            logo.style.translate = '0%';
            toShake = true;
        }
    }, 50);
}

function LogoNormal() {
    clearInterval(id);
    document.getElementById("mainLogo").style.cssText = 
    "position: relative;\
    display: block;\
    left: 50%;\
    transform: translate(-50%);\
    width: 400px;\
    height: auto;";
}

var audio;

function LogoSoundHit() {
    audio = new Audio("/Media/beer.mp3");
    audio.play();
}