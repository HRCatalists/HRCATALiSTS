// document.addEventListener("DOMContentLoaded", function () {
//     const calendarElement = document.getElementById("calendar");
//     const eventListElement = document.getElementById("event-list");
//     const prevMonthBtn = document.getElementById("prev-month");
//     const nextMonthBtn = document.getElementById("next-month");

//     if (!calendarElement || !eventListElement || !prevMonthBtn || !nextMonthBtn) {
//         console.error("❌ Missing required elements for the calendar.");
//         return;
//     }

//     let events = [];

//     const today = new Date();
//     let currentMonth = today.getMonth();
//     let currentYear = today.getFullYear();

//     function fetchEvents() {
//         fetch("/api/events") // Fetch from Laravel backend
//             .then(response => response.json())
//             .then(data => {
//                 events = data.map(event => ({
//                     date: event.event_date,
//                     description: event.title,
//                     time: event.event_time
//                 }));
//                 generateCalendar(currentYear, currentMonth);
//                 populateEvents();
//             })
//             .catch(error => console.error("❌ Error fetching events:", error));
//     }

//     function generateCalendar(year, month) {
//         const firstDay = new Date(year, month, 1).getDay();
//         const daysInMonth = new Date(year, month + 1, 0).getDate();

//         calendarElement.innerHTML = "";

//         const daysOfWeek = ["Mo", "Tu", "We", "Th", "Fr", "Sa", "Su"];
//         daysOfWeek.forEach((day) => {
//             const dayHeader = document.createElement("div");
//             dayHeader.className = "day";
//             dayHeader.style.fontWeight = "bold";
//             dayHeader.textContent = day;
//             calendarElement.appendChild(dayHeader);
//         });

//         for (let i = 0; i < (firstDay === 0 ? 6 : firstDay - 1); i++) {
//             const emptySlot = document.createElement("div");
//             emptySlot.className = "day";
//             calendarElement.appendChild(emptySlot);
//         }

//         for (let day = 1; day <= daysInMonth; day++) {
//             const date = `${year}-${String(month + 1).padStart(2, "0")}-${String(day).padStart(2, "0")}`;
//             const dayElement = document.createElement("div");
//             dayElement.className = "day";
//             dayElement.textContent = day;

//             if (today.getDate() === day && today.getMonth() === month && today.getFullYear() === year) {
//                 dayElement.classList.add("current");
//             }

//             const event = events.find((e) => e.date === date);
//             if (event) {
//                 dayElement.classList.add("event-day");
//                 dayElement.setAttribute("title", event.description);
//             }

//             calendarElement.appendChild(dayElement);
//         }
//     }

//     function populateEvents() {
//         eventListElement.innerHTML = "";
//         events.forEach((event) => {
//             const listItem = document.createElement("li");
//             listItem.className = "list-group-item";
//             listItem.textContent = `${event.date}: ${event.description}`;
//             eventListElement.appendChild(listItem);
//         });
//     }

//     function updateCalendarHeader() {
//         const header = document.getElementById("calendar-header");
//         header.textContent = `${new Date(currentYear, currentMonth).toLocaleString("default", { month: "long" })} ${currentYear}`;
//     }

//     prevMonthBtn.addEventListener("click", function () {
//         currentMonth -= 1;
//         if (currentMonth < 0) {
//             currentMonth = 11;
//             currentYear -= 1;
//         }
//         updateCalendarHeader();
//         generateCalendar(currentYear, currentMonth);
//     });

//     nextMonthBtn.addEventListener("click", function () {
//         currentMonth += 1;
//         if (currentMonth > 11) {
//             currentMonth = 0;
//             currentYear += 1;
//         }
//         updateCalendarHeader();
//         generateCalendar(currentYear, currentMonth);
//     });

//     updateCalendarHeader();
//     fetchEvents(); // Fetch events from Laravel
// });


// *********************************
// *********************************
// *********************************
// *********************************
// *********************************
// *********************************
// *********************************



document.addEventListener("DOMContentLoaded", function () {
    console.log("Checking elements...");
    console.log("Calendar:", document.getElementById("calendar"));
    console.log("Prev Button:", document.getElementById("prev-month"));
    console.log("Next Button:", document.getElementById("next-month"));
    console.log("Calendar Header:", document.getElementById("calendar-header"));

    const calendarElement = document.getElementById("calendar");
    const eventListElement = document.getElementById("event-list");
    const prevMonthBtn = document.getElementById("prev-month");
    const nextMonthBtn = document.getElementById("next-month");

    if (!calendarElement || !prevMonthBtn || !nextMonthBtn) {
        console.error("❌ Missing required elements for the calendar.");
        return;
    }

    let events = [];

    const today = new Date();
    let currentMonth = today.getMonth();
    let currentYear = today.getFullYear();

    // Create tooltip element
    const tooltip = document.createElement("div");
    tooltip.classList.add("tooltip-container");
    document.body.appendChild(tooltip);

    function fetchEvents() {
        fetch("http://127.0.0.1:8000/api/events", {
            method: "GET",
            headers: {
                "Content-Type": "application/json",
                "Accept": "application/json",
            },
            credentials: "include" // Ensures Laravel Breeze session authentication works
        })
        .then(response => {
            if (!response.ok) {
                throw new Error(`HTTP error! Status: ${response.status}`);
            }
            return response.json();
        })
        .then(data => {
            console.log("✅ Fetched Events:", data);
            events = data.map(event => ({
                date: event.event_date || "N/A",
                time: event.event_time || "N/A",
                title: event.title || "No Title",
                description: event.description || "No Description"
            }));
    
            generateCalendar(currentYear, currentMonth);
            populateEvents();
        })
        .catch(error => {
            console.error("❌ Error fetching events:", error);
            alert("Failed to load events. Please try again later.");
        });
    }
      

    function generateCalendar(year, month) {
        const firstDay = new Date(year, month, 1).getDay();
        const daysInMonth = new Date(year, month + 1, 0).getDate();

        calendarElement.innerHTML = "";

        const daysOfWeek = ["Mo", "Tu", "We", "Th", "Fr", "Sa", "Su"];
        daysOfWeek.forEach((day) => {
            const dayHeader = document.createElement("div");
            dayHeader.className = "day";
            dayHeader.style.fontWeight = "bold";
            dayHeader.textContent = day;
            calendarElement.appendChild(dayHeader);
        });

        for (let i = 0; i < (firstDay === 0 ? 6 : firstDay - 1); i++) {
            const emptySlot = document.createElement("div");
            emptySlot.className = "day empty";
            calendarElement.appendChild(emptySlot);
        }

        for (let day = 1; day <= daysInMonth; day++) {
            const date = `${year}-${String(month + 1).padStart(2, "0")}-${String(day).padStart(2, "0")}`;
            const dayElement = document.createElement("div");
            dayElement.className = "day";
            dayElement.textContent = day;

            if (today.getDate() === day && today.getMonth() === month && today.getFullYear() === year) {
                dayElement.classList.add("current");
            }

            const eventList = events.filter((e) => e.date === date);
            if (eventList.length > 0) {
                dayElement.classList.add("event-day");

                // Add hover event for tooltip
                dayElement.addEventListener("mouseenter", function (e) {
                    showTooltip(e, eventList);
                });

                dayElement.addEventListener("mouseleave", function () {
                    hideTooltip();
                });
            }

            calendarElement.appendChild(dayElement);
        }
    }

    function showTooltip(event, eventList) {
        let tooltipContent = eventList.map(e => `
            <strong>Time:</strong> ${e.time ?? "N/A"}<br>
            <strong>Title:</strong> ${e.title ?? "No Title"}<br>
            <strong>Description:</strong> ${e.description ?? "No Description"}
        `).join("<hr>");

        tooltip.innerHTML = tooltipContent;
        tooltip.style.left = `${event.pageX + 10}px`;
        tooltip.style.top = `${event.pageY + 10}px`;
        tooltip.style.display = "block";
    }

    function hideTooltip() {
        tooltip.style.display = "none";
    }

    function populateEvents() {
        eventListElement.innerHTML = "";
        events.forEach((event) => {
            const listItem = document.createElement("li");
            listItem.className = "list-group-item";
            listItem.textContent = `${event.date}: ${event.title} - ${event.time} (${event.description})`;
            eventListElement.appendChild(listItem);
        });
    }

    function updateCalendarHeader() {
        const header = document.getElementById("calendar-header");
        header.textContent = `${new Date(currentYear, currentMonth).toLocaleString("default", { month: "long" })} ${currentYear}`;
    }

    prevMonthBtn.addEventListener("click", function () {
        currentMonth -= 1;
        if (currentMonth < 0) {
            currentMonth = 11;
            currentYear -= 1;
        }
        updateCalendarHeader();
        fetchEvents();
    });

    nextMonthBtn.addEventListener("click", function () {
        currentMonth += 1;
        if (currentMonth > 11) {
            currentMonth = 0;
            currentYear += 1;
        }
        updateCalendarHeader();
        fetchEvents();
    });

    updateCalendarHeader();
    fetchEvents();
});