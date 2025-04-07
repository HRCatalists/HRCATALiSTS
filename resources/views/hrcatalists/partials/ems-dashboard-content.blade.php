        <!-- Dashboard Content -->
        <div id="" class="flex-grow-1">
            <div class="container">
                {{-- <div class="welcome-text-only">Welcome, {{ auth()->user()->name }}!</div> --}}

                <div class="d-flex justify-content-between align-items-center my-4">
                    <div>
                        <h2 class="db-h2">EMPLOYEES </h2>
                    </div>
                </div>

                <div class="row dashboard-row d-flex justify-content-between align-items-start">
                
                    <div class="col-md-7">

                        {{-- Classification of Employees (Teaching and Non-Teaching) --}}
                        <div class="card shadow p-3 mb-3">
                            <h5 class="card-title">Employee Classification</h5>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Teaching
                                    <span class="badge bg-primary rounded-pill">{{ $teachingCount }}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Non-Teaching
                                    <span class="badge bg-secondary rounded-pill">{{ $nonTeachingCount }}</span>
                                </li>
                            </ul>
                        </div>
                        {{-- End Classification of Employees --}}

                        {{-- Employee Count by Department --}}
                        <div class="card shadow p-3 mb-3">
                            <h5 class="card-title">Employee Count by Department</h5>
                            @foreach ($departmentPercentages as $label => $data)
                                @php
                                    // Convert to slug for class name (e.g., "College of Nursing" → "college-of-nursing")
                                    $class = Str::slug($label);
                                @endphp


                                <div class="mb-2">
                                    <div class="department-name">{{ $label }}</div>
                                    <div class="progress">
                                        <div class="progress-bar {{ $class }}" style="width: {{ $data['percentage'] }}%;">
                                            {{ $data['count'] }} employee{{ $data['count'] == 1 ? '' : 's' }}
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        {{-- Employee Count by Department --}}
                        
                        {{-- @php
                            $departments = [
                                'College of Engineering' => 'eng',
                                'College of Arts & Science and Education' => 'cased',
                                'College of Business and Accountancy' => 'cba',
                                'College of Nursing' => 'nursing',
                                'College of Computer Studies' => 'ccs',
                                'College of Architecture' => 'arch',
                                'College of Basic Education' => 'basic',
                            ];
                        @endphp

                        @foreach ($departments as $label => $class)
                            @php
                                $data = $departmentPercentages[$label] ?? ['count' => 0, 'percentage' => 0];
                            @endphp

                            <div class="mb-2">
                                <div class="department-name">{{ $label }}</div>
                                <div class="progress">
                                    <div class="progress-bar {{ $class }}" style="width: {{ $data['percentage'] }}%;">
                                        {{ $data['count'] }} employee{{ $data['count'] == 1 ? '' : 's' }}
                                    </div>
                                </div>
                            </div>
                        @endforeach --}}
                        {{-- <div class="">
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
                        </div> --}}
                        <!--  End Dept. Count -->
                    </div>                 

                    <div class="col-md-5">
                        <div class="row">
                            <!-- Employees Card -->
                            <div class="col-md-6">
                                <div class="card emp-card text-center shadow">
                                    <div class="card-body emp-card-text">
                                        <div class="d-flex align-items-center justify-content-center mt-4">
                                            <h5 class="card-title m-auto">Employees</h5>
                                            <img src="images/cv-2.png" class="card-icon m-auto" alt="doc-icon">
                                        </div>
                                        <p class="emp-counter text-wrap fw-bold mt-2">{{ $totalEmployees ?? 0 }}</p>
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
                    </div>

                </div>
            </div>
        </div>

        <!-- Load Calendar Script -->
        {{-- <script>
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
        </script> --}}