"user strict";
let validar = false;
let menu = document.querySelector(".menu_label");
let icon_menu = document.querySelector("#icon_menu");
let icon_menu_x = document.querySelector("#icon_menu_x");
menu.addEventListener("click", () => {
    if (validar == true) {
        icon_menu.style.opacity = "1";
        icon_menu_x.style.opacity = "0";
        validar = false;
    } else {
        icon_menu.style.opacity = "0";
        icon_menu_x.style.opacity = "1";
        validar = true;
        console.log("hola");
    }
});
