<x-admin-ems-layout>
    <x-slot:title>
        Columban College Inc. | ATS Calendar
    </x-slot:title>

    <div class="d-flex">
        <x-partials.system.ems.ems-sidebar />
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
                        <div id="event-section" class="">
                            <form id="eventForm">
                                @csrf
                                <input type="date" id="event_date" name="event_date" required>
                                <input type="time" id="event_time" name="event_time" required>
                                <input type="text" id="title" name="title" placeholder="Event Title" required>
                                <input type="text" id="description" name="description" placeholder="Short description" required>
                                <button type="submit">Add</button>
                            </form>
                        </div>

                        {{-- <div id="reminder-section" class="col-lg-6">
                            <h3>Reminders</h3>
                            <ul id="reminderList">
                                @foreach($events as $event)
                                    <li id="event-{{ $event->id }}">
                                        <strong>{{ $event->title }}</strong> - {{ $event->description }} on {{ $event->event_date }}
                                        <button type="button" class="delete-btn" data-id="{{ $event->id }}">Delete</button>
                                    </li>
                                @endforeach
                            </ul>
                        </div> --}}
                        {{-- <div id="reminder-section" class="col-lg-6">
                            <h3>Reminders</h3>
                            <ul id="reminderList" class="list-group">
                                @foreach($events as $event)
                                    <li id="event-{{ $event->id }}" class="list-group-item d-flex justify-content-between align-items-center">
                                        <div class="event-text flex-grow-1">
                                            <strong>{{ $event->title }}</strong> - {{ $event->description }} on {{ $event->event_date }}
                                        </div>
                                        <button type="button" class="btn btn-danger delete-btn">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </li>
                                @endforeach
                            </ul>
                        </div>                                                                                            --}}
                    </div>
                </div>

                <!-- Event List (DataTable) -->
                <div class="mt-5">
                    <h3>Event List</h3>
                    <table id="eventTable" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($events as $event)
                                <tr id="event-row-{{ $event->id }}">
                                    <td>{{ $event->id }}</td>
                                    <td>{{ $event->title }}</td>
                                    <td>{{ $event->description }}</td>
                                    <td>{{ $event->event_date }}</td>
                                    <td>{{ $event->event_time }}</td>
                                    <td>
                                        <button class="btn btn-danger btn-sm delete-btn" data-id="{{ $event->id }}">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- FullCalendar Script -->
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js'></script>
    
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var calendarEl = document.getElementById('main-calendar');
            // var reminderListEl = document.getElementById('reminderList');
    
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                selectable: true,
                editable: false,
                eventDidMount: function (info) {
                    let tooltip = document.createElement("div");
                    tooltip.classList.add("fc-tooltip");
                    tooltip.innerHTML = `<strong>Time:</strong> ${info.event.extendedProps.event_time} <br> 
                                         <strong>Description:</strong> ${info.event.extendedProps.description}`;
                    document.body.appendChild(tooltip);
    
                    info.el.addEventListener("mouseenter", function (event) {
                        tooltip.style.display = "block";
                        tooltip.style.left = event.pageX + 10 + "px";
                        tooltip.style.top = event.pageY + 10 + "px";
                    });
    
                    info.el.addEventListener("mouseleave", function () {
                        tooltip.style.display = "none";
                    });
                },
                events: function (fetchInfo, successCallback, failureCallback) {
                    fetch("{{ route('events.index') }}")
                        .then(response => response.json())
                        .then(events => {
                            let today = new Date(); // Get today's date with timezone correction
                            today.setHours(0, 0, 0, 0); // Normalize time to avoid timezone issues

                            let formattedEvents = events.map(event => {
                                let eventDate = new Date(event.event_date); // Convert event date to Date object
                                eventDate.setHours(0, 0, 0, 0); // Normalize time for accurate comparison

                                let eventColor = "#28A745"; // Default (Future Events)

                                if (eventDate < today) {
                                    eventColor = "#FFA500"; // Past Events (Orange)
                                } else if (eventDate.getTime() === today.getTime()) {
                                    eventColor = "#007BFF"; // Today's Events (Blue)
                                }

                                return {
                                    id: event.id,
                                    title: event.title,
                                    start: event.event_date,
                                    event_time: event.event_time,
                                    description: event.description,
                                    backgroundColor: eventColor, // ✅ Set event color dynamically
                                    borderColor: eventColor
                                };
                            });

                            successCallback(formattedEvents);
                        })
                        .catch(error => failureCallback(error));
                },
                dateClick: function (info) {
                    Swal.fire({
                        title: 'Add New Event',
                        html: `
                            <input type="text" id="swal-title" class="swal2-input" placeholder="Event Title">
                            <input type="text" id="swal-description" class="swal2-input" placeholder="Event Description">
                            <input type="time" id="swal-time" class="swal2-input">
                        `,
                        showCancelButton: true,
                        confirmButtonText: 'Add Event',
                        cancelButtonText: 'Cancel',
                        preConfirm: () => {
                            let title = document.getElementById('swal-title').value.trim();
                            let description = document.getElementById('swal-description').value.trim();
                            let eventTime = document.getElementById('swal-time').value || "00:00";

                            if (!title) {
                                Swal.showValidationMessage('Title is required!');
                                return false;
                            }
                            return { title, description, eventTime };
                        }
                    }).then((result) => {
                        if (result.isConfirmed) {
                            fetch("{{ route('events.store') }}", {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                                },
                                body: JSON.stringify({
                                    title: result.value.title,
                                    description: result.value.description || "No description",
                                    event_date: info.dateStr,
                                    event_time: result.value.eventTime
                                })
                            })
                            .then(response => response.json().then(data => ({ status: response.status, body: data }))) // Capture both status & body
                            .then(({ status, body }) => {
                                console.log("Server Response:", status, body); // Log to inspect response

                                if (status === 201 || body.success) {
                                    Swal.fire('Success!', 'Event added successfully!', 'success');
                                    calendar.refetchEvents();
                                } else {
                                    Swal.fire('Error!', body.message || 'Failed to add event.', 'error');
                                }
                            })
                            .catch(error => {
                                console.error("Fetch Error:", error);
                                Swal.fire('Error!', 'Something went wrong. Check console for details.', 'error');
                            });
                        }
                    });
                }
            });
    
            calendar.render();
    
            // Form submission for adding events
            eventForm.addEventListener('submit', function (event) {
                event.preventDefault();

                let formData = {
                    title: document.getElementById('title').value,
                    description: document.getElementById('description').value,
                    event_date: document.getElementById('event_date').value,
                    event_time: document.getElementById('event_time').value
                };

                fetch("{{ route('events.store') }}", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify(formData)
                })
                .then(response => response.json().then(data => ({ status: response.status, body: data }))) // Capture both status & body
                .then(({ status, body }) => {
                    console.log("Server Response:", status, body); // Log response

                    if (status === 201 || body.success) {
                        Swal.fire('Success!', 'Event added successfully!', 'success');
                        calendar.refetchEvents(); // ✅ Refresh calendar events
                        eventForm.reset(); // ✅ Clear form fields
                    } else {
                        Swal.fire('Error!', body.message || 'Failed to add event.', 'error');
                    }
                })
                .catch(error => {
                    console.error("Fetch Error:", error);
                    Swal.fire('Error!', 'Something went wrong. Check console for details.', 'error');
                });
            });
    
            // Initialize DataTable
            var eventTable = $('#eventTable').DataTable();

            // Event delegation for delete buttons
            $('#eventTable tbody').on('click', '.delete-btn', function () {
                var button = $(this);
                var eventId = button.data('id');
                var row = button.closest('tr');

                Swal.fire({
                    title: 'Are you sure?',
                    text: "This event will be permanently deleted!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        button.prop('disabled', true).html('<i class="fas fa-spinner fa-spin"></i>'); // Show loading spinner

                        fetch(`/events/${eventId}`, {
                            method: 'DELETE',
                            headers: {
                                "Content-Type": "application/json",
                                "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                            }
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                Swal.fire({
                                    title: 'Deleted!',
                                    text: 'Event has been removed.',
                                    icon: 'success',
                                    timer: 2000,
                                    showConfirmButton: false
                                });

                                eventTable.row(row).remove().draw(); // Remove row from DataTable
                                calendar.refetchEvents(); // Refresh calendar events
                            } else {
                                Swal.fire('Error!', data.error || 'Could not delete event.', 'error');
                                button.prop('disabled', false).html('<i class="fas fa-trash-alt"></i>'); // Restore delete button
                            }
                        })
                        .catch(error => {
                            Swal.fire('Error!', 'Something went wrong.', 'error');
                            button.prop('disabled', false).html('<i class="fas fa-trash-alt"></i>');
                        });
                    }
                });
            });
        });
    </script>

</x-admin-ems-layout>
