<?php $employeeId = $employee->id; ?>

<!-- =================== SERVICE RECORDS =================== -->
<div class="border-top border-dark mb-5" id="section-service-records-<?php echo e($employeeId); ?>">
    <div class="d-flex justify-content-between align-items-center">
        <h4 class="db-h4 my-4">Employment Service Record</h4>
        <div>
            <button type="button" class="btn btn-sm btn-outline-primary toggle-edit-btn" 
                data-section="service-records" data-employee-id="<?php echo e($employeeId); ?>">Edit</button>
        </div>
    </div>

    <table class="table table-bordered text-center" id="serviceRecordTable-<?php echo e($employeeId); ?>">
        <thead>
            <tr>
                <th>Department</th>
                <th>Inclusive Date</th>
                <th>Appointment Record</th>
                <th>Position</th>
                <th>Rank</th>
                <th>Remarks</th>
                <th class="action-column d-none">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $employee->serviceRecords; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $record): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><input type="text" name="service_records[<?php echo e($i); ?>][department]" class="form-control section-field-service-records-<?php echo e($employeeId); ?>" value="<?php echo e($record->department); ?>" readonly></td>
                    <td><input type="text" name="service_records[<?php echo e($i); ?>][inclusive_date]" class="form-control section-field-service-records-<?php echo e($employeeId); ?>" value="<?php echo e($record->inclusive_date); ?>" readonly></td>
                    <td><input type="text" name="service_records[<?php echo e($i); ?>][appointment_record]" class="form-control section-field-service-records-<?php echo e($employeeId); ?>" value="<?php echo e($record->appointment_record); ?>" readonly></td>
                    <td><input type="text" name="service_records[<?php echo e($i); ?>][position]" class="form-control section-field-service-records-<?php echo e($employeeId); ?>" value="<?php echo e($record->position); ?>" readonly></td>
                    <td><input type="text" name="service_records[<?php echo e($i); ?>][rank]" class="form-control section-field-service-records-<?php echo e($employeeId); ?>" value="<?php echo e($record->rank); ?>" readonly></td>
                    <td><input type="text" name="service_records[<?php echo e($i); ?>][remarks]" class="form-control section-field-service-records-<?php echo e($employeeId); ?>" value="<?php echo e($record->remarks); ?>" readonly></td>
                    <td class="action-column d-none text-center"><button type="button" class="btn btn-sm btn-danger remove-edu-row">Remove</button></td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
    <button type="button" class="btn btn-sm btn-outline-success mb-3 d-none" id="addServiceRecordBtn-<?php echo e($employeeId); ?>">+ Add Service Record</button>
</div><?php /**PATH C:\laragon\www\hr_catalists\resources\views/hrcatalists/partials/service-record-view.blade.php ENDPATH**/ ?>