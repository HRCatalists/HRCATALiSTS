<x-admin-ats-layout>

    <x-slot:title>
        Columban College Inc. | ATS Dashboard
    </x-slot:title>

    <!-- Dashboard Content -->
    <div class="d-flex">
        <!-- Sidebar -->
        <x-partials.system.ats.ats-sidebar />
        <!-- End of Sidebar -->
        {{-- @include('hrcatalists.ats.partials.ats-dashboard-content') --}}
    </div>

    {{-- <script>
        document.addEventListener("DOMContentLoaded", function () {
            const calendarEl = document.getElementById("calendar");
            const calendarHeader = document.getElementById("calendar-header");
            const prevMonthBtn = document.getElementById("prev-month");
            const nextMonthBtn = document.getElementById("next-month");
            const eventListEl = document.getElementById("event-list");
        
            let currentDate = new Date();
        
            function renderCalendar() {
                const year = currentDate.getFullYear();
                const month = currentDate.getMonth();
                const firstDay = new Date(year, month, 1).getDay();
                const lastDate = new Date(year, month + 1, 0).getDate();
        
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
                    calendarHTML += `<div class="calendar-day" data-date="${fullDate}">${day}</div>`;
                }
        
                calendarHTML += "</div>";
                calendarEl.innerHTML = calendarHTML;
        
                highlightToday();
                fetchEvents();
            }
        
            function highlightToday() {
                const today = new Date();
                if (
                    today.getFullYear() === currentDate.getFullYear() &&
                    today.getMonth() === currentDate.getMonth()
                ) {
                    const todayElement = document.querySelector(`[data-date="${today.getFullYear()}-${String(today.getMonth() + 1).padStart(2, "0")}-${String(today.getDate()).padStart(2, "0")}"]`);
                    if (todayElement) {
                        todayElement.classList.add("today-highlight");
                    }
                }
            }
        
            function fetchEvents() {
                fetch("{{ route('events.index') }}")
                    .then(response => response.json())
                    .then(events => {
                        eventListEl.innerHTML = "";
                        document.querySelectorAll(".calendar-day").forEach(day => {
                            const date = day.dataset.date;
                            const event = events.find(e => e.event_date === date);
                            if (event) {
                                day.classList.add("event-day");
                                day.innerHTML += `<div class="event-dot"></div>`;
                                eventListEl.innerHTML += `
                                    <li class="list-group-item">
                                        <strong>${event.title}</strong> - ${event.event_time}
                                        <p>${event.description}</p>
                                    </li>`;
                            }
                        });
                    })
                    .catch(error => console.error("Error fetching events:", error));
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
    </script> --}}
        
</x-admin-ats-layout>
