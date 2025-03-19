<x-admin-ats-layout>

    <x-slot:title>
        Columban College Inc. | ATS Archived
    </x-slot:title>

        <!-- Sidebar & Calendar -->
        <div class="d-flex">
            <!-- Sidebar -->
            <x-partials.system.ats.ats-sidebar />
            <!-- End of Sidebar -->

            <!-- Archived List -->
            <div id="content" class="flex-grow-1">
                <div class="container mt-5">
                    
                    <div class="d-flex justify-content-between align-items-center my-5">
                        <div>
                            <h2 class="dt-h2">Archived Applicants</h2>
                        </div>
                    </div>

                    <div class="d-flex">
                        <div class="card checkbox-card">
                            <div class="container d-flex">

                                <!-- Select All heckbox -->
                                <div class="d-flex me-4 py-3">
                                    <input type="checkbox" id="selectAll" class="rowCheckbox">
                                </div>
                                
                                <!-- Retrieve and Delete Buttons -->
                                <div class="d-flex py-1">
                                    <button class="btn btn-success btn-sm me-2">RETRIEVE</button>
                                    <button class="btn reject-btn btn-sm">DELETE</button>
                                </div>
                                
                            </div>
                            
                        </div>

                        <div class="d-flex justify-content-around ms-3">

                            <button class="btn shadow print-btn">
                                <i class="fa fa-print"></i> PRINT
                                <a href=""></a>
                            </button>
                        </div>
                    </div>
        
                    <!-- Applicant Table -->
                    <table id="archivedApplicantTable" class="table table-bordered display">
                        <thead>
                            <tr>
                                <th></th>
                                <th>APPLICANT NAME</th>
                                <th>STATUS</th>
                                <th>APPLIED DATE</th>
                                <th>POSITION APPLIED TO</th>
                                <th>ACTIONS</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                // Define status colors outside the loop for reusability
                                $statusColors = [
                                    'pending' => '#555555',      // Gray
                                    'screening' => '#ffe135',    // Yellow
                                    'scheduled' => '#ff8c00',    // Orange
                                    'interviewed' => '#ff8c00',  // Orange
                                    'hired' => '#4CAF50',        // Green
                                    'rejected' => '#8b0000',     // Red
                                    'archived' => '#4b0082'      // Indigo
                                ];
                            @endphp
                        
                            @if(is_countable($allApplicants) && count($allApplicants) > 0)
                                @php $hasResults = false; @endphp
                        
                                @foreach($allApplicants as $applicant)
                                    @if(in_array($applicant->status, ['rejected', 'archived']))
                                        @php $hasResults = true; @endphp
                                        @php
                                            $statusColor = $statusColors[$applicant->status] ?? '#000000'; // Default Black
                                        @endphp
                        
                                        <tr>
                                            <td class="text-center">
                                                <input type="checkbox" class="rowCheckbox" value="{{ $applicant->id }}">
                                            </td>
                                            <td>{{ $applicant->first_name }} {{ $applicant->last_name }}</td>
                                            <td>
                                                <span style="display: block; width: 100%; background-color: {{ $statusColor }}; color: #fff; border-radius: 4px; padding: 4px 8px; text-align: center;">
                                                    {{ ucfirst($applicant->status) }}
                                                </span>
                                            </td>
                                            <td>{{ \Carbon\Carbon::parse($applicant->applied_at)->format('F d, Y') }}</td>
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
                                    @endif
                                @endforeach
                        
                                {{-- Show "No applicants found" if no results --}}
                                @if(!$hasResults)
                                    <tr>
                                        <td colspan="6" class="text-center">No rejected or archived applicants found.</td>
                                    </tr>
                                @endif
                            @else
                                <tr>
                                    <td colspan="6" class="text-center">No applicants available.</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>

                    <!-- Retrieve Popup -->
                    <div id="retrievePopup" class="custom-popup">
                        <div class="popup-content">
                            <p>Are you sure you want to retrieve this applicant?</p>
                            <button class="btn btn-success" onclick="retrieveAction()">Yes, retrieve the applicant</button>
                            <button class="btn btn-outline-secondary" onclick="closePopup('retrievePopup')">Cancel</button>
                        </div>
                    </div>

                    <!-- Delete Popup -->
                    <div id="deletePopup" class="custom-popup">
                        <div class="popup-content">
                            <p>Are you sure you want to delete this applicant?</p>
                            <button class="btn btn-danger" onclick="deleteAction()">Yes, delete the applicant</button>
                            <button class="btn btn-outline-secondary" onclick="closePopup('deletePopup')">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        @include('components.partials.system.ats.ats-candidate-profile-offcanvas')
                </div>
            

                
        {{-- <script>
        document.addEventListener('DOMContentLoaded', function () {
            const offcanvas = document.getElementById('candidateProfile');
    
            offcanvas.addEventListener('show.bs.offcanvas', function (event) {
                const button = event.relatedTarget;
    
                // Get applicant data from data attributes
                const applicantName = button.getAttribute('data-applicant-name');
                const applicantStatus = button.getAttribute('data-applicant-status');
                const applicantEmail = button.getAttribute('data-applicant-email');
                const applicantPhone = button.getAttribute('data-applicant-phone');
                const applicantPosition = button.getAttribute('data-applicant-position');
                const applicantAddress = button.getAttribute('data-applicant-address');
    
                // Status color mapping
                const statusColors = {
                    'pending': '#555555',      // Gray
                    'screening': '#ffe135',    // Yellow
                    'scheduled': '#ff8c00',    // Orange
                    'interviewed': '#ff8c00',  // Orange
                    'hired': '#4CAF50',        // Green
                    'rejected': '#8b0000',     // Red
                    'archived': '#4b0082'      // Indigo
                };
    
                const statusColor = statusColors[applicantStatus] || '#000000'; // Default black
    
                // Populate the Offcanvas fields
                document.getElementById('applicantName').innerText = applicantName;
                document.getElementById('applicantStatus').innerText = 'STAGE: ' + applicantStatus.toUpperCase();
                document.getElementById('applicantStatus').style.backgroundColor = statusColor;
    
                document.getElementById('applicantEmail').innerText = applicantEmail;
                document.getElementById('applicantPhone').innerText = applicantPhone;
                document.getElementById('applicantPosition').innerText = applicantPosition;
                document.getElementById('applicantAddress').innerText = applicantAddress;
            });
        });
    </script>       --}}

    {{-- Applying button color changes based on the status --}}
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const offcanvas = document.getElementById('candidateProfile');
    
            offcanvas.addEventListener('show.bs.offcanvas', function (event) {
                const button = event.relatedTarget;
    
                // Get applicant data from data attributes
                const applicantName = button.getAttribute('data-applicant-name');
                const applicantStatus = button.getAttribute('data-applicant-status');
                const applicantEmail = button.getAttribute('data-applicant-email');
                const applicantPhone = button.getAttribute('data-applicant-phone');
                const applicantPosition = button.getAttribute('data-applicant-position');
                const applicantAddress = button.getAttribute('data-applicant-address');
                const applicantResume = button.getAttribute('data-applicant-resume') || 'N/A';
    
                // Status color mapping
                const statusColors = {
                    'pending': '#6c757d',       // Gray
                    'screening': '#17a2b8',     // Teal
                    'scheduled': '#ffc107',     // Yellow
                    'interviewed': '#007bff',   // Blue
                    'hired': '#28a745',         // Green
                    'rejected': '#dc3545',      // Red
                    'archived': '#4b0082'      // Indigo
                };
    
                const statusColor = statusColors[applicantStatus] || '#000000'; // Default black
    
                // Populate the Offcanvas fields
                document.getElementById('applicantName').innerText = applicantName;
                document.getElementById('applicantStatus').innerText = 'STAGE: ' + applicantStatus.toUpperCase();
                document.getElementById('applicantEmail').innerText = applicantEmail;
                document.getElementById('applicantPhone').innerText = applicantPhone;
                document.getElementById('applicantPosition').innerText = applicantPosition;
                document.getElementById('applicantAddress').innerText = applicantAddress;
                document.getElementById('applicantResume').innerText = applicantResume;
    
                // Apply color and border to status
                const statusElement = document.getElementById('applicantStatus');
                statusElement.setAttribute('style', `
                    color: ${statusColor} !important;
                    border: 2px solid ${statusColor} !important;
                    background-color: transparent !important;
                `);
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
        


</x-admin-ats-layout>