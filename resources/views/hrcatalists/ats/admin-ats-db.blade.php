<x-admin-ats-layout>

    <x-slot:title>
        Columban College Inc. | ATS Dashboard
    </x-slot:title>

    <!-- Dashboard Content -->
    <div class="d-flex">
        <!-- Sidebar -->
        <x-partials.system.ats.ats-sidebar />
        <!-- End of Sidebar -->

        <!-- Dashboard Content -->
        <div id="content" class="flex-grow-1">
            <div class="container mt-5">
                <div class="welcome-text-only">Welcome, {user.name}!</div>

                <div class="d-flex justify-content-between align-items-center mt-4">
                    <div>
                        <h2 class="db-h2">DASHBOARD</h2>
                        <h4 class="db-h4 mt-4">Overview</h4>
                    </div>

                    <!-- Banner -->
                    <div class="d-flex banner banner-gradient text-white align-items-center justify-content-center px-4 py-2">
                        <h4 class="banner-text mx-5">Welcome, {user.name}!</h4>
                        <img src="images/db-icon.png" class="banner-icon " alt="banner-icon">
                    </div>
                </div>

                <div class="row mt-4 dashboard-row d-flex justify-content-between align-items-start mt-5">
                
                    <!-- Cards and Chart Section -->
                    <div class="col-md-6">
                        <div class="row row-cols-1 g-4">
                            <div class="col">
                                <div class="card custom-card new-app-bg text-white">
                                    <div class="card-body d-flex justify-content-between align-items-center">
                                        <div class="d-flex align-items-center ms-4">
                                            <div class="me-3">
                                                <img src="images/applicant.png" class="card-icon m-auto" alt="table-icon">
                                            </div>
                                            <h5 class="card-title">New Applications</h5>
                                        </div>
                                        <div class="text-end me-4">
                                            <h2 class="card-number">4</h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card master-text custom-card">
                                    <div class="card-body d-flex justify-content-between align-items-center">
                                        <div class="d-flex align-items-center ms-4">
                                            <div class="me-3">
                                                <div class="imageBox">
                                                    <div class="imageInn">
                                                        <img src="images/table-2.png" class="card-icon m-auto" alt="Default Image">
                                                    </div>
                                                    <div class="hoverImg">
                                                        <img src="images/table-3.png" class="card-icon m-auto" alt="Profile Image">
                                                    </div>
                                                </div>
                                            </div>
                                            <h5 class="card-title">Master List</h5>
                                        </div>
                                        <div class="text-end me-4">
                                            <a href="admin-ats-master-list.html" class="view-link d-block">View all</a>
                                            <h2 class="card-number">17</h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
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
                                            <h5 class="card-title">Active Positions</h5>
                                        </div>
                                        <div class="text-end me-4">
                                            <a href="admin-ats-act-post.html" class="view-link d-block">View all</a>
                                            <h2 class="card-number">6</h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card arch-text custom-card">
                                    <div class="card-body d-flex justify-content-between align-items-center">
                                        <div class="d-flex align-items-center ms-4">
                                            <div class="me-3">
                                                <div class="imageBox">
                                                    <div class="imageInn">
                                                        <img src="images/archived-2.png" class="card-icon m-auto" alt="Default Image">
                                                    </div>
                                                    <div class="hoverImg">
                                                        <img src="images/archived-3.png" class="card-icon m-auto" alt="Profile Image">
                                                    </div>
                                                </div>
                                            </div>
                                            <h5 class="card-title">Archived Applicants</h5>
                                        </div>
                                        <div class="text-end me-4">
                                            <a href="admin-ats-arch.html" class="view-link d-block">View all</a>
                                            <h2 class="card-number">9</h2>
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
                                            <th>ACTIVITIES</th>
                                            <th>TIME</th>
                                            <th>DATE</th>
                                        </tr>
                                    </thead>

                                    <tbody class="small">
                                        <tr>
                                            <td>Dr. Mora</td>
                                            <td>Updated Applicant Profile</td>
                                            <td>10:00 a.m.</td>
                                            <td>1/19/2025</td>
                                        </tr>
            
                                        <tr>
                                            <td>Dr. Mora</td>
                                            <td>Deleted Applicant Profile</td>
                                            <td>10:00 a.m.</td>
                                            <td>1/19/2025</td>
                                        </tr>
            
                                        <tr>
                                            <td>Secretary</td>
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

</x-admin-ats-layout>
