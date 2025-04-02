<x-admin-ems-layout>
    <x-slot:title>
        Columban College Inc. | ATS Calendar
    </x-slot:title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <div class="d-flex">
        <x-partials.system.ats.ats-sidebar />
    </div>

    <div class="d-flex">
        <div id="content" class="flex-grow-1">
            <div class="container mt-5">
                <div class="d-flex justify-content-center mb-4">
                    <h2 class="db-h2">FACULTY RANKING SYSTEM</h2>   
                </div>

                <!-- Search Section -->
                <div class="container">
                    <div class="search-container">
                        <div class="d-flex">
                            <input type="text" id="searchName" class="form-control me-2" placeholder="Enter Name of Personnel" aria-label="Search by Name">
                            <select id="searchDepartment" class="form-select me-2">
                                <option value="" disabled selected>-Select a Department-</option>
                                <option value="College of Nursing">College of Nursing</option>
                                <option value="College of Computer Studies">College of Computer Studies</option>
                                <!-- Add other departments here -->
                            </select>
                            <button class="btn search-btn" onclick="searchPersonnel()">SEARCH</button>
                        </div>
                    </div>
                </div>

                <!-- Search Results Section (optional, if you want to display a message) -->
                <div class="mt-5" id="search-results"></div>

                <!-- Print Button -->
                <div class="d-flex justify-content-end mb-3">
                    <button class="btn shadow print-btn">
                        <i class="fa fa-print"></i> PRINT
                    </button>
                </div>

                <!-- Employee Name Display -->
                <div class="text-center mt-4 mb-2">
                    <h4 id="selectedEmployeeName" class="fw-bold text-primary"></h4>
                </div>

                <!-- Tab links -->
                <ul class="nav nav-tabs mt-5" id="myTabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="tab1" data-bs-toggle="tab" href="#content1" role="tab">I.</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="tab2" data-bs-toggle="tab" href="#content2" role="tab">II.</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="tab3" data-bs-toggle="tab" href="#content3" role="tab">III.</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="tab4" data-bs-toggle="tab" href="#content4" role="tab">IV.</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="tab5" data-bs-toggle="tab" href="#content5" role="tab">SUMMARY</a>
                    </li>
                </ul>

                <!-- Tab content -->
                <div class="tab-content" id="myTabContent">  
                    <!-- This partial contains the Faculty Rank 1 form -->
                    <x-partials.system.ems.ems-ranking-faculty-1 />
                    <x-partials.system.ems.ems-ranking-faculty-2 />
                    <x-partials.system.ems.ems-ranking-faculty-3 />
                    <x-partials.system.ems.ems-ranking-faculty-4 />
                    <x-partials.system.ems.ems-ranking-faculty-summary />
                </div>
            </div>
        </div>
    </div>
</x-admin-ems-layout>



