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

                <div class="d-flex justify-content-between align-items-center mt-5 mb-3">
                    <div>
                        <h2 class="dt-h2">Opening List</h2>
                    </div>
                </div>
                
                <div class="d-flex">
                    <div class="card checkbox-card" data-table="jobListingsTable">
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

                    <div class="d-flex justify-content-around ms-3">
                        <!-- Add Position Button -->
                        <button type="button" class="btn add-btn me-2" data-bs-toggle="modal" data-bs-target="#addPositionModal">
                            ADD POSITION
                        </button>

                        <button class="btn shadow print-btn">
                            <i class="fa fa-print"></i> PRINT
                            <a href=""></a>
                        </button>
                    </div>
                </div>
                
                <table id="jobListingsTable" class="table table-bordered display mt-3">
                    <thead>
                        <tr>
                            <th></th>
                            <th>JOB TITLE</th>
                            <th>DEPARTMENT</th>
                            <th>STATUS</th>
                            <th>DATE CREATED</th>
                            <th>DATE ENDED</th>
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
                                <td class="text-center">
                                    <a href="<?php echo e(route('jobs.show', $job->id)); ?>" class="btn btn-ap-edit me-1">VIEW</a>
                                    <button class="btn btn-ap-edit edit-job" data-id="<?php echo e($job->id); ?>"
                                        data-job_title="<?php echo e($job->job_title); ?>"
                                        data-department="<?php echo e($job->department); ?>"
                                        data-job_description="<?php echo e($job->job_description); ?>"
                                        data-requirements="<?php echo e($job->requirements); ?>"
                                        data-tags="<?php echo e($job->tags); ?>"
                                        data-date_issued="<?php echo e($job->date_issued); ?>"
                                        data-end_date="<?php echo e($job->end_date); ?>"
                                        data-bs-toggle="modal" data-bs-target="#editPositionModal">
                                        EDIT
                                    </button>
                                    <form
                                        action="<?php echo e(route('jobs.toggle-status', $job->id)); ?>"
                                        method="POST"
                                        style="display:inline;"
                                        onsubmit="return confirm('Are you sure you want to <?php echo e($job->status === 'active' ? 'deactivate' : 'activate'); ?> this job?');"
                                    >
                                        <?php echo csrf_field(); ?>
                                        <button type="submit" class="btn btn-ap-edit <?php echo e($job->status === 'active' ? 'btn-danger' : 'btn-success'); ?>">
                                            <?php echo e($job->status === 'active' ? 'DEACTIVATE' : 'ACTIVATE'); ?>

                                        </button>
                                    </form>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Add Position Modal -->
    <div class="modal fade" id="addPositionModal" tabindex="-1" aria-labelledby="addPositionModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addPositionModalLabel">Add Position</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">              
                    <form id="addPositionForm" action="<?php echo e(route('job-posts.store')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <div class="mb-3">
                            <label for="jobTitle" class="form-label">Job Title</label>
                            <input type="text" class="form-control" name="job_title" id="jobTitle" required>
                        </div>
                        <div class="mb-3">
                            <label for="department" class="form-label">Department</label>
                            <input type="text" class="form-control" name="department" id="department" required>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Job Description</label>
                            <textarea class="form-control" name="job_description" id="description" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="requirements" class="form-label">Requirements</label>
                            <textarea class="form-control" name="requirements" id="requirements" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="tags" class="form-label">Tags</label>
                            <input type="text" class="form-control" name="tags" id="tags">
                        </div>
                        <div class="mb-3">
                            <label for="dateIssued" class="form-label">Date Issued</label>
                            <input type="date" class="form-control" name="date_issued" id="dateIssued" required>
                        </div>
                        <div class="mb-3">
                            <label for="endDate" class="form-label">End Date</label>
                            <input type="date" class="form-control" name="end_date" id="endDate" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>                                      
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Position Modal -->
    <div class="modal fade" id="editPositionModal" tabindex="-1" aria-labelledby="editPositionModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editPositionModalLabel">Edit Position</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editPositionForm" action="<?php echo e(route('job-posts.update', ['id' => $job->id])); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>
                        <div class="mb-3">
                            <label for="editJobTitle" class="form-label">Job Title</label>
                            <input type="text" class="form-control" name="job_title" id="editJobTitle" value="<?php echo e($job->job_title); ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="editDepartment" class="form-label">Department</label>
                            <input type="text" class="form-control" name="department" id="editDepartment" value="<?php echo e($job->department); ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="editDescription" class="form-label">Job Description</label>
                            <textarea class="form-control" name="job_description" id="editDescription" required><?php echo e($job->job_description); ?></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="editRequirements" class="form-label">Requirements</label>
                            <textarea class="form-control" name="requirements" id="editRequirements" required><?php echo e($job->requirements); ?></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="editTags" class="form-label">Tags</label>
                            <input type="text" class="form-control" name="tags" id="editTags" value="<?php echo e($job->tags); ?>">
                        </div>
                        <div class="mb-3">
                            <label for="editDateIssued" class="form-label">Date Issued</label>
                            <input type="date" class="form-control" name="date_issued" id="editDateIssued" value="<?php echo e($job->date_issued); ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="editEndDate" class="form-label">End Date</label>
                            <input type="date" class="form-control" name="end_date" id="editEndDate" value="<?php echo e($job->end_date); ?>" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Update Job</button>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>

    

    
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            let form = document.getElementById("addPositionForm");

            form.addEventListener("submit", function () {
                // // ✅ Close the modal after submission
                // var modal = bootstrap.Modal.getInstance(document.getElementById('addPositionModal'));
                // modal.hide();

                // // ✅ Reset the form
                // form.reset();
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