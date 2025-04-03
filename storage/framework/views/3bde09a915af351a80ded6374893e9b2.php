<?php
    $employeeId = $employee->id ?? 'new';
    $fieldClass = 'plain-input section-field-personal-data-' . $employeeId;

    $values = [
        'phone' => old('phone', $employee->phone ?? 'N/A'),
        'email' => old('email', $employee->email ?? 'N/A'),
        'address' => old('address', $employee->address ?? 'N/A'),
        'tel_no' => old('tel_no', $employee->tel_no ?? 'N/A'),
        'date_of_birth' => old('date_of_birth', $employee->date_of_birth ?? ''),
        'place_of_birth' => old('place_of_birth', $employee->place_of_birth ?? 'N/A'),
        'gender' => old('gender', $employee->gender ?? 'N/A'),
        'religion' => old('religion', $employee->religion ?? 'N/A'),
        'citizenship' => old('citizenship', $employee->citizenship ?? 'N/A'),
        'civil_status' => old('civil_status', $employee->civil_status ?? 'N/A'),
        'spouse_name' => old('spouse_name', $employee->spouse_name ?? 'N/A'),
        'spouse_address' => old('spouse_address', $employee->spouse_address ?? 'N/A'),
        'spouse_occupation' => old('spouse_occupation', $employee->spouse_occupation ?? 'N/A'),
        'no_of_dependents' => old('no_of_dependents', $employee->no_of_dependents ?? ''),
        'children_birthdates' => old('children_birthdates', $employee->children_birthdates ?? 'N/A'),
        'father_name' => old('father_name', $employee->father_name ?? 'N/A'),
        'mother_name' => old('mother_name', $employee->mother_name ?? 'N/A'),
        'mother_address' => old('mother_address', $employee->mother_address ?? 'N/A'),
        'sss_no' => old('sss_no', $employee->sss_no ?? 'N/A'),
        'philhealth_no' => old('philhealth_no', $employee->philhealth_no ?? 'N/A'),
        'tin_no' => old('tin_no', $employee->tin_no ?? 'N/A'),
        'pagibig_no' => old('pagibig_no', $employee->pagibig_no ?? 'N/A'),
    ];
?>

<div class="mb-5" id="section-personal-data-<?php echo e($employeeId); ?>">
    <div class="row">
        <div class="d-flex justify-content-between align-items-center">
            <h4 class="db-h4 my-4">Personal Data</h4>
            <div>
                <button type="button" class="btn btn-sm btn-outline-primary toggle-edit-btn"
                        data-section="personal-data"
                        data-employee-id="<?php echo e($employeeId); ?>">
                    Edit
                </button>
            </div>
        </div>

        <div class="col-md-12">
            <div class="row">
                <?php $__currentLoopData = $values; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        // Customize label text and input type if needed
                        $labels = [
                            'phone' => 'Mobile Number',
                            'email' => 'E-mail Address',
                            'address' => 'Address',
                            'tel_no' => 'Tel No.',
                            'date_of_birth' => 'Date of Birth',
                            'place_of_birth' => 'Place of Birth',
                            'gender' => 'Gender',
                            'religion' => 'Religion',
                            'citizenship' => 'Citizenship',
                            'civil_status' => 'Civil Status',
                            'spouse_name' => 'Name of Spouse',
                            'spouse_address' => 'Spouse Address',
                            'spouse_occupation' => 'Spouse Occupation',
                            'no_of_dependents' => 'No. of Dependents',
                            'children_birthdates' => 'Children Birthdates',
                            'father_name' => "Father's Name",
                            'mother_name' => "Mother's Name",
                            'mother_address' => "Mother's Address",
                            'sss_no' => "SSS No.",
                            'philhealth_no' => "PhilHealth No.",
                            'tin_no' => "TIN No.",
                            'pagibig_no' => "Pag-Ibig No.",
                        ];

                        $label = $labels[$key] ?? ucfirst(str_replace('_', ' ', $key));
                        $type = in_array($key, ['email']) ? 'email' : (str_contains($key, 'date') ? 'date' : 'text');
                        if ($key === 'no_of_dependents') $type = 'number';
                    ?>

                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold"><?php echo e($label); ?>:</label>
                        <input type="<?php echo e($type); ?>" name="<?php echo e($key); ?>" class="<?php echo e($fieldClass); ?>" value="<?php echo e($val); ?>" readonly>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\laragon\www\hr_catalists\resources\views/hrcatalists/partials/personal-data-view.blade.php ENDPATH**/ ?>