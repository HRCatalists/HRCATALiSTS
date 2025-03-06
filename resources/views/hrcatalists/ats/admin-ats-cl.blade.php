<x-admin-ats-layout>
    <x-slot:title>
        Columban College Inc. | ATS Calendar
    </x-slot:title>

    <!-- Sidebar & Calendar -->
    <div class="d-flex">
        <!-- Sidebar -->
        <x-partials.system.ats.ats-sidebar />
        <!-- End of Sidebar -->
 <!-- FullCalendar -->
 <div id="center" class="ms-4 flex-grow-1">
                            <h3>Event Calendar</h3>
                            <div id="main-calendar"></div>
                        </div>
                    </div>
                </div>
        <!-- Calendar Content -->
        <div id="content" class="flex-grow-1">
            <div class="container mt-5">

                <!-- Success Alert -->
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <!-- Error Alert -->
                @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                
                <!-- Calendar Section -->
                <div class="calendar-wrapper mt-5">
                    <div class="container-calendar">
                        <!-- Event Form -->
                        <div id="left">
                            <h1>Calendar</h1>
                            
                            <div id="event-section">
                                <h3>Add Event</h3>
                                <form id="eventForm">
                                    @csrf
                                    <input type="date" id="event_date" name="event_date" required>
                                    <input type="time" id="event_time" name="event_time" required>
                                    <input type="text" id="title" name="title" placeholder="Event Title" required>
                                    <input type="text" id="description" name="description" placeholder="Event Description" required>
                                    <button type="submit">Add</button>
                                </form>
                            </div>
                            
                            <!-- Reminders Section -->
                            <div id="reminder-section">
                                <h3>Reminders</h3>
                                <ul id="reminderList">
                                    @foreach($events->where('user_id', Auth::id()) as $event)
                                        <li>
                                            <strong>{{ $event->title }}</strong>
                                            - {{ $event->description }} on {{ $event->event_date }}
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

                       
                <!-- End of Calendar Section -->
            </div>
        </div>
    </div>

    <!-- FullCalendar Script -->
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('main-calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                selectable: true,
                editable: true,
                events: "{{ route('events.index') }}", // Fetch events from database
                
                dateClick: function(info) {
                    let title = prompt("Enter event title:");
                    if (title) {
                        fetch("{{ route('events.store') }}", {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },
                            body: JSON.stringify({
                                title: title,
                                event_date: info.dateStr
                            })
                        })
                        .then(response => response.json())
                        .then(event => {
                            calendar.addEvent({
                                title: event.title,
                                start: event.event_date
                            });
                        });
                    }
                }
            });
            calendar.render();
        });

        // Handle Form Submission for Event Creation
        document.getElementById('eventForm').addEventListener('submit', function(event) {
            event.preventDefault();
            let formData = {
                title: document.getElementById('title').value,
                event_date: document.getElementById('event_date').value,
                event_time: document.getElementById('event_time').value,
                description: document.getElementById('description').value,
                _token: "{{ csrf_token() }}"
            };

            fetch("{{ route('events.store') }}", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(formData)
            })
            .then(response => response.json())
            .then(data => {
                alert("Event Added Successfully!");
                location.reload();
            })
            .catch(error => console.log(error));
        });
    </script>

</x-admin-ats-layout>
