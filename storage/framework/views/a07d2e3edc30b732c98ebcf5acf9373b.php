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
        Columban College Inc. | ATS Calendar
     <?php $__env->endSlot(); ?>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <div class="d-flex">
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
    </div>

    <div class="d-flex">
        <div id="content" class="flex-grow-1">
            <div class="container mt-5">
                <div class="d-flex justify-content-center mb-4">
                    <h2 class="db-h2">FACULTY RANKING SYSTEM</h2>   
                </div>

                <!-- Search Section -->
                <div class="container">
                    <div class="search-container">
                        <div class="d-flex">
                            <input type="text" id="searchName" class="form-control me-2" placeholder="Enter Name of Personnel" aria-label="Search by Name">
                            <select id="searchDepartment" class="form-select me-2">
                                <option value="" disabled selected>-Select a Department-</option>
                                <option value="College of Nursing">College of Nursing</option>
                                <option value="College of Computer Studies">College of Computer Studies</option>
                                <!-- Add other departments here -->
                            </select>
                            <button class="btn search-btn" onclick="searchPersonnel()">SEARCH</button>
                        </div>
                    </div>
                </div>

                <!-- Display Selected Person's Name -->
                <div class="mt-3">
                    <h5>Selected Personnel:</h5>
                    <div id="selected-person" class="alert alert-info" style="display: none;"></div>
                </div>

                <!-- Search Results Section (optional, if you want to display a message) -->
                <div class="mt-5" id="search-results"></div>

                <!-- Print Button -->
                <div class="d-flex justify-content-end mb-3">
                    <button class="btn shadow print-btn">
                        <i class="fa fa-print"></i> PRINT
                    </button>
                </div>

                <!-- Employee Name Display -->
                <div class="text-center mt-4 mb-2">
                    <h4 id="selectedEmployeeName" class="fw-bold text-primary"></h4>
                </div>

                <!-- Tab links -->
                <ul class="nav nav-tabs mt-5" id="myTabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="tab1" data-bs-toggle="tab" href="#content1" role="tab">I.</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="tab2" data-bs-toggle="tab" href="#content2" role="tab">II.</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="tab3" data-bs-toggle="tab" href="#content3" role="tab">III.</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="tab4" data-bs-toggle="tab" href="#content4" role="tab">IV.</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="tab5" data-bs-toggle="tab" href="#content5" role="tab">SUMMARY</a>
                    </li>
                </ul>

                <!-- Tab content -->
                <div class="tab-content" id="myTabContent">  
                    <!-- This partial contains the Faculty Rank 1 form -->
                    <?php if (isset($component)) { $__componentOriginalf46b5c0ce0a681839ebe498ec2976986 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf46b5c0ce0a681839ebe498ec2976986 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.partials.system.ems.ems-ranking-faculty-1','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('partials.system.ems.ems-ranking-faculty-1'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf46b5c0ce0a681839ebe498ec2976986)): ?>
<?php $attributes = $__attributesOriginalf46b5c0ce0a681839ebe498ec2976986; ?>
<?php unset($__attributesOriginalf46b5c0ce0a681839ebe498ec2976986); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf46b5c0ce0a681839ebe498ec2976986)): ?>
<?php $component = $__componentOriginalf46b5c0ce0a681839ebe498ec2976986; ?>
<?php unset($__componentOriginalf46b5c0ce0a681839ebe498ec2976986); ?>
<?php endif; ?>
                    <?php if (isset($component)) { $__componentOriginal5c49e1aaae66b3d42bb7f780b57349cf = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5c49e1aaae66b3d42bb7f780b57349cf = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.partials.system.ems.ems-ranking-faculty-2','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('partials.system.ems.ems-ranking-faculty-2'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5c49e1aaae66b3d42bb7f780b57349cf)): ?>
<?php $attributes = $__attributesOriginal5c49e1aaae66b3d42bb7f780b57349cf; ?>
<?php unset($__attributesOriginal5c49e1aaae66b3d42bb7f780b57349cf); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5c49e1aaae66b3d42bb7f780b57349cf)): ?>
<?php $component = $__componentOriginal5c49e1aaae66b3d42bb7f780b57349cf; ?>
<?php unset($__componentOriginal5c49e1aaae66b3d42bb7f780b57349cf); ?>
<?php endif; ?>
                    <?php if (isset($component)) { $__componentOriginal8d67d8a2c600ba4fa43b0bee4aadee6a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8d67d8a2c600ba4fa43b0bee4aadee6a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.partials.system.ems.ems-ranking-faculty-3','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('partials.system.ems.ems-ranking-faculty-3'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8d67d8a2c600ba4fa43b0bee4aadee6a)): ?>
<?php $attributes = $__attributesOriginal8d67d8a2c600ba4fa43b0bee4aadee6a; ?>
<?php unset($__attributesOriginal8d67d8a2c600ba4fa43b0bee4aadee6a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8d67d8a2c600ba4fa43b0bee4aadee6a)): ?>
<?php $component = $__componentOriginal8d67d8a2c600ba4fa43b0bee4aadee6a; ?>
<?php unset($__componentOriginal8d67d8a2c600ba4fa43b0bee4aadee6a); ?>
<?php endif; ?>
                    <?php if (isset($component)) { $__componentOriginal117e0545c817cfe1d2fa9c69679f8910 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal117e0545c817cfe1d2fa9c69679f8910 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.partials.system.ems.ems-ranking-faculty-4','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('partials.system.ems.ems-ranking-faculty-4'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal117e0545c817cfe1d2fa9c69679f8910)): ?>
<?php $attributes = $__attributesOriginal117e0545c817cfe1d2fa9c69679f8910; ?>
<?php unset($__attributesOriginal117e0545c817cfe1d2fa9c69679f8910); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal117e0545c817cfe1d2fa9c69679f8910)): ?>
<?php $component = $__componentOriginal117e0545c817cfe1d2fa9c69679f8910; ?>
<?php unset($__componentOriginal117e0545c817cfe1d2fa9c69679f8910); ?>
<?php endif; ?>
                    <?php if (isset($component)) { $__componentOriginal7f47c1b1d50b37cff8dff5bd16501a94 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7f47c1b1d50b37cff8dff5bd16501a94 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.partials.system.ems.ems-ranking-faculty-summary','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('partials.system.ems.ems-ranking-faculty-summary'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal7f47c1b1d50b37cff8dff5bd16501a94)): ?>
<?php $attributes = $__attributesOriginal7f47c1b1d50b37cff8dff5bd16501a94; ?>
<?php unset($__attributesOriginal7f47c1b1d50b37cff8dff5bd16501a94); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal7f47c1b1d50b37cff8dff5bd16501a94)): ?>
<?php $component = $__componentOriginal7f47c1b1d50b37cff8dff5bd16501a94; ?>
<?php unset($__componentOriginal7f47c1b1d50b37cff8dff5bd16501a94); ?>
<?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <script>
        function searchPersonnel() {
            let name = document.getElementById("searchName").value;
            let department = document.getElementById("searchDepartment").value;

            if (name.trim() === "" || department === "") {
                alert("Please enter a name and select a department.");
                return;
            }

            // Display the selected name
            let selectedPersonDiv = document.getElementById("selected-person");
            selectedPersonDiv.style.display = "block";
            selectedPersonDiv.innerHTML = `<strong>Name:</strong> ${name} <br> <strong>Department:</strong> ${department}`;
        }
    </script>
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
<<<<<<< HEAD
=======
<script>
window.searchPersonnel = function () {
    const name = document.getElementById("searchName").value;
    const department = document.getElementById("searchDepartment").value;
    const resultsContainer = document.getElementById("search-results");
    resultsContainer.innerHTML = "<p>Searching...</p>";

    const headers = {
        "Content-Type": "application/json",
        "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content
    };

    const rankFetchers = [
        { rank_type: "rank1", populateFn: populateFacultyForm },
        { rank_type: "rank2", populateFn: populateFacultyFormRank2 },
        { rank_type: "rank3", populateFn: populateFacultyFormRank3 },
        { rank_type: "rank4", populateFn: populateFacultyFormRank4 } // ✅ Added Rank 4
    ];

    rankFetchers.forEach(({ rank_type, populateFn }) => {
        fetch("/search-faculty", {
            method: "POST",
            headers,
            body: JSON.stringify({ name, department, rank_type })
        })
        .then(res => {
            if (!res.ok) throw new Error(`Server returned ${res.status}`);
            return res.json();
        })
        .then(data => {
            const faculty = Array.isArray(data) ? data[0] : null;
            if (!faculty) return;

            if (rank_type === "rank1") {
                const emp = faculty.employee || faculty;
                document.querySelector('[name="emp_id"]').value = emp.emp_id || faculty.emp_id;
                document.getElementById("selectedEmployeeName").textContent = `${emp.first_name} ${emp.last_name} (${emp.department})`;
            }

            populateFn(faculty); // Call correct populate function
        })
        .catch(err => {
            console.error(`Search failed for ${rank_type}:`, err);
            resultsContainer.innerHTML = `<p>Error searching for ${rank_type.toUpperCase()}: ${err.message}</p>`;
        });
    });
};
</script>

>>>>>>> hr-catalists
<?php /**PATH C:\Users\raide\OneDrive\Desktop\HRCATALiSTS-hr-catalists\resources\views/hrcatalists/ems/admin-ems-faculty-ranking.blade.php ENDPATH**/ ?>