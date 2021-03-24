var momdad = document.getElementById("momdadmp3");
var jingle = document.getElementById("jinglemp3");
var menu = document.getElementById("menu");
var body = document.getElementsByTagName("body")[0];

function PlayMomDad() {
    if (momdad.paused) momdad.play();
    else momdad.pause();
}

function PlayJingle() {
    if (jingle.paused) jingle.play();
    else jingle.pause();
}

function OpenMenu() {
    menu.style.visibility = "visible";
    menu.style.backgroundColor = "rgba(0, 0, 0, .6)";
    //menu.style.backdropFilter = "blur(8px)";
}

function CloseMenu() {
    menu.style.visibility = "hidden";
    menu.style.backgroundColor = "rgba(0,0,0,0)";
}
