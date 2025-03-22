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

     <?php $__env->slot('title', null, []); ?> 
        Columban College Inc. | Calendar
     <?php $__env->endSlot(); ?>
    
        <!-- Sidebar & Master List -->
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

            <!-- End of Sidebar -->
        
            <!-- Employee List -->
            <div id="content" class="flex-grow-1">
                <div class="container mt-5">
                    
                    <div class="d-flex justify-content-between align-items-center mt-5 mb-5">
                        <div>
                            <h2 class="db-h2">Employee List</h2>
                        </div>
    
                        <div class="d-flex">
                            <!-- Add Position Button -->
                            <div class="container text-center">
                                <a href="admin-ems-add-emp.html" class="button btn add-btn">ADD EMPLOYEE</a>
                            </div>
    
                            <button class="btn shadow print-btn">
                                <i class="fa fa-print"></i> PRINT
                            </button>
                        </div>
    
                    </div>
        
                    <!-- Employee Table -->
                    <table id="employeeTable" class="table table-bordered display">
                        <thead>
                            <tr>
                                <th class="text-center"><input type="checkbox" id="selectAll"> </th>
                                <th>ID</th>
                                <th>NAME</th>
                                <th>EMAIL</th>
                                <th>DEPARTMENT</th>
                                <th>POSITION</th>
                                <th>DATE OF EMPLOYMENT</th>
                                <th>ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-center"><input type="checkbox" class="rowCheckbox"></td>
                                <td>21310350</td>
                                <td> Monsalud, Rhinell Fate J. </td>
                                <td>mon@gmail.com</td>
                                <td>College of Computer Studieds</td> 
                                <td>Professor</td>
                                <td>November 11, 2024</td>
                                <td>
                                    <a href="admin-ems-view-emp.html" class="button btn btn-ap-edit">VIEW</a>
                                    <button class="btn btn-danger" onclick="showPopup('rejectPopup')">DELETE</button>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center"><input type="checkbox" class="rowCheckbox"></td>
                                <td>21310350</td>
                                <td> Monsalud, Rhinell Fate J. </td>
                                <td>mon@gmail.com</td>
                                <td>College of Nursing</td> 
                                <td>Professor</td>
                                <td>November 11, 2024</td>
                                <td>
                                    <a href="admin-ems-view-emp.html" class="button btn btn-ap-edit">VIEW</a>
                                    <button class="btn btn-danger" onclick="showPopup('rejectPopup')">DELETE</button>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center"><input type="checkbox" class="rowCheckbox"></td>
                                <td>21310350</td>
                                <td> Monsalud, Rhinell Fate J. </td>
                                <td>mon@gmail.com</td>
                                <td>College of Architecture</td> 
                                <td>Professor</td>
                                <td>November 11, 2024</td>
                                <td>
                                    <a href="admin-ems-view-emp.html" class="button btn btn-ap-edit">VIEW</a>
                                    <button class="btn btn-danger" onclick="showPopup('rejectPopup')">DELETE</button>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center"><input type="checkbox" class="rowCheckbox"></td>
                                <td>21310350</td>
                                <td> Monsalud, Rhinell Fate J. </td>
                                <td>mon@gmail.com</td>
                                <td>College of Architecture</td> 
                                <td>Professor</td>
                                <td>November 11, 2024</td>
                                <td>
                                    <a href="admin-ems-view-emp.html" class="button btn btn-ap-edit">VIEW</a>
                                    <button class="btn btn-danger" onclick="showPopup('rejectPopup')">DELETE</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>

        <!-- Delete Popup -->
        <div id="rejectPopup" class="custom-popup">
            <div class="popup-content">
                <p>Are you sure you want to delete this employee?</p>
                <button class="btn btn-danger" onclick="rejectAction()">Yes, delete the employee!</button>
                <button class="btn btn-outline-secondary" onclick="closePopup('rejectPopup')">Cancel</button>
            </div>
        </div>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5aa067d06d1afdd090a728cb9bf57c48)): ?>
<?php $attributes = $__attributesOriginal5aa067d06d1afdd090a728cb9bf57c48; ?>
<?php unset($__attributesOriginal5aa067d06d1afdd090a728cb9bf57c48); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5aa067d06d1afdd090a728cb9bf57c48)): ?>
<?php $component = $__componentOriginal5aa067d06d1afdd090a728cb9bf57c48; ?>
<?php unset($__componentOriginal5aa067d06d1afdd090a728cb9bf57c48); ?>
<?php endif; ?><?php /**PATH C:\Users\raide\OneDrive\Desktop\HRCATALiSTS-hr-catalists\resources\views/hrcatalists/ems/admin-ems-emp.blade.php ENDPATH**/ ?>