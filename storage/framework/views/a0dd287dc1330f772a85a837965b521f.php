<?php if (isset($component)) { $__componentOriginal22420923a32db135c994bb2339cfe9f5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal22420923a32db135c994bb2339cfe9f5 = $attributes; } ?>
<?php $component = App\View\Components\WelcomeLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('welcome-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\WelcomeLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>

     <?php $__env->slot('title', null, []); ?> 
        Columban College Inc. | <?php echo e($job->job_title); ?>

     <?php $__env->endSlot(); ?>

    <div class="container mt-5">
        <a href="<?php echo e(url('/')); ?>" class="back-icon">
            <i class="fas fa-arrow-left"></i>
        </a>
    </div>

    <!-- Job selected -->
    <div class="container job-selected">
        <div class="row">

            <!-- Left Column -->
            <div class="col-md-6">
                <div class="mb-5">
                    <h2 class="mb-0 text-dark fw-normal"><?php echo e($job->job_title); ?></h2>

                    <div class="d-flex my-3">
                        <?php $__currentLoopData = explode(',', $job->tags); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <button class="btn btn-outline-primary me-2"><?php echo e(trim($tag)); ?></button>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>

                    <div class="closing-date text-muted mb-4">
                        <p class="mb-0 fw-bold">Closing Date:</p>
                        <p><?php echo e(\Carbon\Carbon::parse($job->end_date)->format('F d, Y')); ?></p>
                    </div>
                </div>

                <div class="mb-5">
                    <h4>Qualifications:</h4>
                    <p><?php echo nl2br(e($job->requirements)); ?></p>
                </div>

                <div class="mb-5">
                    <h4>Job Description:</h4>
                    <p><?php echo nl2br(e($job->job_description)); ?></p>
                </div>

                <div>
                    <h4>Contacts:</h4>
                    <p>
                        <i class="fas fa-envelope text-primary"></i>
                        <a href="mailto:admin@gmail.com" class="text-primary">hamdo@columban.edu.ph</a>
                    </p>
                    <p>
                        <i class="fas fa-phone text-primary"></i>
                        <span class="text-primary text-small"> (047) 222-3329 loc. 120</span>
                    </p>
                </div>
            </div>

            <!-- Right Column -->
            <div class="col-md-6">
                <div class="container mb-5">

                    <h3 class="text-primary">Application Form</h3>

                    <!-- Show Validation Errors -->
                    <?php if($errors->any()): ?>
                        <div class="alert alert-danger">
                            <ul>
                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><?php echo e($error); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    <?php endif; ?>

                    <form action="<?php echo e(route('applicants.store', ['slug' => $job->slug])); ?>" method="POST" enctype="multipart/form-data" id="applicationForm">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="job_id" value="<?php echo e($job->id); ?>">

                        <!-- Name Fields -->
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="first_name" class="form-label">First Name <span class="text-danger">*</span></label>
                                <input type="text" name="first_name" id="first_name" class="form-control <?php $__errorArgs = ['first_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                    placeholder="Enter First Name" value="<?php echo e(old('first_name')); ?>" required>
                                <?php $__errorArgs = ['first_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="invalid-feedback"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="col-md-6">
                                <label for="last_name" class="form-label">Last Name <span class="text-danger">*</span></label>
                                <input type="text" name="last_name" id="last_name" class="form-control <?php $__errorArgs = ['last_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                    placeholder="Enter Last Name" value="<?php echo e(old('last_name')); ?>" required>
                                <?php $__errorArgs = ['last_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="invalid-feedback"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>

                        <!-- Contact Info -->
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="email" class="form-label">E-mail Address <span class="text-danger">*</span></label>
                                <input type="email" name="email" id="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                    placeholder="Enter E-mail Address" value="<?php echo e(old('email')); ?>" required>
                                <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="invalid-feedback"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="col-md-6">
                                <label for="phone" class="form-label">Phone Number <span class="text-danger">*</span></label>
                                <input type="text" name="phone" id="phone" class="form-control <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                    placeholder="Enter Phone Number" value="<?php echo e(old('phone')); ?>" required>
                                <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="invalid-feedback"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>

                        <!-- Address -->
                        <div class="mb-3">
                            <label for="address" class="form-label">Full Address <span class="text-danger">*</span></label>
                            <input type="text" name="address" id="address" class="form-control <?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                placeholder="Enter Address" value="<?php echo e(old('address')); ?>" required>
                            <?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="invalid-feedback"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <!-- CV Upload -->
                        <div class="mb-4">
                            <label for="cv" class="form-label fw-bold">Attach CV <span class="text-danger">*</span></label>
                        
                            <div class="input-group">
                                <input type="file" name="cv" id="cv" class="form-control d-none <?php $__errorArgs = ['cv'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                                    accept=".pdf" required>
                                <label for="cv" class="btn btn-primary">Choose File</label>
                                <span class="input-group-text" id="file-label">No file selected</span>
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
                        </div>

                        <!-- Privacy Policy Checkbox -->
                        
                        <div class="form-check my-4 d-flex align-items-center">
                            <input class="form-check-input me-2" type="checkbox" id="privacyCheck" name="privacy_policy_agreed" disabled required>
                            <label class="form-check-label me-1" for="privacyCheck">I agree to the</label>
                            <a href="#" id="openPrivacyModal" data-bs-toggle="modal" data-bs-target="#privacyPolicyModal">Privacy Policy</a>
                        </div>
                        <small id="privacyHint" class="text-muted">Please read the Privacy Policy before agreeing.</small>                                                                      

                        <?php echo $__env->make('hrcatalists.privacy-policy-modal', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                        
                        <!-- Submit Button -->
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">SUBMIT</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- Right Column -->
        </div>
    </div>

    
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const checkbox = document.getElementById("privacyCheck");
            const modal = document.getElementById("privacyPolicyModal");
            const privacyHint = document.getElementById("privacyHint");
    
            // Enable checkbox when modal is fully hidden (user closes it)
            modal.addEventListener("hidden.bs.modal", function () {
                checkbox.disabled = false;
                privacyHint.textContent = "You may now agree to the Privacy Policy.";
                privacyHint.classList.remove("text-muted");
                privacyHint.classList.add("text-success");
            });
        });
    </script>    

    
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const fileInput = document.getElementById("cv");
            const fileLabel = document.getElementById("file-label");

            fileInput.addEventListener("change", function () {
                let file = this.files[0];

                if (file) {
                    // ✅ Check if file is NOT a PDF
                    if (file.type !== "application/pdf") {
                        Swal.fire({
                            icon: "error",
                            title: "Invalid File Type!",
                            text: "Only PDF files are allowed.",
                            confirmButtonColor: "#d33",
                            confirmButtonText: "Okay"
                        });

                        this.value = ""; // Reset file input
                        fileLabel.textContent = "No file selected"; // Reset label
                        return;
                    }

                    // ✅ Check if file exceeds 2MB (2 * 1024 * 1024 bytes)
                    if (file.size > 2 * 1024 * 1024) {
                        Swal.fire({
                            icon: "error",
                            title: "File Too Large!",
                            text: "The selected file exceeds the 2MB size limit. Please upload a smaller file.",
                            confirmButtonColor: "#d33",
                            confirmButtonText: "Okay"
                        });

                        this.value = ""; // Reset file input
                        fileLabel.textContent = "No file selected"; // Reset label
                        return;
                    }

                    // ✅ If valid, update label with file name
                    fileLabel.textContent = file.name;
                } else {
                    fileLabel.textContent = "No file selected"; // Reset label if no file
                }
            });
        });
    </script>
    

    
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const form = document.getElementById("applicationForm");
            const formUrl = form.getAttribute("action");

            form.addEventListener("submit", async function (event) {
                event.preventDefault(); // Prevent default form submission

                const formData = new FormData(form);

                // Clear previous error messages
                document.querySelectorAll(".error-message").forEach(el => el.remove());
                document.querySelectorAll(".is-invalid").forEach(el => el.classList.remove("is-invalid"));

                try {
                    const response = await fetch(formUrl, {
                        method: "POST",
                        body: formData,
                        headers: {
                            "Accept": "application/json" // Ensures Laravel returns JSON
                        }
                    });

                    let result;
                    try {
                        result = await response.json(); // Attempt JSON parsing
                    } catch (jsonError) {
                        result = { message: "Invalid response from the server. Please check backend logs." };
                    }

                    if (response.ok) {
                        Swal.fire({
                            icon: "success",
                            title: "Application Submitted!",
                            text: "Your application has been successfully submitted.",
                            confirmButtonColor: "#28a745",
                        }).then(() => {
                            window.location.reload(); // ✅ Refresh page after successful submission
                        });

                    } else if (response.status === 422) {
                        // ❌ VALIDATION ERROR: Show errors under respective fields
                        for (const field in result.errors) {
                            const inputField = document.querySelector(`[name="${field}"]`);
                            if (inputField) {
                                inputField.classList.add("is-invalid");

                                const errorDiv = document.createElement("div");
                                errorDiv.className = "text-danger error-message mt-1";
                                errorDiv.innerText = result.errors[field][0];

                                // Ensure error message is placed correctly
                                if (inputField.closest('.input-group')) {
                                    inputField.closest('.input-group').after(errorDiv);
                                } else {
                                    inputField.after(errorDiv);
                                }
                            }
                        }
                    } else {
                        // ❌ OTHER ERRORS: Show SweetAlert
                        Swal.fire({
                            icon: "error",
                            title: "Submission Failed",
                            text: result.message || "An error occurred. Please try again.",
                            confirmButtonColor: "#d33",
                        });
                    }
                } catch (error) {
                    // ❌ NETWORK ERROR: Show SweetAlert
                    Swal.fire({
                        icon: "error",
                        title: "Network Error",
                        text: "Something went wrong. Please check your internet connection and try again.",
                        confirmButtonColor: "#d33",
                    });
                }
            });
        });
    </script>
    

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal22420923a32db135c994bb2339cfe9f5)): ?>
<?php $attributes = $__attributesOriginal22420923a32db135c994bb2339cfe9f5; ?>
<?php unset($__attributesOriginal22420923a32db135c994bb2339cfe9f5); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal22420923a32db135c994bb2339cfe9f5)): ?>
<?php $component = $__componentOriginal22420923a32db135c994bb2339cfe9f5; ?>
<?php unset($__componentOriginal22420923a32db135c994bb2339cfe9f5); ?>
<?php endif; ?>
<?php /**PATH C:\laragon\www\hr_catalists\resources\views/hrcatalists/job-selected.blade.php ENDPATH**/ ?>