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
                    <div class="card checkbox-card me-3" data-table="jobListingsTable">
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

                    <!-- Add Position Button -->
                    <button type="button" class="btn add-btn me-2" data-bs-toggle="modal" data-bs-target="#addPositionModal">
                        ADD POSITION
                    </button>

                    <button id="refreshBtn" class="btn shadow bg-danger-subtle refresh-btn me-3">
                        <i class="fa fa-refresh"></i>
                    </button>                    

                    <button class="btn shadow print-btn ms-auto">
                        <i class="fa fa-print"></i> PRINT
                        <a href=""></a>
                    </button>
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
                                    <div class="dropdown text-center">
                                        <button class="btn btn-primary border-0" type="button" id="actionsDropdown{{ $job->id }}" 
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="fa-solid fa-list"></i> <!-- Bootstrap Icons -->
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="actionsDropdown{{ $job->id }}">
                                            <!-- Activate / Deactivate -->
                                            <li>
                                                <form action="{{ route('jobs.toggle-status', $job->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to {{ $job->status === 'active' ? 'deactivate' : 'activate' }} this job?');">
                                                    @csrf
                                                    <button type="submit" class="dropdown-item">
                                                        {{ $job->status === 'active' ? 'Deactivate' : 'Activate' }}
                                                    </button>
                                                </form>
                                            </li>

                                            <!-- Edit Job (Opens Modal) -->
                                            <li>
                                                <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#editPositionModal-{{ $job->id }}">
                                                    Edit
                                                </a>
                                            </li>

                                            <!-- View Job -->
                                            <li><a class="dropdown-item" href="#">View</a></li>
                                
                                            <!-- Delete Job -->
                                            <li>
                                                <form action="{{ route('job-posts.destroy', $job->id) }}" method="POST" 
                                                      onsubmit="return confirm('Are you sure you want to delete this job?');" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="dropdown-item text-danger">Delete</button>
                                                </form>
                                            </li>
                                        </ul>
                                    </div>
                                
                                    <!-- Edit Position Modal (Moved Outside for Cleaner Code) -->
                                    <div class="modal fade" id="editPositionModal-{{ $job->id }}" tabindex="-1"
                                        aria-labelledby="editPositionModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <form method="POST" action="{{ route('job-posts.update', $job->id) }}">
                                                    @csrf
                                                    @method('PUT')
                                
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">EDIT POSITION</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                
                                                    <div class="modal-body">
                                                        <input type="hidden" name="job_id" value="{{ $job->id }}">
                                
                                                        <div class="row mb-3">
                                                            <div class="col-md-6">
                                                                <label class="form-label">Job Title <span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control" name="job_title"
                                                                    value="{{ $job->job_title }}" required>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label class="form-label">Department <span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control" name="department"
                                                                    value="{{ $job->department }}" required>
                                                            </div>
                                                        </div>
                                
                                                        <div class="row mb-3">
                                                            <div class="col-md-6">
                                                                <label class="form-label">Job Description <span class="text-danger">*</span></label>
                                                                <textarea name="job_description" class="form-control" rows="5" required>{{ $job->job_description }}</textarea>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label class="form-label">Requirements <span class="text-danger">*</span></label>
                                                                <textarea name="requirements" class="form-control" rows="5" required>{{ $job->requirements }}</textarea>
                                                            </div>
                                                        </div>
                                
                                                        <div class="row mb-3">
                                                            <div class="col-md-6">
                                                                <label class="form-label">Tags</label>
                                                                <input type="text" class="form-control" name="tags" value="{{ $job->tags }}">
                                                            </div>
                                                            <div class="col-md-3">
                                                                <label class="form-label">Date Issued <span class="text-danger">*</span></label>
                                                                <input type="date" class="form-control" name="date_issued"
                                                                    value="{{ $job->date_issued }}" required>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <label class="form-label">End Date <span class="text-danger">*</span></label>
                                                                <input type="date" class="form-control" name="end_date"
                                                                    value="{{ $job->end_date }}" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-primary">UPDATE</button>
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">CANCEL</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
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
                                {{-- <input type="text" class="form-control" id="department" name="department" placeholder="Enter Department" required> --}}
                                <select id="department" name="department" class="form-control" required>
                                    <option value="">Select a Department</option>
                                    @foreach ($departments as $department)
                                        <option value="{{ $department->name }}">{{ $department->name }}</option>
                                    @endforeach
                                </select>                                
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="requirements" class="form-label">Job Description <span class="text-danger">*</span></label>
                                <textarea name="job_description" id="description" class="form-control" rows="5" placeholder="Enter each bullet on a new line..." required></textarea>
                                <small class="text-muted">Enter each bullet on a new line. The system will format it as a list.</small>
                            </div>
                            <div class="col-md-6">
                                <label for="duties" class="form-label">Requirements <span class="text-danger">*</span></label>
                                <textarea name="requirements" id="requirements" class="form-control" rows="5" placeholder="Enter each bullet on a new line..." required></textarea>
                                <small class="text-muted">Enter each bullet on a new line. The system will format it as a list.</small>
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
    {{-- <div class="modal fade" id="editPositionModal-{{ $job->id }}" tabindex="-1"
        aria-labelledby="editPositionModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form method="POST" action="{{ route('job-posts.update', $job->id) }}">
                    @csrf
                    @method('PUT')

                    <div class="modal-header">
                        <h5 class="modal-title">EDIT POSITION</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <input type="hidden" name="job_id" value="{{ $job->id }}">

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Job Title <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="job_title"
                                    value="{{ $job->job_title }}" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Department <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="department"
                                    value="{{ $job->department }}" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Job Description <span class="text-danger">*</span></label>
                                <textarea name="job_description" class="form-control" rows="5" required>{{ $job->job_description }}</textarea>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Requirements <span class="text-danger">*</span></label>
                                <textarea name="requirements" class="form-control" rows="5" required>{{ $job->requirements }}</textarea>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Tags</label>
                                <input type="text" class="form-control" name="tags" value="{{ $job->tags }}">
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">Date Issued <span class="text-danger">*</span></label>
                                <input type="date" class="form-control" name="date_issued"
                                    value="{{ $job->date_issued }}" required>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">End Date <span class="text-danger">*</span></label>
                                <input type="date" class="form-control" name="end_date"
                                    value="{{ $job->end_date }}" required>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">UPDATE</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">CANCEL</button>
                    </div>
                </form>
            </div>
        </div>
    </div> --}}
    <!-- End of Edit -->

    {{-- <div class="modal fade" id="editPositionModal" tabindex="-1" aria-labelledby="editPositionModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editPositionModalLabel">Edit Position</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editPositionForm" action="{{ route('job-posts.update', ['id' => $job->id]) }}" method="PUT">
                        @csrf
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
    </div> --}}

    {{-- Fetches job details --}}
    {{-- <script>
        document.addEventListener("DOMContentLoaded", function () {
            document.querySelectorAll(".edit-job").forEach(button => {
                button.addEventListener("click", function () {
                    let jobId = this.getAttribute("data-id");

                    console.log("Job ID Clicked:", jobId); // ✅ Debugging

                    fetch(`/job-posts/${jobId}/edit`)
                        .then(response => {
                            if (!response.ok) {
                                throw new Error(`HTTP Error! Status: ${response.status}`);
                            }
                            return response.json();
                        })
                        .then(data => {
                            console.log("Received Data:", data); // ✅ Debugging

                            if (data.success) {
                                let job = data.job;

                                document.getElementById("editJobId").value = job.id;
                                document.getElementById("editJobTitle").value = job.job_title;
                                document.getElementById("editDepartment").value = job.department;
                                document.getElementById("description").value = job.job_description;
                                document.getElementById("requirements").value = job.requirements;
                                document.getElementById("editTags").value = job.tags;
                                document.getElementById("editDateIssued").value = job.date_issued;
                                document.getElementById("editEndDate").value = job.end_date;
                            } else {
                                console.error("Error: Invalid job data");
                            }
                        })
                        .catch(error => {
                            console.error("Fetch Error:", error);
                        });
                });
            });
        });
    </script> --}}
           

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

    
    {{-- Update Expired Jobs Status --}}
    <script>
        document.getElementById("refreshBtn").addEventListener("click", function() {
            Swal.fire({
                title: "Are you sure?",
                text: "This will update all expired jobs to inactive status!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, update them!"
            }).then((result) => {
                if (result.isConfirmed) {
                    fetch("/update-expired-jobs", {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content")
                        },
                        body: JSON.stringify({})
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.count > 0) {
                            Swal.fire({
                                title: "Updated!",
                                text: `${data.count} expired job(s) have been updated to inactive.`,
                                icon: "success",
                                timer: 2000,
                                showConfirmButton: false
                            }).then(() => {
                                location.reload(); // Refresh page after success message
                            });
                        } else {
                            Swal.fire({
                                title: "No Updates Needed",
                                text: "There are no expired jobs to update.",
                                icon: "info",
                                timer: 2000,
                                showConfirmButton: false
                            });
                        }
                    })
                    .catch(error => {
                        Swal.fire({
                            title: "Error!",
                            text: "Something went wrong. Please try again.",
                            icon: "error"
                        });
                        console.error("Error:", error);
                    });
                }
            });
        });
    </script>
    {{-- Update Expired Jobs Status --}}

</x-admin-ats-layout>
