var countdown = document.getElementById("redirect");
let id = setInterval(() => {
    let count = countdown.innerHTML;
    if (count > 1) 
    {
        countdown.innerHTML = count - 1;
    }
    else
    {
        clearInterval(id);
        window.location.href = "https://kippreitzel.com";
    }
}, 1000);