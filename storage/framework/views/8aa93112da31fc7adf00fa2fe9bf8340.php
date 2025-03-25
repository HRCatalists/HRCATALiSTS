<?php if (isset($component)) { $__componentOriginal5aa067d06d1afdd090a728cb9bf57c48 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5aa067d06d1afdd090a728cb9bf57c48 = $attributes; } ?>
<?php $component = App\View\Components\AdminEmsLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin-ems-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\AdminEmsLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>

    <!-- Log List Section -->
    <div class="d-flex">
        <!-- Sidebar -->
        <?php if (isset($component)) { $__componentOriginald5876c07269e58343b8102e8c5f829ec = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald5876c07269e58343b8102e8c5f829ec = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.partials.system.ats.ats-sidebar','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('partials.system.ats.ats-sidebar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald5876c07269e58343b8102e8c5f829ec)): ?>
<?php $attributes = $__attributesOriginald5876c07269e58343b8102e8c5f829ec; ?>
<?php unset($__attributesOriginald5876c07269e58343b8102e8c5f829ec); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald5876c07269e58343b8102e8c5f829ec)): ?>
<?php $component = $__componentOriginald5876c07269e58343b8102e8c5f829ec; ?>
<?php unset($__componentOriginald5876c07269e58343b8102e8c5f829ec); ?>
<?php endif; ?>
<<<<<<< HEAD

=======
<<<<<<< HEAD
=======

>>>>>>> hr-catalists
>>>>>>> 53eaa7626ee2bc35004633ce2f6496ccff20f396
        <!-- End of Sidebar -->
    
        <!-- Logs Content -->
        <div id="content" class="flex-grow-1">
            <div class="container">

                <div class="d-flex justify-content-between align-items-center my-5">
                    <h2 class="dt-h2">Log History</h2>

                    <button class="btn shadow print-btn">
                        <i class="fa fa-print"></i> PRINT
                    </button>
                </div>

                <table class="table table-bordered mt-4 m-0" id="logsTable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>USER</th>
<<<<<<< HEAD
                            <th>POSITION</th>
=======
>>>>>>> 53eaa7626ee2bc35004633ce2f6496ccff20f396
                            <th>ACTIVITIES</th>
                            <th>TIME</th>
                            <th>DATE</th>
                        </tr>
                    </thead>

                    <tbody>
<<<<<<< HEAD
                        <tr>
                            <td>1</td>
                            <td>Fate Gamboa</td>
                            <td>Employee</td>
                            <td>Updated Mobile Number</td>
                            <td>1:00 p.m.</td>
                            <td>1/19/2025</td>
                        </tr>

                        <tr>
                            <td>2</td>
                            <td>Dr. Mora</td>
                            <td>Super Admin</td>
                            <td>Deleted Applicant Profile</td>
                            <td>10:00 a.m.</td>
                            <td>1/19/2025</td>
                        </tr>

                        <tr>
                            <td>3</td>
                            <td>Secretary</td>
                            <td>Admin</td>
                            <td>Posted a Position</td>
                            <td>1:00 p.m.</td>
                            <td>1/11/2025</td>
                        </tr>
=======
                        <?php $__currentLoopData = $logs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $log): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($loop->iteration); ?></td>
                                <td><?php echo e($log->user->name ?? 'Guest'); ?></td>
                                <td><?php echo e($log->activity); ?></td>
                                <td><?php echo e($log->created_at->format('h:i a')); ?></td>
                                <td><?php echo e($log->created_at->format('F d, Y')); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
>>>>>>> 53eaa7626ee2bc35004633ce2f6496ccff20f396
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<<<<<<< HEAD
    <!-- End of Logs Content -->

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5aa067d06d1afdd090a728cb9bf57c48)): ?>
<?php $attributes = $__attributesOriginal5aa067d06d1afdd090a728cb9bf57c48; ?>
<?php unset($__attributesOriginal5aa067d06d1afdd090a728cb9bf57c48); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5aa067d06d1afdd090a728cb9bf57c48)): ?>
<?php $component = $__componentOriginal5aa067d06d1afdd090a728cb9bf57c48; ?>
<?php unset($__componentOriginal5aa067d06d1afdd090a728cb9bf57c48); ?>
<?php endif; ?>
=======

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal)): ?>
<?php $attributes = $__attributesOriginal; ?>
<?php unset($__attributesOriginal); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal)): ?>
<?php $component = $__componentOriginal; ?>
<?php unset($__componentOriginal); ?>
<?php endif; ?>
>>>>>>> 53eaa7626ee2bc35004633ce2f6496ccff20f396
<?php /**PATH C:\laragon\www\hr_catalists\resources\views\hrcatalists\ems\admin-ems-logs.blade.php ENDPATH**/ ?>