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
        Columban College Inc. | Job Openings
     <?php $__env->endSlot(); ?>

    <!-- Job Openings start-->
    <div class="latest-opening table-container justify-content-center align-items-center mx-auto pb-5">
        <h1 class="my-5">JOB OPENINGS</h1>

        <div class="search-container">
            <div class="search-bar-2">
                <input type="text" placeholder="Enter key word">
    
                <select>
                    <option>Positions</option>
                    <option>Positions one</option>
                    <option>Positions two</option>
                    <option>Positions three</option>
                    <option>Positions four</option>
                    <option>Positions five</option>
                    <option>Positions wneiurjhewiurherh</option>
                </select>
    
                <button>Search</button>  
            </div>
        </div>
    
        <div class="container mt-5 g-1">
            <div class="row">
                <?php if($jobs->isEmpty()): ?>
                    <p>No job openings are available at the moment.</p>
                <?php else: ?>
                    <?php $__currentLoopData = $jobs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $job): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-md-4">
                            <div class="card job-card p-4">
                                <h5><?php echo e($job->job_title); ?></h5>
                                <div class="tags">
                                    <?php $__currentLoopData = explode(',', $job->tags); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <span class="tag"><?php echo e(trim($tag)); ?></span>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>                             
                                <p class="requirements">
                                    <strong>Job Description:</strong><br>
                                    <span title="<?php echo e($job->job_description); ?>">
                                        <?php $__currentLoopData = explode("\n", $job->job_description); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $description): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php echo nl2br(e(Str::limit(trim($description), 50, '...'))); ?><br>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </span><br>
                                    <strong>Requirements:</strong><br>
                                    <span title="<?php echo e($job->requirements); ?>">
                                        <?php $__currentLoopData = explode("\n", $job->requirements); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $requirement): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php echo nl2br(e(Str::limit(trim($requirement), 50, '...'))); ?><br>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </span>
                                </p>
    
                                <!-- Apply Now Button linking to the job details page -->
                                <a style="--clr: #000" class="btn-3" href="<?php echo e(route('job-selected', $job->slug)); ?>">
                                    <span class="button__icon-wrapper">
                                        <svg width="10" class="button__icon-svg" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 15">
                                            <path fill="currentColor" d="M13.376 11.552l-.264-10.44-10.44-.24.024 2.28 6.96-.048L.2 12.56l1.488 1.488 9.432-9.432-.048 6.912 2.304.024z"></path>
                                        </svg>
                                        <svg class="button__icon-svg button__icon-svg--copy" xmlns="http://www.w3.org/2000/svg" width="10" fill="none" viewBox="0 0 14 15">
                                            <path fill="currentColor" d="M13.376 11.552l-.264-10.44-10.44-.24.024 2.28 6.96-.048L.2 12.56l1.488 1.488 9.432-9.432-.048 6.912 2.304.024z"></path>
                                        </svg>
                                    </span>
                                    APPLY NOW
                                </a>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <!-- Job Openings end-->

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal22420923a32db135c994bb2339cfe9f5)): ?>
<?php $attributes = $__attributesOriginal22420923a32db135c994bb2339cfe9f5; ?>
<?php unset($__attributesOriginal22420923a32db135c994bb2339cfe9f5); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal22420923a32db135c994bb2339cfe9f5)): ?>
<?php $component = $__componentOriginal22420923a32db135c994bb2339cfe9f5; ?>
<?php unset($__componentOriginal22420923a32db135c994bb2339cfe9f5); ?>
<?php endif; ?><?php /**PATH C:\Users\raide\OneDrive\Desktop\HRCATALiSTS-hr-catalists\resources\views/hrcatalists/openings.blade.php ENDPATH**/ ?>