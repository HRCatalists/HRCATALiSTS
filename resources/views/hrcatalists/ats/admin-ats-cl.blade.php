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
                        <div id="reminder-section" class="col-lg-6">
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
                        </div>                                                                                           
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- FullCalendar Script -->
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js'></script>
    
    {{-- <script>
        document.addEventListener('DOMContentLoaded', function () {
            var calendarEl = document.getElementById('main-calendar');
            var reminderListEl = document.getElementById('reminderList'); // Get reminder list
    
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
                            .then(response => response.json())
                            .then(data => {
                                if (data.success) {
                                    Swal.fire('Success!', 'Event added successfully!', 'success');
                                    calendar.refetchEvents(); // Refresh calendar events
                                    addReminderToList(data.event); // ✅ Add event to reminders dynamically
                                } else {
                                    Swal.fire('Error!', data.message || 'Failed to add event.', 'error');
                                }
                            })
                            .catch(error => Swal.fire('Error!', 'Something went wrong.', 'error'));
                        }
                    });
                }
            });
    
            calendar.render();
    
            // Form submission for adding events
            var eventForm = document.getElementById('eventForm');
            if (eventForm) {
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
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            Swal.fire('Success!', 'Event added successfully!', 'success');
                            calendar.refetchEvents();
                            addReminderToList(data.event); // ✅ Update reminders dynamically
                            eventForm.reset();
                        } else {
                            Swal.fire('Error!', 'Failed to add event.', 'error');
                        }
                    })
                    .catch(error => Swal.fire('Error!', 'Something went wrong.', 'error'));
                });
            }
    
            // ✅ Function to add event to reminders dynamically
            function addReminderToList(event) {
                let reminderItem = document.createElement("li");
                reminderItem.innerHTML = `
                    <strong>${event.title}</strong> - ${event.description} on ${event.event_date}
                    <form action="{{ route('events.destroy', '') }}/${event.id}" method="POST" class="delete-form" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="delete-btn" data-id="${event.id}">Delete</button>
                    </form>
                `;
    
                reminderListEl.appendChild(reminderItem); // Append new event to the list
    
                // Add event listener to the new delete button
                reminderItem.querySelector(".delete-btn").addEventListener("click", function () {
                    confirmDelete(event.id, reminderItem);
                });
            }
    
            // ✅ Function to confirm deletion
            function confirmDelete(eventId, listItem) {
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
                        fetch(`/events/${eventId}`, { // ✅ Correct URL structure
                            method: 'DELETE', // ✅ Use DELETE method directly
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
                                    timer: 2000, // Auto-close after 2 seconds
                                    showConfirmButton: false
                                });

                                listItem.remove(); // ✅ Remove item from the UI dynamically
                                calendar.refetchEvents(); // ✅ Refresh FullCalendar events dynamically
                            } else {
                                Swal.fire('Error!', data.error || 'Could not delete event.', 'error');
                            }
                        })
                        .catch(error => Swal.fire('Error!', 'Something went wrong.', 'error'));
                    }
                });
            }
        });
    </script> --}}
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var calendarEl = document.getElementById("main-calendar");
            var reminderListEl = document.getElementById("reminderList");

            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: "dayGridMonth",
                selectable: true,
                editable: false,
                events: function (fetchInfo, successCallback, failureCallback) {
                    fetch("{{ route('events.index') }}")
                        .then(response => response.json())
                        .then(events => {
                            let today = new Date();
                            today.setHours(0, 0, 0, 0);

                            let formattedEvents = events.map(event => {
                                let eventDate = new Date(event.event_date);
                                eventDate.setHours(0, 0, 0, 0);

                                let eventColor = "#28A745"; // Default Green (Future)
                                if (eventDate < today) {
                                    eventColor = "#FFA500"; // Past Orange
                                } else if (eventDate.getTime() === today.getTime()) {
                                    eventColor = "#007BFF"; // Today Blue
                                }

                                return {
                                    id: event.id,
                                    title: event.title,
                                    start: event.event_date,
                                    event_time: event.event_time,
                                    description: event.description,
                                    backgroundColor: eventColor,
                                    borderColor: eventColor,
                                };
                            });

                            successCallback(formattedEvents);
                        })
                        .catch(error => failureCallback(error));
                },
            });

            calendar.render();

            // ✅ Fix: Use event delegation to handle dynamically created delete buttons
            document.addEventListener("click", function (event) {
                if (event.target.classList.contains("delete-btn")) {
                    let eventId = event.target.dataset.id;
                    confirmDelete(eventId);
                }
            });

            // ✅ Function to confirm and handle event deletion
            function confirmDelete(eventId) {
                Swal.fire({
                    title: "Are you sure?",
                    text: "This event will be permanently deleted!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#d33",
                    cancelButtonColor: "#3085d6",
                    confirmButtonText: "Yes, delete it!",
                }).then((result) => {
                    if (result.isConfirmed) {
                        fetch(`/events/${eventId}`, {
                            method: "DELETE",
                            headers: {
                                "Content-Type": "application/json",
                                "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content"),
                            },
                        })
                            .then((response) => response.json())
                            .then((data) => {
                                if (data.success) {
                                    Swal.fire("Deleted!", "Event has been removed.", "success");

                                    // ✅ Remove event from UI (Reminder List)
                                    let listItem = document.getElementById(`event-${eventId}`);
                                    if (listItem) {
                                        listItem.remove();
                                    }

                                    // ✅ Refresh the FullCalendar to remove the deleted event
                                    calendar.refetchEvents();
                                } else {
                                    Swal.fire("Error!", data.error || "Could not delete event.", "error");
                                }
                            })
                            .catch((error) => Swal.fire("Error!", "Something went wrong.", "error"));
                    }
                });
            }
        });
    </script>
</x-admin-ats-layout>
