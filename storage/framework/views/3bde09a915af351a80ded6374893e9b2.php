<div class="mb-5" id="section-personal-data-<?php echo e($employee->id); ?>">
    <div class="row">
        <div class="d-flex justify-content-between align-items-center">
            <h4 class="db-h4 my-4">Personal Data</h4>
            <div>
                <button type="button" class="btn btn-sm btn-outline-primary toggle-edit-btn" 
                        data-section="personal-data" 
                        data-employee-id="<?php echo e($employee->id); ?>">
                    Edit
                </button>
            </div>
        </div>

        <div class="col-md-12">
            <?php $fieldClass = 'plain-input section-field-personal-data-' . $employee->id; ?>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">Mobile Number:</label>
                    <input type="text" name="phone" class="<?php echo e($fieldClass); ?>" value="<?php echo e(old('phone', $employee->phone ?? 'N/A')); ?>" readonly>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">E-mail Address:</label>
                    <input type="email" name="email" class="<?php echo e($fieldClass); ?>" value="<?php echo e(old('email', $employee->email ?? 'N/A')); ?>" readonly>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">Address:</label>
                    <input type="text" name="address" class="<?php echo e($fieldClass); ?>" value="<?php echo e(old('address', $employee->address ?? 'N/A')); ?>" readonly>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">Tel No.:</label>
                    <input type="text" name="tel_no" class="<?php echo e($fieldClass); ?>" value="<?php echo e(old('tel_no', $employee->tel_no ?? 'N/A')); ?>" readonly>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">Date of Birth:</label>
                    <input type="date" name="date_of_birth" class="<?php echo e($fieldClass); ?>" value="<?php echo e(old('date_of_birth', $employee->date_of_birth)); ?>" readonly>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">Place of Birth:</label>
                    <input type="text" name="place_of_birth" class="<?php echo e($fieldClass); ?>" value="<?php echo e(old('place_of_birth', $employee->place_of_birth ?? 'N/A')); ?>" readonly>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">Gender:</label>
                    <input type="text" name="gender" class="<?php echo e($fieldClass); ?>" value="<?php echo e(old('gender', $employee->gender ?? 'N/A')); ?>" readonly>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">Religion:</label>
                    <input type="text" name="religion" class="<?php echo e($fieldClass); ?>" value="<?php echo e(old('religion', $employee->religion ?? 'N/A')); ?>" readonly>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">Citizenship:</label>
                    <input type="text" name="citizenship" class="<?php echo e($fieldClass); ?>" value="<?php echo e(old('citizenship', $employee->citizenship ?? 'N/A')); ?>" readonly>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">Civil Status:</label>
                    <input type="text" name="civil_status" class="<?php echo e($fieldClass); ?>" value="<?php echo e(old('civil_status', $employee->civil_status ?? 'N/A')); ?>" readonly>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">Name of Spouse:</label>
                    <input type="text" name="spouse_name" class="<?php echo e($fieldClass); ?>" value="<?php echo e(old('spouse_name', $employee->spouse_name ?? 'N/A')); ?>" readonly>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">Spouse Address:</label>
                    <input type="text" name="spouse_address" class="<?php echo e($fieldClass); ?>" value="<?php echo e(old('spouse_address', $employee->spouse_address ?? 'N/A')); ?>" readonly>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">Spouse Occupation:</label>
                    <input type="text" name="spouse_occupation" class="<?php echo e($fieldClass); ?>" value="<?php echo e(old('spouse_occupation', $employee->spouse_occupation ?? 'N/A')); ?>" readonly>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">No. of Dependents:</label>
                    <input type="number" name="no_of_dependents" class="<?php echo e($fieldClass); ?>" value="<?php echo e(old('no_of_dependents', $employee->no_of_dependents ?? 'N/A')); ?>" readonly>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">Children Birthdates:</label>
                    <input type="text" name="children_birthdates" class="<?php echo e($fieldClass); ?>" value="<?php echo e(old('children_birthdates', $employee->children_birthdates ?? 'N/A')); ?>" readonly>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">Father's Name:</label>
                    <input type="text" name="father_name" class="<?php echo e($fieldClass); ?>" value="<?php echo e(old('father_name', $employee->father_name ?? 'N/A')); ?>" readonly>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">Mother's Name:</label>
                    <input type="text" name="mother_name" class="<?php echo e($fieldClass); ?>" value="<?php echo e(old('mother_name', $employee->mother_name ?? 'N/A')); ?>" readonly>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">Mother's Address:</label>
                    <input type="text" name="mother_address" class="<?php echo e($fieldClass); ?>" value="<?php echo e(old('mother_address', $employee->mother_address ?? 'N/A')); ?>" readonly>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">SSS No.:</label>
                    <input type="text" name="sss_no" class="<?php echo e($fieldClass); ?>" value="<?php echo e(old('sss_no', $employee->sss_no ?? 'N/A')); ?>" readonly>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">PhilHealth No.:</label>
                    <input type="text" name="philhealth_no" class="<?php echo e($fieldClass); ?>" value="<?php echo e(old('philhealth_no', $employee->philhealth_no ?? 'N/A')); ?>" readonly>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">TIN No.:</label>
                    <input type="text" name="tin_no" class="<?php echo e($fieldClass); ?>" value="<?php echo e(old('tin_no', $employee->tin_no ?? 'N/A')); ?>" readonly>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">Pag-Ibig No.:</label>
                    <input type="text" name="pagibig_no" class="<?php echo e($fieldClass); ?>" value="<?php echo e(old('pagibig_no', $employee->pagibig_no ?? 'N/A')); ?>" readonly>
                </div>
            </div>
        </div>
    </div>
</div><?php /**PATH C:\laragon\www\hr_catalists\resources\views/hrcatalists/partials/personal-data-view.blade.php ENDPATH**/ ?>