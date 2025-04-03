@php
    $employeeId = $employee->id ?? 'new';
    $fieldClass = 'plain-input section-field-employment-details-' . $employeeId;
    $employment = $employee->employmentDetails ?? null;
@endphp

<div class="mb-5" id="section-employment-details-{{ $employeeId }}">
    <div class="d-flex justify-content-between align-items-center">
        <h4 class="db-h4 my-4">Employment Data</h4>
        <div>
            <button type="button" class="btn btn-sm btn-outline-primary toggle-edit-btn" 
                data-section="employment-details" 
                data-employee-id="{{ $employeeId }}">
                Edit
            </button>
        </div>
    </div>

    <div class="row">
        <!-- Job Selection Dropdown -->
        <div class="col-md-6 mb-3">
            <label for="job_id_{{ $employeeId }}" class="form-label fw-bold">Select Position:</label>
            <select name="job_id_visible" id="job_id_{{ $employeeId }}" class="form-select {{ $fieldClass }}" {{ isset($employee) ? 'disabled' : '' }}>
                <option value="">Select Position</option>
                @foreach($jobs as $job)
                    <option 
                        value="{{ $job->id }}" 
                        data-slug="{{ $job->slug }}"
                        {{ old('job_id', $employee?->job_id) == $job->id ? 'selected' : '' }}>
                        {{ $job->job_title }} ({{ $job->department }})
                    </option>
                @endforeach
            </select>
            
            {{-- This will be submitted --}}
            <input type="hidden" name="job_id" id="job_id_hidden_{{ $employeeId }}" value="{{ old('job_id', $employee?->job_id) }}">                      
        </div>

        <!-- Parent Department -->
        <div class="col-md-6 mb-3">
            <label class="form-label fw-bold">Parent Department:</label>
            <input type="text" name="parent_department" class="{{ $fieldClass }}" 
                value="{{ old('parent_department', $employment->parent_department ?? 'N/A') }}" readonly>
        </div>

        <!-- Parent College -->
        <div class="col-md-6 mb-3">
            <label class="form-label fw-bold">Parent College:</label>
            <input type="text" name="parent_college" class="{{ $fieldClass }}" 
                value="{{ old('parent_college', $employment->parent_college ?? 'N/A') }}" readonly>
        </div>

        <!-- Classification -->
        <div class="col-md-6 mb-3">
            <label class="form-label fw-bold">Classification:</label>
            <input type="text" name="classification" class="{{ $fieldClass }}" 
                value="{{ old('classification', $employment->classification ?? 'N/A') }}" readonly>
        </div>

        <!-- Employment Status -->
        <div class="col-md-6 mb-3">
            <label class="form-label fw-bold">Employment Status:</label>
            <input type="text" name="employment_status" class="{{ $fieldClass }}" 
                value="{{ old('employment_status', $employment->employment_status ?? 'N/A') }}" readonly>
        </div>

        <!-- Date of Employment -->
        <div class="col-md-6 mb-3">
            <label class="form-label fw-bold">Date of Employment:</label>
            <input type="date" name="date_employed" class="{{ $fieldClass }}"
                value="{{ old('date_employed', $employment->date_employed ?? now()->format('Y-m-d')) }}" readonly>
        </div>

        <!-- Accreditation -->
        <div class="col-md-6 mb-3">
            <label class="form-label fw-bold">Accreditation:</label>
            <input type="text" name="accreditation" class="{{ $fieldClass }}" 
                value="{{ old('accreditation', $employment->accreditation ?? 'N/A') }}" readonly>
        </div>

        <!-- Date of Permanent Status -->
        <div class="col-md-6 mb-3">
            <label class="form-label fw-bold">Date of Permanent Status:</label>
            <input type="date" name="date_permanent" class="{{ $fieldClass }}" 
                value="{{ old('date_permanent', $employment->date_permanent ?? '') }}" readonly>
        </div>

        <!-- CV Upload -->
        <div class="col-md-12 mb-3">
            <label for="cv-{{ $employeeId }}" class="form-label fw-bold">Attach CV <span class="text-danger">*</span></label>
            <div class="input-group">
                <input 
                    type="file" 
                    name="cv" 
                    id="cv-{{ $employeeId }}" 
                    class="form-control d-none @error('cv') is-invalid @enderror {{ $fieldClass }}" 
                    accept=".pdf" 
                    {{ isset($employee->id) ? '' : 'required' }}
                >
                <label for="cv-{{ $employeeId }}" class="btn btn-primary">Choose File</label>
                <span class="input-group-text file-label" id="cvLabel-{{ $employeeId }}">
                    {{ $employee->cv ?? 'No file selected' }}
                </span>
            </div>
            <small class="form-text text-muted">Submit your file in .pdf format (Max: 2 MB)</small>

            @error('cv') 
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror

            @if (!is_null($employee) && $employee->cv)
                <div>
                    <a href="https://drive.google.com/uc?id={{ $employee->cv }}&export=download" target="_blank" class="text-success">
                        Download
                    </a>
                    <a href="https://drive.google.com/file/d/{{ $employee->cv }}/view" target="_blank" class="text-primary">
                        View
                    </a>
                </div>
            @endif
        </div>
    </div>
</div>
