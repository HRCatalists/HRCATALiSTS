document.addEventListener("DOMContentLoaded", function () {
    const calendarElement = document.getElementById("calendar");
    const eventListElement = document.getElementById("event-list");
    const prevMonthBtn = document.getElementById("prev-month");
    const nextMonthBtn = document.getElementById("next-month");

    if (!calendarElement || !eventListElement || !prevMonthBtn || !nextMonthBtn) {
        console.error("❌ Missing required elements for the calendar.");
        return;
    }

    const events = [
        { date: "2025-01-12", description: "Board Meeting - 3:00 p.m." },
        { date: "2025-01-14", description: "Training Workshop - 1:00 p.m." },
        { date: "2025-01-16", description: "Company Anniversary - 5:00 p.m." },
    ];

    const today = new Date();
    let currentMonth = today.getMonth();
    let currentYear = today.getFullYear();

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
            emptySlot.className = "day";
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

            const event = events.find((e) => e.date === date);
            if (event) {
                dayElement.classList.add("event-day");
                dayElement.setAttribute("title", event.description);
            }

            calendarElement.appendChild(dayElement);
        }
    }

    function populateEvents() {
        eventListElement.innerHTML = "";
        events.forEach((event) => {
            const listItem = document.createElement("li");
            listItem.className = "list-group-item";
            listItem.textContent = `${event.date}: ${event.description}`;
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
        generateCalendar(currentYear, currentMonth);
    });

    nextMonthBtn.addEventListener("click", function () {
        currentMonth += 1;
        if (currentMonth > 11) {
            currentMonth = 0;
            currentYear += 1;
        }
        updateCalendarHeader();
        generateCalendar(currentYear, currentMonth);
    });

    updateCalendarHeader();
    generateCalendar(currentYear, currentMonth);
    populateEvents();
});
