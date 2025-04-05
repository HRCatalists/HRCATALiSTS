@php
    $employeeId = $employee->id ?? 'new';
@endphp

<div class="mb-5" id="section-employment-summary-{{ $employeeId }}">
    <div class="row">
        <div class="d-flex justify-content-between align-items-center">
            <h4 class="db-h4 my-4">Employment Summary</h4>
            <div>
                <button type="button" class="btn btn-sm btn-outline-primary toggle-edit-btn" 
                        data-section="employment-summary" 
                        data-employee-id="{{ $employeeId }}">
                    Edit
                </button>
            </div>
        </div>

        <div class="col-md-9">
            <div class="mb-3">
                <label class="form-label fw-bold">Faculty Code:</label>
                <input type="text" name="faculty_code" 
                       class="plain-input section-field-employment-summary-{{ $employeeId }}" 
                       value="{{ old('faculty_code', $employee->faculty_code ?? '') }}" readonly>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">First Name:</label>
                <input type="text" name="first_name"
                       class="plain-input section-field-employment-summary-{{ $employeeId }}" 
                       value="{{ old('first_name', $employee->first_name ?? '') }}" readonly>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Last Name:</label>
                <input type="text" name="last_name"
                       class="plain-input section-field-employment-summary-{{ $employeeId }}" 
                       value="{{ old('last_name', $employee->last_name ?? '') }}" readonly>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">School Of:</label>
                <input type="text" name="school_of" 
                       class="plain-input section-field-employment-summary-{{ $employeeId }}" 
                       value="{{ old('school_of', $employee->school_of ?? '') }}" readonly>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Status:</label>
                <input type="text" name="status" 
                       class="plain-input section-field-employment-summary-{{ $employeeId }}" 
                       value="{{ old('status', $employee->status ?? '') }}" readonly>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Designation Group:</label>
                <input type="text" name="designation_group" 
                       class="plain-input section-field-employment-summary-{{ $employeeId }}" 
                       value="{{ old('designation_group', $employee->designation_group ?? '') }}" readonly>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Position:</label>
                <input type="text" name="job_title" 
                       class="plain-input section-field-employment-summary-{{ $employeeId }}" 
                       value="{{ old('job_title', $employee->job_title ?? '') }}" readonly>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Branch:</label>
                <input type="text" name="branch" 
                       class="plain-input section-field-employment-summary-{{ $employeeId }}" 
                       value="{{ old('branch', $employee->branch ?? '') }}" readonly>
            </div>
        </div>

        <div class="col-md-3">
            <img src="{{ asset('images/dummy-profile.png') }}" alt="Profile Picture" class="img-fluid rounded">
        </div>
    </div>
</div>