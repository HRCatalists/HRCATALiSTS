<!-- Sidebar -->
<div class="shadow" id="sidebar" >
    <ul class="list-unstyled components">
        <li class="d-flex align-items-center pe-5">
            <a href="{{ route('admin.dashboard') }}" class="nav-link px-0 align-middle">
                <img src="images/dashboard.png" class="icon" alt="dashboard-icon">

                <span class="ms-3 sidebar-effect">DASHBOARD</span> 
            </a> 
        </li>

        <li class="d-flex align-items-center pe-5">   
            <a href="{{ route('ats-calendar') }}" class="nav-link px-0 align-middle">
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
                    <a href="{{ route('ats-applicants') }}" class="nav-link px-0"> <span class="sidebar-effect">Applicant List</span> </a>
                </li>

                <li>
                    <a href="{{ route('ats-pending') }}" class="nav-link px-0"> <span class="sidebar-effect">Pending</span> </a>
                </li>

                <li>
                    <a href="{{ route('applicants.byStatus', 'screening') }}" class="nav-link px-0">
                        <span class="sidebar-effect">Screening</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('ats-scheduled') }}" class="nav-link px-0"> <span class="sidebar-effect">Scheduled</span> </a>
                </li>

                <li>
                    <a href="{{ route('ats-evaluation') }}" class="nav-link px-0"> <span class="sidebar-effect">Evaulation</span> </a>
                </li>

                {{-- <li>
                    <a href="{{ route('ats-hired') }}" class="nav-link px-0"> <span class="sidebar-effect">Hired</span> </a>
                </li> --}}

                <li class="d-flex align-items-center pe-5">   
                    <a href="{{ route('ats-archived') }}" class="nav-link px-0 align-middle"><span class="sidebar-effect">Archived</span></a>
                </li>
            </ul>
        </li>

        <li class="d-flex align-items-center pe-5">   
            <a href="{{ route('ats-jobs') }}" class="nav-link px-0 align-middle">
                <img src="images/cv.png" class="icon" alt="positions-icon">

                <span class="ms-3 sidebar-effect">OPENINGS</span> 
            </a>
        </li>

        <li class="d-flex align-items-center employee pe-5">
                    

            <a href="#employee" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                <img src="images/employee.png" class="icon" alt="applicant-icon">

                <span class="ms-3 sidebar-effect">EMPLOYEES</span> 
                
                <i class="fa-solid fa-chevron-up chevron-icon" id="chevron-arrow"></i>
            </a>

            <ul class="collapse flex-column ms-1" id="employee" data-bs-parent="#menu">
                <li class="mt-2">
                    <a href="{{ route('ems-employees') }}" class="nav-link px-0"> <span class="sidebar-effect">Employee List</span> </a>
                </li>

                <li class="department">
                    <a href="#department" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                        <span class="sidebar-effect">Departments</span>
                        
                        <i class="fa-solid fa-chevron-up chevron-icon ms-5"></i>
                    </a>

                    <ul class="collapse flex-column" id="department" data-bs-parent="#menu">
                        <li>
                            <a href="{{ route('ems-dept-coa') }}" class="nav-link px-0"> <span class="sidebar-effect">College of Architecture</span> </a>
                        </li>
                        <li>
                            <a href="{{ route('ems-dept-cased') }}" class="nav-link px-0"> <span class="sidebar-effect">College of Arts & Science and Education</span> </a>
                        </li>
                        <li>
                            <a href="{{ route('ems-dept-cba') }}" class="nav-link px-0"> <span class="sidebar-effect">College of Business and Accountancy</span> </a>
                        </li>
                        <li>
                            <a href="{{ route('ems-dept-ccs') }}" class="nav-link px-0"> <span class="sidebar-effect">College of Computer Studies</span> </a>
                        </li>
                        <li>
                            <a href="{{ route('ems-dept-coe') }}" class="nav-link px-0"> <span class="sidebar-effect">College of Engineering</span> </a>
                        </li>
                        <li>
                            <a href="{{ route('ems-dept-con') }}" class="nav-link px-0"> <span class="sidebar-effect">College of Nursing</span> </a>
                        </li>
                        <li>
                            <a href="{{ route('ems-dept-basicEd') }}" class="nav-link px-0"> <span class="sidebar-effect">College of Basic Education</span> </a>
                        </li>
                        <li>
                            <a href="{{ route('ems-dept-non-teaching') }}" class="nav-link px-0"> <span class="sidebar-effect">None-Teaching</span> </a>
                        </li>
                    </ul>
                </li>
            </ul>
            
        </li>

        <li class="d-flex align-items-center ranking pe-5">

            <a href="#ranking" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                <img src="images/rank.png" class="icon" alt="positions-icon">

                <span class="ms-3 sidebar-effect">RANKING</span> 

                <i class="fa-solid fa-chevron-up chevron-icon" id="chevron-arrow"></i>
            </a>

            <ul class="collapse flex-column ms-1" id="ranking" data-bs-parent="#menu">
                <li class="mt-2">
                <a href="{{ route('ems-ranking') }}" class="nav-link px-0"> <span class="sidebar-effect-1">Faculty Ranking</span> </a>
              
                </li>

                <li>
                    <a href="{{ route('non-ranking') }}" class="nav-link px-0"> <span class="sidebar-effect-1">Non-Teaching Ranking</span> </a>
                </li>
            </ul>
        </li>

        <li class="d-flex align-items-center pe-5">
            
            <a href="{{ route('ems-policy') }}" class="nav-link px-0 align-middle">
                <img src="images/faqs.png" class="icon" alt="archived-icon">

                <span class="ms-3 sidebar-effect">COMPANY POLICY</span> 
            </a>
        </li>

        <li class="d-flex align-items-center pe-5">   
            <a href="{{ route('ats-logs') }}" class="nav-link px-0 align-middle">
                <img src="images/log.png" class="icon" alt="positions-icon">

                <span class="ms-3 sidebar-effect">LOGS</span> 
            </a>
        </li>

        {{-- <li class="d-flex align-items-center mt-3 pe-5">
            <a href="{{ route('main-menu') }}" class="fw-bold ms-3 sidebar-effect">SWITCH TO EMS</a>
        </li> --}}
    </ul>
</div>
<!-- End of Sidebar -->