//Hamburger Menu + Nav Drodown Menu
const menuBtn = document.querySelector('.nav-hamburger-area');

let menuOpen = false;
menuBtn.addEventListener('click', () => {
    if (!menuOpen) {
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
const tableSongs = document.querySelector("#table-songs");
const tableMenu = document.querySelectorAll(".table-menu");

//Add event listener to entire table, not (possibly) 500 buttons
tableSongs.addEventListener("click", (e) => {
    if (e.target.parentElement.classList.contains('table-column-button')) {
        let arrayClassnames = Array.from(e.target.parentElement.parentElement.parentElement.classList)
        arrayClassnames.shift()
        let clickedSong = arrayClassnames[0];

        tableMenu.forEach((tableMenuItem) => {
            if (tableMenuItem.classList.contains(clickedSong)) {
                tableMenuItem.toggleAttribute("open");
            }
        });

    } else if (e.target.classList.contains('table-close')) {
        e.target.parentElement.parentElement.toggleAttribute("open");
    }
});

//Filter Down Buttons Mobile
const genreBtn = document.querySelector(".rp-top-btn-genre");
const genreMenu = document.querySelector(".rp-top-menu-genre");
const sortBtn = document.querySelector(".rp-top-btn-sort");
const sortMenu = document.querySelector(".rp-top-menu-sort");

let genreOpen = false;
let sortOpen = false;
genreBtn.addEventListener('click', () => {
    if (!genreOpen) {
        genreMenu.classList.add('open_m');
        genreOpen = true;
        sortMenu.classList.remove('open_m');
        sortOpen = false;
    } else {
        genreMenu.classList.remove('open_m');
        genreOpen = false;
    }
});

sortBtn.addEventListener('click', () => {
    if (!sortOpen) {
        sortMenu.classList.add('open_m');
        sortOpen = true;
        genreMenu.classList.remove('open_m');
        genreOpen = false;
    } else {
        sortMenu.classList.remove('open_m');
        sortOpen = false;
    }
});
