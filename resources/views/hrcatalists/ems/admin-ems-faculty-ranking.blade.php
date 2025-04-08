<x-admin-ems-layout>
    <x-slot:title>
        Columban College Inc. | ATS Calendar
    </x-slot:title>

    <!-- ✅ CSRF Token -->
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

                <!-- 🔍 Search Section -->
                <div class="container">
                    <div class="search-container">
                        <div class="d-flex flex-wrap">
                            <input type="text" id="searchFirstName" class="form-control me-2 mb-2" placeholder="First Name">
                            <input type="text" id="searchLastName" class="form-control me-2 mb-2" placeholder="Last Name">
                            <select id="searchDepartment" class="form-select me-2 mb-2">
                                <option value="" disabled selected>-Select a Department-</option>
                                <option value="College of Nursing">College of Nursing</option>
                                <option value="College of Computer Studies">College of Computer Studies</option>
                                <!-- Add more departments as needed -->
                            </select>
                            <button class="btn search-btn mb-2" onclick="searchPersonnel()">SEARCH</button>
                        </div>
                    </div>
                </div>

                <!-- 👤 Selected Person -->
                <div class="mt-3">
                    <h5>Selected Personnel:</h5>
                    <div id="selected-person" class="alert alert-info" style="display: none;"></div>
                </div>

                <!-- 🔎 Search Results -->
                <div class="mt-5" id="search-results"></div>

                <!-- 🖨️ Print Button -->
                <div class="d-flex justify-content-end mb-3">
                    <button class="btn shadow print-btn">
                        <i class="fa fa-print"></i> PRINT
                    </button>
                </div>

                <!-- 👨‍🏫 Employee Name Display -->
                <div class="text-center mt-4 mb-2">
                    <h4 id="selectedEmployeeName" class="fw-bold text-primary"></h4>
                </div>

                <!-- 📑 Tab Links -->
                <ul class="nav nav-tabs mt-5" id="myTabs" role="tablist">
                    <li class="nav-item" role="presentation"><a class="nav-link active" id="tab1" data-bs-toggle="tab" href="#content1" role="tab">I.</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" id="tab2" data-bs-toggle="tab" href="#content2" role="tab">II.</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" id="tab3" data-bs-toggle="tab" href="#content3" role="tab">III.</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" id="tab4" data-bs-toggle="tab" href="#content4" role="tab">IV.</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" id="tab5" data-bs-toggle="tab" href="#content5" role="tab">SUMMARY</a></li>
                </ul>

                <!-- 🧾 Tab Content -->
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

    <!-- 🔎 Search Script -->
    <script>
        window.searchPersonnel = function () {
            const first_name = document.getElementById("searchFirstName").value;
            const last_name = document.getElementById("searchLastName").value;
            const department = document.getElementById("searchDepartment").value;
            const resultsContainer = document.getElementById("search-results");

            resultsContainer.innerHTML = "<p>Searching...</p>";

            const headers = {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content
            };

            const rankFetchers = [
                { rank_type: "rank1", populateFn: populateFacultyForm },
                { rank_type: "rank2", populateFn: populateFacultyFormRank2 },
                { rank_type: "rank3", populateFn: populateFacultyFormRank3 },
                { rank_type: "rank4", populateFn: populateFacultyFormRank4 }
            ];

            rankFetchers.forEach(({ rank_type, populateFn }) => {
                fetch("/search-faculty", {
                    method: "POST",
                    headers,
                    body: JSON.stringify({ first_name, last_name, department, rank_type })
                })
                .then(res => {
                    if (!res.ok) throw new Error(`Server returned ${res.status}`);
                    return res.json();
                })
                .then(data => {
                    const faculty = Array.isArray(data) ? data[0] : null;
                    if (!faculty) return;

                    const emp = faculty.employee || faculty;

                    if (rank_type === "rank1") {
                        document.getElementById("rank1_emp_id").value = emp.emp_id || emp.id;
                        document.getElementById("selectedEmployeeName").textContent = `${emp.first_name} ${emp.last_name} (${emp.department})`;
                    }

                    if (rank_type === "rank2") {
                        const input = document.getElementById("rank2_emp_id");
                        if (input) input.value = emp.id || emp.emp_id;
                    }

                    if (rank_type === "rank3") {
                        const input = document.getElementById("rank3_emp_id");
                        if (input) input.value = emp.id || emp.emp_id;
                    }

                    if (rank_type === "rank4") {
                        const input = document.getElementById("rank4_emp_id");
                        if (input) input.value = emp.id || emp.emp_id;
                    }

                    populateFn(faculty);
                })
                .catch(err => {
                    console.error(`Search failed for ${rank_type}:`, err);
                    resultsContainer.innerHTML = `<p>Error searching for ${rank_type.toUpperCase()}: ${err.message}</p>`;
                });
            });
        };
    </script>
</x-admin-ems-layout>
