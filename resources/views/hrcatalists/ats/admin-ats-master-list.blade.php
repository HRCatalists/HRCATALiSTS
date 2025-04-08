<x-admin-ats-layout>

    <x-slot:title>
        Columban College Inc. | ATS Applicants
    </x-slot:title>

    <!-- Sidebar & Master List -->
    <div class="d-flex">
        <!-- Sidebar -->
        <x-partials.system.ats.ats-sidebar />
        <!-- End of Sidebar -->
    
        <!-- Master List -->
        <div id="content" class="flex-grow-1">
            <div class="container mt-5">
                
                <div class="d-flex justify-content-between align-items-center my-5">
                    <div>
                        <h2 class="dt-h2">Applicant List</h2>
                    </div>     
                </div>

                <div class="d-flex align-items-center flex-wrap my-3">
                    <div>
                        <button type="button" class="btn archive-btn add-btn bulk-archive-btn bulk-action-btn me-2" style="display: none;">
                            ARCHIVE
                        </button>
                        <button type="button" class="btn reject-btn add-btn bulk-reject-btn bulk-action-btn me-2" style="display: none;">
                            REJECT
                        </button>
                    </div>
                
                    <button type="button" class="btn btn-primary add-btn action-btn me-2" data-bs-toggle="modal" data-bs-target="#addApplicantModal">
                        ADD APPLICANT
                    </button>
                
                    <button type="button" class="btn shadow print-btn ms-auto">
                        <i class="fas fa-print me-2"></i> Print
                    </button>              
                </div>
                
                <!-- Status Tabs -->
                @php
                    $statuses = ['all', 'pending', 'screening', 'scheduled', 'evaluation', 'hired', 'archived'];
                    // $statuses = ['all', 'pending', 'screening', 'scheduled', 'evaluation', 'hired', 'rejected', 'archived'];
                @endphp

                <ul class="nav nav-tabs mt-4" id="statusTabs" role="tablist">
                    @foreach ($statuses as $key => $stat)
                        <li class="nav-item" role="presentation">
                            <button 
                                class="nav-link {{ $key === 0 ? 'active' : '' }}" 
                                id="{{ $stat }}-tab" 
                                data-bs-toggle="tab" 
                                data-bs-target="#tab-{{ $stat }}" 
                                type="button" 
                                role="tab" 
                                aria-controls="tab-{{ $stat }}" 
                                aria-selected="{{ $key === 0 ? 'true' : 'false' }}">
                                {{ ucfirst($stat) }}
                            </button>
                        </li>
                    @endforeach
                </ul>               

                <div class="tab-content" id="statusTabsContent">
                    <div class="d-flex flex-wrap gap-3 mb-3">
                        <span>Select: </span>
                        <a href="#" class="select-link text-decoration-underline" id="selectAllLink">All</a>
                        <a href="#" class="select-link text-decoration-underline" data-status="pending">Pending</a>
                        <a href="#" class="select-link text-decoration-underline" data-status="screening">Screening</a>
                        <a href="#" class="select-link text-decoration-underline" data-status="scheduled">Scheduled</a>
                        <a href="#" class="select-link text-decoration-underline" data-status="evaluation">Evaluation</a>
                        <a href="#" class="select-link text-decoration-underline" data-status="archived">Archived</a>
                    </div>                    
                    @foreach ($statuses as $key => $stat) 
                        <div class="tab-pane fade {{ $key === 0 ? 'show active' : '' }}" 
                            id="tab-{{ $stat }}" 
                            role="tabpanel" 
                            aria-labelledby="{{ $stat }}-tab"
                        >
                            <table class="table table-bordered display applicantTable" id="applicantTable-{{ $stat }}">
                                <thead>
                                    <tr>
                                        <th class="no-export"></th>
                                        <th>No</th>
                                        <th>NAME</th>
                                        <th>STATUS</th>
                                        <th>Classification</th>
                                        <th>APPLIED DATE</th>
                                        <th>POSITION APPLIED</th>
                                        <th class="no-export">ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $statusColors = [
                                            'pending' => '#555555',
                                            'screening' => '#ffe135',
                                            'scheduled' => '#ff8c00',
                                            'interviewed' => '#ff8c00',
                                            'evaluation' => '#007bff',
                                            'hired' => '#4CAF50',
                                            'rejected' => '#8b0000',
                                            'archived' => '#4b0082'
                                        ];

                                        if ($stat === 'all') {
                                            $filteredApplicants = $allApplicants->whereNotIn('status', ['hired', 'archived']);
                                        } else {
                                            $filteredApplicants = $allApplicants->where('status', $stat);
                                        }
                                    @endphp

                                    @foreach($filteredApplicants as $applicant)
                                        <tr>
                                            <td class="text-center no-export">
                                                <input type="checkbox" class="rowCheckbox" value="{{ $applicant->id }}">
                                            </td>
                                            <td class="row-number text-center"></td>
                                            <td>{{ $applicant->first_name }} {{ $applicant->last_name }}</td>                                           
                                            {{-- <td>
                                                <form method="POST" action="{{ route('applicants.chooseStatus', $applicant->id) }}" class="status-update-form">
                                                    @csrf
                                                    <select name="status" class="form-select status-dropdown"
                                                        data-applicant-name="{{ $applicant->first_name }} {{ $applicant->last_name }}" 
                                                        data-current-status="{{ $applicant->status }}"
                                                        style="color: #fff; border-radius: 4px; padding: 4px; text-align: center; background-color: {{ $statusColors[$applicant->status] ?? '#000' }};"
                                                    >
                                                        @foreach ($statuses as $s)
                                                            <option value="{{ $s }}" {{ $applicant->status == $s ? 'selected' : '' }}>
                                                                {{ ucfirst($s) }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </form>
                                            </td> --}}
                                            <td data-order="{{ array_search($applicant->status, ['pending','screening','scheduled','evaluation','hired','archived']) }}">
                                                <form method="POST" action="{{ route('applicants.chooseStatus', $applicant->id) }}" class="status-update-form">
                                                    @csrf
                                                    <select name="status" class="form-select status-dropdown"
                                                        data-applicant-name="{{ $applicant->first_name }} {{ $applicant->last_name }}" 
                                                        data-current-status="{{ $applicant->status }}"
                                                        style="color: #fff; border-radius: 4px; padding: 4px; text-align: center; background-color: {{ $statusColors[$applicant->status] ?? '#000' }};"
                                                    >
                                                        @foreach ($statuses as $s)
                                                            <option value="{{ $s }}" {{ $applicant->status == $s ? 'selected' : '' }}>
                                                                {{ ucfirst($s) }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </form>
                                            </td>                                            
                                            <td>{{ $applicant->classification ?? 'N/A' }}</td>
                                            <td data-order="{{ \Carbon\Carbon::parse($applicant->applied_at)->timestamp }}">
                                                {{ \Carbon\Carbon::parse($applicant->applied_at)->format('F d, Y') }}
                                            </td>                                    
                                            <td>{{ $applicant->job->job_title ?? 'N/A' }}</td>
                                            <td class="no-export">
                                                <div class="dropdown text-center">
                                                    <button class="btn btn-primary border-0" type="button" data-bs-toggle="dropdown">
                                                        <i class="fa-solid fa-list"></i>
                                                    </button>
                                                    <ul class="dropdown-menu">
                                                        <!-- Approve -->
                                                        <li>
                                                            <button class="dropdown-item text-success action-approve" 
                                                                data-id="{{ $applicant->id }}" 
                                                                data-name="{{ $applicant->first_name }} {{ $applicant->last_name }}">
                                                                <i class="fa fa-check me-2"></i> Approve
                                                            </button>
                                                        </li>
                                                
                                                        <!-- View Button -->
                                                        <li>
                                                            <button type="button" class="dropdown-item text-primary"
                                                                data-bs-toggle="offcanvas"
                                                                data-bs-target="#candidateProfile"
                                                                data-applicant-id="{{ $applicant->id }}"
                                                                data-applicant-name="{{ $applicant->first_name }} {{ $applicant->last_name }}"
                                                                data-applicant-status="{{ $applicant->status }}"
                                                                data-applicant-email="{{ $applicant->email }}"
                                                                data-applicant-phone="{{ $applicant->phone }}"
                                                                data-applicant-position="{{ $applicant->job->job_title ?? 'N/A' }}"
                                                                data-applicant-address="{{ $applicant->address }}"
                                                                data-applicant-notes="{{ $applicant->notes }}">
                                                                <i class="fa fa-eye me-2"></i> View
                                                            </button>
                                                        </li>
                                                
                                                        <!-- Reject -->
                                                        <li>
                                                            <button class="dropdown-item text-danger action-reject" 
                                                                data-id="{{ $applicant->id }}" 
                                                                data-name="{{ $applicant->first_name }} {{ $applicant->last_name }}">
                                                                <i class="fa fa-times me-2"></i> Reject
                                                            </button>
                                                        </li>

                                                        <!-- Archive -->
                                                        <li>
                                                            <button class="dropdown-item text-purple action-archive"
                                                                data-id="{{ $applicant->id }}" 
                                                                data-name="{{ $applicant->first_name }} {{ $applicant->last_name }}">
                                                                <i class="fa fa-box-archive me-2"></i> Archive
                                                            </button>
                                                        </li>
                                                    </ul>
                                                </div>                                                
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endforeach
                </div>
                
            </div>
        </div>
    </div>
    <!-- End of Sidebar & Master List -->


    <!-- Add Applicant Modal -->
    @include('components.partials.system.ats.ats-add-applicant-modal', ['jobs' => $jobs])
    
    <!-- Candidate Profile Offcanvas -->
    @include('components.partials.system.ats.ats-candidate-profile-offcanvas')  

    {{-- Applying button color changes based on the status --}}
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const offcanvas = document.getElementById('candidateProfile');
            if (!offcanvas) return;
        
            offcanvas.addEventListener('show.bs.offcanvas', function (event) {
                const button = event.relatedTarget;
                if (!button) return;
        
                const applicantId = button.dataset.applicantId;
                const name = button.dataset.applicantName || 'N/A';
                const email = button.dataset.applicantEmail || 'N/A';
                const phone = button.dataset.applicantPhone || 'N/A';
                const position = button.dataset.applicantPosition || 'N/A';
                const address = button.dataset.applicantAddress || 'N/A';
                const notes = button.dataset.applicantNotes || 'No Notes Available';
                const status = button.dataset.applicantStatus || 'N/A';
        
                // Set DOM content
                document.getElementById('applicantName').innerText = name;
                document.getElementById('applicantEmail').innerText = email;
                document.getElementById('applicantPhone').innerText = phone;
                document.getElementById('applicantJob').innerText = position;
                document.getElementById('applicantAddress').innerText = address;
                document.getElementById('applicantNotes').innerText = notes;
        
                // Update status badge
                const statusEl = document.getElementById('applicantStatus');
                const statusColors = {
                    pending: '#6c757d',
                    screening: '#17a2b8',
                    scheduled: '#ffc107',
                    evaluation: '#007bff',
                    hired: '#28a745',
                    rejected: '#dc3545',
                    archived: '#343a40'
                };
                const color = statusColors[status.toLowerCase()] || '#000';
                statusEl.innerText = `STAGE: ${status.toUpperCase()}`;
                statusEl.style.border = `2px solid ${color}`;
                statusEl.style.color = color;
        
                // SweetAlert
                Swal.fire({
                    icon: 'info',
                    title: name,
                    html: `<strong>Status:</strong> ${status.toUpperCase()}`,
                    confirmButtonColor: color,
                    confirmButtonText: 'Continue'
                });
        
                // ✅ Update form actions dynamically
                const notesForm = document.getElementById('editNotesForm');
                if (notesForm) {
                    notesForm.action = `/applicants/${applicantId}/notes`;
                    document.getElementById('noteContent').value = notes;
                }
        
                const interviewForm = document.getElementById('scheduleInterviewForm');
                if (interviewForm) {
                    interviewForm.action = `/events/schedule/${applicantId}`;
                    document.getElementById('applicantNameInput').value = name;
                    document.getElementById('applicantEmailInput').value = email;
                }
        
                // Pass/Fail/Approve/Reject/Archive Button Forms
                document.querySelectorAll('#defaultButtons form, #demoButtons form').forEach(form => {
                    form.action = `/applicants/${applicantId}/update-status`;
                });
        
                // Toggle pass/fail or default buttons
                const demoBtns = document.getElementById('demoButtons');
                const defaultBtns = document.getElementById('defaultButtons');
                if (status.toLowerCase() === 'evaluation') {
                    demoBtns?.classList.remove('d-none');
                    defaultBtns?.classList.add('d-none');
                } else {
                    demoBtns?.classList.add('d-none');
                    defaultBtns?.classList.remove('d-none');
                }
            });
        });
    </script>        
    {{-- Applying button color changes based on the status --}}

    {{-- File upload and validation --}}
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const fileInput = document.getElementById("cv");
            const fileLabel = document.querySelector(".file-label");
    
            fileInput.addEventListener("change", function () {
                if (this.files.length > 0) {
                    const file = this.files[0];
    
                    // File Validation - Max Size 2MB
                    if (file.size > 2 * 1024 * 1024) { // 2MB limit
                        Swal.fire({
                            icon: "error",
                            title: "File Too Large!",
                            text: "The selected file exceeds the 2MB size limit. Please upload a smaller file.",
                            confirmButtonColor: "#d33",
                            confirmButtonText: "Okay"
                        });
                        this.value = ""; // Reset file input
                        fileLabel.textContent = "No file selected"; // Reset label
                        return;
                    }
    
                    fileLabel.textContent = file.name; // ✅ Update Label with Selected File Name
                } else {
                    fileLabel.textContent = "No file selected"; // Reset if no file
                }
            });
        });
    </script>
    {{-- File upload and validation --}}

    {{-- Job Selection Dropdown --}}
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const jobDropdown = document.getElementById("job_id");
            const form = document.getElementById("addApplicantForm");

            jobDropdown.addEventListener("change", function () {
                const selectedOption = jobDropdown.options[jobDropdown.selectedIndex];
                const slug = selectedOption.getAttribute("data-slug");

                if (slug) {
                    form.action = `/job-selected/${slug}/apply`;
                    document.getElementById("jobSlug").value = slug;
                }
            });
        });
    </script>
    {{-- Job Selection Dropdown --}}

    {{-- Handle Form Submission & Display Success/Error Alerts --}}
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const form = document.getElementById("addApplicantForm");
            const modal = new bootstrap.Modal(document.getElementById("addApplicantModal"));
    
            form.addEventListener("submit", async function (event) {
                event.preventDefault(); // Prevent default form submission
    
                const formData = new FormData(form);
    
                // Clear previous error messages
                document.querySelectorAll(".error-message").forEach(el => el.innerText = "");
                document.querySelectorAll(".is-invalid").forEach(el => el.classList.remove("is-invalid"));
    
                try {
                    const response = await fetch(form.action, {
                        method: "POST",
                        body: formData,
                        headers: {
                            "Accept": "application/json", // Ensures Laravel returns JSON
                            "X-CSRF-TOKEN": document.querySelector('input[name="_token"]').value,
                        },
                    });
    
                    let result;
                    try {
                        result = await response.json(); // Attempt to parse JSON response
                    } catch (jsonError) {
                        result = { message: "Invalid server response. Please check backend logs." };
                    }
    
                    if (response.ok) {
                        // ✅ SUCCESS: Show SweetAlert and reset form
                        Swal.fire({
                            icon: "success",
                            title: "Application Submitted!",
                            text: "Your application has been successfully submitted.",
                            confirmButtonColor: "#28a745",
                        }).then(() => {
                            form.reset(); // Clear form fields
                            modal.hide(); // Close modal
                            location.reload(); // Refresh the page after clicking "Okay"
                        });
    
                    } else if (response.status === 422) {
                        // ❌ VALIDATION ERROR: Display errors below fields
                        for (const field in result.errors) {
                            const inputField = document.querySelector(`[name="${field}"]`);
                            if (inputField) {
                                inputField.classList.add("is-invalid");
    
                                const errorDiv = document.createElement("div");
                                errorDiv.className = "text-danger error-message mt-1";
                                errorDiv.innerText = result.errors[field][0];
    
                                if (inputField.closest('.input-group')) {
                                    inputField.closest('.input-group').after(errorDiv);
                                } else {
                                    inputField.after(errorDiv);
                                }
                            }
                        }
    
                        // ✅ Show SweetAlert when submission fails (e.g., Email already taken)
                        Swal.fire({
                            icon: "error",
                            title: "Submission Failed",
                            text: result.errors.email ? "The email has already been taken. Please use another email." : "There was an issue submitting your application.",
                            confirmButtonColor: "#d33",
                        });
    
                    } else {
                        // ❌ OTHER ERRORS: Show SweetAlert
                        Swal.fire({
                            icon: "error",
                            title: "Submission Failed",
                            text: result.message || "An error occurred. Please try again.",
                            confirmButtonColor: "#d33",
                        });
                    }
                } catch (error) {
                    // ❌ NETWORK ERROR: Show SweetAlert
                    Swal.fire({
                        icon: "error",
                        title: "Network Error",
                        text: "Something went wrong. Please check your internet connection and try again.",
                        confirmButtonColor: "#d33",
                    });
                }
            });
        });
    </script>    
    {{-- Handle Form Submission & Display Success/Error Alerts --}}

    {{-- bulk selection of archived and rejected --}}
    {{-- bulk selection of archived and rejected (tab-aware) --}}
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const checkboxes = document.querySelectorAll(".rowCheckbox");
            const archiveBtn = document.querySelector(".bulk-archive-btn");
            const rejectBtn = document.querySelector(".bulk-reject-btn");
            let lastClickedStatus = null; // ⬅️ Track last clicked status
    
            // === Update Bulk Buttons ===
            function updateBulkButtons() {
                const anyChecked = [...checkboxes].some(cb => cb.checked);
                archiveBtn.style.display = anyChecked ? 'inline-block' : 'none';
                rejectBtn.style.display = anyChecked ? 'inline-block' : 'none';
            }
    
            // === Highlight Rows ===
            function updateRowHighlights() {
                document.querySelectorAll("tbody tr").forEach(row => {
                    const checkbox = row.querySelector(".rowCheckbox");
                    row.classList.toggle("selected-row", checkbox && checkbox.checked);
                });
                updateBulkButtons();
            }
    
            // === Get Checked IDs ===
            function getSelectedApplicantIds() {
                return [...document.querySelectorAll('.rowCheckbox:checked')].map(cb => cb.value);
            }
    
            // === Bulk Action Handler ===
            function handleBulkAction(actionUrl, confirmTitle, confirmText, successText) {
                const selectedIds = getSelectedApplicantIds();
                if (selectedIds.length === 0) return;
    
                Swal.fire({
                    title: confirmTitle,
                    text: confirmText,
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Yes, proceed",
                    cancelButtonText: "Cancel",
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33"
                }).then((result) => {
                    if (result.isConfirmed) {
                        fetch(actionUrl, {
                            method: "POST",
                            headers: {
                                "Content-Type": "application/json",
                                "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content
                            },
                            body: JSON.stringify({ ids: selectedIds })
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                Swal.fire("Success", successText, "success").then(() => {
                                    location.reload();
                                });
                            } else {
                                Swal.fire("Error", data.message || "Something went wrong.", "error");
                            }
                        })
                        .catch(() => {
                            Swal.fire("Error", "Network error occurred.", "error");
                        });
                    }
                });
            }
    
            // === Archive Button Click ===
            archiveBtn.addEventListener("click", function () {
                handleBulkAction(
                    "{{ route('applicants.bulkArchive') }}",
                    "Archive Selected Applicants",
                    "Are you sure you want to archive the selected applicants?",
                    "Applicants archived successfully!"
                );
            });
    
            // === Reject Button Click ===
            rejectBtn.addEventListener("click", function () {
                Swal.fire({
                    title: "Delete Selected Applicants",
                    text: "Are you sure you want to permanently delete the selected applicants? This action cannot be undone.",
                    icon: "error", // 🔥 Use 'error' for more serious red alert
                    showCancelButton: true,
                    confirmButtonText: "Yes, delete them",
                    cancelButtonText: "Cancel",
                    confirmButtonColor: "#d33", // 🔴 Red confirm button
                    cancelButtonColor: "#6c757d"
                }).then((result) => {
                    if (result.isConfirmed) {
                        const selectedIds = [...document.querySelectorAll('.rowCheckbox:checked')].map(cb => cb.value);

                        fetch("{{ route('applicants.bulkReject') }}", {
                            method: "POST",
                            headers: {
                                "Content-Type": "application/json",
                                "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content
                            },
                            body: JSON.stringify({ ids: selectedIds })
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                Swal.fire("Deleted!", "Applicants deleted successfully!", "success")
                                    .then(() => location.reload());
                            } else {
                                Swal.fire("Error", data.message || "Something went wrong.", "error");
                            }
                        })
                        .catch(() => {
                            Swal.fire("Error", "Network error occurred.", "error");
                        });
                    }
                });
            });
    
            // === Select All (toggle) ===
            document.getElementById("selectAllLink").addEventListener("click", function (e) {
                e.preventDefault();
    
                const allChecked = [...checkboxes].every(cb => cb.checked);
                checkboxes.forEach(cb => cb.checked = !allChecked);
                lastClickedStatus = allChecked ? null : 'all'; // Reset or set tracker
                updateRowHighlights();
            });
    
            // === Select by Status (toggle if clicked again) ===
            document.querySelectorAll('[data-status]').forEach(link => {
                link.addEventListener("click", function (e) {
                    e.preventDefault();
    
                    const targetStatus = this.getAttribute("data-status");
                    const matchingCheckboxes = [];
                    const allRows = document.querySelectorAll("tbody tr");
    
                    allRows.forEach(row => {
                        const dropdown = row.querySelector("select.status-dropdown");
                        const checkbox = row.querySelector(".rowCheckbox");
    
                        if (dropdown && checkbox) {
                            if (dropdown.value === targetStatus) {
                                matchingCheckboxes.push(checkbox);
                            } else {
                                checkbox.checked = false;
                            }
                        }
                    });
    
                    // If clicked again on the same status and all are selected → unselect
                    const allSelected = matchingCheckboxes.length > 0 && matchingCheckboxes.every(cb => cb.checked);
    
                    if (lastClickedStatus === targetStatus && allSelected) {
                        matchingCheckboxes.forEach(cb => cb.checked = false);
                        lastClickedStatus = null;
                    } else {
                        matchingCheckboxes.forEach(cb => cb.checked = true);
                        lastClickedStatus = targetStatus;
                    }
    
                    updateRowHighlights();
                });
            });
    
            // === Individual Checkbox Changes ===
            checkboxes.forEach(cb => {
                cb.addEventListener("change", function () {
                    updateRowHighlights();
                    lastClickedStatus = null; // Reset tracker if manual selection
                });
            });
    
            updateBulkButtons(); // Initialize on load
        });
    </script>
    {{-- bulk selection of archived and rejected --}}

    {{-- Reject & Archive action button sweetalert --}}
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            function confirmAction(buttonClass, title, text, confirmColor, urlSuffix) {
                document.querySelectorAll(buttonClass).forEach(button => {
                    button.addEventListener('click', function () {
                        const id = this.dataset.id;
                        const name = this.dataset.name;

                        Swal.fire({
                            title: `${title} ${name}?`,
                            text: text,
                            icon: urlSuffix === 'reject' ? 'error' : (urlSuffix === 'approve' ? 'success' : 'info'),
                            showCancelButton: true,
                            confirmButtonColor: confirmColor,
                            cancelButtonColor: '#6c757d',
                            confirmButtonText: `Yes, ${urlSuffix}`
                        }).then((result) => {
                            if (result.isConfirmed) {
                                fetch(`/applicants/${id}/${urlSuffix}`, {
                                    method: "POST",
                                    headers: {
                                        "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content,
                                        "Accept": "application/json"
                                    }
                                })
                                .then(response => response.json())
                                .then(data => {
                                    if (data.success) {
                                        Swal.fire("Success", data.message, "success").then(() => location.reload());
                                    } else {
                                        Swal.fire("Error", data.message || "Something went wrong.", "error");
                                    }
                                })
                                .catch(() => {
                                    Swal.fire("Error", "Network error occurred.", "error");
                                });
                            }
                        });
                    });
                });
            }

            confirmAction('.action-approve', 'Approve', 'This will hire the applicant and transfer them to employees.', '#28a745', 'approve');
            confirmAction('.action-reject', 'Reject', 'This will permanently delete the applicant.', '#d33', 'reject');
            confirmAction('.action-archive', 'Archive', 'This will move the applicant to the archived list.', '#6f42c1', 'archive');
        });
    </script>
    {{-- Reject & Archive action button sweetalert --}}

    {{-- Print Only Active Tab --}}
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            document.querySelector('.print-btn').addEventListener('click', function () {
                const activeTab = document.querySelector('.tab-pane.show.active');
                if (!activeTab) {
                    Swal.fire("Oops!", "No active tab found to print.", "warning");
                    return;
                }

                const table = activeTab.querySelector('table');
                if (!table) {
                    Swal.fire("Oops!", "No table found in the active tab.", "warning");
                    return;
                }

                const clonedTable = table.cloneNode(true);

                // === Identify column indexes to remove (columns with 'no-export')
                const noExportIndex = [];
                clonedTable.querySelectorAll('thead tr').forEach(row => {
                    row.querySelectorAll('th').forEach((th, index) => {
                        if (th.classList.contains('no-export')) {
                            noExportIndex.push(index);
                        }
                    });
                });

                // === Remove matching <th>
                clonedTable.querySelectorAll('thead tr').forEach(row => {
                    noExportIndex.slice().reverse().forEach(i => {
                        if (row.children[i]) row.removeChild(row.children[i]);
                    });
                });

                // === Remove matching <td> in each <tbody> row
                clonedTable.querySelectorAll('tbody tr').forEach(row => {
                    noExportIndex.slice().reverse().forEach(i => {
                        if (row.children[i]) row.removeChild(row.children[i]);
                    });
                });

                // === Convert <select class="status-dropdown"> into plain styled text
                clonedTable.querySelectorAll('select.status-dropdown').forEach(select => {
                    const selectedText = select.options[select.selectedIndex]?.textContent || '';
                    const span = document.createElement('span');
                    span.textContent = selectedText;
                    span.style.fontWeight = 'bold';
                    span.style.padding = '4px 8px';
                    span.style.display = 'inline-block';
                    span.style.borderRadius = '4px';
                    span.style.backgroundColor = '#eee';
                    span.style.color = '#333';
                    select.parentNode.replaceChild(span, select);
                });

                // === Title for print header
                const activeTabButton = document.querySelector('.nav-link.active');
                const tabTitle = activeTabButton ? activeTabButton.textContent.trim() : 'Applicant List';

                // === Get styles from loaded stylesheets
                const styles = [...document.styleSheets]
                    .filter(style => style.href)
                    .map(style => `<link rel="stylesheet" href="${style.href}">`)
                    .join('\n');

                // === Write print content
                const printWindow = window.open('', '', 'width=900,height=650');
                printWindow.document.write(`
                    <html>
                        <head>
                            <title>Print - ${tabTitle} Applicants</title>
                            ${styles}
                            <style>
                                body { font-family: Arial, sans-serif; margin: 20px; }
                                h2 { text-align: center; margin-bottom: 20px; }
                                table { width: 100%; border-collapse: collapse; }
                                th, td { border: 1px solid #000; padding: 8px; text-align: left; vertical-align: middle; }
                                th { background-color: #f8f8f8; }
                            </style>
                        </head>
                        <body>
                            <h2>Applicant List - ${tabTitle}</h2>
                            ${clonedTable.outerHTML}
                        </body>
                    </html>
                `);
                printWindow.document.close();
                printWindow.focus();
                printWindow.print();
                printWindow.close();
            });
        });
    </script>
    {{-- Print Only Active Tab --}}

    {{-- DataTables with Row Numbering --}}
    {{-- <script>
        document.addEventListener("DOMContentLoaded", function () {
            const initialized = new Set();
            
    
            function addRowNumbering(tableInstance) {
                tableInstance.on('draw.dt', function () {
                    const pageInfo = tableInstance.page.info();
                    let start = pageInfo.start + 1;
    
                    tableInstance.rows({ page: 'current' }).every(function () {
                        const $row = $(this.node());
                        $row.find('td.row-number').html(start++);
                    });
                });
            }
    
            $('.applicantTable').each(function () {
                const $table = $(this);
                const tableId = $table.attr('id');
    
                if (!initialized.has(tableId)) {
                    const dt = $table.DataTable();
                    addRowNumbering(dt);
                    dt.draw(); // trigger numbering now
                    initialized.add(tableId);
                }
            });
    
            // When switching tabs, redraw and re-number the current table
            $('a[data-bs-toggle="tab"]').on('shown.bs.tab', function (e) {
                const targetId = $(e.target).attr('data-bs-target'); // e.g., #tab-hired
                const $table = $(`${targetId} .applicantTable`);
    
                if ($table.length) {
                    const dt = $table.DataTable();
                    dt.columns.adjust().draw(); // triggers re-numbering
                }
            });
        });
    </script> --}}
    {{-- DataTables with Row Numbering + UI Fix --}}
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const initialized = new Set();

            function addRowNumbering(tableInstance) {
                tableInstance.on('draw.dt', function () {
                    const pageInfo = tableInstance.page.info();
                    let start = pageInfo.start + 1;

                    tableInstance.rows({ page: 'current' }).every(function () {
                        const $row = $(this.node());
                        $row.find('td.row-number').html(start++);
                    });
                });
            }

            $('.applicantTable').each(function () {
                const $table = $(this);
                const tableId = $table.attr('id');

                if (!initialized.has(tableId)) {
                    const tabId = $table.closest('.tab-pane').attr('id');
                    const isAllTab = tabId === 'tab-all';

                    const dt = $table.DataTable({
                        responsive: true,
                        paging: true,
                        searching: true,
                        info: true,
                        lengthChange: true,
                        order: isAllTab ? [[3, 'asc']] : [[5, 'desc']], // 🧠 sort by Status in 'All', else by No
                        dom: '<"datatable-toolbar d-flex justify-content-between align-items-center my-3"lf>tip',
                        columnDefs: isAllTab ? [{
                            targets: 3,
                            orderData: [3],
                        }] : []
                    });                

                    addRowNumbering(dt);
                    dt.draw(); // trigger initial row numbers
                    initialized.add(tableId);
                }
            });

            // Handle tab switching and force redraw
            $('a[data-bs-toggle="tab"]').on('shown.bs.tab', function (e) {
                const targetId = $(e.target).attr('data-bs-target'); // e.g., #tab-hired
                const $table = $(`${targetId} .applicantTable`);
                if ($table.length) {
                    const dt = $table.DataTable();
                    dt.columns.adjust().draw(); // triggers draw + row renumbering
                }
            });
        });
    </script>
    {{-- DataTables with Row Numbering --}}


</x-admin-ats-layout>