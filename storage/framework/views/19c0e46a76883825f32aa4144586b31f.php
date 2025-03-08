<?php if (isset($component)) { $__componentOriginal5fc7b6c708ff08bbce49411545a9c035 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5fc7b6c708ff08bbce49411545a9c035 = $attributes; } ?>
<?php $component = App\View\Components\AdminAtsLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin-ats-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\AdminAtsLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>

     <?php $__env->slot('title', null, []); ?> 
        Columban College Inc. | ATS Applicants
     <?php $__env->endSlot(); ?>

    <!-- Sidebar & Master List -->
    <div class="d-flex">
        <!-- Sidebar -->
        <?php if (isset($component)) { $__componentOriginald5876c07269e58343b8102e8c5f829ec = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald5876c07269e58343b8102e8c5f829ec = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.partials.system.ats.ats-sidebar','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('partials.system.ats.ats-sidebar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald5876c07269e58343b8102e8c5f829ec)): ?>
<?php $attributes = $__attributesOriginald5876c07269e58343b8102e8c5f829ec; ?>
<?php unset($__attributesOriginald5876c07269e58343b8102e8c5f829ec); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald5876c07269e58343b8102e8c5f829ec)): ?>
<?php $component = $__componentOriginald5876c07269e58343b8102e8c5f829ec; ?>
<?php unset($__componentOriginald5876c07269e58343b8102e8c5f829ec); ?>
<?php endif; ?>
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
                            ADD APPLICANT
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
                        <?php if(count($allApplicants) > 0): ?>
                            <?php $__currentLoopData = $allApplicants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $applicant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
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
                                ?>
                                <tr>
                                    <td class="text-center">
                                        <input type="checkbox" class="rowCheckbox" value="<?php echo e($applicant->id); ?>">
                                    </td>
                                    <td><?php echo e($applicant->first_name); ?> <?php echo e($applicant->last_name); ?></td>
                                    <td>
                                        <form method="POST" action="<?php echo e(route('applicants.updateStatus', $applicant->id)); ?>" class="status-update-form">
                                            <?php echo csrf_field(); ?>
                                            <select name="status" class="form-select status-dropdown"
                                                data-applicant-name="<?php echo e($applicant->first_name); ?> <?php echo e($applicant->last_name); ?>" 
                                                data-current-status="<?php echo e($applicant->status); ?>"
                                                style="color: #fff; border-radius: 4px; padding: 4px; text-align: center;"
                                            >
                                                <option value="pending" <?php echo e($applicant->status == 'pending' ? 'selected' : ''); ?>>Pending</option>
                                                <option value="screening" <?php echo e($applicant->status == 'screening' ? 'selected' : ''); ?>>Screening</option>
                                                <option value="scheduled" <?php echo e($applicant->status == 'scheduled' ? 'selected' : ''); ?>>Scheduled</option>
                                                <option value="interviewed" <?php echo e($applicant->status == 'interviewed' ? 'selected' : ''); ?>>Interviewed</option>
                                                <option value="hired" <?php echo e($applicant->status == 'hired' ? 'selected' : ''); ?>>Hired</option>
                                                <option value="rejected" <?php echo e($applicant->status == 'rejected' ? 'selected' : ''); ?>>Rejected</option>
                                                <option value="archived" <?php echo e($applicant->status == 'archived' ? 'selected' : ''); ?>>Archived</option>
                                            </select>
                                        </form>
                                    </td>
                                    <td><?php echo e(\Carbon\Carbon::parse($applicant->applied_at)->format('F d, Y')); ?></td>
                                    <td><?php echo e($applicant->job->job_title ?? 'N/A'); ?></td>
                                    <td>
                                        <div class="d-flex justify-content-around">
                                            <button class="btn btn-ap-edit" 
                                                data-bs-toggle="offcanvas" 
                                                data-bs-target="#candidateProfile" 
                                                data-applicant-id="<?php echo e($applicant->id); ?>"
                                                data-applicant-name="<?php echo e($applicant->first_name); ?> <?php echo e($applicant->last_name); ?>"
                                                data-applicant-status="<?php echo e($applicant->status); ?>"
                                                data-applicant-email="<?php echo e($applicant->email); ?>"
                                                data-applicant-phone="<?php echo e($applicant->phone_number); ?>"
                                                data-applicant-position="<?php echo e($applicant->job->job_title ?? 'N/A'); ?>"
                                                data-applicant-address="<?php echo e($applicant->address); ?>">
                                                VIEW
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="6" class="text-center">No applicants found.</td>
                            </tr>
                        <?php endif; ?>
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
    <!-- End of Sidebar & Master List -->

    <!-- Add Applicant Modal -->
    <div class="modal fade" id="addApplicantModal" tabindex="-1" aria-labelledby="addApplicantModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form id="addApplicantForm" action="" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="modal-header text-white" style="background-color: #111D5B;">
                        <h5 class="modal-title" id="addApplicantModalLabel">Add New Applicant</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <h5 class="text-primary mb-3">Application Form</h5>

                        <!-- First & Last Name -->
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="firstName" class="form-label">First Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="firstName" name="first_name" placeholder="Enter First Name" required>
                                <div class="error-message text-danger"></div>
                            </div>
                            <div class="col-md-6">
                                <label for="lastName" class="form-label">Last Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="lastName" name="last_name" placeholder="Enter Last Name" required>
                                <div class="error-message text-danger"></div>
                            </div>
                        </div>

                        <!-- Email & Phone Number -->
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="emailAddress" class="form-label">E-mail Address <span class="text-danger">*</span></label>
                                <input type="email" class="form-control" id="emailAddress" name="email" placeholder="Enter E-mail Address" required>
                                <div class="error-message text-danger"></div>
                            </div>
                            <div class="col-md-6">
                                <label for="phoneNumber" class="form-label">Phone Number <span class="text-danger">*</span></label>
                                <input type="tel" class="form-control" id="phoneNumber" name="phone" placeholder="Enter Phone Number" required>
                                <div class="error-message text-danger"></div>
                            </div>
                        </div>

                        <!-- Full Address -->
                        <div class="mb-3">
                            <label for="address" class="form-label">Full Address <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="address" name="address" placeholder="Enter Full Address" required>
                            <div class="error-message text-danger"></div>
                        </div>

                        <!-- Job Selection Dropdown -->
                        <label for="job_id" class="form-label">Select Job <span class="text-danger">*</span></label>
                        <select name="job_id" id="job_id" class="form-select" required>
                            <option value="" selected disabled>Select a Job</option>
                            <?php $__currentLoopData = $jobs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $job): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($job->id); ?>" data-slug="<?php echo e($job->slug); ?>">
                                    <?php echo e($job->job_title); ?> (<?php echo e($job->department); ?>)
                                </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <div class="error-message text-danger"></div>

                        <!-- Hidden Slug Field -->
                        <input type="hidden" id="jobSlug" name="slug" value="">

                        <!-- CV Upload -->
                        <div class="my-4">
                            <label for="cv" class="form-label fw-bold">Attach CV <span class="text-danger">*</span></label>

                            <div class="input-group">
                                <input type="file" name="cv" id="cv" class="form-control d-none <?php $__errorArgs = ['cv'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" accept=".pdf" required>
                                <label for="cv" class="btn btn-primary">Choose File</label>
                                <span class="input-group-text file-label">No file selected</span>
                            </div>

                            <small class="form-text text-muted">Submit your file in .pdf format (Max: 2 MB)</small>

                            <?php $__errorArgs = ['cv'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> 
                                <div class="invalid-feedback d-block"><?php echo e($message); ?></div> 
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        
                        <!-- ✅ Privacy Policy Agreement -->
                        <div class="mb-3">
                            <input type="checkbox" id="privacy_policy_agreed" name="privacy_policy_agreed" value="1" required>
                            <label for="privacy_policy_agreed" class="form-label">
                                I agree to the <a href="#" target="_blank">Privacy Policy</a>
                            </label>
                            <div class="error-message text-danger"></div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">ADD</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">CANCEL</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End of Add Applicant Modal -->

    <!-- Start Offcanvas for Candidate Profile View -->
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
    </div>
    <!-- End Offcanvas for Candidate Profile View -->

    

    
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
    
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5fc7b6c708ff08bbce49411545a9c035)): ?>
<?php $attributes = $__attributesOriginal5fc7b6c708ff08bbce49411545a9c035; ?>
<?php unset($__attributesOriginal5fc7b6c708ff08bbce49411545a9c035); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5fc7b6c708ff08bbce49411545a9c035)): ?>
<?php $component = $__componentOriginal5fc7b6c708ff08bbce49411545a9c035; ?>
<?php unset($__componentOriginal5fc7b6c708ff08bbce49411545a9c035); ?>
<?php endif; ?><?php /**PATH C:\laragon\www\hr_catalists\resources\views/hrcatalists/ats/admin-ats-master-list.blade.php ENDPATH**/ ?>