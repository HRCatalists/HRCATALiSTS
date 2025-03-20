// document.addEventListener("DOMContentLoaded", function () {
//     const calendarEl = document.getElementById("calendar");
//     const calendarHeader = document.getElementById("calendar-header");
//     const prevMonthBtn = document.getElementById("prev-month");
//     const nextMonthBtn = document.getElementById("next-month");
//     const eventModal = new bootstrap.Modal(document.getElementById("eventModal"));
//     const eventModalTitle = document.getElementById("eventModalTitle");
//     const eventModalBody = document.getElementById("eventModalBody");

//     let currentDate = new Date();
//     let eventsData = [];

//     function renderCalendar() {
//         const year = currentDate.getFullYear();
//         const month = currentDate.getMonth();
//         const firstDay = new Date(year, month, 1).getDay();
//         const lastDate = new Date(year, month + 1, 0).getDate();
//         const today = new Date();
//         const todayFormatted = `${today.getFullYear()}-${String(today.getMonth() + 1).padStart(2, "0")}-${String(today.getDate()).padStart(2, "0")}`;

//         calendarHeader.textContent = new Intl.DateTimeFormat("en-US", {
//             year: "numeric",
//             month: "long",
//         }).format(currentDate);

//         let calendarHTML = '<div class="calendar-grid">';
//         const daysOfWeek = ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"];
//         daysOfWeek.forEach(day => {
//             calendarHTML += `<div class="calendar-day-header">${day}</div>`;
//         });

//         for (let i = 0; i < firstDay; i++) {
//             calendarHTML += `<div class="calendar-day empty"></div>`;
//         }

//         for (let day = 1; day <= lastDate; day++) {
//             const fullDate = `${year}-${String(month + 1).padStart(2, "0")}-${String(day).padStart(2, "0")}`;
//             let eventClass = "";
//             let bgColor = "";

//             const event = eventsData.find(e => e.event_date === fullDate);
//             if (fullDate === todayFormatted) {
//                 eventClass = "today-highlight"; // Today's event
//             } else if (event) {
//                 bgColor = new Date(fullDate) < today ? "#FFA500" : "#28a745"; // Orange (Past), Green (Future)
//                 eventClass = new Date(fullDate) < today ? "past-event" : "future-event";
//             }

//             calendarHTML += `<div class="calendar-day ${eventClass}" data-date="${fullDate}" style="background-color: ${bgColor};">${day}</div>`;
//         }

//         calendarHTML += "</div>";
//         calendarEl.innerHTML = calendarHTML;

//         highlightToday();
//         addEventClickListeners();
//     }

//     function highlightToday() {
//         const today = new Date();
//         const todayFormatted = `${today.getFullYear()}-${String(today.getMonth() + 1).padStart(2, "0")}-${String(today.getDate()).padStart(2, "0")}`;
        
//         const todayElement = document.querySelector(`[data-date="${todayFormatted}"]`);
//         if (todayElement) {
//             todayElement.classList.add("today-highlight");
//             todayElement.style.backgroundColor = "#007bff"; // Blue for today
//             todayElement.style.color = "white";
//         }
//     }

//     function fetchEvents() {
//         fetch("{{ route('events.index') }}")
//             .then(response => response.json())
//             .then(events => {
//                 eventsData = events;
//                 renderCalendar();
//             })
//             .catch(error => console.error("Error fetching events:", error));
//     }

//     function addEventClickListeners() {
//         document.querySelectorAll(".calendar-day").forEach(day => {
//             day.addEventListener("click", function () {
//                 const selectedDate = this.dataset.date;
//                 const eventsForDate = eventsData.filter(event => event.event_date === selectedDate);

//                 if (eventsForDate.length > 0) {
//                     eventModalTitle.textContent = `Events for ${selectedDate}`;
//                     eventModalBody.innerHTML = eventsForDate.map(event => `
//                         <div class="event-item">
//                             <h6 class="event-title">${event.title}</h6>
//                             <p class="event-time"><strong>Time:</strong> ${event.event_time}</p>
//                             <p class="event-description">${event.description}</p>
//                         </div>
//                         <hr>
//                     `).join("");
//                     eventModal.show();
//                 }
//             });
//         });
//     }

//     prevMonthBtn.addEventListener("click", () => {
//         currentDate.setMonth(currentDate.getMonth() - 1);
//         renderCalendar();
//     });

//     nextMonthBtn.addEventListener("click", () => {
//         currentDate.setMonth(currentDate.getMonth() + 1);
//         renderCalendar();
//     });

//     fetchEvents();
// });

// ********************************************************************************************************************

// document.addEventListener("DOMContentLoaded", function () {
//     console.log("✅ calendar.js loaded!");

//     // Ensure Global Variables Exist Before Initializing
//     window.atsEvents = window.atsEvents || [];
//     window.emsEvents = window.emsEvents || [];

//     function initializeCalendar(calendarId, headerId, prevBtnId, nextBtnId, eventsData) {
//         setTimeout(() => {
//             const calendarEl = document.getElementById(calendarId);
//             if (!calendarEl) {
//                 console.warn(`❌ Calendar element "${calendarId}" not found. Skipping initialization.`);
//                 return;
//             }

//             console.log(`✅ Initializing calendar: ${calendarId}`);

//             const calendarHeader = document.getElementById(headerId);
//             const prevMonthBtn = document.getElementById(prevBtnId);
//             const nextMonthBtn = document.getElementById(nextBtnId);

//             // ✅ Ensure Bootstrap Modal is initialized
//             const eventModalElement = document.getElementById("eventModal");
//             let eventModal;
//             if (eventModalElement) {
//                 eventModal = new bootstrap.Modal(eventModalElement);
//             } else {
//                 console.error("❌ Event modal not found!");
//                 return;
//             }

//             const eventModalTitle = document.getElementById("eventModalTitle");
//             const eventModalBody = document.getElementById("eventModalBody");

//             let currentDate = new Date();

//             function renderCalendar() {
//                 const year = currentDate.getFullYear();
//                 const month = currentDate.getMonth();

//                 if (calendarHeader) {
//                     calendarHeader.textContent = new Intl.DateTimeFormat("en-US", {
//                         year: "numeric",
//                         month: "long",
//                     }).format(new Date(year, month));
//                 } else {
//                     console.warn(`⚠️ Calendar header "${headerId}" not found.`);
//                 }

//                 const firstDay = new Date(year, month, 1).getDay();
//                 const lastDate = new Date(year, month + 1, 0).getDate();
//                 const today = new Date();
//                 const todayFormatted = `${today.getFullYear()}-${String(today.getMonth() + 1).padStart(2, "0")}-${String(today.getDate()).padStart(2, "0")}`;

//                 let calendarHTML = '<div class="calendar-grid">';
//                 const daysOfWeek = ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"];
//                 daysOfWeek.forEach(day => {
//                     calendarHTML += `<div class="calendar-day-header">${day}</div>`;
//                 });

//                 for (let i = 0; i < firstDay; i++) {
//                     calendarHTML += `<div class="calendar-day empty"></div>`;
//                 }

//                 for (let day = 1; day <= lastDate; day++) {
//                     const fullDate = `${year}-${String(month + 1).padStart(2, "0")}-${String(day).padStart(2, "0")}`;
//                     let eventClass = "";
//                     let bgColor = "";

//                     const event = eventsData.find(e => e.event_date === fullDate);
//                     if (fullDate === todayFormatted) {
//                         eventClass = "today-highlight";
//                     } else if (event) {
//                         bgColor = new Date(fullDate) < today ? "#FFA500" : "#28a745";
//                         eventClass = new Date(fullDate) < today ? "past-event" : "future-event";
//                     }

//                     calendarHTML += `<div class="calendar-day ${eventClass}" data-date="${fullDate}" style="background-color: ${bgColor};">${day}</div>`;
//                 }

//                 calendarHTML += "</div>";
//                 calendarEl.innerHTML = calendarHTML;

//                 addEventClickListeners();
//             }

//             function addEventClickListeners() {
//                 document.querySelectorAll(`#${calendarId} .calendar-day`).forEach(day => {
//                     day.addEventListener("click", function () {
//                         const selectedDate = this.dataset.date;
//                         const eventsForDate = eventsData.filter(event => event.event_date === selectedDate);

//                         if (eventsForDate.length > 0) {
//                             eventModalTitle.textContent = `Events for ${selectedDate}`;
//                             eventModalBody.innerHTML = eventsForDate.map(event => `
//                                 <div class="event-item">
//                                     <h6 class="event-title">${event.title}</h6>
//                                     <p class="event-time"><strong>Time:</strong> ${event.event_time}</p>
//                                     <p class="event-description">${event.description}</p>
//                                 </div>
//                                 <hr>
//                             `).join("");
//                             eventModal.show();
//                         }
//                     });
//                 });
//             }

//             if (prevMonthBtn) {
//                 prevMonthBtn.addEventListener("click", () => {
//                     currentDate.setMonth(currentDate.getMonth() - 1);
//                     renderCalendar();
//                 });
//             }

//             if (nextMonthBtn) {
//                 nextMonthBtn.addEventListener("click", () => {
//                     currentDate.setMonth(currentDate.getMonth() + 1);
//                     renderCalendar();
//                 });
//             }

//             renderCalendar();
//         }, 500);
//     }

//     // ✅ Initialize both ATS and EMS calendars with correct events
//     initializeCalendar("ats-calendar", "calendar-header-ats", "prev-month-ats", "next-month-ats", window.atsEvents);
//     initializeCalendar("ems-calendar", "calendar-header-ems", "prev-month-ems", "next-month-ems", window.emsEvents);
// });


// ********************************************************************************************************************

document.addEventListener("DOMContentLoaded", function () {
    const calendarEl = document.getElementById("ats-calendar");
    const calendarHeader = document.getElementById("calendar-header");
    const prevMonthBtn = document.getElementById("prev-month");
    const nextMonthBtn = document.getElementById("next-month");
    const eventModal = new bootstrap.Modal(document.getElementById("eventModal"));
    const eventModalTitle = document.getElementById("eventModalTitle");
    const eventModalBody = document.getElementById("eventModalBody");

    let currentDate = new Date();
    let eventsData = window.atsEvents || [];

    function renderCalendar() {
        const year = currentDate.getFullYear();
        const month = currentDate.getMonth();
        const firstDay = new Date(year, month, 1).getDay();
        const lastDate = new Date(year, month + 1, 0).getDate();
        const today = new Date();
        const todayFormatted = `${today.getFullYear()}-${String(today.getMonth() + 1).padStart(2, "0")}-${String(today.getDate()).padStart(2, "0")}`;

        calendarHeader.textContent = new Intl.DateTimeFormat("en-US", {
            year: "numeric",
            month: "long",
        }).format(currentDate);

        let calendarHTML = '<div class="calendar-grid">';
        const daysOfWeek = ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"];
        daysOfWeek.forEach(day => {
            calendarHTML += `<div class="calendar-day-header">${day}</div>`;
        });

        for (let i = 0; i < firstDay; i++) {
            calendarHTML += `<div class="calendar-day empty"></div>`;
        }

        for (let day = 1; day <= lastDate; day++) {
            const fullDate = `${year}-${String(month + 1).padStart(2, "0")}-${String(day).padStart(2, "0")}`;
            let eventClass = "";
            let bgColor = "#ffffff"; // Default background color (white)
            let textColor = "black"; // Default text color

            const event = eventsData.find(e => e.event_date === fullDate);
            const dateObject = new Date(fullDate);

            if (fullDate === todayFormatted) {
                if (event) {
                    eventClass = "today-event";
                    bgColor = "#009688"; // Purple for today with event
                    textColor = "white";
                } else {
                    eventClass = "today-highlight";
                    bgColor = "#FFC107"; // Blue for today (no event)
                    textColor = "white";
                }
            } else if (event) {
                if (dateObject < today) {
                    eventClass = "past-event";
                    bgColor = "#b0b0b0"; // Gray for past events
                    textColor = "white";
                } else {
                    eventClass = "future-event";
                    bgColor = "#28a745"; // Green for future events
                    textColor = "white";
                }
            }

            calendarHTML += `
                <div class="calendar-day ${eventClass}" data-date="${fullDate}" 
                    style="background-color: ${bgColor}; color: ${textColor};">
                    ${day}
                </div>
            `;
        }

        calendarHTML += "</div>";
        calendarEl.innerHTML = calendarHTML;
        addEventClickListeners();
    }

    function addEventClickListeners() {
        document.querySelectorAll(".calendar-day").forEach(day => {
            day.addEventListener("click", function () {
                const selectedDate = this.dataset.date;
                const eventsForDate = eventsData.filter(event => event.event_date === selectedDate);

                if (eventsForDate.length > 0) {
                    eventModalTitle.textContent = `Events for ${selectedDate}`;
                    eventModalBody.innerHTML = eventsForDate.map(event => `
                        <div class="event-item">
                            <h6>${event.title}</h6>
                            <p><strong>Time:</strong> ${event.event_time}</p>
                            <p>${event.description}</p>
                        </div>
                        <hr>
                    `).join("");
                    eventModal.show();
                } else {
                    eventModalTitle.textContent = `No Events on ${selectedDate}`;
                    eventModalBody.innerHTML = "<p>No events scheduled for this day.</p>";
                    eventModal.show();
                }
            });
        });
    }

    prevMonthBtn.addEventListener("click", () => {
        currentDate.setMonth(currentDate.getMonth() - 1);
        renderCalendar();
    });

    nextMonthBtn.addEventListener("click", () => {
        currentDate.setMonth(currentDate.getMonth() + 1);
        renderCalendar();
    });

    renderCalendar();
});

