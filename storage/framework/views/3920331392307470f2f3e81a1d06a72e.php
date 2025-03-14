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
    <form id="jobSearchForm" class="search-bar-2">
        <input type="text" id="keyword" name="keyword" placeholder="Enter keyword">

        <select id="position" name="position">
            <option value="Positions">Positions</option>
            <option value="Positions one">Positions one</option>
            <option value="Positions two">Positions two</option>
            <option value="Positions three">Positions three</option>
            <option value="Positions four">Positions four</option>
            <option value="Positions five">Positions five</option>
        </select>
    </form>
</div>
      <!-- Job Listings -->
<div class="container mt-5 g-1">
    <div class="row" id="jobResults">
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
                        <span><?php echo e(Str::limit($job->job_description, 50, '...')); ?></span><br>
                        <strong>Requirements:</strong><br>
                        <span><?php echo e(Str::limit($job->requirements, 50, '...')); ?></span>
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
    $(document).ready(function() {
        // Trigger AJAX search on input change
        $('#keyword, #position').on('input change', function() {
            let keyword = $('#keyword').val();
            let position = $('#position').val();

            $.ajax({
                url: "<?php echo e(route('openings')); ?>",
                method: "GET",
                data: { keyword: keyword, position: position },
                success: function(response) {
                    // Clear job results
                    $('#jobResults').html('');

                    // If no jobs found
                    if (response.jobs.length === 0) {
                        $('#jobResults').html('<p>No job openings found.</p>');
                        return;
                    }

                    // Append filtered jobs
                    $.each(response.jobs, function(index, job) {
                        let jobCard = `
                            <div class="col-md-4 job-card-container">
                                <div class="card job-card p-4">
                                    <h5>${job.job_title}</h5>
                                    <div class="tags">${getTags(job.tags)}</div>                             
                                    <p class="requirements">
                                        <strong>Job Description:</strong><br>
                                        <span>${truncateText(job.job_description, 50)}</span><br>
                                        <strong>Requirements:</strong><br>
                                        <span>${truncateText(job.requirements, 50)}</span>
                                    </p>
                                    <a class="btn-3" href="/job/${job.slug}">APPLY NOW</a>
                                </div>
                            </div>`;
                        $('#jobResults').append(jobCard);
                    });
                }
            });
        });

        // Helper function to truncate text
        function truncateText(text, limit) {
            return text.length > limit ? text.substring(0, limit) + '...' : text;
        }

        // Helper function to format tags
        function getTags(tags) {
            return tags.split(',').map(tag => `<span class="tag">${tag.trim()}</span>`).join(' ');
        }
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
<?php endif; ?><?php /**PATH C:\Users\raide\OneDrive\Desktop\HRCATALiSTS-hr-catalists\resources\views/hrcatalists/openings.blade.php ENDPATH**/ ?>