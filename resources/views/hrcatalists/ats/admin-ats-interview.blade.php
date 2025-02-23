<x-admin-ats-layout>

    <x-slot:title>
        Columban College Inc. | ATS Interview
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
                            <h2 class="dt-h2">For Interview</h2>
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
                            <button type="button" class="btn add-btn me-2">
                                <a href="ats-admin-form.html">ADD APPLICANT</a>
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
                        
                            @if(is_countable($interviewedApplicants) && count($interviewedApplicants) > 0)
                                @php $hasResults = false; @endphp
                        
                                @foreach($interviewedApplicants as $applicant)
                                    @if(in_array($applicant->status, ['scheduled', 'interviewed']))
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
                                    @endif
                                @endforeach
                        
                                {{-- Show "No applicants found" if no results --}}
                                @if(!$hasResults)
                                    <tr>
                                        <td colspan="6" class="text-center">No pending or screening applicants found.</td>
                                    </tr>
                                @endif
                            @else
                                <tr>
                                    <td colspan="6" class="text-center">No applicants available.</td>
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

        <!-- Offcanvas for Candidate Profile View -->
        <div class="offcanvas offcanvas-end p-0" tabindex="-1" id="candidateProfile" aria-labelledby="candidateProfileLabel">

            <div class="offcanvas-header">
                <h3 class="offcanvas-title" id="candidateProfileLabel">Candidate Profile View</h3>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>

            <div class="offcanvas-body-wrapper px-4">
                <div class="content-section">
                    <div class="d-flex align-items-center justify-content-between my-4">
                        <h5 class="mt-2">RHINELL MENES</h5>

                        <span class="stage border px-3 py-1">
                            STAGE: INTERVIEW
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
                        
                        <!-- Applicant Section -->
                        <div class="applicant-section">
                            
                            <div class="applicant-data">
                                <h5>Applicant Data</h5>

                                <div class="row">
                                    <div class="col-md-12">
                                        <p> <strong>Position:</strong> Medical Staff</p>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <p> <strong>Full Name:</strong> Rhinell menes</p>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <i class="fa-solid fa-envelope me-2"></i> menesj@gmail.com
                                    </div>
                                    <div class="col-md-6">
                                        <i class="fa-solid fa-phone me-2"></i> 09313 4567 89
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-md-12">
                                        <i class="fa-solid fa-location-dot me-2"></i> 37-B 7th St., West Tapinac, Olongapo City
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Attachment -->
                            <div class="file-attachment my-4">
                                <img src="images/pdf-img.png" alt="PDF icon">
                                <span>Severus_Snape_CVfinalfinal.pdf</span>
                                <span class="ms-auto">200 KB</span>
                            </div>

                            <div class="d-grid mt-5">
                                <!-- <button class="btn btn-primary">EDIT APPLICANT DATA</button> -->
                            </div>
                            <div class="d-grid button-container mt-5">
                                <button class="btn btn-success" onclick="showPopup('approvePopup')">APPROVE</button>
                            </div>

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

</x-admin-ats-layout>