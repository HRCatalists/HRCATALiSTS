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
        <!-- Job Selection Dropdown -->
        <div class="col-md-6 mb-3">
            <label for="job_id_<?php echo e($employeeId); ?>" class="form-label fw-bold">Select Position:</label>
            <select name="job_id_visible" id="job_id_<?php echo e($employeeId); ?>" class="form-select <?php echo e($fieldClass); ?>" <?php echo e(isset($employee) ? 'disabled' : ''); ?>>
                <option value="">Select Position</option>
                <?php $__currentLoopData = $jobs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $job): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option 
                        value="<?php echo e($job->id); ?>" 
                        data-slug="<?php echo e($job->slug); ?>"
                        <?php echo e(old('job_id', $employee?->job_id) == $job->id ? 'selected' : ''); ?>>
                        <?php echo e($job->job_title); ?> (<?php echo e($job->department); ?>)
                    </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            
            
            <input type="hidden" name="job_id" id="job_id_hidden_<?php echo e($employeeId); ?>" value="<?php echo e(old('job_id', $employee?->job_id)); ?>">                      
        </div>

        <!-- Parent Department -->
        <div class="col-md-6 mb-3">
            <label class="form-label fw-bold">Parent Department:</label>
            <input type="text" name="parent_department" class="<?php echo e($fieldClass); ?>" 
                value="<?php echo e(old('parent_department', $employment->parent_department ?? 'N/A')); ?>" readonly>
        </div>

        <!-- Parent College -->
        <div class="col-md-6 mb-3">
            <label class="form-label fw-bold">Parent College:</label>
            <input type="text" name="parent_college" class="<?php echo e($fieldClass); ?>" 
                value="<?php echo e(old('parent_college', $employment->parent_college ?? 'N/A')); ?>" readonly>
        </div>

        <!-- Classification -->
        <div class="col-md-6 mb-3">
            <label class="form-label fw-bold">Classification:</label>
            <input type="text" name="classification" class="<?php echo e($fieldClass); ?>" 
                value="<?php echo e(old('classification', $employment->classification ?? 'N/A')); ?>" readonly>
        </div>

        <!-- Employment Status -->
        <div class="col-md-6 mb-3">
            <label class="form-label fw-bold">Employment Status:</label>
            <input type="text" name="employment_status" class="<?php echo e($fieldClass); ?>" 
                value="<?php echo e(old('employment_status', $employment->employment_status ?? 'N/A')); ?>" readonly>
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
            <input type="text" name="accreditation" class="<?php echo e($fieldClass); ?>" 
                value="<?php echo e(old('accreditation', $employment->accreditation ?? 'N/A')); ?>" readonly>
        </div>

        <!-- Date of Permanent Status -->
        <div class="col-md-6 mb-3">
            <label class="form-label fw-bold">Date of Permanent Status:</label>
            <input type="date" name="date_permanent" class="<?php echo e($fieldClass); ?>" 
                value="<?php echo e(old('date_permanent', $employment->date_permanent ?? '')); ?>" readonly>
        </div>

        <!-- CV Upload -->
        <div class="col-md-12 mb-3">
            <label for="cv-<?php echo e($employeeId); ?>" class="form-label fw-bold">Attach CV <span class="text-danger">*</span></label>
            <div class="input-group">
                <input 
                    type="file" 
                    name="cv" 
                    id="cv-<?php echo e($employeeId); ?>" 
                    class="form-control d-none <?php $__errorArgs = ['cv'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> <?php echo e($fieldClass); ?>" 
                    accept=".pdf" 
                    <?php echo e(isset($employee->id) ? '' : 'required'); ?>

                >
                <label for="cv-<?php echo e($employeeId); ?>" class="btn btn-primary">Choose File</label>
                <span class="input-group-text file-label" id="cvLabel-<?php echo e($employeeId); ?>">
                    <?php echo e($employee->cv ?? 'No file selected'); ?>

                </span>
            </div>
            <small class="form-text text-muted">Submit your file in .pdf format (Max: 2 MB)</small>

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

            <?php if(!is_null($employee) && $employee->cv): ?>
                <div>
                    <a href="https://drive.google.com/uc?id=<?php echo e($employee->cv); ?>&export=download" target="_blank" class="text-success">
                        Download
                    </a>
                    <a href="https://drive.google.com/file/d/<?php echo e($employee->cv); ?>/view" target="_blank" class="text-primary">
                        View
                    </a>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php /**PATH C:\laragon\www\hr_catalists\resources\views/hrcatalists/partials/employment-details-view.blade.php ENDPATH**/ ?>