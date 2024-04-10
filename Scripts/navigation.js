document.addEventListener("DOMContentLoaded", addButtonListeners);

function addButtonListeners() {
    document.getElementById("catalogNavBtn").addEventListener("click", (e) => window.location.href = window.location.origin + "/index.html");
    document.getElementById("aboutNavBtn").addEventListener("click", (e) => window.location.href = window.location.origin + "/about.html");
}