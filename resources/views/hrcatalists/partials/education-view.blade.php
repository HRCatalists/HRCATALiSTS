@php
    $employeeId = $employee->id ?? 'new';
    $educations = $employee->educations ?? [];

    $priority = [
        'Doctorate' => 1,
        'Master\'s' => 2,
        'Bachelor\'s' => 3,
        'College' => 3,
        'Associate' => 4,
        'Senior High School' => 5,
        'High School' => 6,
        'Elementary' => 7,
        'Others' => 8
    ];

    $normalize = function ($level) {
        $level = strtolower(trim($level));
        return match (true) {
            str_contains($level, 'phd'), str_contains($level, 'doctor') => 'Doctorate',
            str_contains($level, 'master') => 'Master\'s',
            str_contains($level, 'bachelor') => 'Bachelor\'s',
            str_contains($level, 'college') => 'College',
            str_contains($level, 'associate') => 'Associate',
            str_contains($level, 'senior high') => 'Senior High School',
            str_contains($level, 'high school'), str_contains($level, 'junior high') => 'High School',
            str_contains($level, 'elementary') => 'Elementary',
            default => 'Others'
        };
    };

    $educations = collect($educations)->sortBy(function ($edu) use ($priority, $normalize) {
        $normalized = $normalize($edu->level ?? '');
        return $priority[$normalized] ?? 999;
    })->values();
@endphp


<!-- Educational Background -->
<div class="mb-5" id="section-education-{{ $employeeId }}" data-editing="false">
    <div class="d-flex justify-content-between align-items-center">
        <h4 class="db-h4 my-4">Educational Background</h4>
        <div>
            <button type="button" class="btn btn-sm btn-outline-primary toggle-edit-btn"
                    data-section="education" data-employee-id="{{ $employeeId }}">
                Edit
            </button>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-striped education-table" id="educationTable-{{ $employeeId }}">
            <thead class="text-center">
                <tr>
                    <th>Education</th>
                    <th>School</th>
                    <th>Course</th>
                    <th>Major</th>
                    <th>Remarks</th>
                    <th class="action-column d-none">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($educations as $index => $education)
                    <tr>
                        <td><input type="text" name="educations[{{ $index }}][level]" class="form-control section-field-education-{{ $employeeId }}" value="{{ $education->level }}" readonly></td>
                        <td><input type="text" name="educations[{{ $index }}][school]" class="form-control section-field-education-{{ $employeeId }}" value="{{ $education->school }}" readonly></td>
                        <td><input type="text" name="educations[{{ $index }}][course]" class="form-control section-field-education-{{ $employeeId }}" value="{{ $education->course }}" readonly></td>
                        <td><input type="text" name="educations[{{ $index }}][major]" class="form-control section-field-education-{{ $employeeId }}" value="{{ $education->major }}" readonly></td>
                        <td><input type="text" name="educations[{{ $index }}][remarks]" class="form-control section-field-education-{{ $employeeId }}" value="{{ $education->remarks }}" readonly></td>
                        <td class="action-column d-none text-center">
                            <button type="button" class="btn btn-sm btn-danger remove-edu-row d-none">Remove</button>
                        </td>                        
                    </tr>
                @endforeach
            </tbody>
        </table>

        <button type="button" class="btn btn-sm btn-outline-success mb-3 d-none mt-2" id="addEducationBtn-{{ $employeeId }}">
           + Add Education
        </button>
    </div>
</div>