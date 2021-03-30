var momdad = document.getElementById("momdadmp3");
var jingle = document.getElementById("jinglemp3");
var menu = document.getElementById("menu");
var body = document.getElementsByTagName("body")[0];
var mdPP = document.getElementById("mdPP"); //play/pause button for mom and dad
var jPP = document.getElementById("jPP"); //play/pause button for jingle bells
var cartBg = document.getElementById("shoppingCartBg");
var cart = document.getElementById("shoppingCart");
var price = 0;

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
  console.log(itemName);
  console.log("adding");
  $.ajax({
      type: "POST",
      url: '/Includes/addtocart.php',
      data: {item: itemName},
      success: function(response)
      {
        ViewCart();
      }
  });
}

function UpdateCart(itemToUpdate) {
    console.log('update cart');
    let itemQuant = itemToUpdate.concat("Quant");
    console.log(itemQuant);
    let quantity = document.getElementById(itemQuant).value;
    $.ajax({
      type: "POST",
      url: 'Includes/updatecart.php',
      data: {item: itemToUpdate, quant: quantity},
      success: function(response)
      {
        ViewCart();
      }
    })
}

function ViewCart() {
    if (!document.getElementById("paypal-button-container"))
    {
        let elem = document.createElement("div");
        elem.setAttribute("id", "paypal-button-container");
        let paypalPNode = document.getElementById("paypalBtn");
        paypalPNode.appendChild(elem);
        initPayPalButton();
    }
    cartBg.style.visibility = "visible";
    cartBg.style.backgroundColor = "rgba(0, 0, 0, .6)";
    cart.style.visibility = "visible";
    cart.style.backgroundColor = "rgba(255, 255, 255, 1)";
    $.ajax({
      type: "GET",
      url: "/Includes/viewcart.php",
      success: function(response) {
        document.getElementById("shoppingCart").innerHTML = response;
      }
    });
    CartTotal();
}

// TODO: Right now CartTotal requires ViewCart to run first to be accurate
//       may cause issues?!
function CartTotal() {
    $.ajax({
      type: "GET",
      url: "/Includes/carttotal.php",
      success: function(response) {
        document.getElementById("cartTotalPrice").innerHTML = response;
        price = response;
      }
    })
}

function CloseCart() {
    cartBg.style.visibility = "hidden";
    cartBg.style.backgroundColor = "rgba(0, 0, 0, 0)";
    cart.style.visibility = "hidden";
    cart.style.backgroundColor = "rgba(255, 255, 255, 0)";
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