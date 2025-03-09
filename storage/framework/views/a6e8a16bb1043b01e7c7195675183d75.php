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
        Columban College Inc. | Careers
     <?php $__env->endSlot(); ?>

    <!-- Banner Section with Search Bar -->
    <div class="banner" style="background-image: url('<?php echo e(asset('images/cc-bg-pic.png')); ?>')">
        <div class="text-center"> 
            <p>Christi Simus Non Nostri<br>We are Christ's and not our own</p> 
        </div>
        
        <div class="search-bar">
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

    <!-- About Us Section -->
    <div class="about-us">
        <h1 class="mx-auto mb-3">ABOUT US</h1>

        <div class="d-flex mt-5">
            <img src="images/ccihr-logo.png" alt="About Us Image"> 
            <div class="about-us-content px-5">
                <h2>Human Asset Management and Development Office</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            </div>
        </div>
    </div>

    <!-- Latest Openings -->
    <div class="latest-opening justify-content-center align-items-center mx-auto pb-5">
        <h1>LATEST OPENINGS</h1>
    
        <div class="container mt-5 g-1">
            <div class="row">
                <?php if($jobs->isEmpty()): ?>
                    <p>No job openings are available at the moment.</p>
                <?php else: ?>
                    <?php $__currentLoopData = $jobs->sortByDesc('created_at')->take(3); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $job): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
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
<?php /**PATH C:\Users\raide\OneDrive\Desktop\HRCATALiSTS-hr-catalists\resources\views/hrcatalists/index.blade.php ENDPATH**/ ?>