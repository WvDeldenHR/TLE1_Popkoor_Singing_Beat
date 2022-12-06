//Hamburger Menu + Nav Drodown Menu
const menuBtn = document.querySelector('.nav-hamburger-area');

let menuOpen = false;
menuBtn.addEventListener('click', () => {
    if(!menuOpen) {
        menuBtn.classList.add('open');
        menuOpen = true;
    } else {
        menuBtn.classList.remove('open');
        menuOpen = false;
    }
});

const primaryHeader = document.querySelector(".primary-header");
const navHamburger = document.querySelector(".nav-hamburger");
const primaryNav = document.querySelector(".nav");

navHamburger.addEventListener("click", () => {
  primaryNav.hasAttribute("open")
    ? navHamburger.setAttribute("aria-expanded", false)
    : navHamburger.setAttribute("aria-expanded", true);
  primaryNav.toggleAttribute("open");
  primaryHeader.toggleAttribute("open");
});

//Nav Dropdown Menu
const navUser = document.querySelector(".nav-user");
const dropdownContent = document.querySelector(".nav-dropdown");

navUser.addEventListener("click", () => {
  dropdownContent.hasAttribute("data-visible")
    ? navUser.setAttribute("aria-expanded", false)
    : navUser.setAttribute("aria-expanded", true);
  dropdownContent.toggleAttribute("data-visible");
});

//Song More Button Mobile
const openSongMore = document.querySelector(".table-column-button");
const closeSongMore = document.querySelector(".table-close");
const tableMenu = document.querySelector(".table-menu");

openSongMore.addEventListener("click", () => {
  tableMenu.toggleAttribute("open");
});
closeSongMore.addEventListener("click", () => {
  tableMenu.toggleAttribute("open");
});