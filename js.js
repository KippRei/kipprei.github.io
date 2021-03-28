var momdad = document.getElementById("momdadmp3");
var jingle = document.getElementById("jinglemp3");
var menu = document.getElementById("menu");
var body = document.getElementsByTagName("body")[0];
var mdPP = document.getElementById("mdPP"); //play/pause button for mom and dad
var jPP = document.getElementById("jPP"); //play/pause button for jingle bells
var cartBg = document.getElementById("shoppingCartBg");
var cart = document.getElementById("shoppingCart");

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

function ViewCart() {
    let elem = document.createElement("div");
    elem.setAttribute("id", "paypal-button-container");
    let paypalPNode = document.getElementById("paypalBtn");
    paypalPNode.appendChild(elem);
    cartBg.style.visibility = "visible";
    cartBg.style.backgroundColor = "rgba(0, 0, 0, .6)";
    cart.style.visibility = "visible";
    cart.style.backgroundColor = "white";
    initPayPalButton();
}

function CloseCart() {
    cartBg.style.visibility = "hidden";
    cartBg.style.backgroundColor = "rgba(0, 0, 0, 0)";
    cart.style.visibility = "hidden";
    cart.style.backgroundColor = "black";
    let paypalBtn = document.getElementById("paypal-button-container");
    if (paypalBtn.parentNode)
    {
        paypalBtn.parentNode.removeChild(paypalBtn);
    }
}

// PayPal Buy Button //
function initPayPalButton() {
    paypal.Buttons({
      style: {
        shape: 'rect',
        color: 'gold',
        layout: 'horizontal',
        label: 'checkout',
        height: 55,
      },

      createOrder: function(data, actions) {
        let items = "button";
        return actions.order.create({
          purchase_units: [{"description": items,"amount":{"currency_code":"USD","value":price}}]
        });
      },

      onApprove: function(data, actions) {
        return actions.order.capture().then(function(details) {
          alert('Transaction completed by ' + details.payer.name.given_name + '!');
        });
      },

      onError: function(err) {
        console.log(err);
      }
    }).render('#paypal-button-container');
  }