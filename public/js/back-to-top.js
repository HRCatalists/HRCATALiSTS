// Get the button
const backToTopButton = document.getElementById("backToTop");

// Show button when user scrolls down 300px from the top
window.onscroll = function() {
    if (document.body.scrollTop > 300 || document.documentElement.scrollTop > 300) {
        backToTopButton.style.display = "block";
    } else {
        backToTopButton.style.display = "none";
    }
};

// Scroll to top when button is clicked
backToTopButton.addEventListener("click", function() {
    // For Safari
    document.body.scrollTop = 0;
    // For Chrome, Firefox, IE and Opera
    document.documentElement.scrollTop = 0;
});