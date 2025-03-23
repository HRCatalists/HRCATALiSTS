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
        Columban College Inc. | ATS Job Openings
     <?php $__env->endSlot(); ?>

    <!-- Sidebar & Active Position List -->
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
    
        <!-- Active Position List -->
        <div id="content" class="flex-grow-1">

            <!-- New Data Table for Job List -->
            <div class="container mt-5">

                <!-- ✅ Flash Messages for changing job status -->
                <div class="container mt-3">
                    <?php if(session('success')): ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <?php echo e(session('success')); ?>

                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif; ?>

                    <?php if(session('error')): ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <?php echo e(session('error')); ?>

                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif; ?>
                </div>
                <?php if(session('success')): ?>
                    <script>
                        Swal.fire({
                            icon: 'success',
                            title: 'Success!',
                            text: '<?php echo e(session('success')); ?>',
                            timer: 2000,
                            showConfirmButton: false
                        });
                    </script>
                <?php endif; ?>

                <?php if(session('error')): ?>
                    <script>
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: '<?php echo e(session('error')); ?>',
                            timer: 2500,
                            showConfirmButton: false
                        });
                    </script>
                <?php endif; ?>

                <div class="d-flex justify-content-between align-items-center mt-5 mb-3">
                    <div>
                        <h2 class="dt-h2">Opening List</h2>
                    </div>
                </div>
                
                <div class="d-flex">
                    <div class="card checkbox-card me-3" data-table="jobListingsTable">
                        <div class="container d-flex">
            
                            <!-- Select All Checkbox -->
                            <div class="d-flex me-4 py-3">
                                <input type="checkbox" class="selectAllTable" data-table="jobListingsTable">
                            </div>
                            
                            <!-- Delete Button -->
                            <div class="d-flex py-1">
                                <button type="button" class="btn btn-success btn-sm bulk-activate-btn me-1">ACTIVATE</button>
                                <button class="btn reject-btn btn-sm" style="display: none;">DELETE</button>
                            </div>
                        </div>
                    </div>

                    <!-- Add Position Button -->
                    <button type="button" class="btn add-btn me-2" data-bs-toggle="modal" data-bs-target="#addPositionModal">
                        ADD POSITION
                    </button>

                    <button id="refreshBtn" class="btn shadow bg-danger-subtle refresh-btn me-3">
                        <i class="fa fa-refresh"></i>
                    </button>                    

                    <button class="btn shadow print-btn ms-auto">
                        <i class="fa fa-print"></i> PRINT
                        <a href=""></a>
                    </button>
                </div>
                
                <table id="jobListingsTable" class="table table-bordered display mt-3">
                    <thead>
                        <tr>
                            <th></th>
                            <th>JOB TITLE</th>
                            <th>DEPARTMENT</th>
                            <th>STATUS</th>
                            <th>POSTED DATE</th>
                            <th>CLOSING DATE</th>
                            <th>ACTIONS</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $jobPosts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $job): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr data-id="<?php echo e($job->id); ?>">
                                <td class="text-center"><input type="checkbox" class="rowCheckbox"></td>
                                <td><?php echo e($job->job_title); ?></td>
                                <td><?php echo e($job->department); ?></td>
                                <td>
                                    <?php if($job->status === 'active'): ?>
                                        <span class="badge bg-success">Active</span>
                                    <?php else: ?>
                                        <span class="badge bg-danger">Inactive</span>
                                    <?php endif; ?>
                                </td>
                                <td><?php echo e(\Carbon\Carbon::parse($job->date_issued)->format('F d, Y')); ?></td>
                                <td><?php echo e(\Carbon\Carbon::parse($job->end_date)->format('F d, Y')); ?></td>
                                <td class="px-4">
                                    <div class="dropdown text-center">
                                        <button class="btn btn-primary border-0" type="button" id="actionsDropdown<?php echo e($job->id); ?>" 
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="fa-solid fa-list"></i> <!-- Bootstrap Icons -->
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="actionsDropdown<?php echo e($job->id); ?>">
                                            <!-- Activate / Deactivate -->
                                            
                                            <!-- Deactivate / Activate -->
                                            <li>
                                                <button 
                                                    class="dropdown-item text-warning toggle-status-btn" 
                                                    data-id="<?php echo e($job->id); ?>" 
                                                    data-title="<?php echo e($job->job_title); ?>"
                                                    data-status="<?php echo e($job->status); ?>"
                                                >
                                                    <?php echo e($job->status === 'active' ? 'Deactivate' : 'Activate'); ?>

                                                </button>
                                            </li>                                            

                                            <!-- Edit Job (Opens Modal) -->
                                            <li>
                                                <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#editPositionModal-<?php echo e($job->id); ?>">
                                                    Edit
                                                </a>
                                            </li>

                                            <!-- View Job -->
                                            <li><a class="dropdown-item" href="#">View</a></li>
                                
                                            <!-- Delete Job -->
                                            
                                            <li>
                                                <button 
                                                    class="dropdown-item text-danger delete-job-btn" 
                                                    data-id="<?php echo e($job->id); ?>" 
                                                    data-title="<?php echo e($job->job_title); ?>"
                                                >
                                                    Delete
                                                </button>
                                            </li>                                                                                       
                                        </ul>
                                    </div>
                                
                                    <!-- Edit Position Modal -->
                                    <div class="modal fade" id="editPositionModal-<?php echo e($job->id); ?>" tabindex="-1"
                                        aria-labelledby="editPositionModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <form method="POST" action="<?php echo e(route('job-posts.update', $job->id)); ?>">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('PUT'); ?>
                                
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">EDIT POSITION</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                
                                                    <div class="modal-body">
                                                        <input type="hidden" name="job_id" value="<?php echo e($job->id); ?>">
                                
                                                        <div class="row mb-3">
                                                            <div class="col-md-6">
                                                                <label class="form-label">Job Title <span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control" name="job_title" value="<?php echo e($job->job_title); ?>" required>
                                                            </div>
                                                        
                                                            <div class="col-md-6">
                                                                <label class="form-label">Department <span class="text-danger">*</span></label>
                                                                <select name="department" class="form-control department-select" required>
                                                                    <option value="">Select a Department</option>
                                                                    <?php $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $department): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <option value="<?php echo e($department->name); ?>" <?php echo e($job->department === $department->name ? 'selected' : ''); ?>>
                                                                            <?php echo e($department->name); ?>

                                                                        </option>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                    <option value="other" <?php echo e(!in_array($job->department, $departments->pluck('name')->toArray()) ? 'selected' : ''); ?>>
                                                                        Other
                                                                    </option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        
                                                        <!-- Show this when "Other" is selected -->
                                                        <div class="custom-department-fields card p-3 mb-3 border bg-light shadow-sm <?php echo e(!in_array($job->department, $departments->pluck('name')->toArray()) ? '' : 'd-none'); ?>">
                                                            <h6 class="text-primary fw-bold mb-3">Add New Department</h6>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <label class="form-label">New Department Name</label>
                                                                    <input type="text" class="form-control custom-dept-name" name="other_department_name"
                                                                           value="<?php echo e(!in_array($job->department, $departments->pluck('name')->toArray()) ? $job->department : ''); ?>"
                                                                           placeholder="Enter Department Name">
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label class="form-label">Department Code</label>
                                                                    <input type="text" class="form-control custom-dept-code" name="other_department_code"
                                                                           placeholder="Enter Department Code">
                                                                </div>
                                                            </div>
                                                        </div>                                                        
                                
                                                        <div class="row mb-3">
                                                            <div class="col-md-6">
                                                                <label class="form-label">Job Description <span class="text-danger">*</span></label>
                                                                <textarea name="job_description" class="form-control" rows="5" required><?php echo e($job->job_description); ?></textarea>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label class="form-label">Requirements <span class="text-danger">*</span></label>
                                                                <textarea name="requirements" class="form-control" rows="5" required><?php echo e($job->requirements); ?></textarea>
                                                            </div>
                                                        </div>
                                
                                                        <div class="row mb-3">
                                                            <div class="col-md-6">
                                                                <label class="form-label">Tags</label>
                                                                <input type="text" class="form-control" name="tags" value="<?php echo e($job->tags); ?>">
                                                            </div>
                                                            <div class="col-md-3">
                                                                <label class="form-label">Date Issued <span class="text-danger">*</span></label>
                                                                <input type="date" class="form-control" name="date_issued"
                                                                    value="<?php echo e($job->date_issued); ?>" required>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <label class="form-label">End Date <span class="text-danger">*</span></label>
                                                                <input type="date" class="form-control" name="end_date"
                                                                    value="<?php echo e($job->end_date); ?>" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-primary">UPDATE</button>
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">CANCEL</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Edit Position Modal -->
                                </td>                                                               
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Add Position Modal -->
    <div class="modal fade" id="addPositionModal" tabindex="-1" aria-labelledby="addPositionModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form id="addPositionForm" action="<?php echo e(route('job-posts.store')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="modal-header text-white" style="background-color: #111D5B;">
                        <h5 class="modal-title" id="addPositionModalLabel">Add New Position</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row g-3">
                            <!-- Job Title -->
                            <div class="col-md-6">
                                <label for="jobTitle" class="form-label">Job Title <span class="text-danger">*</span></label>
                                <input type="text" class="form-control bg-light" id="jobTitle" name="job_title" placeholder="Enter Job Title" required>
                            </div>
                    
                            <!-- Department -->
                            <div class="col-md-6">
                                <label for="jobform_department" class="form-label">Department <span class="text-danger">*</span></label>
                                <select id="jobform_department" name="department" class="form-control bg-light" required>
                                    <option value="">Select a Department</option>
                                    <?php $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $department): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($department->name); ?>"><?php echo e($department->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <option value="other">Other</option>
                                </select>
                            </div>
                    
                            <!-- Custom Department Fields -->
                            <div id="jobform_customDepartmentFields" class="col-md-12 border rounded p-3 d-none bg-light">
                                <h6 class="text-primary">Add New Department</h6>
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label for="jobform_other_department_name" class="form-label">New Department Name</label>
                                        <input type="text" class="form-control" id="jobform_other_department_name" name="other_department_name" placeholder="Enter Department Name">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="jobform_other_department_code" class="form-label">Department Code</label>
                                        <input type="text" class="form-control" id="jobform_other_department_code" name="other_department_code" placeholder="Enter Department Code">
                                    </div>
                                </div>
                            </div>
                    
                            <!-- Job Description -->
                            <div class="col-md-6">
                                <label for="description" class="form-label">Job Description <span class="text-danger">*</span></label>
                                <textarea name="job_description" id="description" class="form-control" rows="8" placeholder="Each bullet on a new line..." required></textarea>
                                <small class="text-muted">Each bullet on a new line. Will format as list.</small>
                            </div>
                    
                            <!-- Requirements -->
                            <div class="col-md-6">
                                <label for="requirements" class="form-label">Requirements <span class="text-danger">*</span></label>
                                <textarea name="requirements" id="requirements" class="form-control" rows="8" placeholder="Each bullet on a new line..." required></textarea>
                                <small class="text-muted">Each bullet on a new line. Will format as list.</small>
                            </div>
                    
                            <!-- Tags -->
                            <div class="col-md-6">
                                <label for="tags" class="form-label">Tags <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="tags" name="tags" placeholder="Enter tags">
                            </div>
                    
                            <!-- Date Issued -->
                            <div class="col-md-3">
                                <label for="dateIssued" class="form-label">Date Issued <span class="text-danger">*</span></label>
                                <input type="date" class="form-control" id="dateIssued" name="date_issued" required>
                            </div>
                    
                            <!-- End Date -->
                            <div class="col-md-3">
                                <label for="endDate" class="form-label">End Date <span class="text-danger">*</span></label>
                                <input type="date" class="form-control" id="endDate" name="end_date" required>
                            </div>
                        </div>
                    </div>                    
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <button type="button" class="btn btn-cancel" data-bs-dismiss="modal">CANCEL</button>
                    </div>
                </form>
            </div>
        </div>           
    </div>
    <!-- Add Position Modal -->

    
    
    <script>
        document.getElementById("refreshBtn").addEventListener("click", function() {
            Swal.fire({
                title: "Are you sure?",
                text: "This will update all expired jobs to inactive status!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, update them!"
            }).then((result) => {
                if (result.isConfirmed) {
                    fetch("/update-expired-jobs", {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content")
                        },
                        body: JSON.stringify({})
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.count > 0) {
                            Swal.fire({
                                title: "Updated!",
                                text: `${data.count} expired job(s) have been updated to inactive.`,
                                icon: "success",
                                timer: 2000,
                                showConfirmButton: false
                            }).then(() => {
                                location.reload(); // Refresh page after success message
                            });
                        } else {
                            Swal.fire({
                                title: "No Updates Needed",
                                text: "There are no expired jobs to update.",
                                icon: "info",
                                timer: 2000,
                                showConfirmButton: false
                            });
                        }
                    })
                    .catch(error => {
                        Swal.fire({
                            title: "Error!",
                            text: "Something went wrong. Please try again.",
                            icon: "error"
                        });
                        console.error("Error:", error);
                    });
                }
            });
        });
    </script>
    


    
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const select = document.getElementById("jobform_department");
            const customFields = document.getElementById("jobform_customDepartmentFields");
            const nameInput = document.getElementById("jobform_other_department_name");
            const codeInput = document.getElementById("jobform_other_department_code");
        
            if (!select || !customFields) return;
        
            function toggleCustomFields() {
                const show = select.value === "other";
                customFields.classList.toggle("d-none", !show);
                nameInput.required = show;
                codeInput.required = show;
                console.log("Job Form Dept Changed:", select.value);
            }
        
            toggleCustomFields(); // Run on load
            select.addEventListener("change", toggleCustomFields);
        });
    </script>
    


    
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const allEditModals = document.querySelectorAll('.modal');
    
            allEditModals.forEach(modal => {
                const select = modal.querySelector('.department-select');
                const customFields = modal.querySelector('.custom-department-fields');
                const nameInput = modal.querySelector('.custom-dept-name');
                const codeInput = modal.querySelector('.custom-dept-code');
    
                if (!select || !customFields) return;
    
                function toggleEditDeptFields() {
                    const isOther = select.value === 'other';
                    customFields.classList.toggle('d-none', !isOther);
                    if (nameInput) nameInput.required = isOther;
                    if (codeInput) codeInput.required = isOther;
                }
    
                select.addEventListener('change', toggleEditDeptFields);
                toggleEditDeptFields(); // initialize on load
            });
        });
    </script>
    

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // 🛑 Deactivate/Activate Job
            document.querySelectorAll('.toggle-status-btn').forEach(button => {
                button.addEventListener('click', function () {
                    const jobId = this.dataset.id;
                    const jobTitle = this.dataset.title;
                    const isActive = this.dataset.status === 'active';
    
                    Swal.fire({
                        title: isActive ? 'Deactivate Job?' : 'Activate Job?',
                        text: `Are you sure you want to ${isActive ? 'deactivate' : 'activate'} "${jobTitle}"?`,
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: isActive ? 'Yes, deactivate it!' : 'Yes, activate it!',
                        cancelButtonText: 'Cancel',
                    }).then(result => {
                        if (result.isConfirmed) {
                            const form = document.createElement('form');
                            form.method = 'POST';
                            form.action = `/jobs/${jobId}/toggle-status`;
    
                            const csrfInput = document.createElement('input');
                            csrfInput.type = 'hidden';
                            csrfInput.name = '_token';
                            csrfInput.value = '<?php echo e(csrf_token()); ?>';
                            form.appendChild(csrfInput);
    
                            document.body.appendChild(form);
                            form.submit();
                        }
                    });
                });
            });
    
            // 🗑️ Delete Job
            document.querySelectorAll('.delete-job-btn').forEach(button => {
                button.addEventListener('click', function () {
                    const jobId = this.dataset.id;
                    const jobTitle = this.dataset.title;
    
                    Swal.fire({
                        title: 'Delete Job?',
                        text: `This will permanently delete "${jobTitle}".`,
                        icon: 'error',
                        showCancelButton: true,
                        confirmButtonText: 'Yes, delete it!',
                        cancelButtonText: 'Cancel',
                    }).then(result => {
                        if (result.isConfirmed) {
                            const form = document.createElement('form');
                            form.method = 'POST';
                            form.action = `/ats-job-openings/job-posts/${jobId}`;
    
                            const csrf = document.createElement('input');
                            csrf.type = 'hidden';
                            csrf.name = '_token';
                            csrf.value = '<?php echo e(csrf_token()); ?>';
                            form.appendChild(csrf);
    
                            const method = document.createElement('input');
                            method.type = 'hidden';
                            method.name = '_method';
                            method.value = 'DELETE';
                            form.appendChild(method);
    
                            document.body.appendChild(form);
                            form.submit();
                        }
                    });
                });
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
<?php endif; ?>
<?php /**PATH C:\laragon\www\hr_catalists\resources\views/hrcatalists/ats/admin-ats-jobs.blade.php ENDPATH**/ ?>