        <!-- Dashboard Content -->
        <div id="" class="flex-grow-1">
            <div class="container mt-5">
                

                <div class="d-flex justify-content-between align-items-center mt-4">
                    <div>
                        <h2 class="db-h2">EMPLOYEES </h2>
                        
                    </div>

                    <!-- Banner -->
                    
                </div>

                <div class="row mt-4 dashboard-row d-flex justify-content-between align-items-start mt-5">
                
                    <div class="col-md-5">

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
                    <div class="col-md-7 card-size">
                        
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
        <?php /**PATH C:\laragon\www\hr_catalists\resources\views/hrcatalists/ems/partials/ems-dashboard-content.blade.php ENDPATH**/ ?>