<!-- Edit Notes Modal -->
<div class="modal fade" id="editNotesModal" tabindex="-1" aria-labelledby="editNotesModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editNotesModalLabel">Edit Notes</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editNotesForm" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="noteContent" class="form-label">Edit Your Notes:</label>
                        <textarea class="form-control" id="noteContent" name="notes" rows="5"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Candidate Profile Offcanvas -->
<div class="offcanvas offcanvas-end p-0" tabindex="-1" id="candidateProfile" aria-labelledby="candidateProfileLabel">
    <div class="offcanvas-header">
        <h3 class="offcanvas-title" id="candidateProfileLabel">Candidate Profile View</h3>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>

    <div class="offcanvas-body-wrapper px-4">
        <div class="container content-section">
            <div class="d-flex align-items-center justify-content-between my-4">
                <h5 id="applicantName">
                    {{ $applicant->first_name ?? 'Applicant Name' }} {{ $applicant->last_name ?? '' }}
                </h5>
                <span id="applicantStatus" class="stage border px-3 py-1" style="border-radius: 4px;">
                    STAGE: {{ $applicant->status ?? 'N/A' }}
                </span>
            </div>

            <!-- Tabs -->
            <ul class="nav nav-tabs">

                {{-- Applicannt Information Overview --}}
                <li class="nav-item">
                    <a class="nav-link active" href="#" onclick="showTab('overview')">Overview</a>
                </li>

                {{-- Notes --}}
                <li class="nav-item">
                    <a class="nav-link" href="#" onclick="showTab('notes')">Notes</a>
                </li>

                {{-- Schedule an Interview --}}
                <li class="nav-item">
                    <a class="nav-link" href="#" onclick="showTab('interview')">Schedule an Interview</a>
                </li>

                {{-- Requirements --}}
                <li class="nav-item">
                    <a class="nav-link" href="#" onclick="showTab('requirements')">Requirements</a>
                </li>                
            </ul>

            <!-- Overview Tab -->
            <div id="overview" class="tab-content">
                <div class="applicant-section">
                    <div class="applicant-data">
                        <h5>Applicant Data</h5>
                        <div class="row">
                            <div class="col-md-12">
                                <p><strong>Position:</strong> <span id="applicantJob">{{ $applicant->job->job_title ?? 'N/A' }}</span></p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <i class="fa-solid fa-envelope me-2"></i> <span id="applicantEmail">{{ $applicant->email ?? 'N/A' }}</span>
                            </div>

                            <div class="col-md-6">
                                <i class="fa-solid fa-phone me-2"></i> <span id="applicantPhone">{{ $applicant->phone ?? 'N/A' }}</span>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-12">
                                <i class="fa-solid fa-location-dot me-2"></i> <span id="applicantAddress">{{ $applicant->address ?? 'N/A' }}</span>
                            </div>
                        </div>
                    </div>

                    <!-- Attachment -->
                    <div class="file-attachment my-4">
                        <a id="applicantCVLink" href="#" target="_blank" download style="display: none;" class="d-flex align-items-center gap-2">
                            <img src="{{ asset('images/pdf-img.png') }}" alt="PDF icon" style="width: 24px;">
                            <span id="applicantCV" class="fw-semibold text-primary"></span>
                            <span class="ms-auto text-muted">Click to Download</span>
                        </a>
                        <p id="cvMessage" class="mb-0 text-muted border rounded px-3 py-2" style="display: none;">No CV available.</p>
                    </div>                    

                    {{-- <div class="d-grid mt-5">
                        @if(isset($applicant))
                            <!-- PASS/FAIL for Evaluation -->
                            <div id="demoButtons" class="d-none">
                                <form method="POST" action="{{ route('applicants.updateStatus', $applicant->id) }}">
                                    @csrf
                                    <input type="hidden" name="action" value="pass_evaluation">
                                    <button type="submit" class="btn btn-success mb-2">PASS</button>
                                </form>
                                <form method="POST" action="{{ route('applicants.updateStatus', $applicant->id) }}">
                                    @csrf
                                    <input type="hidden" name="action" value="fail_evaluation">
                                    <button type="submit" class="btn btn-danger mb-2">FAIL</button>
                                </form>
                                <form method="POST" action="{{ route('applicants.updateStatus', $applicant->id) }}">
                                    @csrf
                                    <input type="hidden" name="action" value="archive">
                                    <button type="submit" class="btn btn-secondary">ARCHIVE</button>
                                </form>                                
                            </div>
                    
                            <!-- Approve/Reject/Archive -->
                            <div id="defaultButtons" class="d-none">
                                <form method="POST" action="{{ route('applicants.updateStatus', $applicant->id) }}">
                                    @csrf
                                    <input type="hidden" name="action" value="approve">
                                    <button type="submit" class="btn btn-primary mb-2">FOR EVALUATION</button>
                                </form>
                                <form method="POST" action="{{ route('applicants.updateStatus', $applicant->id) }}">
                                    @csrf
                                    <input type="hidden" name="action" value="reject">
                                    <button type="submit" class="btn btn-outline-danger mb-2">REJECT</button>
                                </form>
                                <form method="POST" action="{{ route('applicants.updateStatus', $applicant->id) }}">
                                    @csrf
                                    <input type="hidden" name="action" value="archive">
                                    <button type="submit" class="btn btn-secondary">ARCHIVE</button>
                                </form>                                
                            </div>
                        @else
                            <p class="text-danger">Applicant data not found.</p>
                        @endif
                    </div> --}}
                </div>
            </div>
        
            <!-- End Overview Tab -->

            <!-- Notes Tab -->
            <div id="notes" class="tab-content" style="display: none;">
                <div class="notes-section">
                    <p><strong>Notes:</strong> <span id="applicantNotes">{!! nl2br(e($applicant->notes ?? 'No Notes Available.')) !!}</span></p>
                    <div class="notes-btn">
                        <button class="btn btn-success mt-3" data-bs-toggle="modal" data-bs-target="#editNotesModal">Edit</button>
                    </div>
                </div>
            </div>
            <!-- End Notes Tab -->

            <!-- Interview Tab -->
            <div id="interview" class="tab-content" style="display: none;">
                <form id="scheduleInterviewForm" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="scheduleName" class="form-label">Schedule Title <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="title" id="scheduleName" required>
                    </div>
                    <div class="mb-3">
                        <label for="applicantNameInput" class="form-label">Name of Applicant <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="applicant_name" id="applicantNameInput" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="applicantEmailInput" class="form-label">Applicant Email <span class="text-danger">*</span></label>
                        <input type="email" class="form-control" name="applicant_email" id="applicantEmailInput" readonly>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="scheduleDate" class="form-label">Schedule Date <span class="text-danger">*</span></label>
                            <input type="date" class="form-control" name="event_date" id="scheduleDate" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="scheduleTime" class="form-label">Time <span class="text-danger">*</span></label>
                            <input type="time" class="form-control" name="event_time" id="scheduleTime" required>
                        </div>
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary mt-3">SCHEDULE INTERVIEW</button>
                    </div>
                </form>                
            </div>
            <!-- End Interview Tab -->

            <!-- Requirements Tab -->
            <div id="requirements" class="tab-content" style="display: none;">
                <form method="POST" action="{{ route('applicants.updateRequirements', $applicant->id) }}">
                    @csrf
                    @method('PUT')
            
                    <h5 class="mb-3">Application Requirements</h5>
            
                    <div class="row">
                        @foreach (config('requirements.list') as $key => $label)
                            <div class="col-md-6 mb-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox"
                                           id="req{{ $loop->index }}"
                                           name="requirements[{{ $key }}]"
                                           value="1"
                                           {{ !empty($applicant->requirements[$key]) && $applicant->requirements[$key] ? 'checked' : '' }}>                                    
                                    <label class="form-check-label" for="req{{ $loop->index }}">
                                        {{ $label }}
                                    </label>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="d-grid mt-3">
                        <button type="submit" class="btn btn-success">Save Requirements</button>
                    </div>
                </form>
            </div>
            {{-- <div id="requirements" class="tab-content" style="display: none;">
                <form id="requirementsForm">
                    <h5 class="mb-3">Application Requirements</h5>

                    @php
                        $requirements = [
                            'Letter of Application addressed to the President',
                            'Accomplished Application Form for Employment',
                            'Letter of Recommendation and/or clearance from previous employer',
                            'Letter of Recommendation from the references given in the bio-data',
                            'Transcript of Records authenticated by CHED',
                            'Photocopy of Birth Certificate',
                            'Photocopy of Baptismal and Confirmation Certificate',
                            'Photocopy of the Catholic Marriage Contract (if married)',
                            'NBI or Police Clearance',
                            'SSS, Pag-ibig HDMF, Philhealth & TIN',
                            'Professional License (for board courses)',
                            'Certificates of Trainings/Seminars/Special Studies',
                            'Two (2) colored ID Pictures (size 2x2)',
                            'Medical Exam Results (CBC, Chest X-Ray, Drug Test, ECG, HBsAg, Urinalysis)',
                            'Personality Assessment Profile',
                            'Certificates of Training/Seminars Attended'
                        ];
                    @endphp

                    <div class="row">
                        @foreach ($requirements as $requirement)
                            <div class="col-md-6 mb-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="req{{ $loop->index }}" name="requirements[]" value="{{ $requirement }}">
                                    <label class="form-check-label" for="req{{ $loop->index }}">
                                        {{ $requirement }}
                                    </label>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="d-grid mt-3">
                        <button type="submit" class="btn btn-success">Save Requirements</button>
                    </div>
                </form>
            </div> --}}
            <!-- End Requirements Tab -->
        </div>
    </div>
</div>
<!-- Candidate Profile Offcanvas -->


<!-- For adding notes -->

<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Edit Notes Modal
        const editNotesBtn = document.getElementById("editNotesBtn");
        const noteContent = document.getElementById("noteContent");
        const saveNotesBtn = document.getElementById("saveNotesBtn");
    
        if (editNotesBtn && noteContent && saveNotesBtn) {
            editNotesBtn.addEventListener("click", function () {
                let allNotes = document.querySelectorAll("#notes p");
                let combinedNotes = Array.from(allNotes).map(note => note.innerText).join("\n\n");
                noteContent.value = combinedNotes.trim();
                new bootstrap.Modal(document.getElementById("editNotesModal")).show();
            });
    
            saveNotesBtn.addEventListener("click", function () {
                let updatedNotes = noteContent.value.split("\n\n");
                document.querySelectorAll("#notes p").forEach((note, index) => {
                    if (updatedNotes[index]) note.innerText = updatedNotes[index];
                });
                document.querySelector("#editNotesModal .btn-close").click();
            });
        }
    
        // Offcanvas Handling
        const offcanvas = document.getElementById('candidateProfile');
        if (offcanvas) {
            const statusColors = {
                'pending': '#6c757d',
                'screening': '#17a2b8',
                'scheduled': '#ffc107',
                'evaluation': '#007bff',
                'hired': '#28a745',
                'rejected': '#dc3545',
                'archived': '#343a40'
            };
    
            offcanvas.addEventListener('show.bs.offcanvas', function (event) {
                const button = event.relatedTarget;
                if (!button) return;
    
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
    
                // Set static content
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
    
                // Status styling
                const statusKey = data.status.toLowerCase();
                const statusColor = statusColors[statusKey] || '#000000';
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
    
                // Show correct buttons
                document.getElementById(statusKey === 'evaluation' ? 'demoButtons' : 'defaultButtons')?.classList.remove('d-none');
                document.getElementById(statusKey !== 'evaluation' ? 'demoButtons' : 'defaultButtons')?.classList.add('d-none');
    
                // CV Download Link
                const cvLink = document.getElementById('applicantCVLink');
                const cvNameSpan = document.getElementById('applicantCV');
                const cvMessage = document.getElementById('cvMessage');

                const resumeId = button.dataset.applicantResume || 'N/A';
                const applicantName = button.dataset.applicantName || 'Applicant';

                if (resumeId !== 'N/A') {
                    if (cvLink) {
                        cvLink.href = `https://drive.google.com/uc?export=download&id=${resumeId}`;
                        cvLink.style.display = 'inline-flex';
                    }
                    if (cvNameSpan) {
                        // Generate filename from applicant name
                        const cleanName = applicantName.trim().replace(/\s+/g, '_');
                        const fileName = `${cleanName}_CV.pdf`;
                        cvNameSpan.textContent = fileName;
                    }
                    if (cvMessage) cvMessage.style.display = 'none';
                } else {
                    if (cvLink) cvLink.style.display = 'none';
                    if (cvMessage) cvMessage.style.display = 'block';
                }
            });
        }
    
        // Laravel Success/Error Alerts
        @if(session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: "{{ session('success') }}",
                confirmButtonColor: '#28a745'
            });
        @endif
    
        @if(session('error'))
            Swal.fire({
                icon: 'error',
                title: 'Error!',
                text: "{{ session('error') }}",
                confirmButtonColor: '#dc3545'
            });
        @endif
    });
</script>
    





