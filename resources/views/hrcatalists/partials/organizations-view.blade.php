@php $employeeId = $employee->id; @endphp

<!-- =================== ORGANIZATIONS =================== -->
<div class="border-top border-dark mb-5" id="section-organizations-{{ $employeeId }}">
    <div class="d-flex justify-content-between align-items-center">
        <h4 class="db-h4 my-4">Affiliations / Organizations</h4>
        <div>
            <button type="button" class="btn btn-sm btn-outline-primary toggle-edit-btn" 
                data-section="organizations" data-employee-id="{{ $employeeId }}">Edit</button>
        </div>
    </div>

    <table class="table table-bordered text-center" id="organizationTable-{{ $employeeId }}">
        <thead>
            <tr>
                <th>Registration Date</th>
                <th>Validity Date</th>
                <th>Organization Name</th>
                <th>Place</th>
                <th>Position</th>
                <th class="action-column d-none">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($employee->organizations as $i => $org)
                <tr>
                    <td><input type="date" name="organizations[{{ $i }}][registration_date]" class="form-control section-field-organizations-{{ $employeeId }}" value="{{ $org->registration_date }}" readonly></td>
                    <td><input type="date" name="organizations[{{ $i }}][validity_date]" class="form-control section-field-organizations-{{ $employeeId }}" value="{{ $org->validity_date }}" readonly></td>
                    <td><input type="text" name="organizations[{{ $i }}][organization_name]" class="form-control section-field-organizations-{{ $employeeId }}" value="{{ $org->organization_name }}" readonly></td>
                    <td><input type="text" name="organizations[{{ $i }}][place]" class="form-control section-field-organizations-{{ $employeeId }}" value="{{ $org->place }}" readonly></td>
                    <td><input type="text" name="organizations[{{ $i }}][position]" class="form-control section-field-organizations-{{ $employeeId }}" value="{{ $org->position }}" readonly></td>
                    <td class="action-column d-none text-center"><button type="button" class="btn btn-sm btn-danger remove-edu-row">Remove</button></td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <button type="button" class="btn btn-sm btn-outline-success mb-3 d-none" id="addOrganizationBtn-{{ $employeeId }}">+ Add Organization</button>
</div>