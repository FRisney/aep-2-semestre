/* Open the sidenav */
function openNav() {
    document.querySelector("nav").style.width = "100%";
    document.querySelector("body").style.overflow = "hidden";
}

/* Close/hide the sidenav */
function closeNav() {
    document.querySelector("nav").style.width = "0";
    document.querySelector("body").style.overflow = "auto";
}
