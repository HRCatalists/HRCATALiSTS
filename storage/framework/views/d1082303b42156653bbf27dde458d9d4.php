        <!-- Dashboard Content -->
        <div id="" class="flex-grow-1">
            <div class="container">
                

                <div class="d-flex justify-content-between align-items-center my-4">
                    <div>
                        <h2 class="db-h2">APPLICANTS</h2>
                        
                    </div>

                    <!-- Banner -->
                    
                </div>

                <div class="row dashboard-row d-flex justify-content-between align-items-start">
                
                    <!-- Cards and Chart Section -->
                    <div class="col-md-5">
                        <div class="row row-cols-1 g-4">
                            
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
                                            <a href="<?php echo e(route('ats-screening')); ?>" class="view-link d-block">View all</a>
                                            <h2 class="card-number text-white"><?php echo e($applicantsByStatus['pending'] ?? 0); ?></h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                
                            </div>
                            <div class="col-md-6">

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
                                            <a href="<?php echo e(route('ats-applicants')); ?>" class="view-link d-block">View all</a>
                                            <h2 class="card-number"><?php echo e($totalApplicants ?? 0); ?></h2>
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
                                            <a href="<?php echo e(route('ats-jobs')); ?>" class="view-link d-block">View all</a>
                                            <h2 class="card-number"><?php echo e($totalJobs ?? 0); ?></h2>
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
                                            <a href="<?php echo e(route('ats-archived')); ?>" class="view-link d-block">View all</a>
                                            <h2 class="card-number"><?php echo e(($applicantsByStatus['rejected'] ?? 0) + ($applicantsByStatus['archived'] ?? 0)); ?></h2>
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
                                    <a href="<?php echo e(route('ats-calendar')); ?>" class="go-to-calendar mb-4">See more...</a>
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
                                    <a href="<?php echo e(route('ats-logs')); ?>" class="view-link">See more...</a>
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
                                    <?php $__currentLoopData = $logs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $log): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($loop->iteration); ?></td>
                                <td><?php echo e($log->user->name ?? 'Guest'); ?></td>
                                <td><?php echo e($log->activity); ?></td>
                                <td><?php echo e($log->created_at->format('h:i a')); ?></td>
                                <td><?php echo e($log->created_at->format('F d, Y')); ?></td>
                            </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- End Calendar, Events, & Logs Section -->
                </div>
            </div>
        </div>

        <!-- Load Calendar Script -->
        

        
<?php /**PATH C:\laragon\www\hr_catalists\resources\views/hrcatalists/partials/ats-dashboard-content.blade.php ENDPATH**/ ?>