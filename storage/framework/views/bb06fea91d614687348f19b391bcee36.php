<?php if (isset($component)) { $__componentOriginal5fc7b6c708ff08bbce49411545a9c035 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5fc7b6c708ff08bbce49411545a9c035 = $attributes; } ?>
<?php $component = App\View\Components\AdminAtsLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin-ats-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\AdminAtsLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('title', null, []); ?> 
        Columban College Inc. | ATS Calendar
     <?php $__env->endSlot(); ?>

    <div class="d-flex">
        <?php if (isset($component)) { $__componentOriginald5876c07269e58343b8102e8c5f829ec = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald5876c07269e58343b8102e8c5f829ec = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.partials.system.ats.ats-sidebar','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('partials.system.ats.ats-sidebar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald5876c07269e58343b8102e8c5f829ec)): ?>
<?php $attributes = $__attributesOriginald5876c07269e58343b8102e8c5f829ec; ?>
<?php unset($__attributesOriginald5876c07269e58343b8102e8c5f829ec); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald5876c07269e58343b8102e8c5f829ec)): ?>
<?php $component = $__componentOriginald5876c07269e58343b8102e8c5f829ec; ?>
<?php unset($__componentOriginald5876c07269e58343b8102e8c5f829ec); ?>
<?php endif; ?>
    </div>

    <div id="content" class="flex-grow-1">
        <div class="container mt-5">

            <?php if(session('success')): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?php echo e(session('success')); ?>

                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>

            <?php if(session('error')): ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?php echo e(session('error')); ?>

                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>

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
                                <?php echo csrf_field(); ?>
                                <input type="date" id="event_date" name="event_date" required>
                                <input type="time" id="event_time" name="event_time" required>
                                <input type="text" id="title" name="title" placeholder="Event Title" required>
                                <input type="text" id="description" name="description" placeholder="Short description" required>
                                <button type="submit">Add</button>
                            </form>
                        </div>

                        
                        
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
                            <?php $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr id="event-row-<?php echo e($event->id); ?>">
                                    <td><?php echo e($event->id); ?></td>
                                    <td><?php echo e($event->title); ?></td>
                                    <td><?php echo e($event->description); ?></td>
                                    <td><?php echo e($event->event_date); ?></td>
                                    <td><?php echo e($event->event_time); ?></td>
                                    <td>
                                        <button class="btn btn-danger btn-sm delete-btn" data-id="<?php echo e($event->id); ?>">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                    fetch("<?php echo e(route('events.index')); ?>")
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
                            fetch("<?php echo e(route('events.store')); ?>", {
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

                fetch("<?php echo e(route('events.store')); ?>", {
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

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5fc7b6c708ff08bbce49411545a9c035)): ?>
<?php $attributes = $__attributesOriginal5fc7b6c708ff08bbce49411545a9c035; ?>
<?php unset($__attributesOriginal5fc7b6c708ff08bbce49411545a9c035); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5fc7b6c708ff08bbce49411545a9c035)): ?>
<?php $component = $__componentOriginal5fc7b6c708ff08bbce49411545a9c035; ?>
<?php unset($__componentOriginal5fc7b6c708ff08bbce49411545a9c035); ?>
<?php endif; ?>
<?php /**PATH C:\Users\raide\OneDrive\Desktop\HRCATALiSTS-hr-catalists\resources\views/hrcatalists/ats/admin-ats-cl.blade.php ENDPATH**/ ?>