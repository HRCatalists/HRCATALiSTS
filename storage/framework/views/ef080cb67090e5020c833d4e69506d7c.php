<?php
    $employeeId = $employee->id ?? 'new';
    $others = $employee->others ?? collect();
?>

<!-- =================== OTHERS =================== -->
<div class="border-top border-dark mb-5" id="section-others-<?php echo e($employeeId); ?>">
    <div class="d-flex justify-content-between align-items-center">
        <h4 class="db-h4 my-4">Others</h4>
        <div>
            <button type="button" class="btn btn-sm btn-outline-primary toggle-edit-btn" 
                data-section="others" data-employee-id="<?php echo e($employeeId); ?>">
                Edit
            </button>
        </div>
    </div>

    <table class="table table-bordered text-center" id="othersTable-<?php echo e($employeeId); ?>">
        <thead>
            <tr>
                <th>Date</th>
                <th>Description</th>
                <th class="action-column d-none">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $others; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $other): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td>
                        <input type="date" name="others[<?php echo e($i); ?>][date]" 
                               class="form-control section-field-others-<?php echo e($employeeId); ?>" 
                               value="<?php echo e($other->date); ?>" readonly>
                    </td>
                    <td>
                        <input type="text" name="others[<?php echo e($i); ?>][description]" 
                               class="form-control section-field-others-<?php echo e($employeeId); ?>" 
                               value="<?php echo e($other->description); ?>" readonly>
                    </td>
                    <td class="action-column d-none text-center">
                        <button type="button" class="btn btn-sm btn-danger remove-edu-row">Remove</button>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>

    <button type="button" class="btn btn-sm btn-outline-success mb-3 d-none" id="addOtherBtn-<?php echo e($employeeId); ?>">
        + Add Entry
    </button>
</div><?php /**PATH C:\laragon\www\hr_catalists\resources\views/hrcatalists/partials/others-view.blade.php ENDPATH**/ ?>