<div class="mb-5" id="section-employment-details-{{ $employee->id }}">
    <div class="d-flex justify-content-between align-items-center">
        <h4 class="db-h4 my-4">Employment Data</h4>
        <div>
            <button type="button" class="btn btn-sm btn-outline-primary toggle-edit-btn" 
                data-section="employment-details" 
                data-employee-id="{{ $employee->id }}">
                Edit
            </button>
        </div>
    </div>

    @php $fieldClass = 'plain-input section-field-employment-details-' . $employee->id; @endphp

    <div class="row">
        <div class="col-md-6 mb-3">
            <label class="form-label fw-bold">Parent Department:</label>
            <input type="text" name="parent_department" class="{{ $fieldClass }}" 
                value="{{ old('parent_department', $employee->employmentDetails->parent_department ?? 'N/A') }}" readonly>
        </div>

        <div class="col-md-6 mb-3">
            <label class="form-label fw-bold">Parent College:</label>
            <input type="text" name="parent_college" class="{{ $fieldClass }}" 
                value="{{ old('parent_college', $employee->employmentDetails->parent_college ?? 'N/A') }}" readonly>
        </div>

        <div class="col-md-6 mb-3">
            <label class="form-label fw-bold">Classification:</label>
            <input type="text" name="classification" class="{{ $fieldClass }}" 
                value="{{ old('classification', $employee->employmentDetails->classification ?? 'N/A') }}" readonly>
        </div>

        <div class="col-md-6 mb-3">
            <label class="form-label fw-bold">Employment Status:</label>
            <input type="text" name="employment_status" class="{{ $fieldClass }}" 
                value="{{ old('employment_status', $employee->employmentDetails->employment_status ?? 'N/A') }}" readonly>
        </div>

        <div class="col-md-6 mb-3">
            <label class="form-label fw-bold">Date of Employment:</label>
            {{-- <input type="date" name="date_employed" class="{{ $fieldClass }}" 
                value="{{ old('date_employed', $employee->employmentDetails->date_employed ?? 'N/A') }}" readonly> --}}
            <input type="date" name="date_employed" class="{{ $fieldClass }}"
                value="{{ old('date_employed', $employee->employmentDetails->date_employed ?? $employee->created_at->format('Y-m-d')) }}" readonly>
        </div>

        <div class="col-md-6 mb-3">
            <label class="form-label fw-bold">Accreditation:</label>
            <input type="text" name="accreditation" class="{{ $fieldClass }}" 
                value="{{ old('accreditation', $employee->employmentDetails->accreditation ?? 'N/A') }}" readonly>
        </div>

        <div class="col-md-6 mb-3">
            <label class="form-label fw-bold">Date of Permanent Status:</label>
            <input type="date" name="date_permanent" class="{{ $fieldClass }}" 
                value="{{ old('date_permanent', $employee->employmentDetails->date_permanent ?? 'N/A') }}" readonly>
        </div>
    </div>
</div>