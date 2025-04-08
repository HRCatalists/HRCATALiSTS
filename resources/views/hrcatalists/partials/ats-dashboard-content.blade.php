        <!-- Dashboard Content -->
        <div id="" class="flex-grow-1">
            <div class="container">
                {{-- <div class="welcome-text-only">Welcome, {{ auth()->user()->name }}!</div> --}}

                <div class="d-flex justify-content-between align-items-center my-4">
                    <div>
                        <h2 class="db-h2">APPLICANTS</h2>
                        {{-- <h4 class="db-h4 mt-4">Overview</h4> --}}
                    </div>
                </div>

                <div class="row dashboard-row d-flex justify-content-between align-items-start">
                
                    <!-- Cards and Chart Section -->
                    <div class="col-md-5">
                        <div class="row row-cols-1 g-4">
                            {{-- <span class="applicant-header">Applicants</span> --}}
                            <div class="col">
                                <div class="card custom-card new-app-bg text-white">
                                    <div class="card-body d-flex justify-content-between align-items-center">
                                        <div class="d-flex align-items-center ms-4">
                                            <div class="me-3">
                                                <img src="images/applicant.png" class="card-icon m-auto" alt="table-icon">
                                            </div>
                                            <h5 class="card-title">New Applicants</h5>
                                        </div>
                                        <div class="text-end me-4">
                                            <a href="{{ route('ats-applicants') }}" class="view-link d-block">View all</a>
                                            <h2 class="card-number text-white">{{ $applicantsByStatus['pending'] ?? 0 }}</h2>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- Applicants by Status - 3 rows, 2 columns each --}}
                            <div class="container mt-3">
                                <div class="row g-4">
                                    <!-- Row 1 -->
                                    <div class="col-md-6">
                                        <div class="card master-text custom-card">
                                            <div class="card-body d-flex justify-content-between align-items-center">
                                                <h5 class="card-title ms-4">Total</h5>
                                                <div class="text-end me-4">
                                                    <a href="{{ route('ats-applicants') }}" class="view-link">View</a>
                                                    <h2 class="card-number">{{ $totalApplicants ?? 0 }}</h2>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card master-text custom-card">
                                            <div class="card-body d-flex justify-content-between align-items-center">
                                                <h5 class="card-title ms-4">Screening</h5>
                                                <div class="text-end me-4">
                                                    <a href="{{ route('ats-applicants') }}" class="view-link">View</a>
                                                    <h2 class="card-number">{{ $applicantsByStatus['screening'] ?? 0 }}</h2>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Row 2 -->
                                    <div class="col-md-6">
                                        <div class="card master-text custom-card">
                                            <div class="card-body d-flex justify-content-between align-items-center">
                                                <h5 class="card-title ms-4">Scheduled</h5>
                                                <div class="text-end me-4">
                                                    <a href="{{ route('ats-applicants') }}" class="view-link">View</a>
                                                    <h2 class="card-number">{{ $applicantsByStatus['scheduled'] ?? 0 }}</h2>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card master-text custom-card">
                                            <div class="card-body d-flex justify-content-between align-items-center">
                                                <h5 class="card-title ms-4">Evaluation</h5>
                                                <div class="text-end me-4">
                                                    <a href="{{ route('ats-applicants') }}" class="view-link">View</a>
                                                    <h2 class="card-number">{{ $applicantsByStatus['evaluation'] ?? 0 }}</h2>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Row 3 -->
                                    <div class="col-md-6">
                                        <div class="card master-text custom-card">
                                            <div class="card-body d-flex justify-content-between align-items-center">
                                                <h5 class="card-title ms-4">Hired</h5>
                                                <div class="text-end me-4">
                                                    <a href="{{ route('ats-applicants') }}" class="view-link">View</a>
                                                    <h2 class="card-number">{{ $applicantsByStatus['hired'] ?? 0 }}</h2>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card master-text custom-card">
                                            <div class="card-body d-flex justify-content-between align-items-center">
                                                <h5 class="card-title ms-4">Archived</h5>
                                                <div class="text-end me-4">
                                                    <a href="{{ route('ats-applicants') }}" class="view-link">View</a>
                                                    <h2 class="card-number">{{ $applicantsByStatus['archived'] ?? 0 }}</h2>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            {{-- Active Positions --}}
                            <div class="col pt-3">
                                <div class="card active-text custom-card">
                                    <div class="card-body d-flex justify-content-between align-items-center">
                                        <div class="d-flex align-items-center ms-4">
                                            <div class="me-3">
                                                <div class="imageBox">
                                                    <div class="imageInn">
                                                        <img src="images/cv-2.png" class="card-icon m-auto" alt="Default Image">
                                                    </div>
                                                    <div class="hoverImg">
                                                        <img src="images/cv-3.png" class="card-icon m-auto" alt="Profile Image">
                                                    </div>
                                                </div>
                                            </div>
                                            <h5 class="card-title">Job Positions</h5>
                                        </div>
                                        <div class="text-end me-4">
                                            <a href="{{ route('ats-jobs') }}" class="view-link d-block">View all</a>
                                            <h2 class="card-number">{{ $totalJobs ?? 0 }}</h2>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="container mt-3">
                                <div class="row g-4">
                                    <!-- Row 1 -->
                                    <div class="col-md-6">
                                        <div class="card active-text-sub custom-card">
                                            <div class="card-body d-flex justify-content-between align-items-center">
                                                <h5 class="card-title ms-4">Active</h5>
                                                <div class="text-end me-4">
                                                    <a href="{{ route('ats-jobs') }}" class="view-link">View</a>
                                                    <h2 class="card-number">{{ $totalApplicants ?? 0 }}</h2>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card active-text-sub custom-card">
                                            <div class="card-body d-flex justify-content-between align-items-center">
                                                <h5 class="card-title ms-4">Inactive</h5>
                                                <div class="text-end me-4">
                                                    <a href="{{ route('ats-jobs') }}" class="view-link">View</a>
                                                    <h2 class="card-number">{{ $applicantsByStatus['screening'] ?? 0 }}</h2>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Chart Section -->
                        <div class="chart-container mt-5">
                            <canvas id="applicantsChart"></canvas>
                        </div>
                    </div>
                    <!-- End Cards and Chart Section -->

                    <!-- Calendar, Events, & Logs Section -->
                    <div class="col-md-7">

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

                        <!-- Logs -->
                        <div class="card shadow mt-4">
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
                    <!-- End Calendar, Events, & Logs Section -->
                </div>
            </div>
        </div>
