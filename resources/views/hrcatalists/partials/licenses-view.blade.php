@php
    $employeeId = $employee->id ?? 'new';
    $licenses = $employee->licenses ?? collect(); // use empty collection if null
@endphp

<!-- =================== LICENSES =================== -->
<div class="border-top border-dark mb-5" id="section-licenses-{{ $employeeId }}">
    <div class="d-flex justify-content-between align-items-center">
        <h4 class="db-h4 my-4">Professional Board Exam or Civil Service Eligibility</h4>
        <div>
            <button type="button" class="btn btn-sm btn-outline-primary toggle-edit-btn" 
                data-section="licenses" data-employee-id="{{ $employeeId }}">Edit</button>
        </div>
    </div>

    <table class="table table-bordered text-center" id="licensesTable-{{ $employeeId }}">
        <thead>
            <tr>
                <th>License</th>
                <th>License Number</th>
                <th>Expiry Date</th>
                <th>Renewal From</th>
                <th>Renewal To</th>
                <th class="action-column d-none">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($licenses as $i => $license)
                <tr>
                    <td><input type="text" name="licenses[{{ $i }}][license_name]" class="form-control section-field-licenses-{{ $employeeId }}" value="{{ $license->license_name }}" readonly></td>
                    <td><input type="text" name="licenses[{{ $i }}][license_number]" class="form-control section-field-licenses-{{ $employeeId }}" value="{{ $license->license_number }}" readonly></td>
                    <td><input type="date" name="licenses[{{ $i }}][expiry_date]" class="form-control section-field-licenses-{{ $employeeId }}" value="{{ $license->expiry_date }}" readonly></td>
                    <td><input type="date" name="licenses[{{ $i }}][renewal_from]" class="form-control section-field-licenses-{{ $employeeId }}" value="{{ $license->renewal_from }}" readonly></td>
                    <td><input type="date" name="licenses[{{ $i }}][renewal_to]" class="form-control section-field-licenses-{{ $employeeId }}" value="{{ $license->renewal_to }}" readonly></td>
                    <td class="action-column d-none text-center">
                        <button type="button" class="btn btn-sm btn-danger remove-edu-row d-none">Remove</button>
                    </td>
                </tr>
            @empty
                {{-- No licenses yet for new employee, row will be dynamically added --}}
            @endforelse
        </tbody>
    </table>

    <button type="button" class="btn btn-sm btn-outline-success mb-3 d-none" id="addLicenseBtn-{{ $employeeId }}">
        + Add License
    </button>
</div>
