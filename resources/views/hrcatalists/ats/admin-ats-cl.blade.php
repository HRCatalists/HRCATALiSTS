<x-admin-ats-layout>
    <x-slot:title>
        Columban College Inc. | ATS Calendar
    </x-slot:title>

    <!-- Sidebar & Calendar -->
    <div class="d-flex">
        <!-- Sidebar -->
        <x-partials.system.ats.ats-sidebar />
        <!-- End of Sidebar -->
    
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
                
                <!-- Calendar -->
                <div class="calendar-wrapper mt-5">
                    <div class="container-calendar">
                        <div id="left">
                            <h1>Calendar</h1>
                            
                            <div id="event-section">
                                <h3>Add Event</h3>
                                <form action="{{ route('events.store') }}" method="POST">
                                    @csrf
                                    <input type="date" name="event_date" required>
                                    <input type="time" name="event_time" required>
                                    <input type="text" name="title" placeholder="Event Title" required>
                                    <input type="text" name="description" placeholder="Event Description" required>
                                    <button type="submit">Add</button>
                                </form>
                            </div>
                            
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

                        <div id="right" class="ms-4">
                            <h3 id="monthAndYear"></h3>
                            <div class="button-container-calendar">
                                <button id="previous" onclick="previous()">‹</button>
                                <button id="next" onclick="next()">›</button>
                            </div>
                            <table class="table-calendar" id="calendar" data-lang="en">
                                <thead id="thead-month"></thead>
                                <tbody id="calendar-body"></tbody>
                            </table>
                            <div class="footer-container-calendar">
                                <label for="month">Jump To: </label>
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
                                <select id="year" onchange="jump()"></select>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End of Calendar -->
            </div>
        </div>
    </div>
</x-admin-ats-layout>
