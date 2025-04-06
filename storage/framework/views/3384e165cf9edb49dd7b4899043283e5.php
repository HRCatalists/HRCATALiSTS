<!-- Sidebar -->
<div class="shadow" id="sidebar" >
    <ul class="list-unstyled components">
        <li class="d-flex align-items-center pe-5">
            <a href="<?php echo e(route('admin.dashboard')); ?>" class="nav-link px-0 align-middle">
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
            <a href="<?php echo e(route('ats-applicants')); ?>" class="nav-link px-0 align-middle">
                <img src="images/table.png" class="icon" alt="applicant-icon">

                <span class="ms-3 sidebar-effect">APPLICANTS</span> 

                
            </a>

            
        </li>

        <li class="d-flex align-items-center pe-5">   
            <a href="<?php echo e(route('ats-jobs')); ?>" class="nav-link px-0 align-middle">
                <img src="images/cv.png" class="icon" alt="positions-icon">

                <span class="ms-3 sidebar-effect">OPENINGS</span> 
            </a>
        </li>

        <li class="d-flex align-items-center employee pe-5">
                    

            <a href="<?php echo e(route('ems-employees')); ?>" class="nav-link px-0 align-middle">
                <img src="images/employee.png" class="icon" alt="applicant-icon">

                <span class="ms-3 sidebar-effect">EMPLOYEES</span> 
                
                
            </a>

            
            
        </li>

        <li class="d-flex align-items-center ranking pe-5">

            <a href="#ranking" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                <img src="images/rank.png" class="icon" alt="positions-icon">

                <span class="ms-3 sidebar-effect">RANKING</span> 

                <i class="fa-solid fa-chevron-up chevron-icon" id="chevron-arrow"></i>
            </a>

            <ul class="collapse flex-column ms-1" id="ranking" data-bs-parent="#menu">
                <li class="mt-2">
                <a href="<?php echo e(route('ems-ranking')); ?>" class="nav-link px-0"> <span class="sidebar-effect-1">Faculty Ranking</span> </a>
              
                </li>

                <li>
                    <a href="<?php echo e(route('non-ranking')); ?>" class="nav-link px-0"> <span class="sidebar-effect-1">Non-Teaching Ranking</span> </a>
                </li>
            </ul>
        </li>

        <li class="d-flex align-items-center pe-5">
            
            <a href="<?php echo e(route('ems-policy')); ?>" class="nav-link px-0 align-middle">
                <img src="images/faqs.png" class="icon" alt="archived-icon">

                <span class="ms-3 sidebar-effect">COMPANY POLICY</span> 
            </a>
        </li>

        <li class="d-flex align-items-center pe-5">   
            <a href="<?php echo e(route('ats-logs')); ?>" class="nav-link px-0 align-middle">
                <img src="images/log.png" class="icon" alt="positions-icon">

                <span class="ms-3 sidebar-effect">LOGS</span> 
            </a>
        </li>

        

        <li class="d-flex align-items-center pe-5">   
            <a href="<?php echo e(route('manage-users')); ?>" class="fw-bold ms-3 sidebar-effect">
                <!-- <img src="images/cv.png" class="icon" alt="positions-icon"> -->

                <span class="ms-3 sidebar-effect">ADD USER</span> 
            </a>
        </li>
    </ul>

    
</div>
<!-- End of Sidebar --><?php /**PATH C:\Users\raide\OneDrive\Desktop\HRCATALiSTS-hr-catalists\resources\views/components/partials/system/ats/ats-sidebar.blade.php ENDPATH**/ ?>