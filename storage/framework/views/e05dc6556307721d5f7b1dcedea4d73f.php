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
                    <h4>Requirements:</h4>
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
                        <a href="mailto:admin@gmail.com" class="text-primary">admin@gmail.com</a>
                    </p>
                    <p>
                        <i class="fas fa-phone text-primary"></i>
                        <span class="text-primary">0912345678</span>
                    </p>
                </div>
            </div>

            <!-- Right Column -->
            <div class="col-md-6">
                <div class="container mb-5">
                    
                    <h3 class="text-primary">Application Form</h3>

                    <!-- Show validation errors -->
                    <?php if($errors->any()): ?>
                        <div class="alert alert-danger">
                            <ul>
                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><?php echo e($error); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    <?php endif; ?>

                    <form action="<?php echo e(route('applicants.store', ['slug' => $job->slug])); ?>" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>

                        <input type="hidden" name="job_id" value="<?php echo e($job->id); ?>">

                        <div class="row mb-3">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">First Name <span class="text-danger">*</span></label>
                                <input type="text" name="first_name" class="form-control" placeholder="Enter First Name" value="<?php echo e(old('first_name')); ?>" required>
                                <?php $__errorArgs = ['first_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Last Name <span class="text-danger">*</span></label>
                                <input type="text" name="last_name" class="form-control" placeholder="Enter Last Name" value="<?php echo e(old('last_name')); ?>" required>
                                <?php $__errorArgs = ['last_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">E-mail Address <span class="text-danger">*</span></label>
                                <input type="email" name="email" class="form-control" placeholder="Enter E-mail Address" value="<?php echo e(old('email')); ?>" required>
                                <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Phone Number <span class="text-danger">*</span></label>
                                <input type="text" name="phone" class="form-control" placeholder="Enter Phone Number" value="<?php echo e(old('phone')); ?>" required>
                                <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <div class="col-md-12 mb-3">
                                <label class="form-label">Address <span class="text-danger">*</span></label>
                                <input type="text" name="address" class="form-control" placeholder="Enter Address" value="<?php echo e(old('address')); ?>" required>
                                <?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>

                        <!-- Attach CV -->
                        <div class="col-md-7 mb-5 mt-5">
                            <label class="form-label">Attach CV <span class="text-danger">*</span></label>
                            <input type="file" name="cv" class="form-control" accept=".pdf" required>
                            <small class="form-text text-muted">Submit your file in .pdf format (Max: 2 MB)</small>
                            <?php $__errorArgs = ['cv'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="form-group form-check mb-5">
                            <input type="checkbox" class="form-check-input" name="privacy_policy_agreed" required>
                            <label class="form-check-label">I agree to the Privacy Policy.</label>
                            <?php $__errorArgs = ['privacy_policy_agreed'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div>
                            <button type="submit" class="btn btn-primary">SUBMIT</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

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
<?php /**PATH C:\Users\raide\OneDrive\Desktop\HRCATALiSTS-hr-catalists\resources\views/hrcatalists/job-selected.blade.php ENDPATH**/ ?>