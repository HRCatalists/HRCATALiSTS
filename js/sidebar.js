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

    // Sidebar Hamburger Toggler
    const hamburgerMenu = document.getElementById('hamburgerMenu');
    const sidebar = document.getElementById('sidebar');

    // Function to toggle sidebar visibility
    const toggleSidebar = () => {
        const isHidden = sidebar.style.transform === 'translateX(-100%)';
        sidebar.style.transform = isHidden ? 'translateX(0)' : 'translateX(-100%)';
    };

    // Ensure sidebar resets visibility based on window size
    const resetSidebarVisibility = () => {
        if (window.innerWidth >= 768) {
            sidebar.style.transform = 'translateX(0)'; // Show sidebar on larger screens
        } else {
            sidebar.style.transform = 'translateX(-100%)'; // Hide sidebar by default on smaller screens
        }
    };

    // Attach event listeners
    hamburgerMenu.addEventListener('click', toggleSidebar);
    window.addEventListener('resize', resetSidebarVisibility);

    // Initial setup
    resetSidebarVisibility();
});