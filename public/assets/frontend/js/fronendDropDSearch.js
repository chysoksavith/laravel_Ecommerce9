const searchIcon = document.getElementById("searchIcon");
const megaMenu = document.getElementById("megaMenu");

searchIcon.addEventListener("click", function () {
    if (megaMenu.style.display === "none" || megaMenu.style.display === "") {
        megaMenu.style.display = "block";
    } else {
        megaMenu.style.display = "none";
    }
});

// Close the mega menu when clicking outside of it
document.addEventListener("click", function (event) {
    if (event.target !== searchIcon && event.target !== megaMenu && !megaMenu.contains(event.target)) {
        megaMenu.style.display = "none";
    }
});
