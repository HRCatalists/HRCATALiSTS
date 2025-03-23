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
        Columban College Inc. | ATS Interview
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
                            <?php
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
                            ?>
                        
                            <?php if(is_countable($interviewedApplicants) && count($interviewedApplicants) > 0): ?>
                                <?php $hasResults = false; ?>
                        
                                <?php $__currentLoopData = $interviewedApplicants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $applicant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if(in_array($applicant->status, ['scheduled', 'evaluation'])): ?>
                                        <?php $hasResults = true; ?>
                                        <?php
                                            $statusColor = $statusColors[$applicant->status] ?? '#000000'; // Default Black
                                        ?>
                        
                                        <tr>
                                            <td class="text-center">
                                                <input type="checkbox" class="rowCheckbox" value="<?php echo e($applicant->id); ?>">
                                            </td>
                                            <td><?php echo e($applicant->first_name); ?> <?php echo e($applicant->last_name); ?></td>
                                            <td>
                                                <form method="POST" action="<?php echo e(route('applicants.chooseStatus', $applicant->id)); ?>" class="status-update-form">
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
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        
                                
                                <?php if(!$hasResults): ?>
                                
                                <?php endif; ?>
                            <?php else: ?>
                                
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

        

                    <!-- Tab Content -->
                   <!-- End of Sidebar & Master List -->

    <!-- Add Applicant Modal -->

    
    <!-- Candidate Profile Offcanvas -->

    <?php echo $__env->make('components.partials.system.ats.ats-candidate-profile-offcanvas', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                </div>
            

                
        

    
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
<?php endif; ?><?php /**PATH C:\laragon\www\hr_catalists\resources\views/hrcatalists/ats/admin-ats-interview.blade.php ENDPATH**/ ?>