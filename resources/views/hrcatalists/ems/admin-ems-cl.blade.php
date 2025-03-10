<x-admin-ems-layout>

    <x-slot:title>
        Columban College Inc. | Calendar
    </x-slot:title>

        <!-- Calendar Content -->
        <div class="d-flex">

            <!-- Sidebar -->
            <x-partials.system.ems.ems-sidebar />
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

</x-admin-ems-layout>