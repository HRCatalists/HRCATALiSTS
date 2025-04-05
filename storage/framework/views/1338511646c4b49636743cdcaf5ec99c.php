<?php
    $employeeId = $employee->id ?? 'new';
    $fieldClass = 'plain-input section-field-employment-details-' . $employeeId;
    $employment = $employee->employmentDetails ?? null;
?>

<div class="mb-5" id="section-employment-details-<?php echo e($employeeId); ?>">
    <div class="d-flex justify-content-between align-items-center">
        <h4 class="db-h4 my-4">Employment Data</h4>
        <div>
            <button type="button" class="btn btn-sm btn-outline-primary toggle-edit-btn" 
                data-section="employment-details" 
                data-employee-id="<?php echo e($employeeId); ?>">
                Edit
            </button>
        </div>
    </div>

    <div class="row">       
        <!-- Department -->
        <div class="col-md-6 mb-3">
            <label class="form-label fw-bold">Parent Department:</label>
            <input type="text" name="department" id="department_<?php echo e($employeeId); ?>" class="<?php echo e($fieldClass); ?>" 
                value="<?php echo e(old('department', $employee->department ?? '')); ?>" readonly>
        </div>

        <!-- Job Title -->
        <div class="col-md-6 mb-3">
            <label class="form-label fw-bold">Job Position:</label>
            <input type="text" name="job_title" id="job_title_<?php echo e($employeeId); ?>" class="<?php echo e($fieldClass); ?>"
                value="<?php echo e(old('job_title', $employee->job_title ?? '')); ?>" readonly>
        </div>
    
        <!-- Parent College -->
        <div class="col-md-6 mb-3">
            <label class="form-label fw-bold">Parent College:</label>
            <input type="text" name="parent_college" id="parent_college_<?php echo e($employeeId); ?>" class="<?php echo e($fieldClass); ?>" 
                value="<?php echo e(old('parent_college', $employment->parent_college ?? '')); ?>" readonly>
        </div>

        <!-- Job Selection -->
        <div class="col-md-6 mb-3">
            <label for="job_id_<?php echo e($employeeId); ?>" class="form-label fw-bold">Select Position:</label>
            
            
            <select 
                id="job_id_<?php echo e($employeeId); ?>"
                name="job_id"
                class="form-select form-select-sm section-field-employment-details-<?php echo e($employeeId); ?>"
                style="max-height: 38px;" 
                <?php echo e(isset($employee) ? 'disabled' : ''); ?>

                required>

                <option value="">Select Position</option>
                <?php $__currentLoopData = $jobs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $job): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option 
                        value="<?php echo e($job->id); ?>"
                        data-department="<?php echo e($job->department); ?>"
                        data-title="<?php echo e($job->job_title); ?>"
                        data-classification="<?php echo e($job->classification); ?>"
                        data-college="<?php echo e($job->parent_college); ?>"
                        data-status="<?php echo e($job->employment_status); ?>"
                        data-accreditation="<?php echo e($job->accreditation); ?>"
                        <?php echo e(old('job_id', $employee?->job_id) == $job->id ? 'selected' : ''); ?>>
                        <?php echo e($job->job_title); ?> (<?php echo e($job->department); ?>)
                    </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div> 
    
        <!-- Classification -->
        <div class="col-md-6 mb-3">
            <label class="form-label fw-bold">Classification:</label>
            <input type="text" name="classification" id="classification_<?php echo e($employeeId); ?>" class="<?php echo e($fieldClass); ?>" 
                value="<?php echo e(old('classification', $employment->classification ?? '')); ?>" readonly>
        </div>
    
        <!-- Employment Status -->
        <div class="col-md-6 mb-3">
            <label class="form-label fw-bold">Employment Status:</label>
            <input type="text" name="employment_status" id="employment_status_<?php echo e($employeeId); ?>" class="<?php echo e($fieldClass); ?>" 
                value="<?php echo e(old('employment_status', $employment->employment_status ?? '')); ?>" readonly>
        </div>
    
        <!-- Date of Employment -->
        <div class="col-md-6 mb-3">
            <label class="form-label fw-bold">Date of Employment:</label>
            <input type="date" name="date_employed" class="<?php echo e($fieldClass); ?>"
                value="<?php echo e(old('date_employed', $employment->date_employed ?? now()->format('Y-m-d'))); ?>" readonly>
        </div>
    
        <!-- Accreditation -->
        <div class="col-md-6 mb-3">
            <label class="form-label fw-bold">Accreditation:</label>
            <input type="text" name="accreditation" id="accreditation_<?php echo e($employeeId); ?>" class="<?php echo e($fieldClass); ?>" 
                value="<?php echo e(old('accreditation', $employment->accreditation ?? '')); ?>" readonly>
        </div>
    
        <!-- Permanent Status -->
        <div class="col-md-6 mb-3">
            <label class="form-label fw-bold">Date of Permanent Status:</label>
            <input type="date" name="date_permanent" class="<?php echo e($fieldClass); ?>" 
                value="<?php echo e(old('date_permanent', $employment->date_permanent ?? '')); ?>" readonly>
        </div>
    </div>

    <!-- CV Upload (always editable and fetches existing CV) -->
    <div class="col-md-12 mb-3">
        <label for="cv-<?php echo e($employeeId); ?>" class="form-label fw-bold">Attach CV <span class="text-danger">*</span></label>

        <input 
            type="file" 
            name="cv" 
            id="cv-<?php echo e($employeeId); ?>" 
            class="form-control <?php $__errorArgs = ['cv'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
            accept=".pdf"
            <?php echo e(isset($employee->id) ? '' : 'required'); ?>

        >

        
        <?php if(!empty($employee?->cv)): ?>
            <small class="form-text text-muted d-block mt-2" id="cvLabel-<?php echo e($employee->id); ?>">
                Current CV:
                <strong><?php echo e($employee->cv_file_name ?? 'Unnamed File'); ?></strong><br>
                <a href="https://drive.google.com/file/d/<?php echo e($employee->cv); ?>/view" target="_blank" class="text-primary">View</a>
                |
                <a href="https://drive.google.com/uc?id=<?php echo e($employee->cv); ?>&export=download" target="_blank" class="text-success">Download</a>
            </small>
        <?php endif; ?>
    
        <?php $__errorArgs = ['cv'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> 
            <div class="invalid-feedback d-block"><?php echo e($message); ?></div>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    </div>
</div>
<?php /**PATH C:\laragon\www\hr_catalists\resources\views/hrcatalists/partials/employment-details-view.blade.php ENDPATH**/ ?>