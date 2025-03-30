<x-admin-ems-layout>
    <x-slot:title>
        Columban College Inc. | ATS Calendar
    </x-slot:title>

    <div class="d-flex">
        <x-partials.system.ats.ats-sidebar />
    </div>

    <div class="d-flex">
        <div id="content" class="flex-grow-1">
            <div class="container mt-5">
                <div class="d-flex justify-content-center mb-4">
                    <h2 class="db-h2">FACULTY RANKING SYSTEM</h2>   
                </div>

                <div class="container">
                    <div class="search-container">
                        <div class="d-flex">
                            <input type="text" id="searchName" class="form-control me-2" placeholder="Enter Name of Personnel" aria-label="Search by Name">
                            <select id="searchDepartment" class="form-select me-2">
                                <option value="" disabled selected>-Select a Department-</option>
                                <option value="engineering">College of Nursing</option>
                            </select>
                            <button class="btn search-btn" onclick="searchPersonnel()">SEARCH</button>
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-end mb-3">
                    <button class="btn shadow print-btn">
                        <i class="fa fa-print"></i> PRINT
                    </button>
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
                    <x-partials.system.ems.ems-ranking-faculty-1 />
                    <x-partials.system.ems.ems-ranking-faculty-2 />
                    <x-partials.system.ems.ems-ranking-faculty-3 />
                    <x-partials.system.ems.ems-ranking-faculty-4 />
                    <x-partials.system.ems.ems-ranking-faculty-summary />
                </div>
            </div>
        </div>
    </div>
    </div>
</div>
</div>
</x-admin-ems-layout>

<script>
   function searchPersonnel() {
    const name = document.getElementById('searchName').value;
    const department = document.getElementById('searchDepartment').value;
    
    // Send AJAX request to the server
    $.ajax({
        url: '{{ route('faculty.search') }}',  // Ensure the correct route is set
        type: 'POST',
        data: {
            _token: '{{ csrf_token() }}',
            name: name,
            department: department
        },
        success: function(response) {
            console.log(response);  // The filtered faculty data returned from the server

            // Update the table or the display area with faculty info
            updateFacultyList(response); // Function to update the UI with search results
        },
        error: function(xhr) {
            console.error("Error occurred: ", xhr);
        }
    });
}

function updateFacultyList(faculties) {
    const facultyContainer = document.getElementById('facultyContainer');
    facultyContainer.innerHTML = '';

    faculties.forEach(faculty => {
        const facultyDiv = document.createElement('div');
        facultyDiv.classList.add('faculty-item');
        facultyDiv.innerHTML = `
            <h5>${faculty.employee.first_name} ${faculty.employee.last_name}</h5>
            <p>Department: ${faculty.employee.department}</p>
            <button class="btn btn-info" onclick="showGrades(${faculty.id})">Show Grades</button>
        `;
        facultyContainer.appendChild(facultyDiv);
    });
}



</script>
