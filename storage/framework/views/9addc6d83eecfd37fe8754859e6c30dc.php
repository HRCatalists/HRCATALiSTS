<?php if (isset($component)) { $__componentOriginal770f4324bd118d9c351861e57352354a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal770f4324bd118d9c351861e57352354a = $attributes; } ?>
<?php $component = App\View\Components\LoginLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('login-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\LoginLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>

     <?php $__env->slot('title', null, []); ?> 
        Columban College Inc. | Admin Login
     <?php $__env->endSlot(); ?>

    <div class="container-fluid vh-100 d-flex">
        <div class="row flex-grow-1 w-100">
            
            <!-- Left Section -->
            <div class="col-lg-8 d-none d-lg-flex bgd-image align-items-center justify-content-center" 
            style="background-image:url('<?php echo e(asset('images/cc-bg.jpg')); ?>');">
                <div class="text-center text-white left-section">
                    <img src="<?php echo e(asset('images/ccihr-logo.png')); ?>" class="cc-logo img-fluid" alt="Columban College Logo">
                    <h1 class="mt-3">Human Asset Management <br> and Development Office</h1>
                </div>
            </div>
            
            <!-- Right Section -->
            <div class="col-lg-4 col-12 d-flex align-items-center justify-content-center ats-right-section">
    
                <div class="card w-75 shadow" id="loginCard">
                    <div class="card-body p-4">
    
                        <div class="text-center mb-4">
                            <h2>Log In to <br> HR CATALiSTS</h2> 
                        </div>
    
                        <form method="POST" action="<?php echo e(route('login')); ?>" id="loginForm">
                            <?php echo csrf_field(); ?>
                            <!-- Email -->
                            <div class="mb-3">
                                <label for="email" class="form-label login-label">Email</label>
                                <input type="email" class="form-control input-border" id="email" name="email" value="<?php echo e(old('email')); ?>" placeholder="Enter Email" required autofocus>
                                <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="text-danger small"><?php echo e($message); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
    
                            <!-- Password -->
                            <div class="mb-3">
                                <label for="password" class="form-label login-label">Password</label>
                                <div class="input-group">
                                    <input type="password" class="form-control input-border" id="password" name="password" placeholder="Enter Password" required>
                                    <span class="input-group-text">
                                        <img src="<?php echo e(asset('images/hide-icon.jpg')); ?>" alt="Hide Icon" class="hide-icon" style="cursor:pointer;">
                                    </span>
                                </div>
                                <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="text-danger small"><?php echo e($message); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    
                                <div class="d-flex justify-content-between align-items-center mt-2">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="remember" name="remember">
                                        <label class="form-check-label small text-muted" for="remember">Remember me</label>
                                    </div>
                                    <a href="<?php echo e(route('password.request')); ?>" class="small text-muted">Forgot Password?</a>
                                </div>
                            </div>
                            <a href="<?php echo e(route('google.login')); ?>" class="btn btn-danger">
                            <img src="https://developers.google.com/identity/images/g-logo.png" alt="Google Logo" style="width: 20px; margin-right: 8px;">
                             Sign in with Google
                                </a>

                            <!-- Submit Button -->
                            <button type="submit" class="btn btn-primary w-100 mt-4">Log In</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Password Visibility Toggle -->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const passwordInput = document.getElementById("password");
            const toggleIcon = document.querySelector(".hide-icon");

            toggleIcon.addEventListener("click", function () {
                if (passwordInput.type === "password") {
                    passwordInput.type = "text";
                    toggleIcon.src = "<?php echo e(asset('images/show-icon.jpg')); ?>";
                } else {
                    passwordInput.type = "password";
                    toggleIcon.src = "<?php echo e(asset('images/hide-icon.jpg')); ?>";
                }
            });
        });
    </script>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal770f4324bd118d9c351861e57352354a)): ?>
<?php $attributes = $__attributesOriginal770f4324bd118d9c351861e57352354a; ?>
<?php unset($__attributesOriginal770f4324bd118d9c351861e57352354a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal770f4324bd118d9c351861e57352354a)): ?>
<?php $component = $__componentOriginal770f4324bd118d9c351861e57352354a; ?>
<?php unset($__componentOriginal770f4324bd118d9c351861e57352354a); ?>
<?php endif; ?><?php /**PATH C:\Users\raide\OneDrive\Desktop\HRCATALiSTS-hr-catalists\resources\views/auth/login.blade.php ENDPATH**/ ?>