//Loader
window.addEventListener("load", () => {
    const loader = document.querySelector(".loader");
  
    loader.classList.add("loader--hidden");
  
    loader.addEventListener("transitionend", () => {
        document.body.removeChild(loader);
    });
});


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


//Collapsable Content
const collapsableBtn = document.querySelector(".genre-btn");
const collapsableItem = document.querySelector(".rp-collapsable-content");

let collapsableOpen = false;
collapsableBtn.addEventListener('click', () => {
    if (!collapsableOpen) {
        collapsableItem.classList.add('d-none');
        collapsableOpen = true;
    } else {
        collapsableItem.classList.remove('d-none');
        collapsableOpen = false;
    }
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

//Sidenav
const filterBtn = document.querySelector(".filter-btn");
const closeBtn = document.querySelector(".close-btn");
const filterMenu = document.querySelector(".rp-sidenav");

filterBtn.addEventListener("click", () => {
    filterMenu.toggleAttribute("sidenav-open");
});
closeBtn.addEventListener("click", () => {
    filterMenu.toggleAttribute("sidenav-open");
});

//Filter Down Buttons Mobile
const sortBtn = document.querySelector(".sort-btn");
const sortMenu = document.querySelector(".rp-sort-sm");

let sortOpen = false;
sortBtn.addEventListener('click', () => {
    if (!sortOpen) {
        sortMenu.classList.add('d-block');
        sortOpen = true;
    } else {
        sortMenu.classList.remove('d-block');
        sortOpen = false;
    }
});

const genreBtn = document.querySelector(".genre-btn-sm");
const genreMenu = document.querySelector(".rp-genre-sm");

let genreOpen = false;
genreBtn.addEventListener('click', () => {
    if (!genreOpen) {
        genreMenu.classList.add('d-none');
        genreOpen = true;
    } else {
        genreMenu.classList.remove('d-none');
        genreOpen = false;
    }
});