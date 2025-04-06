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
                @if(session('success'))
                    <script>
                        Swal.fire({
                            icon: 'success',
                            title: 'Success!',
                            text: '{{ session('success') }}',
                            timer: 2000,
                            showConfirmButton: false
                        });
                    </script>
                @endif

                @if(session('error'))
                    <script>
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: '{{ session('error') }}',
                            timer: 2500,
                            showConfirmButton: false
                        });
                    </script>
                @endif

                <div class="d-flex justify-content-between align-items-center mt-5 mb-3">
                    <div>
                        <h2 class="dt-h2">Opening List</h2>
                    </div>
                </div>

                <div class="d-flex align-items-center flex-wrap my-3">
                    <div>
                        <button type="button" class="btn btn-success add-btn bulk-activate-btn bulk-action-btn me-2" style="display: none;">ACTIVATE</button>
                        <button type="button" class="btn btn-danger add-btn bulk-deactivate-btn bulk-action-btn me-2" style="display: none;">DEACTIVATE</button>
                        <button type="button" class="btn btn-danger add-btn bulk-delete-btn bulk-action-btn me-2" style="display: none;">DELETE</button>
                    </div>
                
                    <button type="button" class="btn btn-primary add-btn action-btn me-2" data-bs-toggle="modal" data-bs-target="#addPositionModal">
                        ADD POSITION
                    </button>
                    <button id="refreshBtn" class="btn bg-danger-subtle shadow refresh-btn"><i class="fa fa-refresh"></i></button>
                    <button class="btn shadow print-btn ms-auto"><i class="fa fa-print"></i> PRINT</button>
                </div>
                
                <div class="d-flex flex-wrap gap-3 mb-3">
                    <span>Select: </span>
                    <a href="#" class="select-link text-decoration-underline" id="selectAllLink">All</a>
                    <a href="#" class="select-link text-decoration-underline" id="selectActiveLink">Active</a>
                    <a href="#" class="select-link text-decoration-underline" id="selectInactiveLink">Inactive</a>
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
                                <td class="status-column">
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
                                                <button 
                                                    class="dropdown-item {{ $job->status === 'active' ? 'text-warning' : 'text-success' }} toggle-status-btn" 
                                                    data-id="{{ $job->id }}" 
                                                    data-title="{{ $job->job_title }}"
                                                    data-status="{{ $job->status }}"
                                                >
                                                    <i class="fas {{ $job->status === 'active' ? 'fa-toggle-off' : 'fa-toggle-on' }} me-2"></i>
                                                    {{ $job->status === 'active' ? 'Deactivate' : 'Activate' }}
                                                </button>
                                            </li>                                            

                                            <!-- Edit Job (Opens Modal) -->
                                            <li>
                                                <a class="dropdown-item text-primary" href="#" data-bs-toggle="modal" data-bs-target="#editPositionModal-{{ $job->id }}">
                                                    <i class="fas fa-edit me-2"></i>Edit
                                                </a>
                                            </li>

                                            <!-- View Job -->
                                            <li>
                                                <a class="dropdown-item text-info" href="#">
                                                    <i class="fas fa-eye me-2"></i>View
                                                </a>
                                            </li>
                                
                                            <!-- Delete Job -->
                                            <li>
                                                <button 
                                                    class="dropdown-item text-danger delete-job-btn" 
                                                    data-id="{{ $job->id }}" 
                                                    data-title="{{ $job->job_title }}"
                                                >
                                                    <i class="fas fa-trash-alt me-2"></i>Delete
                                                </button>
                                            </li>                                                                                       
                                        </ul>
                                    </div>
                                
                                    <!-- Edit Position Modal -->
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
                                                                <input type="text" class="form-control" name="job_title" value="{{ $job->job_title }}" required>
                                                            </div>
                                                        
                                                            <div class="col-md-6">
                                                                <label class="form-label">Department <span class="text-danger">*</span></label>
                                                                <select name="department" class="form-control department-select" required>
                                                                    <option value="">Select a Department</option>
                                                                    @foreach ($departments as $department)
                                                                        <option value="{{ $department->name }}" {{ $job->department === $department->name ? 'selected' : '' }}>
                                                                            {{ $department->name }}
                                                                        </option>
                                                                    @endforeach
                                                                    <option value="other" {{ !in_array($job->department, $departments->pluck('name')->toArray()) ? 'selected' : '' }}>
                                                                        Other
                                                                    </option>
                                                                </select>
                                                            </div>
                                                            
                                                         
                                                             </div>
                                                        
                                                        <!-- Show this when "Other" is selected -->
                                                        <div class="custom-department-fields card p-3 mb-3 border bg-light shadow-sm {{ !in_array($job->department, $departments->pluck('name')->toArray()) ? '' : 'd-none' }}">
                                                            <h6 class="text-primary fw-bold mb-3">Add New Department</h6>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <label class="form-label">New Department Name</label>
                                                                    <input type="text" class="form-control custom-dept-name" name="other_department_name"
                                                                           value="{{ !in_array($job->department, $departments->pluck('name')->toArray()) ? $job->department : '' }}"
                                                                           placeholder="Enter Department Name">
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label class="form-label">Department Code</label>
                                                                    <input type="text" class="form-control custom-dept-code" name="other_department_code"
                                                                           placeholder="Enter Department Code">
                                                                </div>
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
                                                            <!-- classification -->
                                                            <div class="col-md-6">
                                                                <label for="classification" class="form-label">Classification <span class="text-danger">*</span></label>
                                                                <select name="classification" class="form-control bg-light" required>
                                                                    <option value="Teaching" {{ $job->classification == 'Teaching' ? 'selected' : '' }}>Teaching</option>
                                                                    <option value="Non-teaching" {{ $job->classification == 'Non-teaching' ? 'selected' : '' }}>Non-teaching</option>
                                                                </select>                                                                
                                                            </div>
                                                        </div>

                                                        <div class="row mb-3">
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
                                    <!-- Edit Position Modal -->
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

                            <!-- classification -->
                            <div class="col-md-6">
                                <label for="classification" class="form-label">Classification <span class="text-danger">*</span></label>
                                <select id="classification" name="classification" class="form-control bg-light" required>
                                    <option value="">Select a classification</option>
                                    <option value="Teaching">Teaching</option>
                                        <option value="Non-teaching">Non-teaching</option>
                                </select>
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


    {{-- Adding new job - Toggle input when user wants to add specific department --}}
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
    {{-- Adding new job - Toggle input when user wants to add specific department --}}


    {{-- Editing job - Toggle input when user wants to add specific department --}}
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const allEditModals = document.querySelectorAll('.modal');
    
            allEditModals.forEach(modal => {
                const select = modal.querySelector('.department-select');
                const customFields = modal.querySelector('.custom-department-fields');
                const nameInput = modal.querySelector('.custom-dept-name');
                const codeInput = modal.querySelector('.custom-dept-code');
    
                if (!select || !customFields) return;
    
                function toggleEditDeptFields() {
                    const isOther = select.value === 'other';
                    customFields.classList.toggle('d-none', !isOther);
                    if (nameInput) nameInput.required = isOther;
                    if (codeInput) codeInput.required = isOther;
                }
    
                select.addEventListener('change', toggleEditDeptFields);
                toggleEditDeptFields(); // initialize on load
            });
        });
    </script>
    {{-- Editing job - Toggle input when user wants to add specific department --}}

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // 🛑 Deactivate/Activate Job
            document.querySelectorAll('.toggle-status-btn').forEach(button => {
                button.addEventListener('click', function () {
                    const jobId = this.dataset.id;
                    const jobTitle = this.dataset.title;
                    const isActive = this.dataset.status === 'active';
    
                    Swal.fire({
                        title: isActive ? 'Deactivate Job?' : 'Activate Job?',
                        text: `Are you sure you want to ${isActive ? 'deactivate' : 'activate'} "${jobTitle}"?`,
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: isActive ? 'Yes, deactivate it!' : 'Yes, activate it!',
                        cancelButtonText: 'Cancel',
                    }).then(result => {
                        if (result.isConfirmed) {
                            const form = document.createElement('form');
                            form.method = 'POST';
                            form.action = `/jobs/${jobId}/toggle-status`;
    
                            const csrfInput = document.createElement('input');
                            csrfInput.type = 'hidden';
                            csrfInput.name = '_token';
                            csrfInput.value = '{{ csrf_token() }}';
                            form.appendChild(csrfInput);
    
                            document.body.appendChild(form);
                            form.submit();
                        }
                    });
                });
            });
    
            // 🗑️ Delete Job
            document.querySelectorAll('.delete-job-btn').forEach(button => {
                button.addEventListener('click', function () {
                    const jobId = this.dataset.id;
                    const jobTitle = this.dataset.title;
    
                    Swal.fire({
                        title: 'Delete Job?',
                        text: `This will permanently delete "${jobTitle}".`,
                        icon: 'error',
                        showCancelButton: true,
                        confirmButtonText: 'Yes, delete it!',
                        cancelButtonText: 'Cancel',
                    }).then(result => {
                        if (result.isConfirmed) {
                            const form = document.createElement('form');
                            form.method = 'POST';
                            form.action = `/ats-job-openings/job-posts/${jobId}`;
    
                            const csrf = document.createElement('input');
                            csrf.type = 'hidden';
                            csrf.name = '_token';
                            csrf.value = '{{ csrf_token() }}';
                            form.appendChild(csrf);
    
                            const method = document.createElement('input');
                            method.type = 'hidden';
                            method.name = '_method';
                            method.value = 'DELETE';
                            form.appendChild(method);
    
                            document.body.appendChild(form);
                            form.submit();
                        }
                    });
                });
            });
        });
    </script>

    {{-- Bulk activate/deactivate/delete and multiple selection --}}
    <script>
        $(document).ready(function () {
            $('#jobListingsTable').DataTable({
                paging: true,
                searching: true,
                ordering: true,
                dom: '<"datatable-toolbar d-flex justify-content-between align-items-center my-3"lf>tip',
                pageLength: 10,
                language: {
                    paginate: {
                        previous: 'Previous',
                        next: 'Next',
                    },
                    search: '',
                    searchPlaceholder: 'Search',
                },
                columnDefs: [
                    { targets: 0, orderable: false, className: 'text-center' },
                    { targets: 4, orderable: true, className: 'text-center' },
                    { targets: 5, orderable: false, className: 'text-center' }
                ],
                order: [[2, 'desc']],
            });
        
            // Handle "Select All"
            $(".selectAllTable").on("change", function () {
                $(".rowCheckbox").prop("checked", this.checked).trigger("change");
            });
        
            // When individual checkboxes change
            $(document).on("change", ".rowCheckbox", function () {
                updateActionButtons();
            });
        
            function updateActionButtons() {
                const selectedRows = $(".rowCheckbox:checked").closest("tr");
                const activateBtn = $(".bulk-activate-btn");
                const deactivateBtn = $(".bulk-deactivate-btn");
                const deleteBtn = $(".bulk-delete-btn");
        
                if (selectedRows.length === 0) {
                    activateBtn.hide();
                    deactivateBtn.hide();
                    deleteBtn.hide();
                    return;
                }
        
                // Count how many selected rows are Active or Inactive
                let activeCount = 0;
                let inactiveCount = 0;
        
                selectedRows.each(function () {
                    if ($(this).find(".status-column .bg-success").length) {
                        activeCount++;
                    } else if ($(this).find(".status-column .bg-danger").length) {
                        inactiveCount++;
                    }
                });
        
                // Mixed status = invalid
                if (activeCount > 0 && inactiveCount > 0) {
                    activateBtn.hide();
                    deactivateBtn.hide();
                    deleteBtn.hide();

                    Swal.fire({
                        icon: 'warning',
                        title: 'Mixed Status Selected',
                        text: 'You cannot select both active and inactive jobs at the same time.',
                        confirmButtonText: 'OK'
                    }).then(() => {
                        $(".rowCheckbox").prop("checked", false);
                        $(".selectAllTable").prop("checked", false);
                    });

                    return;
                }
        
                // All active
                if (activeCount > 0 && inactiveCount === 0) {
                    deactivateBtn.show();
                    activateBtn.hide();
                    deleteBtn.show();
                }
        
                // All inactive
                else if (inactiveCount > 0 && activeCount === 0) {
                    activateBtn.show();
                    deactivateBtn.hide();
                    deleteBtn.show();
                }
            }
        
            // Handle ACTIVATE
            $(".bulk-activate-btn").on("click", function () {
                const selectedRows = $(".rowCheckbox:checked").closest("tr");

                if (selectedRows.length === 0) return;

                Swal.fire({
                    title: 'Activate Jobs?',
                    text: `You are about to activate ${selectedRows.length} job(s). Continue?`,
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, activate',
                    cancelButtonText: 'Cancel',
                }).then((result) => {
                    if (result.isConfirmed) {
                        const today = new Date();
                        let failedJobs = [];

                        const requests = selectedRows.map(function () {
                            const row = $(this);
                            const jobId = row.data("id");
                            const jobTitle = row.find("td").eq(1).text().trim();

                            const endDateText = row.find("td").eq(5).text().trim();
                            const endDate = new Date(endDateText);

                            // Mark row visually if expired
                            if (endDate < today) {
                                row.addClass("table-danger expired-row");
                                row.find(".rowCheckbox").prop("checked", false);
                                failedJobs.push(`${jobTitle} (expired on ${endDate.toISOString().split("T")[0]})`);
                                return null;
                            }

                            // Proceed with activation
                            return $.ajax({
                                url: `/jobs/${jobId}/toggle-status`,
                                type: 'POST',
                                data: {
                                    _token: $('meta[name="csrf-token"]').attr("content")
                                },
                                success: function () {
                                    row.find(".status-column").html('<span class="badge bg-success">Active</span>');
                                    row.find(".rowCheckbox").prop("checked", false);
                                },
                                error: function () {
                                    failedJobs.push(jobTitle);
                                }
                            });
                        }).get().filter(Boolean); // Remove nulls

                        Promise.all(requests).then(() => {
                            $(".selectAllTable").prop("checked", false);
                            $(".bulk-activate-btn, .bulk-delete-btn").hide();

                            if (failedJobs.length > 0) {
                                Swal.fire({
                                    icon: 'warning',
                                    title: 'Some Jobs Not Activated',
                                    html: `
                                        <p>The following job(s) could not be activated:</p>
                                        <ul style="text-align: left;">
                                            ${failedJobs.map(job => `<li>${job}</li>`).join('')}
                                        </ul>
                                        <p>Reason: These jobs have expired. Please update their end dates.</p>
                                    `
                                });
                            } else {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Activated',
                                    text: 'Selected job(s) were activated successfully.',
                                    timer: 2000,
                                    showConfirmButton: false
                                });
                            }
                        });
                    }
                });
            });

            // Highlight and disable expired jobs on load
            $(".rowCheckbox").each(function () {
                const row = $(this).closest("tr");
                const endDateText = row.find("td").eq(5).text().trim(); // Adjust if needed
                const endDate = new Date(endDateText);
                const today = new Date();

                if (endDate < today) {
                    row.addClass("table-danger expired-row");
                    $(this).attr("data-expired", "true");
                    $(this).attr("title", "This job has expired. You can delete but not activate.");
                }
            });

            // Handle DEACTIVATE
            $(".bulk-deactivate-btn").on("click", function () {
                const selectedRows = $(".rowCheckbox:checked").closest("tr");

                if (selectedRows.length === 0) return;

                Swal.fire({
                    title: 'Deactivate Jobs?',
                    text: `You are about to deactivate ${selectedRows.length} job(s). Continue?`,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, deactivate',
                    cancelButtonText: 'Cancel',
                }).then((result) => {
                    if (result.isConfirmed) {
                        selectedRows.each(function () {
                            const row = $(this);
                            const jobId = row.data("id");

                            $.ajax({
                                url: `/jobs/${jobId}/toggle-status`,
                                type: 'POST',
                                data: {
                                    _token: $('meta[name="csrf-token"]').attr("content")
                                },
                                success: function () {
                                    row.find(".status-column").html('<span class="badge bg-danger">Inactive</span>');
                                    row.find(".rowCheckbox").prop("checked", false);
                                },
                                error: function (xhr) {
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Deactivation Failed',
                                        text: xhr.responseJSON?.message || "One of the jobs could not be deactivated."
                                    });
                                }
                            });
                        });

                        $(".selectAllTable").prop("checked", false);
                        $(".bulk-deactivate-btn, .bulk-delete-btn").hide();

                        Swal.fire({
                            icon: 'success',
                            title: 'Deactivated',
                            text: 'Selected job(s) were deactivated successfully.',
                            timer: 2000,
                            showConfirmButton: false
                        });
                    }
                });
            });

            // Handle DELETE
            $(".bulk-delete-btn").on("click", function () {
                const selectedRows = $(".rowCheckbox:checked").closest("tr");

                if (selectedRows.length === 0) return;

                Swal.fire({
                    title: 'Delete Jobs?',
                    text: `You are about to delete ${selectedRows.length} job(s). This action cannot be undone.`,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, delete',
                    cancelButtonText: 'Cancel',
                }).then((result) => {
                    if (result.isConfirmed) {
                        let successCount = 0;
                        let failedJobs = [];

                        const deleteRequests = selectedRows.map(function () {
                            const row = $(this);
                            const jobId = row.data("id");
                            const jobTitle = row.find("td").eq(1).text().trim();

                            return $.ajax({
                                url: `/ats-job-openings/job-posts/${jobId}`,
                                type: 'POST',
                                data: {
                                    _method: 'DELETE',
                                    _token: $('meta[name="csrf-token"]').attr("content"),
                                },
                                success: function (response) {
                                    // Laravel redirects, so the "response" is HTML, not JSON
                                    // Look for keywords to detect if Laravel rejected deletion
                                    if (typeof response === 'string' && response.includes("You cannot delete an active job")) {
                                        failedJobs.push(jobTitle);
                                    } else {
                                        row.remove();
                                        successCount++;
                                    }
                                },
                                error: function () {
                                    failedJobs.push(jobTitle);
                                }
                            });
                        }).get();

                        Promise.all(deleteRequests).then(() => {
                            $(".selectAllTable").prop("checked", false);
                            $(".bulk-deactivate-btn, .bulk-activate-btn, .bulk-delete-btn").hide();

                            if (successCount === 0 && failedJobs.length > 0) {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Delete Failed',
                                    html: `
                                        <p>The following job(s) could not be deleted:</p>
                                        <ul style="text-align:left;">
                                            ${failedJobs.map(title => `<li>${title}</li>`).join('')}
                                        </ul>
                                        <p>Active job postings must be <strong>deactivated</strong> before they can be deleted.</p>
                                    `
                                }).then(() => {
                                    location.reload(); // 🔄 Refresh the page after acknowledgment
                                });
                            } else if (failedJobs.length > 0) {
                                Swal.fire({
                                    icon: 'warning',
                                    title: 'Partial Delete Completed',
                                    html: `
                                        <p>${successCount} job(s) deleted successfully.</p>
                                        <p>The following could not be deleted:</p>
                                        <ul style="text-align:left;">
                                            ${failedJobs.map(title => `<li>${title}</li>`).join('')}
                                        </ul>
                                    `
                                });
                            } else {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Delete Completed',
                                    text: `${successCount} job(s) deleted successfully.`,
                                    timer: 2000,
                                    showConfirmButton: false
                                });
                            }
                        });
                    }
                });
            });

            // Track current selection mode: 'all', 'active', 'inactive', or null
            let currentSelection = null;

            // ✅ Toggle "Select All"
            $("#selectAllLink").on("click", function (e) {
                e.preventDefault();

                const isSame = currentSelection === 'all';
                currentSelection = isSame ? null : 'all';

                $(".rowCheckbox").each(function () {
                    $(this).prop("checked", !isSame); // Toggle based on whether we're deselecting
                }).trigger("change");
            });

            // ✅ Toggle "Select Active"
            $("#selectActiveLink").on("click", function (e) {
                e.preventDefault();

                const isSame = currentSelection === 'active';
                currentSelection = isSame ? null : 'active';

                $(".rowCheckbox").each(function () {
                    const row = $(this).closest("tr");
                    const isActive = row.find(".status-column .bg-success").length > 0;
                    $(this).prop("checked", isActive && !isSame);
                }).trigger("change");
            });

            // ✅ Toggle "Select Inactive"
            $("#selectInactiveLink").on("click", function (e) {
                e.preventDefault();

                const isSame = currentSelection === 'inactive';
                currentSelection = isSame ? null : 'inactive';

                $(".rowCheckbox").each(function () {
                    const row = $(this).closest("tr");
                    const isInactive = row.find(".status-column .bg-danger").length > 0;
                    $(this).prop("checked", isInactive && !isSame);
                }).trigger("change");
            });
        });
    </script>
    {{-- Bulk activate/deactivate/delete and multiple selection --}}

</x-admin-ats-layout>
