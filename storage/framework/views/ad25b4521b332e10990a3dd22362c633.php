<?php $employeeId = $employee->id; ?>

<!-- =================== LICENSES =================== -->
<div class="border-top border-dark mb-5" id="section-licenses-<?php echo e($employeeId); ?>">
    <div class="d-flex justify-content-between align-items-center">
        <h4 class="db-h4 my-4">Professional Board Exam or Civil Service Eligibility</h4>
        <div>
            <button type="button" class="btn btn-sm btn-outline-primary toggle-edit-btn" 
                data-section="licenses" data-employee-id="<?php echo e($employeeId); ?>">Edit</button>
        </div>
    </div>

    <table class="table table-bordered text-center" id="licensesTable-<?php echo e($employeeId); ?>">
        <thead>
            <tr>
                <th>License</th>
                <th>License Number</th>
                <th>Expiry Date</th>
                <th>Renewal From</th>
                <th>Renewal To</th>
                <th class="action-column d-none">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $employee->licenses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $license): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><input type="text" name="licenses[<?php echo e($i); ?>][license_name]" class="form-control section-field-licenses-<?php echo e($employeeId); ?>" value="<?php echo e($license->license_name); ?>" readonly></td>
                    <td><input type="text" name="licenses[<?php echo e($i); ?>][license_number]" class="form-control section-field-licenses-<?php echo e($employeeId); ?>" value="<?php echo e($license->license_number); ?>" readonly></td>
                    <td><input type="date" name="licenses[<?php echo e($i); ?>][expiry_date]" class="form-control section-field-licenses-<?php echo e($employeeId); ?>" value="<?php echo e($license->expiry_date); ?>" readonly></td>
                    <td><input type="date" name="licenses[<?php echo e($i); ?>][renewal_from]" class="form-control section-field-licenses-<?php echo e($employeeId); ?>" value="<?php echo e($license->renewal_from); ?>" readonly></td>
                    <td><input type="date" name="licenses[<?php echo e($i); ?>][renewal_to]" class="form-control section-field-licenses-<?php echo e($employeeId); ?>" value="<?php echo e($license->renewal_to); ?>" readonly></td>
                    <td class="action-column d-none text-center"><button type="button" class="btn btn-sm btn-danger remove-edu-row">Remove</button></td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
    <button type="button" class="btn btn-sm btn-outline-success mb-3 d-none" id="addLicenseBtn-<?php echo e($employeeId); ?>">+ Add License</button>
</div><?php /**PATH C:\laragon\www\hr_catalists\resources\views/hrcatalists/partials/licenses-view.blade.php ENDPATH**/ ?>