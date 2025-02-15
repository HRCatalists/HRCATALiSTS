<?php if (isset($component)) { $__componentOriginal5aa067d06d1afdd090a728cb9bf57c48 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5aa067d06d1afdd090a728cb9bf57c48 = $attributes; } ?>
<?php $component = App\View\Components\AdminEmsLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin-ems-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\AdminEmsLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>

     <?php $__env->slot('title', null, []); ?> 
        Columban College Inc. | Calendar
     <?php $__env->endSlot(); ?>

        <!-- Calendar Content -->
        <div class="d-flex">

            <!-- Sidebar -->
            <?php if (isset($component)) { $__componentOriginalb6736efa91a27fe677a95c665ef9b617 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb6736efa91a27fe677a95c665ef9b617 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.partials.system.ems.ems-sidebar','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('partials.system.ems.ems-sidebar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalb6736efa91a27fe677a95c665ef9b617)): ?>
<?php $attributes = $__attributesOriginalb6736efa91a27fe677a95c665ef9b617; ?>
<?php unset($__attributesOriginalb6736efa91a27fe677a95c665ef9b617); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb6736efa91a27fe677a95c665ef9b617)): ?>
<?php $component = $__componentOriginalb6736efa91a27fe677a95c665ef9b617; ?>
<?php unset($__componentOriginalb6736efa91a27fe677a95c665ef9b617); ?>
<?php endif; ?>
            <!-- End of Sidebar -->
        
            <!-- Calendar Content -->
            <div id="content" class="flex-grow-1">
                <div class="container mt-5">

                    <div class="calendar-wrapper my-5">
                        <div class="container-calendar">
                            <div id="left">
    
                                <h1>Calendar</h1>
    
                                <div id="event-section">
                                    <h3>Add Event</h3>
                                    <input type="date" id="eventDate">
                                    <input type="time" id="eventTime" placeholder="Event Time">
                                    <input type="text" id="eventTitle" placeholder="Event Title">
                                    <input type="text" id="eventDescription" placeholder="Event Description">
                                    <button id="addEvent" onclick="addEvent()">Add</button>
                                </div>
    
                                <div id="reminder-section">
                                    <h3>Reminders</h3>
                                    <!-- List to display reminders -->
                                    <ul id="reminderList">
                                        <li data-event-id="1">
                                            <strong>Event Title</strong>
                                            - Event Description on Event Date
                                            <button class="delete-event"
                                                onclick="deleteEvent(1)">
                                                Delete
                                            </button>
                                        </li>
                                    </ul>
                                </div>
                            </div>
    
                            <div id="right" class="ms-4">
                                <h3 id="monthAndYear"></h3>
                                <div class="button-container-calendar">
                                    <button id="previous"
                                            onclick="previous()">
                                        ‹
                                    </button>
                                    <button id="next"
                                            onclick="next()">
                                        ›
                                    </button>
                                </div>
                                <table class="table-calendar"
                                    id="calendar"
                                    data-lang="en">
                                    <thead id="thead-month"></thead>
                                    <!-- Table body for displaying the calendar -->
                                    <tbody id="calendar-body"></tbody>
                                </table>
                                <div class="footer-container-calendar">
                                    <label for="month">Jump To: </label>
                                    <!-- Dropdowns to select a specific month and year -->
                                    <select id="month" onchange="jump()">
                                        <option value=0>Jan</option>
                                        <option value=1>Feb</option>
                                        <option value=2>Mar</option>
                                        <option value=3>Apr</option>
                                        <option value=4>May</option>
                                        <option value=5>Jun</option>
                                        <option value=6>Jul</option>
                                        <option value=7>Aug</option>
                                        <option value=8>Sep</option>
                                        <option value=9>Oct</option>
                                        <option value=10>Nov</option>
                                        <option value=11>Dec</option>
                                    </select>
                                    <!-- Dropdown to select a specific year -->
                                    <select id="year" onchange="jump()"></select>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5aa067d06d1afdd090a728cb9bf57c48)): ?>
<?php $attributes = $__attributesOriginal5aa067d06d1afdd090a728cb9bf57c48; ?>
<?php unset($__attributesOriginal5aa067d06d1afdd090a728cb9bf57c48); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5aa067d06d1afdd090a728cb9bf57c48)): ?>
<?php $component = $__componentOriginal5aa067d06d1afdd090a728cb9bf57c48; ?>
<?php unset($__componentOriginal5aa067d06d1afdd090a728cb9bf57c48); ?>
<?php endif; ?><?php /**PATH C:\laragon\www\hr_catalists\resources\views/hrcatalists/admin-ems-cl.blade.php ENDPATH**/ ?>