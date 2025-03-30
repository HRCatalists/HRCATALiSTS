<div class="mb-5" id="section-employment-summary-<?php echo e($employee->id); ?>">
    <div class="row">
        <div class="d-flex justify-content-between align-items-center">
            <h4 class="db-h4 my-4">Employment Summary</h4>
            <div>
                <button type="button" class="btn btn-sm btn-outline-primary toggle-edit-btn" 
                        data-section="employment-summary" 
                        data-employee-id="<?php echo e($employee->id); ?>">
                    Edit
                </button>
            </div>
        </div>

        <div class="col-md-9">
            <div class="mb-3">
                <label class="form-label fw-bold">Faculty Code:</label>
                <input type="text" name="faculty_code" 
                       class="plain-input section-field-employment-summary-<?php echo e($employee->id); ?>" 
                       value="<?php echo e(old('faculty_code', $employee->faculty_code ?? 'N/A')); ?>" readonly>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">First Name:</label>
                <input type="text" name="first_name"
                       class="plain-input section-field-employment-summary-<?php echo e($employee->id); ?>" 
                       value="<?php echo e(old('first_name', $employee->first_name ?? 'N/A')); ?>" readonly>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Last Name:</label>
                <input type="text" name="last_name"
                       class="plain-input section-field-employment-summary-<?php echo e($employee->id); ?>" 
                       value="<?php echo e(old('last_name', $employee->last_name ?? 'N/A')); ?>" readonly>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">School Of:</label>
                <input type="text" name="school_of" 
                       class="plain-input section-field-employment-summary-<?php echo e($employee->id); ?>" 
                       value="<?php echo e(old('school_of', $employee->school_of ?? 'N/A')); ?>" readonly>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Status:</label>
                <input type="text" name="status" 
                       class="plain-input section-field-employment-summary-<?php echo e($employee->id); ?>" 
                       value="<?php echo e(old('status', $employee->status ?? 'N/A')); ?>" readonly>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Designation Group:</label>
                <input type="text" name="designation_group" 
                       class="plain-input section-field-employment-summary-<?php echo e($employee->id); ?>" 
                       value="<?php echo e(old('designation_group', $employee->designation_group ?? 'N/A')); ?>" readonly>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Position:</label>
                <input type="text" name="job_title" 
                       class="plain-input section-field-employment-summary-<?php echo e($employee->id); ?>" 
                       value="<?php echo e(old('job_title', $employee->job_title ?? 'N/A')); ?>" readonly>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Branch:</label>
                <input type="text" name="branch" 
                       class="plain-input section-field-employment-summary-<?php echo e($employee->id); ?>" 
                       value="<?php echo e(old('branch', $employee->branch ?? 'N/A')); ?>" readonly>
            </div>
        </div>

        <div class="col-md-3">
            <img src="<?php echo e(asset('images/dummy-profile.png')); ?>" alt="Profile Picture" class="img-fluid rounded">
        </div>
    </div>
</div><?php /**PATH C:\laragon\www\hr_catalists\resources\views/hrcatalists/partials/employment-summary-view.blade.php ENDPATH**/ ?>