<x-admin-ats-layout>
    <x-slot:title>
        Columban College Inc. | ATS Calendar
    </x-slot:title>

    <div class="d-flex">
        <x-partials.system.ats.ats-sidebar />
    </div>

    <div id="content" class="flex-grow-1">
        <div class="container mt-5">

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="calendar-wrapper mt-5">
                <div id="right" class="flex-grow-1">
                    <h2>Event Calendar</h2>
                    <div id="main-calendar"></div>
                </div>

                <div class="container-calendar">
                    <h1>Add Event</h1>
                    <div class="calendar-event-wrapper">
                        <div id="event-section" class="col-lg-6">
                            <form id="eventForm">
                                @csrf
                                <input type="date" id="event_date" name="event_date" required>
                                <input type="time" id="event_time" name="event_time" required>
                                <input type="text" id="title" name="title" placeholder="Event Title" required>
                                <input type="text" id="description" name="description" placeholder="Short description" required>
                                <button type="submit">Add</button>
                            </form>
                        </div>

                        <div id="reminder-section" class="col-lg-6">
                            <h3>Reminders</h3>
                            <ul id="reminderList">
                                @foreach($events as $event)
                                    <li>
                                        <strong>{{ $event->title }}</strong> - {{ $event->description }} on {{ $event->event_date }}
                                        <form action="{{ route('events.destroy', $event->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit">Delete</button>
                                        </form>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- FullCalendar Script -->
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js"></script>
    {{-- <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('main-calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                selectable: true,
                editable: false,
                events: function(fetchInfo, successCallback, failureCallback) {
                    fetch("{{ route('events.index') }}")
                        .then(response => response.json())
                        .then(events => {
                            let formattedEvents = events.map(event => ({
                                title: event.title,
                                start: event.event_date 
                            }));
                            successCallback(formattedEvents);
                        })
                        .catch(error => failureCallback(error));
                },
                dateClick: function(info) {
                    let title = prompt("Enter event title:");
                    if (title) {
                        fetch("{{ route('events.store') }}", {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/x-www-form-urlencoded',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },
                            body: new URLSearchParams({
                                title: title,
                                description: "No description",
                                event_date: info.dateStr,
                                event_time: "00:00"
                            })
                        })
                        .then(response => {
                            if (response.ok) {
                                alert("Event added successfully!");
                                location.reload();
                            }
                        })
                        .catch(error => console.log(error));
                    }
                }
            });
            calendar.render();
        });

        document.getElementById('eventForm').addEventListener('submit', function(event) {
            event.preventDefault();
            let formData = new FormData(this);

            fetch("{{ route('events.store') }}", {
                method: 'POST',
                body: formData
            })
            .then(response => {
                if (response.ok) {
                    alert("Event Added Successfully!");
                    location.reload();
                }
            })
            .catch(error => console.log(error));
        });
    </script> --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('main-calendar');

        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            selectable: true,
            editable: false,
            eventDidMount: function(info) {
                // Create tooltip element
                let tooltip = document.createElement("div");
                tooltip.classList.add("fc-tooltip");
                tooltip.innerHTML = `<strong>Time:</strong> ${info.event.extendedProps.event_time} <br> 
                                    <strong>Description:</strong> ${info.event.extendedProps.description}`;
                document.body.appendChild(tooltip);

                // Show tooltip on mouse enter
                info.el.addEventListener("mouseenter", function(event) {
                    tooltip.style.display = "block";
                    tooltip.style.left = event.pageX + 10 + "px";
                    tooltip.style.top = event.pageY + 10 + "px";
                });

                // Hide tooltip on mouse leave
                info.el.addEventListener("mouseleave", function() {
                    tooltip.style.display = "none";
                });
            },
            events: function(fetchInfo, successCallback, failureCallback) {
                fetch("{{ route('events.index') }}")
                    .then(response => response.json())
                    .then(events => {
                        let formattedEvents = events.map(event => ({
                            title: event.title,
                            start: event.event_date,
                            event_time: event.event_time,  // Add event time
                            description: event.description // Add event description
                        }));
                        successCallback(formattedEvents);
                    })
                    .catch(error => failureCallback(error));
            },
            dateClick: function(info) {
                let title = prompt("Enter event title:");
                if (title) {
                    fetch("{{ route('events.store') }}", {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: new URLSearchParams({
                            title: title,
                            description: "No description",
                            event_date: info.dateStr,
                            event_time: "00:00"
                        })
                    })
                    .then(response => {
                        if (response.ok) {
                            alert("Event added successfully!");
                            location.reload();
                        }
                    })
                    .catch(error => console.log(error));
                }
            }
        });

        calendar.render();
    });
    </script>
</x-admin-ats-layout>
