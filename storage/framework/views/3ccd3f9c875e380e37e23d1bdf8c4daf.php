<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e($title ?? 'Columban College Inc. | admin login'); ?></title>

    <!-- Bootstrap CSS v5.3.2 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Styles CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('css/styles.css')); ?>">
    <!-- Login CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('css/login.css')); ?>">
</head>
<body>

    <?php echo e($slot); ?>


    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>

    <script>
        (function () {
            window.history.pushState(null, "", window.location.href);
            window.onpopstate = function () {
                window.location.href = "/login";
            };
        })();
    </script>

</body>
</html><?php /**PATH C:\laragon\www\hr_catalists\resources\views/layouts/login-layout.blade.php ENDPATH**/ ?>