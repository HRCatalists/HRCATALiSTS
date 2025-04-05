<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <meta http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate, max-age=0">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">

    <link rel="icon" type="image/png" href="<?php echo e(asset('images/ccihr-logo.png')); ?>">


    <title><?php echo e($title ?? 'Columban College Inc. | HR CATALISTS'); ?></title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- Bootstrap CSS v5.3.2 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"/>

    <!--  -->
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>

    <!-- Data Table -->
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.min.css">

    <!-- Buttons for datatables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">

    <!-- Styles CSS --> 
    <link rel="stylesheet" href="<?php echo e(asset('css/styles.css')); ?>">

    <!-- Navbar CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('css/navbar.css')); ?>">

    <!-- Sidebar CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('css/sidebar.css')); ?>">

    <!-- Dashboard CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('css/dashboard.css')); ?>">

    <!-- Data tables CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('css/data-tables.css')); ?>">

    <!-- Dashboard Calendar CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('css/db-ats-calendar.css')); ?>">

    <!-- Calendar CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('css/ats-calendar.css')); ?>">

    <!-- Online Recruitment CCS -->
    <link rel="stylesheet" href="<?php echo e(asset('css/ol-recruitment.css')); ?>">
</head>

<body>
    <!-- Navbar -->
    <?php if (isset($component)) { $__componentOriginalcbb70b44f4f07bab7a5fcc4127f4432c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalcbb70b44f4f07bab7a5fcc4127f4432c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.partials.system.system-navbar','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('partials.system.system-navbar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalcbb70b44f4f07bab7a5fcc4127f4432c)): ?>
<?php $attributes = $__attributesOriginalcbb70b44f4f07bab7a5fcc4127f4432c; ?>
<?php unset($__attributesOriginalcbb70b44f4f07bab7a5fcc4127f4432c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalcbb70b44f4f07bab7a5fcc4127f4432c)): ?>
<?php $component = $__componentOriginalcbb70b44f4f07bab7a5fcc4127f4432c; ?>
<?php unset($__componentOriginalcbb70b44f4f07bab7a5fcc4127f4432c); ?>
<?php endif; ?>

    <?php echo e($slot); ?>


    <?php if (isset($component)) { $__componentOriginalda3062cffc092fcc96b2a905f3967236 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalda3062cffc092fcc96b2a905f3967236 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.partials.system.system-scripts','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('partials.system.system-scripts'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalda3062cffc092fcc96b2a905f3967236)): ?>
<?php $attributes = $__attributesOriginalda3062cffc092fcc96b2a905f3967236; ?>
<?php unset($__attributesOriginalda3062cffc092fcc96b2a905f3967236); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalda3062cffc092fcc96b2a905f3967236)): ?>
<?php $component = $__componentOriginalda3062cffc092fcc96b2a905f3967236; ?>
<?php unset($__componentOriginalda3062cffc092fcc96b2a905f3967236); ?>
<?php endif; ?>
    


</body>
</html><?php /**PATH C:\laragon\www\hr_catalists\resources\views/layouts/admin-ats-layout.blade.php ENDPATH**/ ?>