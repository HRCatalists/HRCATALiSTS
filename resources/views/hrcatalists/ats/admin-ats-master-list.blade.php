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

                <div class="d-flex">
                    <div class="card checkbox-card me-3">
                        <div class="container d-flex">

                            <!-- Select All Checkbox -->
                            <div class="d-flex me-4 py-3">
                                <input type="checkbox" id="selectAll" class="rowCheckbox">
                            </div>
                            
                            <!-- Archive and Reject Buttons -->
                            <div class="d-flex py-1">
                                <button class="btn archive-btn btn-sm me-2">ARCHIVE</button>
                                <button class="btn reject-btn btn-sm">REJECT</button>
                            </div>
                            
                        </div>
                    </div>

                    <!-- Add Position Button -->
                    <button type="button" class="btn add-btn me-2" data-bs-toggle="modal" data-bs-target="#addApplicantModal">
                        ADD APPLICANT
                    </button>                 

                    <button class="btn shadow print-btn ms-auto">
                        <i class="fa fa-print"></i> PRINT
                        <a href=""></a>
                    </button>
                </div>
                
                <!-- Status Tabs -->
                @php
                    $statuses = ['all', 'pending', 'screening', 'scheduled', 'evaluation', 'hired', 'rejected', 'archived'];
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
                    @foreach ($statuses as $key => $stat)
                        <div 
                            class="tab-pane fade {{ $key === 0 ? 'show active' : '' }}" 
                            id="tab-{{ $stat }}" 
                            role="tabpanel" 
                            aria-labelledby="{{ $stat }}-tab"
                        >
                            <table class="table table-bordered display applicantTable">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>NAME</th>
                                        <th>STATUS</th>
                                        <th>APPLIED DATE</th>
                                        <th>POSITION APPLIED TO</th>
                                        <th>ACTION</th>
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
                                        $filteredApplicants = $stat === 'all'
                                            ? $allApplicants
                                            : $allApplicants->where('status', $stat);
                                    @endphp

                                    @foreach($filteredApplicants as $applicant)
                                        <tr>
                                            <td class="text-center">
                                                <input type="checkbox" class="rowCheckbox" value="{{ $applicant->id }}">
                                            </td>
                                            <td>{{ $applicant->first_name }} {{ $applicant->last_name }}</td>
                                            <td>
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
                                            <td data-order="{{ \Carbon\Carbon::parse($applicant->applied_at)->timestamp }}">
                                                {{ \Carbon\Carbon::parse($applicant->applied_at)->format('F d, Y') }}
                                            </td>                                    
                                            <td>{{ $applicant->job->job_title ?? 'N/A' }}</td>
                                            <td>
                                                <div class="d-flex justify-content-around">
                                                    <button class="btn btn-ap-edit" 
                                                        data-bs-toggle="offcanvas" 
                                                        data-bs-target="#candidateProfile" 
                                                        data-applicant-id="{{ $applicant->id }}"
                                                        data-applicant-name="{{ $applicant->first_name }} {{ $applicant->last_name }}"
                                                        data-applicant-status="{{ $applicant->status }}"
                                                        data-applicant-email="{{ $applicant->email }}"
                                                        data-applicant-phone="{{ $applicant->phone_number }}"
                                                        data-applicant-position="{{ $applicant->job->job_title ?? 'N/A' }}"
                                                        data-applicant-address="{{ $applicant->address }}">
                                                        VIEW
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endforeach
                </div>
                
                <!-- Applicant Table -->
                {{-- <table id="applicantTable" class="table table-bordered display">
                    <thead>
                        <tr>
                            <th></th>
                            <th>NAME</th>
                            <th>STATUS</th>
                            <th>APPLIED DATE</th>
                            <th>POSITION APPLIED TO</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($allApplicants) > 0)
                            @foreach($allApplicants as $applicant)
                                @php
                                    // Define status colors inside the loop
                                    $statusColors = [
                                        'pending' => '#555555',      // Gray
                                        'screening' => '#ffe135',    // Yellow
                                        'scheduled' => '#ff8c00',    // Orange
                                        'interviewed' => '#ff8c00',  // Orange
                                        'hired' => '#4CAF50',        // Green
                                        'rejected' => '#8b0000',     // Red
                                        'archived' => '#4b0082'      // Indigo
                                    ];
                
                                    $statusColor = $statusColors[$applicant->status] ?? '#000000'; // Default Black
                                @endphp
                                <tr>
                                    <td class="text-center">
                                        <input type="checkbox" class="rowCheckbox" value="{{ $applicant->id }}">
                                    </td>
                                    <td>{{ $applicant->first_name }} {{ $applicant->last_name }}</td>
                                    <td>
                                        <form method="POST" action="{{ route('applicants.chooseStatus', $applicant->id) }}" class="status-update-form">
                                            @csrf
                                            <select name="status" class="form-select status-dropdown"
                                                data-applicant-name="{{ $applicant->first_name }} {{ $applicant->last_name }}" 
                                                data-current-status="{{ $applicant->status }}"
                                                style="color: #fff; border-radius: 4px; padding: 4px; text-align: center;"
                                            >
                                                <option value="pending" {{ $applicant->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                                <option value="screening" {{ $applicant->status == 'screening' ? 'selected' : '' }}>Screening</option>
                                                <option value="scheduled" {{ $applicant->status == 'scheduled' ? 'selected' : '' }}>Scheduled</option>
                                                <option value="evaluation" {{ $applicant->status == 'evaluation' ? 'selected' : '' }}>Evaluation</option>
                                                <option value="hired" {{ $applicant->status == 'hired' ? 'selected' : '' }}>Hired</option>
                                                <option value="rejected" {{ $applicant->status == 'rejected' ? 'selected' : '' }}>Rejected</option>
                                                <option value="archived" {{ $applicant->status == 'archived' ? 'selected' : '' }}>Archived</option>
                                            </select>
                                        </form>
                                    </td>
                                    <td data-order="{{ \Carbon\Carbon::parse($applicant->applied_at)->timestamp }}">
                                        {{ \Carbon\Carbon::parse($applicant->applied_at)->format('F d, Y') }}
                                    </td>                                    
                                    <td>{{ $applicant->job->job_title ?? 'N/A' }}</td>
                                    <!-- off canvas -->
                                    <td>
                                        <div class="d-flex justify-content-around">
                                            <button class="btn btn-ap-edit" 
                                                data-bs-toggle="offcanvas" 
                                                data-bs-target="#candidateProfile" 
                                                data-applicant-id="{{ $applicant->id }}"
                                                data-applicant-name="{{ $applicant->first_name }} {{ $applicant->last_name }}"
                                                data-applicant-status="{{ $applicant->status }}"
                                                data-applicant-email="{{ $applicant->email }}"
                                                data-applicant-phone="{{ $applicant->phone_number }}"
                                                data-applicant-position="{{ $applicant->job->job_title ?? 'N/A' }}"
                                                data-applicant-address="{{ $applicant->address }}">
                                                VIEW
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
         
                        @endif
                    </tbody>
                </table> --}}

                <!-- Archive Popup -->
                <div id="archivePopup" class="custom-popup">
                    <div class="popup-content">
                        <p>Are you sure you want to archive this applicant?</p>
                        <button class="btn archive-btn">Yes, archive the applicant</button>
                        <button class="btn btn-outline-secondary" onclick="closePopup('archivePopup')">Cancel</button>
                    </div>
                </div>

                <!-- Multi Archive Popup -->
                <div id="multiArchivePopup" class="custom-popup">
                    <div class="popup-content">
                        <p>Are you sure you want to archive the <br> selected applicants?</p>
                        <button class="btn archive-btn">Yes, archive the applicants</button>
                        <button class="btn btn-outline-secondary" onclick="closePopup('multiArchivePopup')">Cancel</button>
                    </div>
                </div>

                <!-- Select All Archive Popup -->
                <div id="selectAllArchivePopup" class="custom-popup">
                    <div class="popup-content">
                        <p>Are you sure you want to archive ALL applicants?</p>
                        <button class="btn archive-btn">Yes, archive all applicants</button>
                        <button class="btn btn-outline-secondary" onclick="closePopup('selectAllArchivePopup')">Cancel</button>
                    </div>
                </div>

                <!-- Reject Popup -->
                <div id="rejectPopup" class="custom-popup">
                    <div class="popup-content">
                        <p>Are you sure you want to reject this applicant?</p>
                        <button class="btn btn-danger confirm-btn">Yes, reject the applicant</button>
                        <button class="btn btn-outline-secondary" onclick="closePopup('rejectPopup')">Cancel</button>
                    </div>
                </div>

                <!-- Multi Reject Popup -->
                <div id="multiRejectPopup" class="custom-popup">
                    <div class="popup-content">
                        <p>Are you sure you want to reject the selected applicants?</p>
                        <button class="btn btn-danger confirm-btn">Yes, reject the applicants</button>
                        <button class="btn btn-outline-secondary" onclick="closePopup('multiRejectPopup')">Cancel</button>
                    </div>
                </div>

                <!-- Select All Reject Popup -->
                <div id="selectAllRejectPopup" class="custom-popup">
                    <div class="popup-content">
                        <p>Are you sure you want to reject ALL applicants?</p>
                        <button class="btn btn-danger confirm-btn">Yes, reject all applicants</button>
                        <button class="btn btn-outline-secondary" onclick="closePopup('selectAllRejectPopup')">Cancel</button>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- End of Sidebar & Master List -->

    <!-- Add Applicant Modal -->
    {{-- @include('components.partials.system.ats.ats-add-applicant-modal') --}}
    @include('components.partials.system.ats.ats-add-applicant-modal', ['jobs' => $jobs])

    
    <!-- Candidate Profile Offcanvas -->
    @include('components.partials.system.ats.ats-candidate-profile-offcanvas')

    {{-- Applying button color changes based on the status --}}
    <script>
       offcanvas.addEventListener('show.bs.offcanvas', function (event) {
    const button = event.relatedTarget;
    if (!button) return;

    console.log("Button Clicked:", button);  // Debugging Line

    const data = {
        name: button.dataset.applicantName || 'N/A',
        status: button.dataset.applicantStatus || 'N/A',
        email: button.dataset.applicantEmail || 'N/A',
        phone: button.dataset.applicantPhone || 'N/A',
        position: button.dataset.applicantPosition || 'N/A',
        address: button.dataset.applicantAddress || 'N/A',
        resume: button.dataset.applicantResume || 'N/A',
        jobTitle: button.dataset.applicantJobTitle || 'N/A'
    };

    console.log("Applicant Data:", data);  // Debugging Line

    // Update Offcanvas Content
    Object.entries({
        'applicantName': data.name,
        'applicantEmail': data.email,
        'applicantPhone': data.phone,
        'applicantPosition': data.position,
        'applicantAddress': data.address,
        'applicantResume': data.resume,
        'applicantJobTitle': data.jobTitle
    }).forEach(([id, value]) => {
        const el = document.getElementById(id);
        if (el) el.innerText = value;
    });

    // Status color
    const statusColors = {
        'pending': '#6c757d',
        'screening': '#17a2b8',
        'scheduled': '#ffc107',
        'evaluation': '#007bff',
        'hired': '#28a745',
        'rejected': '#dc3545',
        'archived': '#343a40'
    };
    
    const statusColor = statusColors[data.status.toLowerCase()] || '#000000';

    const statusEl = document.getElementById('applicantStatus');
    if (statusEl) {
        statusEl.innerText = `STAGE: ${data.status.toUpperCase()}`;
        Object.assign(statusEl.style, {
            color: statusColor,
            border: `2px solid ${statusColor}`,
            backgroundColor: 'transparent',
            fontWeight: '600'
        });
    }
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

    {{-- DataTables Initialization for Applicant Tables --}}
    {{-- <script>
        $(document).ready(function () {
            // Loop through each table with class 'applicantTable' and initialize DataTables
            $('.applicantTable').each(function () {
                $(this).DataTable({
                    responsive: true, // Makes the table adapt on different screen sizes
                    paging: true, // Enables pagination (Next, Previous, etc.)
                    searching: true, // Enables the search input box
                    info: true, // Shows table info like "Showing 1 to 10 of 50 entries"
                    lengthChange: true, // Allows user to select number of entries to show
                    order: [[3, 'desc']], // Default sort by 4th column (Applied Date) in descending order
                    dom: '<"datatable-toolbar d-flex justify-content-between align-items-center my-3"lf>tip'
                    // Custom DOM layout:
                    // "l" = entries length dropdown
                    // "f" = search box
                    // "t" = table
                    // "i" = info text
                    // "p" = pagination controls
                    // All wrapped in a flexbox toolbar for styling
                });
            });
    
            // When a new tab is shown (via Bootstrap tab click),
            // force the DataTable to redraw its columns (important for hidden tab tables)
            $('a[data-bs-toggle="tab"]').on('shown.bs.tab', function () {
                $('.applicantTable').DataTable().columns.adjust().draw();
            });
        });
    </script> --}}
        
</x-admin-ats-layout>