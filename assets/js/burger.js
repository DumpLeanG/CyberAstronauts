const menu_logo = document.querySelector(".menu_logo");
const menu_burger = document.querySelector(".menu_burger");

function openBurgerMenu() {
    document.querySelector(".menu_vertical").style.display = "block";
    document.querySelector(".menu_close").style.display = "block"; 
}
function closeBurgerMenu() {
    document.querySelector(".menu_vertical").style.display = "none";
    document.querySelector(".menu_close").style.display = "none";
}