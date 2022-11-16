//Hamburger Menu
const primaryHeader = document.querySelector(".primary-header");
const navHamburger = document.querySelector(".nav-hamburger");
const primaryNav = document.querySelector(".nav");

navHamburger.addEventListener("click", myFunction);

function myFunction() {
    navHamburger.classList.toggle("change");
}

navHamburger.addEventListener("click", () => {
  primaryNav.hasAttribute("data-visible")
    ? navHamburger.setAttribute("aria-expanded", false)
    : navHamburger.setAttribute("aria-expanded", true);
  primaryNav.toggleAttribute("data-visible");
  primaryHeader.toggleAttribute("data-overlay");
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