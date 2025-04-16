        <!-- Dashboard Content -->
        <div id="" class="flex-grow-1">
            <div class="container">
                <div class="row dashboard-row d-flex justify-content-between align-items-start">
                    <div class="container my-5">
                        <h3 class="mb-4 fw-bold text-primary">Applicants</h3>

                        {{-- 1st row: incomplete requirements & today/upcoming events --}}
                        <div class="row g-4 mb-4">

                            {{-- Incomplete Requirements --}}
                            <div class="col-md-5">
                                <div class="card border-warning shadow-sm h-100">
                                    <div class="card-body">
                                        <h5 class="text-warning fw-bold mb-2">
                                            Applicants with Incomplete Requirements
                                        </h5>
                        
                                        <div class="d-flex justify-content-between align-items-center mb-2">
                                            <span class="fs-4 fw-semibold text-dark">{{ $incompleteApplicants->count() }}</span>
                                            <a href="{{ route('ats-applicants') }}" class="btn btn-sm btn-outline-warning">Manage Applicants</a>
                                        </div>
                        
                                        @if($incompleteApplicants->isNotEmpty())
                                            <button class="btn btn-sm btn-outline-secondary mb-3 d-flex align-items-center gap-2 toggle-btn"
                                                data-bs-toggle="collapse" 
                                                data-bs-target="#incompleteApplicantsList"
                                                data-target="#incompleteApplicantsList">
                                                <span>View Applicants</span>
                                                <i class="fas fa-chevron-down rotate-icon"></i>
                                            </button>
                        
                                            <div class="collapse" id="incompleteApplicantsList">
                                                <ul class="mb-0 small">
                                                    @foreach($incompleteApplicants as $applicant)
                                                        <li>{{ $applicant->first_name }} {{ $applicant->last_name }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @else
                                            <p class="text-muted">All applicants have submitted their requirements.</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        
                            {{-- Upcoming Events --}}
                            <div class="col-md-7">
                                <div class="card border-info shadow-sm h-100">
                                    <div class="card-body">
                                        <h5 class="text-info fw-bold mb-2">
                                            Upcoming Interviews & Events
                                        </h5>
                        
                                        <div class="d-flex justify-content-between align-items-center mb-2">
                                            <span class="fs-4 fw-semibold text-dark">{{ $upcomingEvents->count() }}</span>
                                            <a href="{{ route('ats-calendar') }}" class="btn btn-sm btn-outline-info">Go to Calendar</a>
                                        </div>
                        
                                        @if($upcomingEvents->isNotEmpty())
                                            <button class="btn btn-sm btn-outline-secondary mb-3 d-flex align-items-center gap-2 toggle-btn"
                                                data-bs-toggle="collapse" 
                                                data-bs-target="#upcomingEventsList"
                                                data-target="#upcomingEventsList">
                                                <span>View Events</span>
                                                <i class="fas fa-chevron-down rotate-icon"></i>
                                            </button>
                        
                                            <div class="collapse" id="upcomingEventsList">
                                                <ul class="mb-0 small">
                                                    @foreach($upcomingEvents as $event)
                                                        <li class="mb-2">
                                                            <div class="fw-bold">{{ $event->title }}</div>
                                                            <div class="text-muted">{{ $event->description }}</div>
                                                            <div class="small">
                                                                {{ \Carbon\Carbon::parse($event->event_date)->format('M d, Y') }} 
                                                                at {{ \Carbon\Carbon::parse($event->event_time)->format('h:i A') }}
                                                            </div>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @else
                                            <p class="text-muted">No upcoming events scheduled.</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                                            
                
                        <div class="row g-4">
                            @php
                            $cards = [
                                ['label' => 'Applications Received', 'key' => 'total', 'count' => $applicationsReceived ?? 0, 'icon' => 'fa-file-alt'],
                                ['label' => 'Active Applicants', 'key' => 'active', 'count' => $activeApplicantsCount ?? 0, 'icon' => 'fa-users'],
                                ['label' => 'New Applicants', 'key' => 'pending', 'count' => $applicantsByStatus['pending'] ?? 0, 'icon' => 'fa-user-plus'],
                                ['label' => 'Screening', 'key' => 'screening', 'count' => $applicantsByStatus['screening'] ?? 0, 'icon' => 'fa-search'],
                                ['label' => 'Scheduled', 'key' => 'scheduled', 'count' => $applicantsByStatus['scheduled'] ?? 0, 'icon' => 'fa-calendar-check'],
                                ['label' => 'Evaluation', 'key' => 'evaluation', 'count' => $applicantsByStatus['evaluation'] ?? 0, 'icon' => 'fa-clipboard-check'],
                                ['label' => 'Hired', 'key' => 'hired', 'count' => $applicantsByStatus['hired'] ?? 0, 'icon' => 'fa-user-check'],
                                ['label' => 'Archived', 'key' => 'archived', 'count' => $applicantsByStatus['archived'] ?? 0, 'icon' => 'fa-archive'],
                            ];
                        
                            $statusColors = [
                                'total' => '#6a11cb',       // Applications Received - deep purple
                                'active' => '#43cea2',      // Active Applicants - teal/green

                                // DO NOT CHANGE THESE COLORS 👇
                                'pending' => '#555555',     // New Applicants - dark gray
                                'screening' => '#ffe135',   // Screening - banana yellow
                                'scheduled' => '#ff8c00',   // Scheduled - orange
                                'interviewed' => '#ff8c00', // Interviewed - same as scheduled
                                'evaluation' => '#007bff',  // Evaluation - primary blue
                                'hired' => '#4CAF50',       // Hired - green
                                'rejected' => '#8b0000',    // Rejected - dark red
                                'archived' => '#4b0082',    // Archived - deep purple
                            ];
                        @endphp
                        
                        @foreach($cards as $card)
                            @php
                                $hexColor = $statusColors[$card['key']] ?? '#000';
                            @endphp
                            <div class="col-md-3">
                                <div class="card shadow-sm border-0 h-100">
                                    <div class="card-body d-flex align-items-center justify-content-between">
                                        <div>
                                            <h6 class="fw-semibold text-uppercase" style="color: {{ $hexColor }};">{{ $card['label'] }}</h6>
                                            <h2 class="fw-bold text-dark">{{ $card['count'] }}</h2>
                                            <!-- <a href="{{ route('ats-applicants') }}" class="btn btn-sm btn-outline-primary mt-2">View</a> -->
                                            <a href="{{ route('ats-applicants', ['status' => $card['key']]) }}" class="btn btn-sm btn-outline-primary mt-2">View</a>
                                        </div>
                                        <i class="fas {{ $card['icon'] }} fa-2x" style="color: {{ $hexColor }};"></i>
                                    </div>
                                </div>
                            </div>
                        @endforeach                            
                        </div>
                    </div>

                    <div class="container mt-4">
                        {{-- Row 1: Event Calendar (Full Width) --}}
                        <div class="row mb-4">
                            <div class="col-12">
                                <!-- Calendar -->
                                <div class="card shadow">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h5 class="card-title mb-4">Event Calendar and Important Dates</h5>
                                            <a href="{{ route('ats-calendar') }}" class="go-to-calendar mb-4">See more...</a>
                                        </div>
                                        <div class="calendar-container">
                                            <div class="calendar-header d-flex justify-content-between align-items-center">
                                                <button id="prev-month">&lt;</button>
                                                <span id="calendar-header" class="text-center"></span>
                                                <button id="next-month">&gt;</button>
                                            </div>
                                            <div id="ats-calendar" class="mb-4"></div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Event Modal -->
                                <div class="modal fade" id="eventModal" tabindex="-1" aria-labelledby="eventModalTitle" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="eventModalTitle">Event Details</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body" id="eventModalBody">
                                                <!-- Events will be loaded dynamically here -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                        {{-- Row 2: Job Positions + Logs --}}
                        <div class="row g-4">
                            {{-- Left Column: Job Positions --}}
                            <div class="col-md-5">
                                <div class="row row-cols-1 g-4">
                                    {{-- Total Job Positions --}}
                                    <div class="col">
                                        <div class="card active-text-sub custom-card h-100">
                                            <div class="card-body d-flex justify-content-between align-items-center">
                                                <div class="d-flex align-items-center ms-4">
                                                    <div class="me-3">
                                                        <i class="fas fa-briefcase fa-2x text-success"></i>
                                                    </div>
                                                    <h5 class="card-title mb-0">Job Positions</h5>
                                                </div>
                                                <div class="text-end me-4">
                                                    <a href="{{ route('ats-jobs') }}" class="view-link d-block">View</a>
                                                    <h2 class="card-number">{{ $totalJobs ?? 0 }}</h2>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                    
                                    {{-- Active Job Positions --}}
                                    <div class="col">
                                        <div class="card active-text-sub custom-card h-100">
                                            <div class="card-body d-flex justify-content-between align-items-center">
                                                <div class="d-flex align-items-center ms-4">
                                                    <div class="me-3">
                                                        <i class="fas fa-check-circle fa-2x text-success"></i>
                                                    </div>
                                                    <h5 class="card-title mb-0">Active Jobs</h5>
                                                </div>
                                                <div class="text-end me-4">
                                                    <a href="{{ route('ats-jobs', ['status' => 'active']) }}" class="view-link d-block">View</a>
                                                    <h2 class="card-number">{{ $activeJobsCount ?? 0 }}</h2>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                    
                                    {{-- Inactive Job Positions --}}
                                    <div class="col">
                                        <div class="card active-text-sub custom-card h-100">
                                            <div class="card-body d-flex justify-content-between align-items-center">
                                                <div class="d-flex align-items-center ms-4">
                                                    <div class="me-3">
                                                        <i class="fas fa-pause-circle fa-2x text-secondary"></i>
                                                    </div>
                                                    <h5 class="card-title mb-0">Inactive Jobs</h5>
                                                </div>
                                                <div class="text-end me-4">
                                                    <a href="{{ route('ats-jobs', ['status' => 'inactive']) }}" class="view-link d-block">View</a>
                                                    <h2 class="card-number">{{ $inactiveJobsCount ?? 0 }}</h2>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>                               
                            </div>
                    
                            {{-- Right Column: Logs --}}
                            <div class="col-md-7">
                                <div class="card shadow h-100">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h5 class="fw-bold">Recent Activities</h5>
                                            <a href="{{ route('ats-logs') }}" class="view-link">See more...</a>
                                        </div>
                                        <table class="table table-bordered m-0">
                                            <thead class="small">
                                                <tr>
                                                    <th>NO</th>
                                                    <th>USER</th>
                                                    <th>ACTIVITIES</th>
                                                    <th>TIME</th>
                                                    <th>DATE</th>
                                                </tr>
                                            </thead>
                                            <tbody class="small">
                                                @foreach($logs as $log)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $log->user->name ?? 'Guest' }}</td>
                                                        <td>{{ $log->activity }}</td>
                                                        <td>{{ $log->created_at->format('h:i a') }}</td>
                                                        <td>{{ $log->created_at->format('F d, Y') }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Chart Section -->
                    {{-- <div class="chart-container mt-5">
                        <canvas id="applicantsChart"></canvas>
                    </div> --}}

                </div>
            </div>
        </div>
