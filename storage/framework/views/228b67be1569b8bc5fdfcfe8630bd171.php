<?php
    $employeeId = $employee->id ?? 'new';
    $organizations = $employee->organizations ?? collect();
?>

<!-- =================== ORGANIZATIONS =================== -->
<div class="border-top border-dark mb-5" id="section-organizations-<?php echo e($employeeId); ?>">
    <div class="d-flex justify-content-between align-items-center">
        <h4 class="db-h4 my-4">Affiliations / Organizations</h4>
        <div>
            <button type="button" class="btn btn-sm btn-outline-primary toggle-edit-btn" 
                data-section="organizations" data-employee-id="<?php echo e($employeeId); ?>">
                Edit
            </button>
        </div>
    </div>

    <table class="table table-bordered text-center" id="organizationTable-<?php echo e($employeeId); ?>">
        <thead>
            <tr>
                <th>Registration Date</th>
                <th>Validity Date</th>
                <th>Organization Name</th>
                <th>Place</th>
                <th>Position</th>
                <th class="action-column d-none">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $organizations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $org): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><input type="date" name="organizations[<?php echo e($i); ?>][registration_date]" class="form-control section-field-organizations-<?php echo e($employeeId); ?>" value="<?php echo e($org->registration_date); ?>" readonly></td>
                    <td><input type="date" name="organizations[<?php echo e($i); ?>][validity_date]" class="form-control section-field-organizations-<?php echo e($employeeId); ?>" value="<?php echo e($org->validity_date); ?>" readonly></td>
                    <td><input type="text" name="organizations[<?php echo e($i); ?>][organization_name]" class="form-control section-field-organizations-<?php echo e($employeeId); ?>" value="<?php echo e($org->organization_name); ?>" readonly></td>
                    <td><input type="text" name="organizations[<?php echo e($i); ?>][place]" class="form-control section-field-organizations-<?php echo e($employeeId); ?>" value="<?php echo e($org->place); ?>" readonly></td>
                    <td><input type="text" name="organizations[<?php echo e($i); ?>][position]" class="form-control section-field-organizations-<?php echo e($employeeId); ?>" value="<?php echo e($org->position); ?>" readonly></td>
                    <td class="action-column d-none text-center">
                        <button type="button" class="btn btn-sm btn-danger remove-edu-row">Remove</button>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>

    <button type="button" class="btn btn-sm btn-outline-success mb-3 d-none" id="addOrganizationBtn-<?php echo e($employeeId); ?>">
        + Add Organization
    </button>
</div><?php /**PATH C:\laragon\www\hr_catalists\resources\views/hrcatalists/partials/organizations-view.blade.php ENDPATH**/ ?>