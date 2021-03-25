var momdad = document.getElementById("momdadmp3");
var jingle = document.getElementById("jinglemp3");
var menu = document.getElementById("menu");
var body = document.getElementsByTagName("body")[0];
var mdPP = document.getElementById("mdPP"); //play/pause button for mom and dad
var jPP = document.getElementById("jPP"); //play/pause button for jingle bells
function PlayMomDad() {
    if (momdad.paused) 
    {
        momdad.play();
        mdPP.src = "/pauseButton.png";
    }
    else 
    {
        momdad.pause();
        mdPP.src = "/playButton.png";
    }
}

function PlayJingle() {
    if (jingle.paused) 
    {
        jingle.play();
        jPP.src = "/pauseButton.png";
    }
    else 
    {
        jingle.pause();
        jPP.src = "/playButton.png";
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
