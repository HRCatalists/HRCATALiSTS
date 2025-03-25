

    <div class="container job-selected py-5">
        <div class="row">
            <!-- Left Column -->
            <div class="col-md-6">
                <div class="mb-5">
                    <!-- Job Title -->
                    <h2 class="mb-0 text-dark fw-normal"><?php echo e($job->job_title); ?></h2>

                    <!-- Tags -->
                    <div class="d-flex my-3">
                        <?php $__currentLoopData = explode(',', $job->tags); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <button class="btn btn-outline-primary me-2"><?php echo e(trim($tag)); ?></button>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>

                    <!-- Closing date -->
                    <div class="closing-date text-muted mb-4">
                        <p class="mb-0 fw-bold">Closing Date:</p>
                        <p><?php echo e(\Carbon\Carbon::parse($job->end_date)->format('F d, Y')); ?></p>
                    </div>
                </div>

                <!-- Requirements -->
                <div class="mb-5">
                    <h4>Requirements:</h4>
                    <ul>
                        <?php $__currentLoopData = explode("\n", $job->requirements); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $requirement): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($requirement); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>

                <!-- Job Description -->
                <div class="mb-5">
                    <h4>Job Description:</h4>
                    <ul>
                        <?php $__currentLoopData = explode("\n", $job->job_description); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $desc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($desc); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            </div>

            <!-- Right Column -->
            <div class="col-md-6 d-flex align-items-center">
                <div class="w-100 text-center">
                    <a href="#" class="btn btn-lg btn-primary">Apply Now</a>
                </div>
            </div>
        </div>
    </div>

<?php /**PATH C:\laragon\www\hr_catalists\resources\views\components\partials\welcome\selectjob.blade.php ENDPATH**/ ?>