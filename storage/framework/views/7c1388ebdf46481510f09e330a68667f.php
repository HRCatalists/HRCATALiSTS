<?php $employeeId = $employee->id; ?>

<!-- =================== TRAININGS =================== -->
<div class="border-top border-dark mb-5" id="section-trainings-<?php echo e($employeeId); ?>">
    <div class="d-flex justify-content-between align-items-center">
        <h4 class="db-h4 my-4">Training and Seminars Attended</h4>
        <div>
            <button type="button" class="btn btn-sm btn-outline-primary toggle-edit-btn" 
                data-section="trainings" data-employee-id="<?php echo e($employeeId); ?>">Edit</button>
        </div>
    </div>

    <table class="table table-bordered text-center" id="trainingsTable-<?php echo e($employeeId); ?>">
        <thead>
            <tr>
                <th>Date</th>
                <th>Title</th>
                <th>Venue</th>
                <th>Remarks</th>
                <th class="action-column d-none">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $employee->trainings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $training): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><input type="date" name="trainings[<?php echo e($i); ?>][training_date]" class="form-control section-field-trainings-<?php echo e($employeeId); ?>" value="<?php echo e($training->training_date); ?>" readonly></td>
                    <td><input type="text" name="trainings[<?php echo e($i); ?>][title]" class="form-control section-field-trainings-<?php echo e($employeeId); ?>" value="<?php echo e($training->title); ?>" readonly></td>
                    <td><input type="text" name="trainings[<?php echo e($i); ?>][venue]" class="form-control section-field-trainings-<?php echo e($employeeId); ?>" value="<?php echo e($training->venue); ?>" readonly></td>
                    <td><input type="text" name="trainings[<?php echo e($i); ?>][remark]" class="form-control section-field-trainings-<?php echo e($employeeId); ?>" value="<?php echo e($training->remark); ?>" readonly></td>
                    <td class="action-column d-none text-center"><button type="button" class="btn btn-sm btn-danger remove-edu-row">Remove</button></td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
    <button type="button" class="btn btn-sm btn-outline-success mb-3 d-none" id="addTrainingBtn-<?php echo e($employeeId); ?>">+ Add Training</button>
</div><?php /**PATH C:\laragon\www\hr_catalists\resources\views/hrcatalists/partials/trainings-view.blade.php ENDPATH**/ ?>