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
                <div id="right" class="ms-4 flex-grow-1">
                    <h3>Event Calendar</h3>
                    <div id="main-calendar"></div>
                </div>

                <div class="container-calendar">
                    <div id="left">
                        <h1>Calendar</h1>
                        <div id="event-section">
                            <h3>Add Event</h3>
                            <form id="eventForm">
                                <?php echo csrf_field(); ?>
                                <input type="date" id="event_date" name="event_date" required>
                                <input type="time" id="event_time" name="event_time" required>
                                <input type="text" id="title" name="title" placeholder="Event Title" required>
                                <input type="text" id="description" name="description" placeholder="Event Description" required>
                                <button type="submit">Add</button>
                            </form>
                        </div>

                        <div id="reminder-section">
                            <h3>Reminders</h3>
                            <ul id="reminderList">
                                <?php $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li>
                                        <strong><?php echo e($event->title); ?></strong> - <?php echo e($event->description); ?> on <?php echo e($event->event_date); ?>

                                        <form action="<?php echo e(route('events.destroy', $event->id)); ?>" method="POST" style="display:inline;">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button type="submit">Delete</button>
                                        </form>
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
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('main-calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                selectable: true,
                editable: false,
                events: function(fetchInfo, successCallback, failureCallback) {
                    fetch("<?php echo e(route('events.index')); ?>")
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
                        fetch("<?php echo e(route('events.store')); ?>", {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/x-www-form-urlencoded',
                                'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>'
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

            fetch("<?php echo e(route('events.store')); ?>", {
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