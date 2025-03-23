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
    <div class="latest-opening table-container justify-content-center align-items-center mx-auto">
        <h1 class="my-5">JOB OPENINGS</h1>

        <!-- Search Bar Container -->
        <div class="search-container">
            <form id="jobSearchForm" class="search-bar-2">
                <div class="row w-100">
                    <!-- Job Title Input -->
                    <div class="col-4">
                        <input type="text" id="keyword" name="keyword" placeholder="Enter Job Title or Tags">
                    </div>
        
                    <!-- Searchable Dropdown (Select2) -->                                      
                    <div class="col-6">
                        <select id="position" name="position">
                            <option value="">Select a Department</option>
                            <?php $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $department): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($department->name); ?>"><?php echo e($department->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select> 
                    </div>
        
                    <!-- Search Button -->
                    <div class="col-2">
                        <button type="submit" class="btn btn-primary">Search</button>
                    </div>
                </div>                              
            </form>
        </div>
        

        <!-- Job Listings -->
        <div class="container mt-5 g-1">
            <div class="row row-gap-5" id="jobResults">
                <?php $__currentLoopData = $jobs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $job): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-4 job-card-container">
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
                                        <?php echo nl2br(e(Str::limit(trim($description), 55, '...'))); ?><br>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </span><br>
                                <strong>Requirements:</strong><br>
                                <span title="<?php echo e($job->requirements); ?>">
                                    <?php $__currentLoopData = explode("\n", $job->requirements); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $requirement): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php echo nl2br(e(Str::limit(trim($requirement), 55, '...'))); ?><br>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </span>
                            </p>
                            <a class="btn-3" href="<?php echo e(route('job-selected', $job->slug)); ?>">APPLY NOW</a>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>        
    </div>
    <!-- Job Openings end-->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        document.getElementById('jobSearchForm').addEventListener('submit', function(event) {
        event.preventDefault();

        let keyword = document.getElementById('keyword').value;
        let department = document.getElementById('position').value;

        fetch(`/search-jobs?keyword=${keyword}&position=${department}`)
            .then(response => response.json())
            .then(data => {
                let jobResults = document.getElementById('jobResults');
                jobResults.innerHTML = '';

                if (data.jobs.length > 0) {
                    data.jobs.forEach(job => {
                        jobResults.innerHTML += `
                            <div class="col-md-4 job-card-container">
                                <div class="card job-card p-4">
                                    <h5>${job.job_title}</h5>
                                    <div class="tags">${job.tags.split(',').map(tag => `<span class="tag">${tag.trim()}</span>`).join('')}</div>
                                    <p class="requirements">
                                        <strong>Job Description:</strong><br>
                                        <span>${job.job_description.length > 55 ? job.job_description.substring(0, 55) + '...' : job.job_description}</span><br>
                                        <strong>Requirements:</strong><br>
                                        <span>${job.requirements.length > 55 ? job.requirements.substring(0, 55) + '...' : job.requirements}</span>
                                    </p>
                                    <a class="btn-3" href="/job-selected/${job.slug}">APPLY NOW</a>
                                </div>
                            </div>`;
                    });
                } else {
                    jobResults.innerHTML = '<p class="text-center">No jobs found</p>';
                }
            })
            .catch(error => console.error('Error fetching jobs:', error));
    });
    </script>
    
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal22420923a32db135c994bb2339cfe9f5)): ?>
<?php $attributes = $__attributesOriginal22420923a32db135c994bb2339cfe9f5; ?>
<?php unset($__attributesOriginal22420923a32db135c994bb2339cfe9f5); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal22420923a32db135c994bb2339cfe9f5)): ?>
<?php $component = $__componentOriginal22420923a32db135c994bb2339cfe9f5; ?>
<?php unset($__componentOriginal22420923a32db135c994bb2339cfe9f5); ?>
<?php endif; ?><?php /**PATH C:\laragon\www\hr_catalists\resources\views/hrcatalists/openings.blade.php ENDPATH**/ ?>