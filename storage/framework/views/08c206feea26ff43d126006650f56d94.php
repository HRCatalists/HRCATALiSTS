<!-- Sidebar -->
<div class="shadow" id="sidebar" >
    <ul class="list-unstyled components">
        <li class="d-flex align-items-center pe-5">
            <a href="<?php echo e(route('ats-dashboard')); ?>" class="nav-link px-0 align-middle">
                <img src="images/dashboard.png" class="icon" alt="dashboard-icon">

                <span class="ms-3 sidebar-effect">DASHBOARD</span> 
            </a> 
        </li>

        <li class="d-flex align-items-center pe-5">   
            <a href="<?php echo e(route('ats-calendar')); ?>" class="nav-link px-0 align-middle">
                <img src="images/calendar.png" class="icon" alt="calendar-icon">

                <span class="ms-3 sidebar-effect">CALENDAR</span> 
            </a>
        </li>

        <li class="d-flex align-items-center ranking pe-5">   
            <a href="#applicants" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                <img src="images/table.png" class="icon" alt="applicant-icon">

                <span class="ms-3 sidebar-effect">APPLICANTS</span> 

                <i class="fa-solid fa-chevron-up chevron-icon" id="chevron-arrow"></i>
            </a>

            <ul class="collapse flex-column ms-1" id="applicants" data-bs-parent="#menu">
                <li class="mt-2">
                    <a href="<?php echo e(route('ats-applicants')); ?>" class="nav-link px-0"> <span class="sidebar-effect">Applicant List</span> </a>
                </li>

                <li>
                    <a href="<?php echo e(route('ats-screening')); ?>" class="nav-link px-0"> <span class="sidebar-effect">Screening</span> </a>
                </li>

                <li>
                    <a href="<?php echo e(route('ats-interview')); ?>" class="nav-link px-0"> <span class="sidebar-effect">Interview</span> </a>
                </li>

                <li class="d-flex align-items-center pe-5">   
                    <a href="<?php echo e(route('ats-archived')); ?>" class="nav-link px-0 align-middle">
                        <span class="sidebar-effect">Archived</span> 
                    </a>
                </li>
            </ul>
        </li>

        <li class="d-flex align-items-center pe-5">   
            <a href="<?php echo e(route('ats-jobs')); ?>" class="nav-link px-0 align-middle">
                <img src="images/cv.png" class="icon" alt="positions-icon">

                <span class="ms-3 sidebar-effect">OPENINGS</span> 
            </a>
        </li>

        <li class="d-flex align-items-center pe-5">   
            <a href="<?php echo e(route('ats-logs')); ?>" class="nav-link px-0 align-middle">
                <img src="images/log.png" class="icon" alt="positions-icon">

                <span class="ms-3 sidebar-effect">LOGS</span> 
            </a>
        </li>

        <li class="d-flex align-items-center mt-3 pe-5">
            <a href="<?php echo e(route('main-menu')); ?>" class="fw-bold ms-3 sidebar-effect">SWITCH TO EMS</a>
        </li>
    </ul>
</div>
<!-- End of Sidebar --><?php /**PATH C:\laragon\www\hr_catalists\resources\views/components/partials/system/ats/ats-sidebar.blade.php ENDPATH**/ ?>