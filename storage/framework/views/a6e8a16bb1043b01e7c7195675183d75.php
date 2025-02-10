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
            <input type="text" placeholder="Enter keyword">

            <select>
                <option>Positions</option>
                <!-- Ideally, you would dynamically fill this with real data -->
                <option>Position 1</option>
                <option>Position 2</option>
                <option>Position 3</option>
                <option>Position 4</option>
                <option>Position 5</option>
            </select>

            <a href="#" class="search-btn">Search</a> 
        </div>
    </div>
 <!-- Latest Opening -->
 <div class="latest-opening justify-content-center align-items-center mx-auto pb-5">
        <h1>LATEST OPENING</h1>

        <div class="container mt-5 g-1">
            <div class="row">
                <?php $__currentLoopData = $jobs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $job): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-4">
                        <div class="card job-card p-4">
                            <h5><?php echo e($job->job_title); ?></h5>
                            <p class="requirements">
                                Requirements:<br>
                                <!-- Assuming the requirements are stored in the database -->
                                <?php echo nl2br(e($job->requirements)); ?>

                            </p>
                            <div class="tags">
                                <!-- Dynamically display tags, assuming 'tags' is a comma-separated string in the database -->
                                <?php $__currentLoopData = explode(',', $job->tags); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <span class="tag"><?php echo e($tag); ?></span>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>

                            <!-- Apply button (placeholder link) -->
                            <a style="--clr: #000" class="btn-3" href="#">
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
            </div>
        </div>
    </div>


    <!-- List of openings -->
    <div class="table-container">
        <h1 class="list-ttl mb-5">LIST OF OPENINGS</h1>

        <?php if($jobs->isEmpty()): ?>
            <p>No job listings available at the moment.</p>
        <?php else: ?>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Job Title</th>
                        <th scope="col">Tags</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $jobs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $job): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($job->job_title); ?></td>
                            <td><?php echo e(implode(', ', explode(',', $job->tags))); ?></td>
                            <td><a href="#" class="find-out-more">Find out more →</a></td> <!-- Placeholder link -->
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        <?php endif; ?>
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