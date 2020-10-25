/* Open the sidenav */
function openNav() {
    document.querySelector("nav").style.width = "90%";
    document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
}

/* Close/hide the sidenav */
function closeNav() {
    document.querySelector("nav").style.width = "0";
    document.body.style.backgroundColor = "linear-gradient(180deg, #0B1A31 34.9%, #000814 83.33%)";
}
