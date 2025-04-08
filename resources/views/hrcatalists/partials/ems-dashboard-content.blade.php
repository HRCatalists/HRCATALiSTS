<!-- Dashboard Content -->
<div id="" class="flex-grow-1">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center my-4">
            <h3 class="mb-4 fw-bold text-primary">Employees</h3>
        </div>

        <div class="row g-4">
            <!-- Left Column -->
            <div class="col-md-7">
                {{-- Employee Classification --}}
                <div class="card shadow p-3 mb-4">
                    <h5 class="card-title">Employee Classification</h5>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Teaching
                            <span class="badge bg-primary rounded-pill">{{ $teachingCount }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Non-Teaching
                            <span class="badge bg-secondary rounded-pill">{{ $nonTeachingCount }}</span>
                        </li>
                    </ul>
                </div>

                {{-- Employee Count by Department --}}
                <div class="card shadow p-3">
                    <h5 class="card-title">Employee Count by Department</h5>
                    @foreach ($departmentPercentages as $label => $data)
                        @php
                            $class = Str::slug($label); // Convert to slug class
                        @endphp
                        <div class="mb-3">
                            <div class="department-name fw-semibold mb-1">{{ $label }}</div>
                            <div class="progress">
                                <div class="progress-bar {{ $class }}" style="width: {{ $data['percentage'] }}%;">
                                    {{ $data['count'] }} employee{{ $data['count'] == 1 ? '' : 's' }}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Right Column -->
            <div class="col-md-5">
                <div class="row g-4">
                    <!-- Employees Card -->
                    <div class="col-12">
                        <div class="card emp-card text-center shadow h-100">
                            <div class="card-body emp-card-text">
                                <div class="d-flex align-items-center justify-content-center">
                                    <h5 class="card-title m-auto">Employees</h5>
                                    <img src="images/cv-2.png" class="card-icon m-auto ms-2" alt="doc-icon">
                                </div>
                                <p class="emp-counter text-wrap fw-bold mt-3 mb-0">{{ $totalEmployees ?? 0 }}</p>
                            </div>
                        </div>
                    </div>

                    {{-- Uncomment for gender structure visualization --}}
                    {{-- 
                    <div class="col-12">
                        <div class="card shadow p-4">
                            <h6 class="text-secondary">Statistics</h6>
                            <h5 class="card-title db-h5">Employee Structure</h5>
                            <div class="position-relative d-flex justify-content-center align-items-center my-2">
                                <div class="progress-circle">
                                    <div class="circle">
                                        <span class="circle-text fw-bold">100%</span>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-around">
                                <div class="d-flex align-items-center">
                                    <span class="dot bg-primary me-2"></span>
                                    <span>Male 65%</span>
                                </div>
                                <div class="d-flex align-items-center">
                                    <span class="dot bg-info me-2"></span>
                                    <span>Female 35%</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    --}}
                </div>
            </div>
        </div>
    </div>
</div>
