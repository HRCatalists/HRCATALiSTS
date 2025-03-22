<x-admin-ems-layout>
    <x-slot:title>
        Columban College Inc. | EMS Dashboard
    </x-slot:title>

    <div class="d-flex">
        <x-partials.system.ems.ems-sidebar />
        <!-- End of Sidebar -->
    
        <!-- Dashboard Content -->
        <div id="content" class="flex-grow-1">
            <div class="container mt-5">
                <div class="welcome-text-only">
                    Welcome, {user.name}!
                </div>

                <div class="d-flex justify-content-between align-items-center mt-4">
                    <div>
                        <h2 class="db-h2">DASHBOARD</h2>
                        <h4 class="db-h4 mt-4">Overview</h4>
                    </div>

                    <!-- Banner -->
                    <div class="d-flex banner banner-gradient text-white align-items-center justify-content-center px-4 py-2">
                        <h4 class="banner-text mx-5">Welcome, {{ auth()->user()->name }}!</h4>
                        <img src="{{ asset('images/db-icon.png') }}" class="banner-icon " alt="banner-icon">
                    </div>
                </div>

                <div class="row mt-4 dashboard-row d-flex justify-content-between align-items-start mt-5">
                
                    <div class="col-md-6">

                        <div class="row">
                        <!-- Employees Card -->
                        <div class="col-md-6">
                            <div class="card emp-card text-center shadow">
                                <div class="card-body emp-card-text">
                                    <div class="d-flex align-items-center justify-content-center mt-4">
                                        <h5 class="card-title m-auto">Employees</h5>
                                        <img src="images/cv-2.png" class="card-icon m-auto" alt="doc-icon">
                                    </div>
                                    <p class="emp-counter text-wrap fw-bold mt-2">234</p>
                                </div>
                            </div>
                        </div>
                        <!-- End Employees Card -->
        
                        <!-- Employee Structure Statistics -->
                        <div class="col-md-6">
                            <div class="card shadow p-4">
        
                            <h6 class="text-secondary">Statistics</h6>
                            <h5 class="card-title db-h5">Employee Structure</h5>
        
                            <div class="position-relative d-flex justify-content-center align-items-center my-2">
                                <div class="progress-circle">
                                <div class="circle">
                                    <span class="circle-text fw-bold">100%</span>
                                </div>
                                </div>
                            </div>
                                
                            <div class="d-flex justify-content-around">
                                <div class="d-flex align-items-center">
                                <span class="dot bg-primary me-2"></span>
                                <span>Male 65%</span>
                                </div>
        
                                <div class="d-flex align-items-center">
                                <span class="dot bg-info me-2"></span>
                                <span>Female 35%</span>
                                </div>
                            </div>
                            </div>
                        </div>
                        <!-- End Employee Structure Statistics -->
                        </div>
        
                        <!-- Dept. Count -->
                        <div class="mt-4">
                        
                        <div class="card shadow p-2">
                            <div class="card-body">
                            <h5 class="card-title mb-4">Employee Count by Department</h5>

                            <div class="mb-2">
                                <div class="department-name">College of Engineering</div>
                                <div class="progress">
                                    <div class="progress-bar eng" style="width: 40%;"></div>
                                </div>
                            </div>
        
                            <div class="mb-2">
                                <div class="department-name">College of Arts & Science and Education</div>
                                <div class="progress">
                                    <div class="progress-bar cased" style="width: 60%;"></div>
                                </div>
                            </div>
        
                            <div class="mb-2">
                                <div class="department-name">College of Business and Accountancy</div>
                                <div class="progress">
                                    <div class="progress-bar cba" style="width: 50%;"></div>
                                </div>
                            </div>
        
                            <div class="mb-2">
                                <div class="department-name">College of Nursing</div>
                                <div class="progress">
                                    <div class="progress-bar nursing" style="width: 70%;"></div>
                                </div>
                            </div>
        
                            <div class="mb-2">
                                <div class="department-name">College of Computer Studies</div>
                                <div class="progress">
                                    <div class="progress-bar ccs" style="width: 80%;"></div>
                                </div>
                            </div>
        
                            <div class="mb-2">
                                <div class="department-name">College of Architecture</div>
                                <div class="progress">
                                    <div class="progress-bar arch" style="width: 35%;"></div>
                                </div>
                            </div>
                            
                            <div class="mb-2">
                                <div class="department-name">College of Basic Education</div>
                                <div class="progress">
                                    <div class="progress-bar arch" style="width: 35%;"></div>
                                </div>
                            </div>

                            </div>
                        </div>
                        </div>
                        <!--  End Dept. Count -->
                    </div>
        
                    <!-- Calendar, Events, & Logs Section -->
                    <div class="col-md-6 card-size">
                        
                  <!-- Calendar, Events, & Logs Section -->
                  <div class="col-md-7 card-size">
                        
                        <!-- Calendar -->
                        <div class="card shadow">
                            <div class="card-body">
                                <div class="calendar-container">
                                    <div class="calendar-header d-flex justify-content-between align-items-center">
                                        <button id="prev-month">&lt;</button>
                                        <span id="calendar-header" class="text-center"></span>
                                        <button id="next-month">&gt;</button>
                                    </div>
                                    <div id="calendar" class="mb-4"></div>
                                </div>
                            </div>
                        </div>                   
                        
                        <!-- Events -->
                        {{-- <div class="card shadow mt-4">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h5 id="event-title" class="fw-bold">Events</h5>
                                    <a href="{{ route('ats-calendar') }}" class="view-link">See more...</a>
                                </div>
                                <ul id="event-list" class="list-group mt-3">
                                <!-- Dynamic Event Items -->
                                </ul>
                            </div>
                        </div> --}}

                        <!-- Event Modal -->
                        <div class="modal fade" id="eventModal" tabindex="-1" aria-labelledby="eventModalTitle" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="eventModalTitle">Event Details</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body" id="eventModalBody">
                                        <!-- Events will be loaded dynamically here -->
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Logs -->
                        <div class="card shadow mt-4">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h5 class="fw-bold">Recent Activities</h5>
                                    <a href="{{ route('ats-logs') }}" class="view-link">See more...</a>
                                </div>
                                <table class="table table-bordered m-0">
                                    <thead class="small">
                                        <tr>
                                            <th>NO</th>
                                            <th>USER</th>
                                            <th>ACTIVITIES</th>
                                            <th>TIME</th>
                                            <th>DATE</th>
                                        </tr>
                                    </thead>
                                    <tbody class="small">
                                    @foreach($logs as $log)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $log->user->name ?? 'Guest' }}</td>
                                <td>{{ $log->activity }}</td>
                                <td>{{ $log->created_at->format('h:i a') }}</td>
                                <td>{{ $log->created_at->format('F d, Y') }}</td>
                            </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- End Calendar, Events, & Logs Section -->
                </div>
            </div>
        </div>
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
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const calendarEl = document.getElementById("calendar");
            const calendarHeader = document.getElementById("calendar-header");
            const prevMonthBtn = document.getElementById("prev-month");
            const nextMonthBtn = document.getElementById("next-month");
            const eventModal = new bootstrap.Modal(document.getElementById("eventModal"));
            const eventModalTitle = document.getElementById("eventModalTitle");
            const eventModalBody = document.getElementById("eventModalBody");
        
            let currentDate = new Date();
            let eventsData = [];
        
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
                    let bgColor = "";

                    const event = eventsData.find(e => e.event_date === fullDate);
                    if (fullDate === todayFormatted) {
                        eventClass = "today-highlight"; // Today's event
                    } else if (event) {
                        bgColor = new Date(fullDate) < today ? "#FFA500" : "#28a745"; // Orange (Past), Green (Future)
                        eventClass = new Date(fullDate) < today ? "past-event" : "future-event";
                    }

                    calendarHTML += `<div class="calendar-day ${eventClass}" data-date="${fullDate}" style="background-color: ${bgColor};">${day}</div>`;
                }

                calendarHTML += "</div>";
                calendarEl.innerHTML = calendarHTML;

                highlightToday();
                addEventClickListeners();
            }

            function highlightToday() {
                const today = new Date();
                const todayFormatted = `${today.getFullYear()}-${String(today.getMonth() + 1).padStart(2, "0")}-${String(today.getDate()).padStart(2, "0")}`;
                
                const todayElement = document.querySelector(`[data-date="${todayFormatted}"]`);
                if (todayElement) {
                    todayElement.classList.add("today-highlight");
                    todayElement.style.backgroundColor = "#007bff"; // Blue for today
                    todayElement.style.color = "white";
                }
            }

            function fetchEvents() {
                fetch("{{ route('events.index') }}")
                    .then(response => response.json())
                    .then(events => {
                        eventsData = events;
                        renderCalendar();
                    })
                    .catch(error => console.error("Error fetching events:", error));
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
                                    <h6 class="event-title">${event.title}</h6>
                                    <p class="event-time"><strong>Time:</strong> ${event.event_time}</p>
                                    <p class="event-description">${event.description}</p>
                                </div>
                                <hr>
                            `).join("");
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
        
            fetchEvents();
        });
    </script>
</x-admin-ems-layout>

        {{-- @include('hrcatalists.ems.partials.ems-dashboard-content') --}}
    </div>

</x-admin-ems-layout>
