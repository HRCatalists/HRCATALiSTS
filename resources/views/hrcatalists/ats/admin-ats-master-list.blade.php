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
                    <div class="card checkbox-card ">
                        <div class="container d-flex">

                            <!-- Select All heckbox -->
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

                    <div class="d-flex justify-content-around ms-3">
                        <!-- Add Position Button -->
                        <button type="button" class="btn add-btn me-2" data-bs-toggle="modal" data-bs-target="#addApplicantModal">
                            <a href="">ADD APPLICANT</a>
                        </button>

                        <button class="btn shadow print-btn">
                            <i class="fa fa-print"></i> PRINT
                            <a href=""></a>
                        </button>
                    </div>
                </div>
                
                <!-- Applicant Table -->
                <table id="applicantTable" class="table table-bordered display">
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
                                        <form method="POST" action="{{ route('applicants.updateStatus', $applicant->id) }}" class="status-update-form">
                                            @csrf
                                            <select name="status" class="form-select status-dropdown"
                                                data-applicant-name="{{ $applicant->first_name }} {{ $applicant->last_name }}" 
                                                data-current-status="{{ $applicant->status }}"
                                                style="color: #fff; border-radius: 4px; padding: 4px; text-align: center;"
                                            >
                                                <option value="pending" {{ $applicant->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                                <option value="screening" {{ $applicant->status == 'screening' ? 'selected' : '' }}>Screening</option>
                                                <option value="scheduled" {{ $applicant->status == 'scheduled' ? 'selected' : '' }}>Scheduled</option>
                                                <option value="interviewed" {{ $applicant->status == 'interviewed' ? 'selected' : '' }}>Interviewed</option>
                                                <option value="hired" {{ $applicant->status == 'hired' ? 'selected' : '' }}>Hired</option>
                                                <option value="rejected" {{ $applicant->status == 'rejected' ? 'selected' : '' }}>Rejected</option>
                                                <option value="archived" {{ $applicant->status == 'archived' ? 'selected' : '' }}>Archived</option>
                                            </select>
                                        </form>
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
                            @endforeach
                        @else
                            <tr>
                                <td colspan="6" class="text-center">No applicants found.</td>
                            </tr>
                        @endif
                    </tbody>
                </table>

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

    <!-- Add Applicant Modal -->
    <div class="modal fade" id="addApplicantModal" tabindex="-1" aria-labelledby="addApplicantModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form id="addApplicantForm" action="" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header text-white" style="background-color: #111D5B;">
                        <h5 class="modal-title" id="addApplicantModalLabel">Add New Applicant</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <h5 class="text-primary mb-3">Application Form</h5>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="firstName" class="form-label">First Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="firstName" name="first_name" placeholder="Enter First Name" required>
                            </div>
                            <div class="col-md-6">
                                <label for="lastName" class="form-label">Last Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="lastName" name="last_name" placeholder="Enter Last Name" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="emailAddress" class="form-label">E-mail Address <span class="text-danger">*</span></label>
                                <input type="email" class="form-control" id="emailAddress" name="email" placeholder="Enter E-mail Address" required>
                            </div>
                            <div class="col-md-6">
                                <label for="phoneNumber" class="form-label">Phone Number <span class="text-danger">*</span></label>
                                <input type="tel" class="form-control" id="phoneNumber" name="phone" placeholder="Enter Phone Number" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">Address <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="address" name="address" placeholder="Enter Address" required>
                        </div>
                        <!-- CV Upload -->
                        <div class="mb-4">
                            <label for="cv" class="form-label">Attach CV <span class="text-danger">*</span></label>
                            <div class="file-upload">
                                <label for="cv" class="upload-label">
                                    <button type="button" class="btn btn-primary">Upload</button>
                                    <span class="file-name">or drag your file here</span>
                                </label>
                                <input type="file" id="cv" name="cv" class="file-input" accept=".pdf" required>
                            </div>
                            <small class="form-text text-muted">Submit your file in .pdf format (Max: 2 MB)</small>
                            <small class="form-text text-danger" id="error-message" style="display: none;"></small>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">ADD</button>
                        <button type="button" class="btn btn-cancel" data-bs-dismiss="modal">CANCEL</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <!-- End of Add Applicant Modal -->


    <!-- Offcanvas for Candidate Profile View -->
    <div class="offcanvas offcanvas-end p-0" tabindex="-1" id="candidateProfile" aria-labelledby="candidateProfileLabel">

        <div class="offcanvas-header">
            <h3 class="offcanvas-title" id="candidateProfileLabel">Candidate Profile View</h3>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>

        <div class="offcanvas-body-wrapper px-4">
            <div class="content-section">
                <div class="d-flex align-items-center justify-content-between my-4">
                    <h5 id="applicantName" class="mt-2">Applicant Name</h5>
    
                    <span id="applicantStatus" class="stage border px-3 py-1" style="border-radius: 4px;">
                        STAGE: N/A
                    </span>
                </div>
                
                <!-- Tabs -->
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" href="#" onclick="showTab('overview')">Overview</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" onclick="showTab('notes')">Notes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" onclick="showTab('interview')">Schedule an Interview</a>
                    </li>
                </ul>

                <!-- Tab Content -->
                <!-- Overview Tab -->
                <div id="overview" class="tab-content">
                    <div class="applicant-section">
                        <div class="applicant-data">
                            <h5>Applicant Data</h5>

                            <div class="row">
                                <div class="col-md-12">
                                    <p><strong>Position:</strong> <span id="applicantPosition">N/A</span></p>
                                </div>
                            </div>

                            {{-- <div class="row">
                                <div class="col-md-6">
                                    <p><strong>Name:</strong> <span id="applicantNameOverview">N/A</span></p>
                                </div>
                            </div> --}}

                            <div class="row">
                                <div class="col-md-6">
                                    <i class="fa-solid fa-envelope me-2"></i> <span id="applicantEmail">N/A</span>
                                </div>
                                <div class="col-md-6">
                                    <i class="fa-solid fa-phone me-2"></i> <span id="applicantPhone">N/A</span>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <i class="fa-solid fa-location-dot me-2"></i> <span id="applicantAddress">N/A</span>
                                </div>
                            </div>
                        </div>

                        <!-- Attachment -->
                        <div class="file-attachment my-4">
                            <img src="images/pdf-img.png" alt="PDF icon">
                            <span id="applicantResume">Resume.pdf</span>
                            <span class="ms-auto">200 KB</span>
                        </div>
                        
                        <div class="d-grid mt-5">
                            <!-- APPROVE -->
                            <form method="POST" action="{{ route('applicants.updateStatus', $applicant->id) }}">
                                @csrf
                                <input type="hidden" name="action" value="approve">
                                <input type="hidden" name="email" value="{{ $applicant->email }}">
                                <input type="hidden" name="name" value="{{ $applicant->first_name }} {{ $applicant->last_name }}">
                                <button type="submit" class="btn btn-success">APPROVE</button>
                            </form>
                        
                            <!-- REJECT -->
                            <form method="POST" action="{{ route('applicants.updateStatus', $applicant->id) }}">
                                @csrf
                                <input type="hidden" name="action" value="reject">
                                <input type="hidden" name="email" value="{{ $applicant->email }}">
                                <input type="hidden" name="name" value="{{ $applicant->first_name }} {{ $applicant->last_name }}">
                                <button type="submit" class="btn btn-danger">REJECT</button>
                            </form>
                        
                            <!-- ARCHIVE -->
                            <form method="POST" action="{{ route('applicants.updateStatus', $applicant->id) }}">
                                @csrf
                                <input type="hidden" name="action" value="archive">
                                <input type="hidden" name="email" value="{{ $applicant->email }}">
                                <input type="hidden" name="name" value="{{ $applicant->first_name }} {{ $applicant->last_name }}">
                                <button type="submit" class="btn btn-outline-danger">ARCHIVE</button>
                            </form>
                        </div>
                                                                   
                        {{-- <div class="d-grid mt-5">
                            <button class="btn btn-success mb-2" onclick="updateStatus('approve')">APPROVE</button>
                            <button class="btn btn-danger mb-2" onclick="updateStatus('reject')">REJECT</button>
                            <button class="btn btn-outline-danger mb-2" onclick="updateStatus('archive')">ARCHIVE</button>
                            <input type="hidden" id="applicantId" value="{{ $applicant->id }}">
                        </div>                         --}}
                    </div>
                </div>
                <!-- End Overview Tab -->
                
                <!-- Notes Tab -->
                <div id="notes" class="tab-content" style="display: none;">
                    <div class="notes-section">
                        <p><strong>Lorem ipsum dolor sit amet.</strong> consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua...</p>
                        <p><strong>Lorem ipsum dolor sit amet.</strong> consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua...</p>
                        <p><strong>Lorem ipsum dolor sit amet.</strong> consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua...</p>

                        <div class="notes-btn">
                            <button class="btn btn-primary mt-3">Add</button>
                            <button class="btn btn-success mt-3">Edit</button>
                        </div>
                    </div>
                </div>
                <!-- End Notes Tab -->

                <!-- Interview Tab -->
                <div id="interview" class="tab-content" style="display: none;">
                    <div class="interview-section">
                        <form>
                            <!-- Schedule Name -->
                            <div class="mb-3">
                                <label for="scheduleName" class="form-label">Schedule Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="scheduleName" required>
                            </div>
                            <!-- Name of Applicant -->
                            <div class="mb-3">
                                <label for="applicantName" class="form-label">Name of Applicant <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="applicantName" required>
                            </div>
                            <!-- Applicant Email -->
                            <div class="mb-3">
                                <label for="applicantEmail" class="form-label">Applicant Email <span class="text-danger">*</span></label>
                                <input type="email" class="form-control" id="applicantEmail" required>
                            </div>
                            <!-- Schedule Date and Time -->
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="scheduleDate" class="form-label">Schedule Date <span class="text-danger">*</span></label>
                                    <input type="date" class="form-control" id="scheduleDate" placeholder="Select date" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="scheduleTime" class="form-label">Time <span class="text-danger">*</span></label>
                                    <input type="time" class="form-control" id="scheduleTime" required>
                                </div>
                            </div>
                            <!-- Submit Button -->
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary mt-3">SCHEDULE INTERVIEW</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- End Interview Tab -->
            </div>

            <!-- Approve Popup -->
            <div id="approvePopup" class="custom-popup">
                <div class="popup-content">
                    <p>Are you sure you want to approve this applicant and proceed to the next stage?</p>
                    <button class="btn btn-success" onclick="approveAction()">Yes</button>
                    <button class="btn btn-outline-secondary" onclick="closePopup('approvePopup')">Cancel</button>
                </div>
            </div>
            
        </div>
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

    {{-- {{-- Approve, Reject, Archive overview confirmation start --}}
    {{-- <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Select all buttons with class sweetalert-btn
            document.querySelectorAll('.sweetalert-btn').forEach(button => {
                button.addEventListener('click', function () {
                    const action = this.getAttribute('data-action'); // approve, reject, archive
                    const form = this.closest('form');
    
                    // Define readable action text
                    const actionText = {
                        'approve': 'hire',
                        'reject': 'reject',
                        'archive': 'archive'
                    };
    
                    // Color mapping for SweetAlert
                    const actionColors = {
                        'approve': '#28a745',
                        'reject': '#dc3545',
                        'archive': '#6c757d'
                    };
    
                    // Trigger SweetAlert confirmation
                    Swal.fire({
                        title: `Are you sure you want to ${actionText[action]} this applicant?`,
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: actionColors[action],
                        cancelButtonColor: '#d33',
                        confirmButtonText: `Yes, ${actionText[action]}!`
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit(); // ✅ Submit the form if confirmed
                        }
                    });
                });
            });
        });
    </script>     --}}
    {{-- Approve, Reject, Archive overview confirmation end --}}

</x-admin-ats-layout>