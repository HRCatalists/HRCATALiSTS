<!-- Educational Background -->
<div class="mb-5" id="section-education-<?php echo e($employee->id); ?>" data-editing="false">
    <div class="d-flex justify-content-between align-items-center">
        <h4 class="db-h4 my-4">Educational Background</h4>
        <div>
            <button type="button" class="btn btn-sm btn-outline-primary toggle-edit-btn"
                    data-section="education" data-employee-id="<?php echo e($employee->id); ?>">
                Edit
            </button>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-striped education-table" id="educationTable-<?php echo e($employee->id); ?>">
            <thead class="text-center">
                <tr>
                    <th>Education</th>
                    <th>School</th>
                    <th>Course</th>
                    <th>Major</th>
                    <th>Remarks</th>
                    <th class="action-column d-none">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $employee->educations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $education): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><input type="text" name="educations[<?php echo e($index); ?>][level]" class="form-control section-field-education-<?php echo e($employee->id); ?>" value="<?php echo e($education->level); ?>" readonly></td>
                        <td><input type="text" name="educations[<?php echo e($index); ?>][school]" class="form-control section-field-education-<?php echo e($employee->id); ?>" value="<?php echo e($education->school); ?>" readonly></td>
                        <td><input type="text" name="educations[<?php echo e($index); ?>][course]" class="form-control section-field-education-<?php echo e($employee->id); ?>" value="<?php echo e($education->course); ?>" readonly></td>
                        <td><input type="text" name="educations[<?php echo e($index); ?>][major]" class="form-control section-field-education-<?php echo e($employee->id); ?>" value="<?php echo e($education->major); ?>" readonly></td>
                        <td><input type="text" name="educations[<?php echo e($index); ?>][remarks]" class="form-control section-field-education-<?php echo e($employee->id); ?>" value="<?php echo e($education->remarks); ?>" readonly></td>
                        <td class="action-column d-none text-center">
                            <button type="button" class="btn btn-sm btn-danger remove-edu-row d-none">Remove</button>
                        </td>                        
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>

        <button type="button" class="btn btn-sm btn-success d-none mt-2" id="addEducationBtn-<?php echo e($employee->id); ?>">
            Add More...
        </button>
    </div>
</div>
<?php /**PATH C:\laragon\www\hr_catalists\resources\views/hrcatalists/partials/education-view.blade.php ENDPATH**/ ?>