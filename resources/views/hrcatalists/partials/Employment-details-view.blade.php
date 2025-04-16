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
        <!-- Department -->
        <div class="col-md-6 mb-3">
            <label class="form-label fw-bold">Parent Department:</label>
            <input type="text" name="department" id="department_{{ $employeeId }}" class="{{ $fieldClass }}" 
                value="{{ old('department', $employee->department ?? '') }}" readonly>
        </div>

        <!-- Job Title -->
        <div class="col-md-6 mb-3">
            <label class="form-label fw-bold">Job Position:</label>
            <input type="text" name="job_title" id="job_title_{{ $employeeId }}" class="{{ $fieldClass }}"
                value="{{ old('job_title', $employee->job_title ?? '') }}" readonly>
        </div>
    
        <!-- Parent College -->
        <div class="col-md-6 mb-3">
            <label class="form-label fw-bold">Parent College:</label>
            <input type="text" name="parent_college" id="parent_college_{{ $employeeId }}" class="{{ $fieldClass }}" 
                value="{{ old('parent_college', $employment->parent_college ?? '') }}" readonly>
        </div>

        <!-- Job Selection -->
        <div class="col-md-6 mb-3">
            <label for="job_id_{{ $employeeId }}" class="form-label fw-bold">Select Position:</label>
            
            {{-- Visible dropdown --}}
            <select 
                id="job_id_{{ $employeeId }}"
                name="job_id"
                class="form-select form-select-sm section-field-employment-details-{{ $employeeId }}"
                style="max-height: 38px;" {{-- optional override just in case --}}
                {{ isset($employee) ? 'disabled' : '' }}
                required>

                <option value="">Select Position</option>
                @foreach($jobs as $job)
                    <option 
                        value="{{ $job->id }}"
                        data-department="{{ $job->department }}"
                        data-title="{{ $job->job_title }}"
                        data-classification="{{ $job->classification }}"
                        data-college="{{ $job->parent_college }}"
                        data-status="{{ $job->employment_status }}"
                        data-accreditation="{{ $job->accreditation }}"
                        {{ old('job_id', $employee?->job_id) == $job->id ? 'selected' : '' }}>
                        {{ $job->job_title }} ({{ $job->department }})
                    </option>
                @endforeach
            </select>
        </div> 
    
        <!-- Classification -->
        <div class="col-md-6 mb-3">
            <label class="form-label fw-bold">Classification:</label>
            <input type="text" name="classification" id="classification_{{ $employeeId }}" class="{{ $fieldClass }}" 
                value="{{ old('classification', $employment->classification ?? '') }}" readonly>
        </div>
    
        <!-- Employment Status -->
        <div class="col-md-6 mb-3">
            <label class="form-label fw-bold">Employment Status:</label>
            <input type="text" name="employment_status" id="employment_status_{{ $employeeId }}" class="{{ $fieldClass }}" 
                value="{{ old('employment_status', $employment->employment_status ?? '') }}" readonly>
        </div>
    
        <!-- Date of Employment -->
        <div class="col-md-6 mb-3">
            <label class="form-label fw-bold">Date of Employment:</label>
            <input type="date" name="date_employed" class="{{ $fieldClass }}"
                value="{{ old('date_employed', $employment->date_employed ?? now()->format('Y-m-d')) }}" readonly>
        </div>
        <!-- Years of service -->

        <div class="col-md-6 mb-3">
            <label class="form-label fw-bold">Years of Service:</label>
            <input type="text" name="years_served" class="{{ $fieldClass }}"
                value="{{ $employment->years_served ?? '0' }}" readonly>
        </div>


    
        <!-- Accreditation -->
        <div class="col-md-6 mb-3">
            <label class="form-label fw-bold">Accreditation:</label>
            <input type="text" name="accreditation" id="accreditation_{{ $employeeId }}" class="{{ $fieldClass }}" 
                value="{{ old('accreditation', $employment->accreditation ?? '') }}" readonly>
        </div>
    <!-- Contract Type -->
            
            <div class="col-md-6 mb-3">
            <label for="contract_type_{{ $employeeId }}" class="form-label fw-bold">Contract Type:</label>
            <select 
                name="contract_type" 
                id="contract_type_{{ $employeeId }}" 
                class="form-select form-select-sm {{ $fieldClass }}" 
                required
            >
                <option value="">Select Contract Type</option>
                <option value="Full-time" {{ old('contract_type', $employment->contract_type ?? '') == 'Full-time' ? 'selected' : '' }}>Full-time</option>
                <option value="Part-time" {{ old('contract_type', $employment->contract_type ?? '') == 'Part-time' ? 'selected' : '' }}>Part-time</option>
                <option value="Contractual" {{ old('contract_type', $employment->contract_type ?? '') == 'Contractual' ? 'selected' : '' }}>Contractual</option>
                <option value="Fixed-term" {{ old('contract_type', $employment->contract_type ?? '') == 'Fixed-term' ? 'selected' : '' }}>Fixed-term</option>
                <option value="Casual" {{ old('contract_type', $employment->contract_type ?? '') == 'Casual' ? 'selected' : '' }}>Casual</option>
                <option value="Intern" {{ old('contract_type', $employment->contract_type ?? '') == 'Intern' ? 'selected' : '' }}>Intern</option>
            </select>
        </div>


        <!-- Permanent Status -->
        <div class="col-md-6 mb-3">
            <label class="form-label fw-bold">Date of Permanent Status:</label>
            <input type="date" name="date_permanent" class="{{ $fieldClass }}" 
                value="{{ old('date_permanent', $employment->date_permanent ?? '') }}" readonly>
        </div>
    </div>

    <!-- CV Upload (always editable and fetches existing CV) -->
    <div class="col-md-12 mb-3">
        <label for="cv-{{ $employeeId }}" class="form-label fw-bold">Attach CV <span class="text-danger">*</span></label>

        <input 
            type="file" 
            name="cv" 
            id="cv-{{ $employeeId }}" 
            class="form-control @error('cv') is-invalid @enderror" 
            accept=".pdf"
            {{ isset($employee->id) ? '' : 'required' }}
        >

        {{-- Show current CV file (if exists) --}}
        @if (!empty($employee?->cv))
            <small class="form-text text-muted d-block mt-2" id="cvLabel-{{ $employee->id }}">
                Current CV:
                <strong>{{ $employee->cv_file_name ?? 'Unnamed File' }}</strong><br>
                <a href="https://drive.google.com/file/d/{{ $employee->cv }}/view" target="_blank" class="text-primary">View</a>
                |
                <a href="https://drive.google.com/uc?id={{ $employee->cv }}&export=download" target="_blank" class="text-success">Download</a>
            </small>
        @endif
    
        @error('cv') 
            <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
    </div>
</div>
