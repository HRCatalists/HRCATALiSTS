<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Applicants - <?php echo e(ucfirst($status)); ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        @media print {
            .no-print {
                display: none !important;
            }
        }
    </style>
</head>
<body>

    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3>Applicants - <?php echo e(ucfirst($status)); ?></h3>
            <button class="btn btn-primary no-print" onclick="window.print()">
                <i class="fa fa-print"></i> Print
            </button>
        </div>

        <table class="table table-bordered table-sm">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Position Applied</th>
                    <th>Applied At</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $applicants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $applicant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td><?php echo e($index + 1); ?></td>
                        <td><?php echo e($applicant->first_name); ?> <?php echo e($applicant->last_name); ?></td>
                        <td><?php echo e($applicant->email); ?></td>
                        <td><?php echo e($applicant->phone); ?></td>
                        <td><?php echo e($applicant->job->job_title ?? 'N/A'); ?></td>
                        <td><?php echo e(\Carbon\Carbon::parse($applicant->applied_at)->format('M d, Y')); ?></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="6" class="text-center">No applicants found for this status.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

</body>
</html>
<?php /**PATH C:\laragon\www\hr_catalists\resources\views/hrcatalists/print/applicants-by-status.blade.php ENDPATH**/ ?>