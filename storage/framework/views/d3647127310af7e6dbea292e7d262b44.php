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
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
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
                    <?php echo e($applicant->first_name ?? 'Applicant Name'); ?> <?php echo e($applicant->last_name ?? ''); ?>

                </h5>
                <span id="applicantStatus" class="stage border px-3 py-1" style="border-radius: 4px;">
                    STAGE: <?php echo e($applicant->status ?? 'N/A'); ?>

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

            <!-- Overview Tab -->
            <div id="overview" class="tab-content">
                <div class="applicant-section">
                    <div class="applicant-data">
                        <h5>Applicant Data</h5>
                        <div class="row">
                            <div class="col-md-12">
                                <p><strong>Position:</strong> <span id="applicantJob"><?php echo e($applicant->job->job_title ?? 'N/A'); ?></span></p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <i class="fa-solid fa-envelope me-2"></i> <span id="applicantEmail"><?php echo e($applicant->email ?? 'N/A'); ?></span>
                            </div>

                            <div class="col-md-6">
                                <i class="fa-solid fa-phone me-2"></i> <span id="applicantPhone"><?php echo e($applicant->phone ?? 'N/A'); ?></span>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-12">
                                <i class="fa-solid fa-location-dot me-2"></i> <span id="applicantAddress"><?php echo e($applicant->address ?? 'N/A'); ?></span>
                            </div>
                        </div>
                    </div>

                    <!-- Attachment -->
                    <?php if(!empty($applicant->cv)): ?>
                        <div class="file-attachment my-4">
                            <a id="applicantCVLink" href="https://drive.google.com/uc?export=download&id=<?php echo e($applicant->cv); ?>" target="_blank" download>
                                <img src="<?php echo e(asset('images/pdf-img.png')); ?>" alt="PDF icon">
                                <span id="applicantCV">CV.pdf</span>
                                <span class="ms-auto">Click to Download</span>
                            </a>
                        </div>
                    <?php else: ?>
                        <p id="cvMessage">No CV available.</p>
                    <?php endif; ?>

                    <div class="d-grid mt-5">
                        <?php if(isset($applicant)): ?>
                            <!-- PASS/FAIL for Evaluation -->
                            <div id="demoButtons" class="d-none">
                                <form method="POST" action="<?php echo e(route('applicants.updateStatus', $applicant->id)); ?>">
                                    <?php echo csrf_field(); ?>
                                    <input type="hidden" name="action" value="pass_evaluation">
                                    <button type="submit" class="btn btn-success mb-2">PASS DEMO TEACHING</button>
                                </form>
                                <form method="POST" action="<?php echo e(route('applicants.updateStatus', $applicant->id)); ?>">
                                    <?php echo csrf_field(); ?>
                                    <input type="hidden" name="action" value="fail_evaluation">
                                    <button type="submit" class="btn btn-danger mb-2">FAIL DEMO TEACHING</button>
                                </form>
                            </div>
                    
                            <!-- Approve/Reject/Archive -->
                            <div id="defaultButtons" class="d-none">
                                <form method="POST" action="<?php echo e(route('applicants.updateStatus', $applicant->id)); ?>">
                                    <?php echo csrf_field(); ?>
                                    <input type="hidden" name="action" value="approve">
                                    <button type="submit" class="btn btn-primary mb-2">APPROVE</button>
                                </form>
                                <form method="POST" action="<?php echo e(route('applicants.updateStatus', $applicant->id)); ?>">
                                    <?php echo csrf_field(); ?>
                                    <input type="hidden" name="action" value="reject">
                                    <button type="submit" class="btn btn-outline-danger mb-2">REJECT</button>
                                </form>
                                <form method="POST" action="<?php echo e(route('applicants.updateStatus', $applicant->id)); ?>">
                                    <?php echo csrf_field(); ?>
                                    <input type="hidden" name="action" value="archive">
                                    <button type="submit" class="btn btn-secondary">ARCHIVE</button>
                                </form>
                            </div>
                        <?php else: ?>
                            <p class="text-danger">Applicant data not found.</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        
            <!-- End Overview Tab -->

            <!-- Notes Tab -->
            <div id="notes" class="tab-content" style="display: none;">
                <div class="notes-section">
                    <p><strong>Notes:</strong> <span id="applicantNotes"><?php echo nl2br(e($applicant->notes ?? 'No Notes Available.')); ?></span></p>
                    <div class="notes-btn">
                        <button class="btn btn-success mt-3" data-bs-toggle="modal" data-bs-target="#editNotesModal">Edit</button>
                    </div>
                </div>
            </div>
            <!-- End Notes Tab -->

            <!-- Interview Tab -->
            <div id="interview" class="tab-content" style="display: none;">
                <form id="scheduleInterviewForm" method="POST">
                    <?php echo csrf_field(); ?>
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
        </div>
    </div>
</div>
<!-- End Offcanvas -->


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

            const statusKey = data.status.toLowerCase();
            const statusColor = statusColors[statusKey] || '#000000';

            Swal.fire({
                icon: 'info',
                title: data.name,
                text: `Currently in stage: ${data.status.toUpperCase()}`,
                confirmButtonColor: statusColor,
                confirmButtonText: 'View Profile'
            });

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

            document.getElementById(statusKey === 'evaluation' ? 'demoButtons' : 'defaultButtons')?.classList.remove('d-none');
            document.getElementById(statusKey !== 'evaluation' ? 'demoButtons' : 'defaultButtons')?.classList.add('d-none');
        });
    }

    // Laravel Success/Error Alerts
    <?php if(session('success')): ?>
        Swal.fire({
            icon: 'success',
            title: 'Success!',
            text: "<?php echo e(session('success')); ?>",
            confirmButtonColor: '#28a745'
        });
    <?php endif; ?>

    <?php if(session('error')): ?>
        Swal.fire({
            icon: 'error',
            title: 'Error!',
            text: "<?php echo e(session('error')); ?>",
            confirmButtonColor: '#dc3545'
        });
    <?php endif; ?>
});


</script>





<?php /**PATH C:\Users\raide\OneDrive\Desktop\HRCATALiSTS-hr-catalists\resources\views/components/partials/system/ats/ats-candidate-profile-offcanvas.blade.php ENDPATH**/ ?>