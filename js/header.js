// Výběr HTML tagů, se kterými budeme pracovat

const menuIcon = document.querySelector(".menu-icon");
const navigation = document.querySelector("nav");
const hamburger = document.querySelector(".hamburger");
const close = document.querySelector(".close");
const menu = document.querySelector(".menu");

// Po kliknutí na hamburger se zobrazí křížek
menuIcon.addEventListener("click", () => {
    if (hamburger.classList.contains("active")) {
        hamburger.classList.remove("active")
        close.classList.add("active")
        navigation.style.display = "inline-block"
    } else {
        navigation.style.display = "none"
        close.classList.remove("active")
        hamburger.classList.add("active")
    }
})