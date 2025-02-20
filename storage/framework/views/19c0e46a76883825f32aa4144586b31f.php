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
                            <th>STAGES</th>
                            <th>APPLIED DATE</th>
                            <th>POSITION APPLIED TO</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-center"><input type="checkbox" class="rowCheckbox"></td>
                            <td>Rhinell Menes</td>
                            <td>APPLICANT</td>
                            <td>1 - Screening</td>
                            <td>November 11, 2024</td>
                            <td>Medical Staff</td>
                            <td>
                                <div class="d-flex justify-content-around">
                                    <button class="btn btn-ap-edit" data-bs-toggle="offcanvas" data-bs-target="#candidateProfile">VIEW</button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center"><input type="checkbox" class="rowCheckbox"></td>
                            <td>Rhinell Menes</td>
                            <td>APPLICANT</td>
                            <td>2 - Interview</td>
                            <td>November 11, 2024</td>
                            <td>Medical Staff</td>
                            <td>
                                <div class="d-flex justify-content-around">
                                    <button class="btn btn-ap-edit" data-bs-toggle="offcanvas" data-bs-target="#candidateProfile">VIEW</button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center"><input type="checkbox" class="rowCheckbox"></td>
                            <td>Fate Gamboa</td>
                            <td>APPLICANT</td>
                            <td>2 - Interview</td>
                            <td>November 11, 2024</td>
                            <td>Medical Staff</td>
                            <td>
                                <div class="d-flex justify-content-around">
                                    <button class="btn btn-ap-edit" data-bs-toggle="offcanvas" data-bs-target="#candidateProfile">VIEW</button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center"><input type="checkbox" class="rowCheckbox"></td>
                            <td>Raiden Monsalud</td>
                            <td>APPLICANT</td>
                            <td>2 - Interview</td>
                            <td>April 15, 2024</td>
                            <td>CCS Professor</td>
                            <td>
                                <div class="d-flex justify-content-around">
                                    <button class="btn btn-ap-edit" data-bs-toggle="offcanvas" data-bs-target="#candidateProfile">VIEW</button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center"><input type="checkbox" class="rowCheckbox"></td>
                            <td>John Rafael De Venencia</td>
                            <td>APPLICANT</td>
                            <td>1 - Screening</td>
                            <td>April 15, 2024</td>
                            <td>COA Professor</td>
                            <td>
                                <div class="d-flex justify-content-around">
                                    <button class="btn btn-ap-edit" data-bs-toggle="offcanvas" data-bs-target="#candidateProfile">VIEW</button>
                                </div>
                            </td>
                        </tr>
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

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5fc7b6c708ff08bbce49411545a9c035)): ?>
<?php $attributes = $__attributesOriginal5fc7b6c708ff08bbce49411545a9c035; ?>
<?php unset($__attributesOriginal5fc7b6c708ff08bbce49411545a9c035); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5fc7b6c708ff08bbce49411545a9c035)): ?>
<?php $component = $__componentOriginal5fc7b6c708ff08bbce49411545a9c035; ?>
<?php unset($__componentOriginal5fc7b6c708ff08bbce49411545a9c035); ?>
<?php endif; ?>

<?php /**PATH C:\laragon\www\hr_catalists\resources\views/hrcatalists/ats/admin-ats-master-list.blade.php ENDPATH**/ ?>