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
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <div class="d-flex">
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
        <div id="content" class="flex-grow-1">
            <div class="container mt-5">
                <div class="d-flex justify-content-between align-items-center my-5">
                    <h2 class="dt-h2">Openings</h2>
                </div>

                <div class="d-flex">
                    <div class="card checkbox-card-2">
                        <div class="container d-flex">
                            <div class="d-flex me-4 py-3">
                                <input type="checkbox" id="selectAll" class="rowCheckbox">
                            </div>
                            <div class="d-flex py-1">
                                <button class="btn reject-btn btn-sm">DELETE</button>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-around ms-3">
                        <button type="button" class="btn add-btn me-2" data-bs-toggle="modal" data-bs-target="#addPositionModal">
                            ADD POSITION
                        </button>
                        <button class="btn shadow print-btn">
                            <i class="fa fa-print"></i> PRINT
                        </button>
                    </div>
                </div>

                <table id="activePositionsTable" class="table table-bordered display">
                    <thead>
                        <tr>
                            <th></th>
                            <th>JOB TITLE</th>
                            <th>DEPARTMENT</th>
                            <th>DATE ISSUED</th>
                            <th>END DATE</th>
                            <th>ACTIONS</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $jobPosts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $job): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr data-id="<?php echo e($job->id); ?>">
                                <td class="text-center"><input type="checkbox" class="rowCheckbox"></td>
                                <td><?php echo e($job->job_title); ?></td>
                                <td><?php echo e($job->department); ?></td>
                                <td><?php echo e(\Carbon\Carbon::parse($job->date_issued)->format('F d, Y')); ?></td>
                                <td><?php echo e(\Carbon\Carbon::parse($job->end_date)->format('F d, Y')); ?></td>
                                <td class="text-center">
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
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addPositionModalLabel">Add Position</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="addPositionForm">
                        <?php echo csrf_field(); ?>
                        <div class="mb-3">
                            <label for="jobTitle" class="form-label">Job Title</label>
                            <input type="text" class="form-control" id="jobTitle" required>
                        </div>
                        <div class="mb-3">
                            <label for="department" class="form-label">Department</label>
                            <input type="text" class="form-control" id="department" required>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Job Description</label>
                            <textarea class="form-control" id="description" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="requirements" class="form-label">Requirements</label>
                            <textarea class="form-control" id="requirements" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="tags" class="form-label">Tags</label>
                            <input type="text" class="form-control" id="tags">
                        </div>
                        <div class="mb-3">
                            <label for="dateIssued" class="form-label">Date Issued</label>
                            <input type="date" class="form-control" id="dateIssued" required>
                        </div>
                        <div class="mb-3">
                            <label for="endDate" class="form-label">End Date</label>
                            <input type="date" class="form-control" id="endDate" required>
                        </div>
                        <button type="button" class="btn btn-primary btn-post">Post Job</button>
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
                    <form id="editPositionForm">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>
                        <div class="mb-3">
                            <label for="editJobTitle" class="form-label">Job Title</label>
                            <input type="text" class="form-control" id="editJobTitle" required>
                        </div>
                        <div class="mb-3">
                            <label for="editDepartment" class="form-label">Department</label>
                            <input type="text" class="form-control" id="editDepartment" required>
                        </div>
                        <div class="mb-3">
                            <label for="editDescription" class="form-label">Job Description</label>
                            <textarea class="form-control" id="editDescription" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="editRequirements" class="form-label">Requirements</label>
                            <textarea class="form-control" id="editRequirements" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="editTags" class="form-label">Tags</label>
                            <input type="text" class="form-control" id="editTags">
                        </div>
                        <div class="mb-3">
                            <label for="editDateIssued" class="form-label">Date Issued</label>
                            <input type="date" class="form-control" id="editDateIssued" required>
                        </div>
                        <div class="mb-3">
                            <label for="editEndDate" class="form-label">End Date</label>
                            <input type="date" class="form-control" id="editEndDate" required>
                        </div>
                        <button type="button" class="btn btn-primary btn-post">Update Job</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            // Handle adding a job
            document.querySelector("#addPositionModal .btn-post").addEventListener("click", function () {
                const jobTitle = document.getElementById("jobTitle").value;
                const department = document.getElementById("department").value;
                const jobDescription = document.getElementById("description").value;
                const requirements = document.getElementById("requirements").value;
                const tags = document.getElementById("tags").value;
                const dateIssued = document.getElementById("dateIssued").value;
                const endDate = document.getElementById("endDate").value;

                if (!jobTitle || !department || !jobDescription || !requirements || !dateIssued || !endDate) {
                    alert("Please fill in all required fields.");
                    return;
                }

                fetch("/jobs", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content")
                    },
                    body: JSON.stringify({
                        job_title: jobTitle,
                        department: department,
                        job_description: jobDescription,
                        requirements: requirements,
                        tags: tags,
                        date_issued: dateIssued,
                        end_date: endDate
                    })
                })
                .then(response => response.json())
                .then(data => {
                    alert("Job added successfully!");
                    location.reload();
                })
                .catch(error => console.error("Error:", error));
            });

            // Handle editing a job
            document.querySelectorAll(".edit-job").forEach(button => {
                button.addEventListener("click", function () {
                    const jobId = this.getAttribute("data-id");
                    const jobTitle = this.getAttribute("data-job_title");
                    const department = this.getAttribute("data-department");
                    const jobDescription = this.getAttribute("data-job_description");
                    const requirements = this.getAttribute("data-requirements");
                    const tags = this.getAttribute("data-tags");
                    const dateIssued = this.getAttribute("data-date_issued");
                    const endDate = this.getAttribute("data-end_date");

                    document.getElementById("editJobTitle").value = jobTitle;
                    document.getElementById("editDepartment").value = department;
                    document.getElementById("editDescription").value = jobDescription;
                    document.getElementById("editRequirements").value = requirements;
                    document.getElementById("editTags").value = tags;
                    document.getElementById("editDateIssued").value = dateIssued;
                    document.getElementById("editEndDate").value = endDate;
                    document.querySelector("#editPositionModal .btn-post").setAttribute("data-id", jobId);
                });
            });

            document.querySelector("#editPositionModal .btn-post").addEventListener("click", function () {
                const jobId = this.getAttribute("data-id");
                const jobTitle = document.getElementById("editJobTitle").value;
                const department = document.getElementById("editDepartment").value;
                const jobDescription = document.getElementById("editDescription").value;
                const requirements = document.getElementById("editRequirements").value;
                const tags = document.getElementById("editTags").value;
                const dateIssued = document.getElementById("editDateIssued").value;
                const endDate = document.getElementById("editEndDate").value;

                if (!jobTitle || !department || !jobDescription || !requirements || !dateIssued || !endDate) {
                    alert("Please fill in all required fields.");
                    return;
                }

                fetch(`/jobs/${jobId}`, {
                    method: "PUT",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content")
                    },
                    body: JSON.stringify({
                        job_title: jobTitle,
                        department: department,
                        job_description: jobDescription,
                        requirements: requirements,
                        tags: tags,
                        date_issued: dateIssued,
                        end_date: endDate
                    })
                })
                .then(response => response.json())
                .then(data => {
                    alert("Job updated successfully!");
                    location.reload();
                })
                .catch(error => console.error("Error:", error));
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