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
        <?php if (isset($component)) { $__componentOriginalb6736efa91a27fe677a95c665ef9b617 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb6736efa91a27fe677a95c665ef9b617 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.partials.system.ems.ems-sidebar','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('partials.system.ems.ems-sidebar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalb6736efa91a27fe677a95c665ef9b617)): ?>
<?php $attributes = $__attributesOriginalb6736efa91a27fe677a95c665ef9b617; ?>
<?php unset($__attributesOriginalb6736efa91a27fe677a95c665ef9b617); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb6736efa91a27fe677a95c665ef9b617)): ?>
<?php $component = $__componentOriginalb6736efa91a27fe677a95c665ef9b617; ?>
<?php unset($__componentOriginalb6736efa91a27fe677a95c665ef9b617); ?>
<?php endif; ?>
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
                            <th>POSITION</th>
                            <th>ACTIVITIES</th>
                            <th>TIME</th>
                            <th>DATE</th>
                        </tr>
                    </thead>

                    <tbody>
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
                    </tbody>
                </table>
            </div>
        </div>
    </div>
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
<?php endif; ?><?php /**PATH C:\laragon\www\hr_catalists\resources\views/hrcatalists/ems/admin-ems-logs.blade.php ENDPATH**/ ?>