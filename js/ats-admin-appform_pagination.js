// Function to navigate to a specified page
function navigateToPage(page) {
  if (page) {
    window.location.href = page; // Redirect to the specified page
  }
}

// Add event listeners for Next, Back buttons, and pagination highlighting
document.addEventListener('DOMContentLoaded', () => {
  // Get the current page filename
  const currentPage = window.location.pathname.split('/').pop();

  // Define navigation paths for each page
  const pagePaths = {
    'ats-admin-form-1.html': { next: 'ats-admin-form-2.html', back: null },
    'ats-admin-form-2.html': { next: 'ats-admin-form-3.html', back: 'ats-admin-form-1.html' },
    'ats-admin-form-3.html': { next: 'ats-admin-form-4.html', back: 'ats-admin-form-2.html' },
    'ats-admin-form-4.html': { next: null, back: 'ats-admin-form-3.html' },
  };

  // Select Next and Back buttons
  const nextButton = document.querySelector('.next-button');
  const backButton = document.querySelector('.back-button');

  // Function to scroll to specific content
  function scrollToContent(selector) {
    const element = document.querySelector(selector);
    if (element) {
      element.scrollIntoView({ behavior: 'smooth', block: 'start' });
    }
  }

  // Handle Next button click
  if (nextButton && pagePaths[currentPage]?.next) {
    nextButton.addEventListener('click', () => {
      scrollToContent('#target-content'); // Scroll to specific content before navigating
      setTimeout(() => navigateToPage(pagePaths[currentPage].next), 500); // Delay navigation slightly for smooth effect
    });
  }

  // Handle Back button click
  if (backButton && pagePaths[currentPage]?.back) {
    backButton.addEventListener('click', () => {
      scrollToContent('#target-content'); // Scroll to specific content before navigating
      setTimeout(() => navigateToPage(pagePaths[currentPage].back), 500); // Delay navigation slightly for smooth effect
    });
  }

  // Highlight the current page in pagination
  const paginationItems = document.querySelectorAll('.pagination .page-item');
  paginationItems.forEach((item) => {
    const link = item.querySelector('.page-link');
    if (link && link.getAttribute('href') === currentPage) {
      item.classList.add('active'); // Add active class for the current page
    } else {
      item.classList.remove('active'); // Remove active class from other pages
    }
  });

  // Enable pagination navigation
  paginationItems.forEach((item) => {
    const link = item.querySelector('.page-link');
    if (link) {
      link.addEventListener('click', (event) => {
        event.preventDefault(); // Prevent default behavior
        const targetPage = link.getAttribute('href');
        scrollToContent('#target-content'); // Scroll to specific content before navigating
        setTimeout(() => navigateToPage(targetPage), 500); // Delay navigation slightly for smooth effect
      });
    }
  });
});
