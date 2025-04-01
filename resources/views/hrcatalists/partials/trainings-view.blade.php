@php $employeeId = $employee->id; @endphp

<!-- =================== TRAININGS =================== -->
<div class="border-top border-dark mb-5" id="section-trainings-{{ $employeeId }}">
    <div class="d-flex justify-content-between align-items-center">
        <h4 class="db-h4 my-4">Training and Seminars Attended</h4>
        <div>
            <button type="button" class="btn btn-sm btn-outline-primary toggle-edit-btn" 
                data-section="trainings" data-employee-id="{{ $employeeId }}">Edit</button>
        </div>
    </div>

    <table class="table table-bordered text-center" id="trainingsTable-{{ $employeeId }}">
        <thead>
            <tr>
                <th>Date</th>
                <th>Title</th>
                <th>Venue</th>
                <th>Remarks</th>
                <th class="action-column d-none">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($employee->trainings as $i => $training)
                <tr>
                    <td><input type="date" name="trainings[{{ $i }}][training_date]" class="form-control section-field-trainings-{{ $employeeId }}" value="{{ $training->training_date }}" readonly></td>
                    <td><input type="text" name="trainings[{{ $i }}][title]" class="form-control section-field-trainings-{{ $employeeId }}" value="{{ $training->title }}" readonly></td>
                    <td><input type="text" name="trainings[{{ $i }}][venue]" class="form-control section-field-trainings-{{ $employeeId }}" value="{{ $training->venue }}" readonly></td>
                    <td><input type="text" name="trainings[{{ $i }}][remark]" class="form-control section-field-trainings-{{ $employeeId }}" value="{{ $training->remark }}" readonly></td>
                    <td class="action-column d-none text-center"><button type="button" class="btn btn-sm btn-danger remove-edu-row">Remove</button></td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <button type="button" class="btn btn-sm btn-outline-success mb-3 d-none" id="addTrainingBtn-{{ $employeeId }}">+ Add Training</button>
</div>