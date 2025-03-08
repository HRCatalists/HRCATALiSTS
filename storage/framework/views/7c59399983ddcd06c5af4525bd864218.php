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
                        <form method="POST" action="<?php echo e(route('applicants.updateStatus', $applicant->id)); ?>">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="action" value="approve">
                            <input type="hidden" name="email" value="<?php echo e($applicant->email); ?>">
                            <input type="hidden" name="name" value="<?php echo e($applicant->first_name); ?> <?php echo e($applicant->last_name); ?>">
                            <button type="submit" class="btn btn-success">APPROVE</button>
                        </form>
                    
                        <!-- REJECT -->
                        <form method="POST" action="<?php echo e(route('applicants.updateStatus', $applicant->id)); ?>">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="action" value="reject">
                            <input type="hidden" name="email" value="<?php echo e($applicant->email); ?>">
                            <input type="hidden" name="name" value="<?php echo e($applicant->first_name); ?> <?php echo e($applicant->last_name); ?>">
                            <button type="submit" class="btn btn-danger">REJECT</button>
                        </form>
                    
                        <!-- ARCHIVE -->
                        <form method="POST" action="<?php echo e(route('applicants.updateStatus', $applicant->id)); ?>">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="action" value="archive">
                            <input type="hidden" name="email" value="<?php echo e($applicant->email); ?>">
                            <input type="hidden" name="name" value="<?php echo e($applicant->first_name); ?> <?php echo e($applicant->last_name); ?>">
                            <button type="submit" class="btn btn-outline-danger">ARCHIVE</button>
                        </form>
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
</div><?php /**PATH C:\laragon\www\hr_catalists\resources\views/components/partials/system/ats/ats-overview.blade.php ENDPATH**/ ?>