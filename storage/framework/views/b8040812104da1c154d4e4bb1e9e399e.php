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
                        <div id="event-section" class="col-lg-6">
                            <form id="eventForm">
                                <?php echo csrf_field(); ?>
                                <input type="date" id="event_date" name="event_date" required>
                                <input type="time" id="event_time" name="event_time" required>
                                <input type="text" id="title" name="title" placeholder="Event Title" required>
                                <input type="text" id="description" name="description" placeholder="Short description" required>
                                <button type="submit">Add</button>
                            </form>
                        </div>

                        
                        <div id="reminder-section" class="col-lg-6">
                            <h3>Reminders</h3>
                            <ul id="reminderList" class="list-group">
                                <?php $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li id="event-<?php echo e($event->id); ?>" class="list-group-item d-flex justify-content-between align-items-center">
                                        <div class="event-text flex-grow-1">
                                            <strong><?php echo e($event->title); ?></strong> - <?php echo e($event->description); ?> on <?php echo e($event->event_date); ?>

                                        </div>
                                        <button type="button" class="btn btn-danger delete-btn">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>                                                                                           
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- FullCalendar Script -->
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js'></script>
    
    
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var calendarEl = document.getElementById("main-calendar");
            var reminderListEl = document.getElementById("reminderList");

            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: "dayGridMonth",
                selectable: true,
                editable: false,
                events: function (fetchInfo, successCallback, failureCallback) {
                    fetch("<?php echo e(route('events.index')); ?>")
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
<?php /**PATH C:\laragon\www\hr_catalists\resources\views/hrcatalists/ats/admin-ats-cl.blade.php ENDPATH**/ ?>