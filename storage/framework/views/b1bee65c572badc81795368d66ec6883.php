<?php if (isset($component)) { $__componentOriginal159d34a16ea8e23e131bfd6f81ae1f72 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal159d34a16ea8e23e131bfd6f81ae1f72 = $attributes; } ?>
<?php $component = App\View\Components\MainMenuLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('main-menu-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\MainMenuLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>

     <?php $__env->slot('title', null, []); ?> 
        Columban College Inc. | Main Menu
     <?php $__env->endSlot(); ?>

    <div class="container text-center">
        <!-- Logo and Welcome Section -->
        <div>
            <img src="images/ccihr-logo.png" class="cchrlogo mx-auto d-block mb-3" alt="Logo">
            <h1 class="wc-txt fw-bolder">WELCOME, Admin!</h1>
            <p class="motto">Christi Simus Non Nostri</p>
        </div>

        <!-- Buttons Section -->
        <div class="row gap-3 mt-5 justify-content-center">
            <div class="col-12 col-md-5">
                <a href="<?php echo e(route('ems-dashboard')); ?>" class="w-100">
                    <button class="btn btn-lg shadow btn-ems-ats p-5 w-100">
                        EMPLOYEE MANAGEMENT SYSTEM
                    </button>
                </a>
            </div>
            <div class="col-12 col-md-5">
                <a href="<?php echo e(route('ats-dashboard')); ?>" class="w-100">
                    <button class="btn btn-lg shadow btn-ems-ats p-5 w-100">
                        APPLICANT TRACKING SYSTEM
                    </button>
                </a>
            </div>
        </div>
    </div>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal159d34a16ea8e23e131bfd6f81ae1f72)): ?>
<?php $attributes = $__attributesOriginal159d34a16ea8e23e131bfd6f81ae1f72; ?>
<?php unset($__attributesOriginal159d34a16ea8e23e131bfd6f81ae1f72); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal159d34a16ea8e23e131bfd6f81ae1f72)): ?>
<?php $component = $__componentOriginal159d34a16ea8e23e131bfd6f81ae1f72; ?>
<?php unset($__componentOriginal159d34a16ea8e23e131bfd6f81ae1f72); ?>
<?php endif; ?><?php /**PATH C:\laragon\www\hr_catalists\resources\views\hrcatalists\main-menu-ats-ems.blade.php ENDPATH**/ ?>