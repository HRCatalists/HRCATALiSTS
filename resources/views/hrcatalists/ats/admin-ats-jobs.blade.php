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
                    {{-- <div class="modal-body">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="jobTitle" class="form-label">Job Title <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="jobTitle" name="job_title" placeholder="Enter Job Title" required>
                            </div>
                            <div class="col-md-6">
                                <label for="jobform_department" class="form-label">Department <span class="text-danger">*</span></label>
                                <!-- Department Dropdown -->
                                <select id="jobform_department" name="department" class="form-control" required>
                                    <option value="">Select a Department</option>
                                    @foreach ($departments as $department)
                                        <option value="{{ $department->name }}">{{ $department->name }}</option>
                                    @endforeach
                                    <option value="other">Other</option>
                                </select>
                                
                                <!-- Hidden fields -->
                                <div id="jobform_customDepartmentFields" class="mt-2 d-none">
                                    <label for="jobform_other_department_name" class="form-label mt-2">New Department Name</label>
                                    <input type="text" class="form-control mb-2" id="jobform_other_department_name" name="other_department_name" placeholder="Enter Department Name">
                                
                                    <label for="jobform_other_department_code" class="form-label">Department Code</label>
                                    <input type="text" class="form-control" id="jobform_other_department_code" name="other_department_code" placeholder="Enter Department Code">
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="requirements" class="form-label">Job Description <span class="text-danger">*</span></label>
                                <textarea name="job_description" id="description" class="form-control" rows="10" placeholder="Enter each bullet on a new line..." required></textarea>
                                <small class="text-muted">Enter each bullet on a new line. The system will format it as a list.</small>
                            </div>
                            <div class="col-md-6">
                                <label for="duties" class="form-label">Requirements <span class="text-danger">*</span></label>
                                <textarea name="requirements" id="requirements" class="form-control" rows="10" placeholder="Enter each bullet on a new line..." required></textarea>
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
                    </div> --}}
                    <div class="modal-body">
                        <div class="row g-3">
                            <!-- Job Title -->
                            <div class="col-md-6">
                                <label for="jobTitle" class="form-label">Job Title <span class="text-danger">*</span></label>
                                <input type="text" class="form-control bg-light" id="jobTitle" name="job_title" placeholder="Enter Job Title" required>
                            </div>
                    
                            <!-- Department -->
                            <div class="col-md-6">
                                <label for="jobform_department" class="form-label">Department <span class="text-danger">*</span></label>
                                <select id="jobform_department" name="department" class="form-control bg-light" required>
                                    <option value="">Select a Department</option>
                                    @foreach ($departments as $department)
                                        <option value="{{ $department->name }}">{{ $department->name }}</option>
                                    @endforeach
                                    <option value="other">Other</option>
                                </select>
                            </div>
                    
                            <!-- Custom Department Fields -->
                            <div id="jobform_customDepartmentFields" class="col-md-12 border rounded p-3 d-none bg-light">
                                <h6 class="text-primary">Add New Department</h6>
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label for="jobform_other_department_name" class="form-label">New Department Name</label>
                                        <input type="text" class="form-control" id="jobform_other_department_name" name="other_department_name" placeholder="Enter Department Name">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="jobform_other_department_code" class="form-label">Department Code</label>
                                        <input type="text" class="form-control" id="jobform_other_department_code" name="other_department_code" placeholder="Enter Department Code">
                                    </div>
                                </div>
                            </div>
                    
                            <!-- Job Description -->
                            <div class="col-md-6">
                                <label for="description" class="form-label">Job Description <span class="text-danger">*</span></label>
                                <textarea name="job_description" id="description" class="form-control" rows="8" placeholder="Each bullet on a new line..." required></textarea>
                                <small class="text-muted">Each bullet on a new line. Will format as list.</small>
                            </div>
                    
                            <!-- Requirements -->
                            <div class="col-md-6">
                                <label for="requirements" class="form-label">Requirements <span class="text-danger">*</span></label>
                                <textarea name="requirements" id="requirements" class="form-control" rows="8" placeholder="Each bullet on a new line..." required></textarea>
                                <small class="text-muted">Each bullet on a new line. Will format as list.</small>
                            </div>
                    
                            <!-- Tags -->
                            <div class="col-md-6">
                                <label for="tags" class="form-label">Tags <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="tags" name="tags" placeholder="Enter tags">
                            </div>
                    
                            <!-- Date Issued -->
                            <div class="col-md-3">
                                <label for="dateIssued" class="form-label">Date Issued <span class="text-danger">*</span></label>
                                <input type="date" class="form-control" id="dateIssued" name="date_issued" required>
                            </div>
                    
                            <!-- End Date -->
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
    <!-- Add Position Modal -->

    
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


    {{-- Toggle input when user wants to add specific department --}}
    {{-- <script>
        document.addEventListener("DOMContentLoaded", function () {
            const departmentSelect = document.getElementById("department");
            const customFields = document.getElementById("customDepartmentFields");
            const nameInput = document.getElementById("other_department_name");
            const codeInput = document.getElementById("other_department_code");
        
            // Safety check
            if (!departmentSelect || !customFields) {
                console.warn("Department dropdown or custom fields not found.");
                return;
            }
        
            // Core function
            function toggleDepartmentFields() {
                const isOther = departmentSelect.value === "other";
                customFields.classList.toggle("d-none", !isOther);
                nameInput.required = isOther;
                codeInput.required = isOther;
            }
        
            // Initialize on load
            toggleDepartmentFields();
        
            // Trigger on every change
            departmentSelect.addEventListener("change", toggleDepartmentFields);
        });
    </script> --}}
    {{-- Toggle input when user wants to add specific department --}}
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const select = document.getElementById("jobform_department");
            const customFields = document.getElementById("jobform_customDepartmentFields");
            const nameInput = document.getElementById("jobform_other_department_name");
            const codeInput = document.getElementById("jobform_other_department_code");
        
            if (!select || !customFields) return;
        
            function toggleCustomFields() {
                const show = select.value === "other";
                customFields.classList.toggle("d-none", !show);
                nameInput.required = show;
                codeInput.required = show;
                console.log("Job Form Dept Changed:", select.value);
            }
        
            toggleCustomFields(); // Run on load
            select.addEventListener("change", toggleCustomFields);
        });
    </script>

</x-admin-ats-layout>
