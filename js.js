var momdad = document.getElementById("momdadmp3");
var jingle = document.getElementById("jinglemp3");
var menu = document.getElementById("menu");
var body = document.getElementsByTagName("body")[0];
var mdPP = document.getElementById("mdPP"); //play/pause button for mom and dad
var jPP = document.getElementById("jPP"); //play/pause button for jingle bells
var cartBg = document.getElementById("shoppingCartBg");
var cart = document.getElementById("shoppingCart");
var total = 0;

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
    console.log(itemName);
    if (itemName == 'tshirt')
    {
        let a = document.getElementById("getsize").value;
        itemName = itemName.concat("_",a);
        
    }
    console.log(itemName)
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
// TODO: Remove this code (PlusMinus and Update) after testing
// function PlusMinusCart(itemName, addTo) {
//     var toRemove = false;

//     if (addTo)
//     {
//         let itemQuant = itemName.concat("Quant"); // Get item name and concat Quant to create id for item quantity
//         document.getElementById(itemQuant).value++;
//     }
//     else
//     {
//         let itemQuant = itemName.concat("Quant"); // Get item name and concat Quant to create id for item quantity
//         document.getElementById(itemQuant).value--;
//         if (document.getElementById(itemQuant).value <= 0)
//         {
//             toRemove = true;
//         }
//     }
//     DisableCartButtons();
//     UpdateCart(itemName, toRemove); // toRemove is true if quantity of item is adjusted to zero or below
// }

// function UpdateCart(itemToUpdate, remove = false) {
//     // When viewcart.php propagates cart, it id's item quantity by 
//     // concatenating the item name with "Quant"
//     var quantity = 0; // Holds updated quantity

//     if (remove)
//     {
//         $.ajax({
//           type: "POST",
//           url: 'Includes/updatecart.php',
//           data: {item: itemToUpdate, quant: quantity},
//           success: function(response)
//           {
//             ViewCart();
//           }
//         });
//     }
//     else
//     {
//         let itemQuant = itemToUpdate.concat("Quant"); // Get item name and concat Quant to create id for item quantity
//         quantity = document.getElementById(itemQuant).value;
//         if (!isNaN(quantity))
//         {
//           if (!Number.isInteger(quantity))
//           {
//             quantity = (Math.floor(quantity));
//           }
//           $.ajax({
//             type: "POST",
//             url: 'Includes/updatecart.php',
//             data: {item: itemToUpdate, quant: quantity},
//             success: function(response)
//             {
//               ViewCart();
//             }
//           });
//         }
//     }
// }

function ViewCart() {
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
    cartBg.style.visibility = "hidden";
    cartBg.style.backgroundColor = "rgba(0, 0, 0, 0)";
    cart.style.visibility = "hidden";
    cart.style.backgroundColor = "rgba(255, 255, 255, 0)";
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