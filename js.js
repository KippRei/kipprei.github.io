var momdad = document.getElementById("momdadmp3");
var jingle = document.getElementById("jinglemp3");

function PlayMomDad()
{
    if (momdad.paused) momdad.play();
    else momdad.pause();
}

function PlayJingle()
{
    if (jingle.paused) jingle.play();
    else jingle.pause();
}

