<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?php echo e($title ?? 'Columban College Inc. | Careers'); ?></title>

    <!-- Bootstrap CSS v5.3.2 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />

    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    
    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <!-- Styles CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('css/styles.css')); ?>">

    <!-- Navbar CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('css/navbar.css')); ?>">
    
    <!-- Online Recruitment CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('css/ol-recruitment.css')); ?>">

    <!-- Animated buttons CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('css/animated-btns.css')); ?>">

    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

</head>
<body>

    <?php if (isset($component)) { $__componentOriginalfc63f58fa1ebea30c8980b2ba0349c44 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalfc63f58fa1ebea30c8980b2ba0349c44 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.partials.welcome.navbar','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('partials.welcome.navbar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalfc63f58fa1ebea30c8980b2ba0349c44)): ?>
<?php $attributes = $__attributesOriginalfc63f58fa1ebea30c8980b2ba0349c44; ?>
<?php unset($__attributesOriginalfc63f58fa1ebea30c8980b2ba0349c44); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalfc63f58fa1ebea30c8980b2ba0349c44)): ?>
<?php $component = $__componentOriginalfc63f58fa1ebea30c8980b2ba0349c44; ?>
<?php unset($__componentOriginalfc63f58fa1ebea30c8980b2ba0349c44); ?>
<?php endif; ?>

    <?php echo e($slot); ?>


    <?php if (isset($component)) { $__componentOriginal49652e9c6473245dcea6b4f12c1050fe = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal49652e9c6473245dcea6b4f12c1050fe = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.partials.welcome.footer','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('partials.welcome.footer'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal49652e9c6473245dcea6b4f12c1050fe)): ?>
<?php $attributes = $__attributesOriginal49652e9c6473245dcea6b4f12c1050fe; ?>
<?php unset($__attributesOriginal49652e9c6473245dcea6b4f12c1050fe); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal49652e9c6473245dcea6b4f12c1050fe)): ?>
<?php $component = $__componentOriginal49652e9c6473245dcea6b4f12c1050fe; ?>
<?php unset($__componentOriginal49652e9c6473245dcea6b4f12c1050fe); ?>
<?php endif; ?>

    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>

    
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="js/swiper.js"></script>

</body>
</html><?php /**PATH C:\laragon\www\hr_catalists\resources\views/layouts/welcome-layout.blade.php ENDPATH**/ ?>