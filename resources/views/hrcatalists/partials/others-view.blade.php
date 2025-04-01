@php $employeeId = $employee->id; @endphp

<!-- =================== OTHERS =================== -->
<div class="border-top border-dark mb-5" id="section-others-{{ $employeeId }}">
    <div class="d-flex justify-content-between align-items-center">
        <h4 class="db-h4 my-4">Others</h4>
        <div>
            <button type="button" class="btn btn-sm btn-outline-primary toggle-edit-btn" 
                data-section="others" data-employee-id="{{ $employeeId }}">Edit</button>
        </div>
    </div>

    <table class="table table-bordered text-center" id="othersTable-{{ $employeeId }}">
        <thead>
            <tr>
                <th>Date</th>
                <th>Description</th>
                <th class="action-column d-none">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($employee->others as $i => $other)
                <tr>
                    <td><input type="date" name="others[{{ $i }}][date]" class="form-control section-field-others-{{ $employeeId }}" value="{{ $other->date }}" readonly></td>
                    <td><input type="text" name="others[{{ $i }}][description]" class="form-control section-field-others-{{ $employeeId }}" value="{{ $other->description }}" readonly></td>
                    <td class="action-column d-none text-center"><button type="button" class="btn btn-sm btn-danger remove-edu-row">Remove</button></td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <button type="button" class="btn btn-sm btn-outline-success mb-3 d-none" id="addOtherBtn-{{ $employeeId }}">+ Add Entry</button>
</div>