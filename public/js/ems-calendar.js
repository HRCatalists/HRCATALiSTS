// Example event data
const events = {
    "2024-11-11": [{ title: "New Year's Celebration", time: "12:00 AM" }],
    "2024-11-05": [{ title: "Team Meeting", time: "10:00 AM" }],
    "2024-11-01": [{ title: "Project Deadline", time: "11:59 PM" }],
};

// Initialize the right calendar (end-calendar)
function loadEndCalendar(month, year) {
    const endGrid = document.getElementById("end-days");
    const monthYearLabel = document.getElementById("end-month-year");

    endGrid.innerHTML = ""; // Clear previous content
    monthYearLabel.textContent = `${new Date(year, month).toLocaleString("default", {
        month: "long",
    })} ${year}`;

    const firstDay = new Date(year, month).getDay();
    const daysInMonth = new Date(year, month + 1, 0).getDate();

    // Empty cells for padding before the first day of the month
    for (let i = 0; i < firstDay; i++) {
        const emptyCell = document.createElement("div");
        emptyCell.classList.add("date-picker");
        endGrid.appendChild(emptyCell);
    }

    // Loop through the days of the month
    for (let day = 1; day <= daysInMonth; day++) {
        const dateCell = document.createElement("div");
        dateCell.classList.add("date-picker");

        const dateString = `${year}-${String(month + 1).padStart(2, "0")}-${String(day).padStart(2, "0")}`;
        dateCell.textContent = day;

        // Highlight dates with events
        if (events[dateString]) {
            dateCell.classList.add("event-date");
        }

        // Add click event for selecting a date
        dateCell.addEventListener("click", () => displayEvents(dateString));

        endGrid.appendChild(dateCell);
    }
}

// Display events for the selected date in the event list
function displayEvents(selectedDate) {
    const eventList = document.getElementById("event-list");
    const dateHeader = document.getElementById("event-date");

    // Clear previous events
    eventList.innerHTML = "";

    const dateEvents = events[selectedDate] || [];
    if (dateEvents.length === 0) {
        eventList.innerHTML = "<p>No events for this date.</p>";
    } else {
        dateEvents.forEach((event) => {
            const eventItem = document.createElement("li");
            eventItem.textContent = `${event.time} - ${event.title}`;
            eventList.appendChild(eventItem);
        });
    }

    // Update the header with the selected date
    dateHeader.textContent = `Events for ${selectedDate}`;
}

// Initialize the calendar on page load
document.addEventListener("DOMContentLoaded", () => {
    const today = new Date();
    loadEndCalendar(today.getMonth(), today.getFullYear());
});
