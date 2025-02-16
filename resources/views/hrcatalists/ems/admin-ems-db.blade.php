<x-admin-ems-layout>

    <x-slot:title>
        Columban College Inc. | EMS Dashboard
    </x-slot:title>

    <!-- Dashboard Content -->
    <div class="d-flex">

        <!-- Sidebar -->
        <x-partials.system.ems.ems-sidebar />
        <!-- End of Sidebar -->
    
        <!-- Dashboard Content -->
        <div id="content" class="flex-grow-1">
            <div class="container mt-5">
                <div class="welcome-text-only">
                    Welcome, {user.name}!
                </div>

                <div class="d-flex justify-content-between align-items-center mt-4">
                    <div>
                        <h2 class="db-h2">DASHBOARD</h2>
                        <h4 class="db-h4 mt-4">Overview</h4>
                    </div>

                    <!-- Banner -->
                    <div class="d-flex banner banner-gradient text-white align-items-center justify-content-center px-4 py-2">
                        <h4 class="banner-text mx-5">Welcome, {user.name}!</h4>
                        <img src="{{ asset('images/db-icon.png') }}" class="banner-icon " alt="banner-icon">
                    </div>
                </div>

                <div class="row mt-4 dashboard-row d-flex justify-content-between align-items-start mt-5">
                
                    <div class="col-md-6">

                        <div class="row">
                        <!-- Employees Card -->
                        <div class="col-md-6">
                            <div class="card emp-card text-center shadow">
                                <div class="card-body emp-card-text">
                                    <div class="d-flex align-items-center justify-content-center mt-4">
                                        <h5 class="card-title m-auto">Employees</h5>
                                        <img src="images/cv-2.png" class="card-icon m-auto" alt="doc-icon">
                                    </div>
                                    <p class="emp-counter text-wrap fw-bold mt-2">234</p>
                                </div>
                            </div>
                        </div>
                        <!-- End Employees Card -->
        
                        <!-- Employee Structure Statistics -->
                        <div class="col-md-6">
                            <div class="card shadow p-4">
        
                            <h6 class="text-secondary">Statistics</h6>
                            <h5 class="card-title db-h5">Employee Structure</h5>
        
                            <div class="position-relative d-flex justify-content-center align-items-center my-2">
                                <div class="progress-circle">
                                <div class="circle">
                                    <span class="circle-text fw-bold">100%</span>
                                </div>
                                </div>
                            </div>
                                
                            <div class="d-flex justify-content-around">
                                <div class="d-flex align-items-center">
                                <span class="dot bg-primary me-2"></span>
                                <span>Male 65%</span>
                                </div>
        
                                <div class="d-flex align-items-center">
                                <span class="dot bg-info me-2"></span>
                                <span>Female 35%</span>
                                </div>
                            </div>
                            </div>
                        </div>
                        <!-- End Employee Structure Statistics -->
                        </div>
        
                        <!-- Dept. Count -->
                        <div class="mt-4">
                        
                        <div class="card shadow p-2">
                            <div class="card-body">
                            <h5 class="card-title mb-4">Employee Count by Department</h5>

                            <div class="mb-2">
                                <div class="department-name">College of Engineering</div>
                                <div class="progress">
                                    <div class="progress-bar eng" style="width: 40%;"></div>
                                </div>
                            </div>
        
                            <div class="mb-2">
                                <div class="department-name">College of Arts & Science and Education</div>
                                <div class="progress">
                                    <div class="progress-bar cased" style="width: 60%;"></div>
                                </div>
                            </div>
        
                            <div class="mb-2">
                                <div class="department-name">College of Business and Accountancy</div>
                                <div class="progress">
                                    <div class="progress-bar cba" style="width: 50%;"></div>
                                </div>
                            </div>
        
                            <div class="mb-2">
                                <div class="department-name">College of Nursing</div>
                                <div class="progress">
                                    <div class="progress-bar nursing" style="width: 70%;"></div>
                                </div>
                            </div>
        
                            <div class="mb-2">
                                <div class="department-name">College of Computer Studies</div>
                                <div class="progress">
                                    <div class="progress-bar ccs" style="width: 80%;"></div>
                                </div>
                            </div>
        
                            <div class="mb-2">
                                <div class="department-name">College of Architecture</div>
                                <div class="progress">
                                    <div class="progress-bar arch" style="width: 35%;"></div>
                                </div>
                            </div>
                            
                            <div class="mb-2">
                                <div class="department-name">College of Basic Education</div>
                                <div class="progress">
                                    <div class="progress-bar arch" style="width: 35%;"></div>
                                </div>
                            </div>

                            </div>
                        </div>
                        </div>
                        <!--  End Dept. Count -->
                    </div>
        
                    <!-- Calendar, Events, & Logs Section -->
                    <div class="col-md-6 card-size">
                        
                        <!-- Calendar -->
                        <div class="card shadow">
                            <div class="card-body">
                                <div class="calendar-container">
                                    <div class="calendar-header d-flex justify-content-between align-items-center">
                                        <button id="prev-month">&lt;</button>
                                        <span id="calendar-header" class="text-center"></span>
                                        <button id="next-month">&gt;</button>
                                    </div>
                                <div id="calendar" class="mb-4"></div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Events -->
                        <div class="card shadow mt-4">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h5 id="event-title" class="fw-bold">Events</h5>
                                    <a href="emp-ems-events.html" class="view-link">See more...</a>
                                </div>
                                <ul id="event-list" class="list-group mt-3">
                                <!-- Dynamic Event Items -->
                                </ul>
                            </div>
                        </div>

                        <!-- Logs -->
                        <div class="card shadow mt-4">
                            <div class="card-body">

                                <div class="d-flex justify-content-between align-items-center">
                                    <h5 class="fw-bold">Recent Activities</h5>
                                    <a href="admin-ats-logs.html" class="view-link">See more...</a>
                                </div>

                                <table class="table table-bordered m-0">
                                    <thead class="small">
                                        <tr>
                                            <th>USER</th>
                                            <th>POSITION</th>
                                            <th>ACTIVITIES</th>
                                            <th>TIME</th>
                                            <th>DATE</th>
                                        </tr>
                                    </thead>

                                    <tbody class="small">
                                        <tr>
                                            <td>Fate Gamboa</td>
                                            <td>Employee</td>
                                            <td>Updated Mobile Number</td>
                                            <td>1:00 p.m.</td>
                                            <td>1/19/2025</td>
                                        </tr>
            
                                        <tr>
                                            <td>Dr. Mora</td>
                                            <td>Super Admin</td>
                                            <td>Deleted Applicant Profile</td>
                                            <td>10:00 a.m.</td>
                                            <td>1/19/2025</td>
                                        </tr>
            
                                        <tr>
                                            <td>Secretary</td>
                                            <td>Admin</td>
                                            <td>Posted a Position</td>
                                            <td>1:00 p.m.</td>
                                            <td>1/11/2025</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
        
                    </div>
                    <!-- End Calendar, Events, & Logs Section -->

                </div>
            </div>
        </div>

    </div>

</x-admin-ems-layout>