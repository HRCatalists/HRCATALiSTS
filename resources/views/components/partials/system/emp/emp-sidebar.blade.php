<!-- Sidebar -->
<div class="shadow" id="sidebar" >
    <ul class="list-unstyled components">
        <li class="d-flex align-items-center pe-5">
            <a href="{{ route('admin.dashboard') }}" class="nav-link px-0 align-middle">
                <img src="images/dashboard.png" class="icon" alt="dashboard-icon">

                <span class="ms-3 sidebar-effect">DASHBOARD</span> 
            </a> 
        </li>

        <!-- <li class="d-flex align-items-center pe-5">   
            <a href="{{ route('ats-calendar') }}" class="nav-link px-0 align-middle">
                <img src="images/calendar.png" class="icon" alt="calendar-icon">

                <span class="ms-3 sidebar-effect">CALENDAR</span> 
            </a>
        </li> -->

 

        <li class="d-flex align-items-center ranking pe-5">

            <a href="{{ route('ems-ranking') }}" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                <img src="images/rank.png" class="icon" alt="positions-icon">
                <span class="sidebar-effect-1">RANKING</span> 
            </a>

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

       
    </ul>
</div>
<!-- End of Sidebar -->