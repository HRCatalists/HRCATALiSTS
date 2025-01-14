document.addEventListener("DOMContentLoaded", function () {
    const sidebarLinks = document.querySelectorAll("#sidebar ul li a");

    // Get the current URL path
    const currentPath = window.location.pathname;

    // Debug: Log the current path
    console.log("Current Path:", currentPath);

    sidebarLinks.forEach(link => {
        // Debug: Log the href of each link
        console.log("Link Href:", link.getAttribute("href"));

        // Check if the link's href matches the current URL path
        if (currentPath.includes(link.getAttribute("href"))) {
            link.parentElement.classList.add("active"); // Highlight the <li>
            link.classList.add("active"); // Highlight the <a>
        }
    });
});