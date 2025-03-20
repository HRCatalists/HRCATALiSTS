<?php if (isset($component)) { $__componentOriginal5aa067d06d1afdd090a728cb9bf57c48 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5aa067d06d1afdd090a728cb9bf57c48 = $attributes; } ?>
<?php $component = App\View\Components\AdminEmsLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin-ems-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\AdminEmsLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>

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
    
        <!-- Employee List -->
        <div id="content" class="flex-grow-1">
            <div class="container mt-5">
                
                <div class="d-flex justify-content-between align-items-center mt-5 mb-5">
                    <div>
                        <h2 class="db-h2">College of Architecture</h2>
                    </div>

                    <div class="d-flex">   
                        <button class="btn shadow print-btn">
                            <i class="fa fa-print"></i> PRINT
                        </button>
                    </div>

                </div>
    
                <!-- Employee Table -->
                <table id="coaTable" class="table table-bordered display">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>NAME</th>
                            <th>EMAIL</th>
                            <th>DEPARTMENT</th>
                            <th>POSITION</th>
                            <th>DATE OF EMPLOYMENT</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>21310350</td>
                            <td> Monsalud, Rhinell Fate J. </td>
                            <td>mon@gmail.com</td>
                            <td>College of Engineering</td> 
                            <td>Dean</td>
                            <td>November 11, 2024</td>
                            <td>
                                <a href="admin-ems-view-emp.html" class="button btn btn-ap-edit">VIEW</a>
                                <button class="btn btn-danger" onclick="showPopup('rejectPopup')">DELETE</button>
                            </td>
                        </tr>
                        <tr>
                            <td>21310350</td>
                            <td> Monsalud, Rhinell Fate J. </td>
                            <td>mon@gmail.com</td>
                            <td>College of Engineering</td> 
                            <td>Chairperson</td>
                            <td>April 18, 2018</td>
                            <td>
                                <a href="admin-ems-view-emp.html" class="button btn btn-ap-edit">VIEW</a>
                                <button class="btn btn-danger" onclick="showPopup('rejectPopup')">DELETE</button>
                            </td>
                        </tr>
                        <tr>
                            <td>21310350</td>
                            <td> Monsalud, Rhinell Fate J. </td>
                            <td>mon@gmail.com</td>
                            <td>College of Engineering</td> 
                            <td>Professor</td>
                            <td>January 9, 2015</td>
                            <td>
                                <a href="admin-ems-view-emp.html" class="button btn btn-ap-edit">VIEW</a>
                                <button class="btn btn-danger" onclick="showPopup('rejectPopup')">DELETE</button>
                            </td>
                        </tr>
                        <tr>
                            <td>21310350</td>
                            <td> Monsalud, Rhinell Fate J. </td>
                            <td>mon@gmail.com</td>
                            <td>College of Engineering</td> 
                            <td>Professor</td>
                            <td>February 24, 2019</td>
                            <td>
                                <a href="admin-ems-view-emp.html" class="button btn btn-ap-edit">VIEW</a>
                                <button class="btn btn-danger" onclick="showPopup('rejectPopup')">DELETE</button>
                            </td>
                        </tr>
                    </tbody>
                </table>

            </div>
        </div>
    </div>

    <!-- Offcanvas for Candidate Profile View -->
    <!-- Add Employee Modal -->
    <div class="modal fade" id="addPositionModal" tabindex="-1" aria-labelledby="addPositionModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addPositionModalLabel">ADD A POSITION</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <form>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="jobTitle" class="form-label">Job Title *</label>
                            <input type="text" class="form-control" id="jobTitle" placeholder="Enter Job Title" required>
                        </div>
                        <div class="col-md-6">
                            <label for="department" class="form-label">Department *</label>
                            <input type="text" class="form-control" id="department" placeholder="Enter Department" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="email" class="form-label">Email *</label>
                            <input type="email" class="form-control" id="email" placeholder="Enter Email" required>
                        </div>
                        <div class="col-md-3">
                            <label for="phoneNumber" class="form-label">Phone Number</label>
                            <input type="text" class="form-control" id="phoneNumber"                                                                                    >
                        </div>
                        <div class="col-md-3">
                            <label for="telephoneNumber" class="form-label">Telephone Number</label>
                            <input type="text" class="form-control" id="telephoneNumber">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="requirements" class="form-label">Requirements *</label>
                            <textarea class="form-control" id="requirements" rows="4" required placeholder="Enter applicant requirements..."></textarea>
                        </div>
                        <div class="col-md-6">
                            <label for="duties" class="form-label">Duties and Responsibilities *</label>
                            <textarea class="form-control" id="duties" rows="4" required placeholder="Enter duties and responsibilities..."></textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="tags" class="form-label">Tags *</label>
                            <input type="text" class="form-control" id="tags" placeholder="Enter tags">
                        </div>
                        <div class="col-md-3">
                            <label for="dateIssued" class="form-label">Date Issued *</label>
                            <input type="date" class="form-control" id="dateIssued" required>
                        </div>
                        <div class="col-md-3">
                            <label for="endDate" class="form-label">End Date *</label>
                            <input type="date" class="form-control" id="endDate" required>
                        </div>
                    </div>
                </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-post">POST</button>
                    <button type="button" class="btn btn-cancel" data-bs-dismiss="modal">CANCEL</button>
                </div>
            </div>
        </div>
    </div>
    <!-- End of Add a Position -->

    <!-- Edit Position Modal -->
    <div class="modal fade" id="editPositionModal" tabindex="-1" aria-labelledby="editPositionModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editPositionModalLabel">EDIT POSITION</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <form>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="jobTitle" class="form-label">Job Title *</label>
                            <input type="text" class="form-control" id="jobTitle" placeholder="Enter Job Title" required>
                        </div>
                        <div class="col-md-6">
                            <label for="department" class="form-label">Department *</label>
                            <input type="text" class="form-control" id="department" placeholder="Enter Department" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="email" class="form-label">Email *</label>
                            <input type="email" class="form-control" id="email" placeholder="Enter Email" required>
                        </div>
                        <div class="col-md-3">
                            <label for="phoneNumber" class="form-label">Phone Number</label>
                            <input type="text" class="form-control" id="phoneNumber"                                                                                    >
                        </div>
                        <div class="col-md-3">
                            <label for="telephoneNumber" class="form-label">Telephone Number</label>
                            <input type="text" class="form-control" id="telephoneNumber">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="requirements" class="form-label">Requirements *</label>
                            <textarea class="form-control" id="requirements" rows="4" required placeholder="Enter applicant requirements..."></textarea>
                        </div>
                        <div class="col-md-6">
                            <label for="duties" class="form-label">Duties and Responsibilities *</label>
                            <textarea class="form-control" id="duties" rows="4" required placeholder="Enter duties and responsibilities..."></textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="tags" class="form-label">Tags *</label>
                            <input type="text" class="form-control" id="tags" placeholder="Enter tags">
                        </div>
                        <div class="col-md-3">
                            <label for="dateIssued" class="form-label">Date Issued *</label>
                            <input type="date" class="form-control" id="dateIssued" required>
                        </div>
                        <div class="col-md-3">
                            <label for="endDate" class="form-label">End Date *</label>
                            <input type="date" class="form-control" id="endDate" required>
                        </div>
                    </div>
                </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-post">SAVE</button>
                    <button type="button" class="btn btn-cancel" data-bs-dismiss="modal">CANCEL</button>
                </div>
            </div>
        </div>
    </div>
    <!-- End of Edit -->

    <!-- Delete Popup -->
    <div id="rejectPopup" class="custom-popup">
        <div class="popup-content">
            <p>Are you sure you want to delete this employee?</p>
            <button class="btn btn-danger" onclick="rejectAction()">Yes, delete the employee!</button>
            <button class="btn btn-outline-secondary" onclick="closePopup('rejectPopup')">Cancel</button>
        </div>
    </div>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5aa067d06d1afdd090a728cb9bf57c48)): ?>
<?php $attributes = $__attributesOriginal5aa067d06d1afdd090a728cb9bf57c48; ?>
<?php unset($__attributesOriginal5aa067d06d1afdd090a728cb9bf57c48); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5aa067d06d1afdd090a728cb9bf57c48)): ?>
<?php $component = $__componentOriginal5aa067d06d1afdd090a728cb9bf57c48; ?>
<?php unset($__componentOriginal5aa067d06d1afdd090a728cb9bf57c48); ?>
<?php endif; ?><?php /**PATH C:\laragon\www\hr_catalists\resources\views/hrcatalists/ems/admin-ems-dept-coa.blade.php ENDPATH**/ ?>