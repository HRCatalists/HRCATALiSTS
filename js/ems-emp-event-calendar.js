// Initialize the current date
let currentDate = new Date();

const monthNames = [
    "January",
    "February",
    "March",
    "April",
    "May",
    "June",
    "July",
    "August",
    "September",
    "October",
    "November",
    "December",
];

// Function to render the calendar
function renderCalendar() {
    const calendarMonthYear = document.getElementById("calendar-month-year");
    const calendarDays = document.getElementById("calendar-days");

    // Get the current month and year
    const currentMonth = currentDate.getMonth();
    const currentYear = currentDate.getFullYear();

    // Update the calendar header with the current month and year
    calendarMonthYear.textContent = `${monthNames[currentMonth]} ${currentYear}`;

    // Clear the existing days
    calendarDays.innerHTML = "";

    // Get the first day of the month (0 = Sunday, 1 = Monday, etc.)
    const firstDay = new Date(currentYear, currentMonth, 1).getDay();

    // Get the number of days in the month
    const daysInMonth = new Date(currentYear, currentMonth + 1, 0).getDate();

    // Add empty slots for days before the first day of the month
    for (let i = 0; i < firstDay; i++) {
        const emptyDiv = document.createElement("div");
        calendarDays.appendChild(emptyDiv);
    }

    // Add the days of the current month
    for (let day = 1; day <= daysInMonth; day++) {
        const dayDiv = document.createElement("div");
        dayDiv.textContent = day;
        dayDiv.classList.add("day");
        dayDiv.style.cursor = "pointer";

        // Highlight today's date
        const today = new Date();
        if (
            day === today.getDate() &&
            currentMonth === today.getMonth() &&
            currentYear === today.getFullYear()
        ) {
            dayDiv.style.backgroundColor = "#007bff";
            dayDiv.style.color = "white";
            dayDiv.style.borderRadius = "5px";
        }

        // Add event listener for click on a day
        dayDiv.addEventListener("click", () => {
            alert(`You clicked on ${day} ${monthNames[currentMonth]} ${currentYear}`);
        });

        calendarDays.appendChild(dayDiv);
    }
}

// Function to navigate to the previous month
function prevMonth() {
    currentDate.setMonth(currentDate.getMonth() - 1);
    renderCalendar();
}

// Function to navigate to the next month
function nextMonth() {
    currentDate.setMonth(currentDate.getMonth() + 1);
    renderCalendar();
}

// Initial render of the calendar
renderCalendar();
