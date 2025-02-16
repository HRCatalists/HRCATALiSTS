<x-admin-ats-layout>
    <x-slot:title>
        Columban College Inc. | ATS Job Openings
    </x-slot:title>

    <!-- Sidebar & Active Position List -->
    <div class="d-flex">
        <!-- Sidebar -->
        <x-partials.system.ats.ats-sidebar />
        <!-- End of Sidebar -->
    
        <!-- Active Position List -->
        <div id="content" class="flex-grow-1">

            <!-- New Data Table for Job List -->
            <div class="container mt-5">

                <!-- ✅ Flash Messages for changing job status -->
                <div class="container mt-3">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                </div>

                <div class="d-flex justify-content-between align-items-center mt-5 mb-3">
                    <div>
                        <h2 class="dt-h2">Opening List</h2>
                    </div>
                </div>
                
                <div class="d-flex">
                    <div class="card checkbox-card" data-table="jobListingsTable">
                        <div class="container d-flex">
            
                            <!-- Select All Checkbox -->
                            <div class="d-flex me-4 py-3">
                                <input type="checkbox" class="selectAllTable" data-table="jobListingsTable">
                            </div>
                            
                            <!-- Delete Button -->
                            <div class="d-flex py-1">
                                <button type="button" class="btn btn-success btn-sm bulk-activate-btn me-1">ACTIVATE</button>
                                <button class="btn reject-btn btn-sm" style="display: none;">DELETE</button>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-around ms-3">
                        <!-- Add Position Button -->
                        <button type="button" class="btn add-btn me-2" data-bs-toggle="modal" data-bs-target="#addPositionModal">
                            ADD POSITION
                        </button>

                        <button class="btn shadow print-btn">
                            <i class="fa fa-print"></i> PRINT
                            <a href=""></a>
                        </button>
                    </div>
                </div>
                
                <table id="jobListingsTable" class="table table-bordered display mt-3">
                    <thead>
                        <tr>
                            <th></th>
                            <th>JOB TITLE</th>
                            <th>DEPARTMENT</th>
                            <th>STATUS</th>
                            <th>POSTED DATE</th>
                            <th>CLOSING DATE</th>
                            <th>ACTIONS</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($jobPosts as $job)
                            <tr data-id="{{ $job->id }}">
                                <td class="text-center"><input type="checkbox" class="rowCheckbox"></td>
                                <td>{{ $job->job_title }}</td>
                                <td>{{ $job->department }}</td>
                                <td>
                                    @if ($job->status === 'active')
                                        <span class="badge bg-success">Active</span>
                                    @else
                                        <span class="badge bg-danger">Inactive</span>
                                    @endif
                                </td>
                                <td>{{ \Carbon\Carbon::parse($job->date_issued)->format('F d, Y') }}</td>
                                <td>{{ \Carbon\Carbon::parse($job->end_date)->format('F d, Y') }}</td>
                                <td class="px-4">
                                    <div class="d-flex justify-content-between">
                                        <a href="#" class="btn btn-view me-2">VIEW</a>
                                        <button class="btn btn-ap-edit edit-job me-2" data-id="{{ $job->id }}"
                                            data-job_title="{{ $job->job_title }}"
                                            data-department="{{ $job->department }}"
                                            data-job_description="{{ $job->job_description }}"
                                            data-requirements="{{ $job->requirements }}"
                                            data-tags="{{ $job->tags }}"
                                            data-date_issued="{{ $job->date_issued }}"
                                            data-end_date="{{ $job->end_date }}"
                                            data-bs-toggle="modal" data-bs-target="#editPositionModal">
                                            EDIT
                                        </button>
                                        <form
                                            action="{{ route('jobs.toggle-status', $job->id) }}"
                                            method="POST"
                                            style="display:inline;"
                                            onsubmit="return confirm('Are you sure you want to {{ $job->status === 'active' ? 'deactivate' : 'activate' }} this job?');"
                                        >
                                            @csrf
                                            <button type="submit" class="btn {{ $job->status === 'active' ? 'btn-danger' : 'btn-success' }} btn-activate">
                                                {{ $job->status === 'active' ? 'DEACTIVATE' : 'ACTIVATE' }}
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Add Position Modal -->
    {{-- <div class="modal fade" id="addPositionModal" tabindex="-1" aria-labelledby="addPositionModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addPositionModalLabel">Add Position</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">              
                    <form id="addPositionForm" action="{{ route('job-posts.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="jobTitle" class="form-label">Job Title</label>
                            <input type="text" class="form-control" name="job_title" id="jobTitle" required>
                        </div>
                        <div class="mb-3">
                            <label for="department" class="form-label">Department</label>
                            <input type="text" class="form-control" name="department" id="department" required>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Job Description</label>
                            <textarea class="form-control" name="job_description" id="description" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="requirements" class="form-label">Requirements</label>
                            <textarea class="form-control" name="requirements" id="requirements" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="tags" class="form-label">Tags</label>
                            <input type="text" class="form-control" name="tags" id="tags">
                        </div>
                        <div class="mb-3">
                            <label for="dateIssued" class="form-label">Date Issued</label>
                            <input type="date" class="form-control" name="date_issued" id="dateIssued" required>
                        </div>
                        <div class="mb-3">
                            <label for="endDate" class="form-label">End Date</label>
                            <input type="date" class="form-control" name="end_date" id="endDate" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>                                      
                </div>
            </div>
        </div>
    </div> --}}

    <!-- Add Position Modal -->
    <div class="modal fade" id="addPositionModal" tabindex="-1" aria-labelledby="addPositionModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form id="addPositionForm" action="{{ route('job-posts.store') }}" method="POST">
                    @csrf
                    <div class="modal-header text-white" style="background-color: #111D5B;">
                        <h5 class="modal-title" id="addPositionModalLabel">Add New Position</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="jobTitle" class="form-label">Job Title <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="jobTitle" name="job_title" placeholder="Enter Job Title" required>
                            </div>
                            <div class="col-md-6">
                                <label for="department" class="form-label">Department <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="department" name="department" placeholder="Enter Department" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="requirements" class="form-label">Job Description <span class="text-danger">*</span></label>
                                <textarea class="form-control" id="description" name="job_description" rows="4" required placeholder="Enter job description..."></textarea>
                            </div>
                            <div class="col-md-6">
                                <label for="duties" class="form-label">Requirements <span class="text-danger">*</span></label>
                                <textarea class="form-control" id="requirements" name="requirements" rows="4" required placeholder="Enter requirements..."></textarea>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="tags" class="form-label">Tags <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="tags" name="tags" placeholder="Enter tags">
                            </div>
                            <div class="col-md-3">
                                <label for="dateIssued" class="form-label">Date Issued <span class="text-danger">*</span></label>
                                <input type="date" class="form-control" id="dateIssued" name="date_issued" required>
                            </div>
                            <div class="col-md-3">
                                <label for="endDate" class="form-label">End Date <span class="text-danger">*</span></label>
                                <input type="date" class="form-control" id="endDate" name="end_date" required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <button type="button" class="btn btn-cancel" data-bs-dismiss="modal">CANCEL</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End of Add -->

    <!-- Edit Position Modal -->
    <div class="modal fade" id="editPositionModal" tabindex="-1" aria-labelledby="editPositionModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editPositionModalLabel">Edit Position</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editPositionForm" action="{{ route('job-posts.update', ['id' => $job->id]) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="editJobTitle" class="form-label">Job Title</label>
                            <input type="text" class="form-control" name="job_title" id="editJobTitle" value="{{ $job->job_title }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="editDepartment" class="form-label">Department</label>
                            <input type="text" class="form-control" name="department" id="editDepartment" value="{{ $job->department }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="editDescription" class="form-label">Job Description</label>
                            <textarea class="form-control" name="job_description" id="editDescription" required>{{ $job->job_description }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="editRequirements" class="form-label">Requirements</label>
                            <textarea class="form-control" name="requirements" id="editRequirements" required>{{ $job->requirements }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="editTags" class="form-label">Tags</label>
                            <input type="text" class="form-control" name="tags" id="editTags" value="{{ $job->tags }}">
                        </div>
                        <div class="mb-3">
                            <label for="editDateIssued" class="form-label">Date Issued</label>
                            <input type="date" class="form-control" name="date_issued" id="editDateIssued" value="{{ $job->date_issued }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="editEndDate" class="form-label">End Date</label>
                            <input type="date" class="form-control" name="end_date" id="editEndDate" value="{{ $job->end_date }}" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Update Job</button>
                    </form>          
                </div>
            </div>
        </div>
    </div>

    {{-- <script>
        document.addEventListener("DOMContentLoaded", function () {
            // Handle adding a job
            document.querySelector("#addPositionModal .btn-post").addEventListener("click", function () {
                const jobTitle = document.getElementById("jobTitle").value;
                const department = document.getElementById("department").value;
                const jobDescription = document.getElementById("description").value;
                const requirements = document.getElementById("requirements").value;
                const tags = document.getElementById("tags").value;
                const dateIssued = document.getElementById("dateIssued").value;
                const endDate = document.getElementById("endDate").value;

                if (!jobTitle || !department || !jobDescription || !requirements || !dateIssued || !endDate) {
                    alert("Please fill in all required fields.");
                    return;
                }

                fetch("/jobs", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content")
                    },
                    body: JSON.stringify({
                        job_title: jobTitle,
                        department: department,
                        job_description: jobDescription,
                        requirements: requirements,
                        tags: tags,
                        date_issued: dateIssued,
                        end_date: endDate
                    })
                })
                .then(response => response.json())
                .then(data => {
                    alert("Job added successfully!");
                    location.reload();
                })
                .catch(error => console.error("Error:", error));
            });

            // Handle editing a job
            document.querySelectorAll(".edit-job").forEach(button => {
                button.addEventListener("click", function () {
                    const jobId = this.getAttribute("data-id");
                    const jobTitle = this.getAttribute("data-job_title");
                    const department = this.getAttribute("data-department");
                    const jobDescription = this.getAttribute("data-job_description");
                    const requirements = this.getAttribute("data-requirements");
                    const tags = this.getAttribute("data-tags");
                    const dateIssued = this.getAttribute("data-date_issued");
                    const endDate = this.getAttribute("data-end_date");

                    document.getElementById("editJobTitle").value = jobTitle;
                    document.getElementById("editDepartment").value = department;
                    document.getElementById("editDescription").value = jobDescription;
                    document.getElementById("editRequirements").value = requirements;
                    document.getElementById("editTags").value = tags;
                    document.getElementById("editDateIssued").value = dateIssued;
                    document.getElementById("editEndDate").value = endDate;
                    document.querySelector("#editPositionModal .btn-post").setAttribute("data-id", jobId);
                });
            });

            document.querySelector("#editPositionModal .btn-post").addEventListener("click", function () {
                const jobId = this.getAttribute("data-id");
                const jobTitle = document.getElementById("editJobTitle").value;
                const department = document.getElementById("editDepartment").value;
                const jobDescription = document.getElementById("editDescription").value;
                const requirements = document.getElementById("editRequirements").value;
                const tags = document.getElementById("editTags").value;
                const dateIssued = document.getElementById("editDateIssued").value;
                const endDate = document.getElementById("editEndDate").value;

                if (!jobTitle || !department || !jobDescription || !requirements || !dateIssued || !endDate) {
                    alert("Please fill in all required fields.");
                    return;
                }

                fetch(`/jobs/${jobId}`, {
                    method: "PUT",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content")
                    },
                    body: JSON.stringify({
                        job_title: jobTitle,
                        department: department,
                        job_description: jobDescription,
                        requirements: requirements,
                        tags: tags,
                        date_issued: dateIssued,
                        end_date: endDate
                    })
                })
                .then(response => response.json())
                .then(data => {
                    alert("Job updated successfully!");
                    location.reload();
                })
                .catch(error => console.error("Error:", error));
            });
        });
    </script> --}}

</x-admin-ats-layout>
