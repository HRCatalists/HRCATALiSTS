<!-- Educational Background -->
<div class="mb-5" id="section-education-{{ $employee->id }}" data-editing="false">
    <div class="d-flex justify-content-between align-items-center">
        <h4 class="db-h4 my-4">Educational Background</h4>
        <div>
            <button type="button" class="btn btn-sm btn-outline-primary toggle-edit-btn"
                    data-section="education" data-employee-id="{{ $employee->id }}">
                Edit
            </button>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-striped education-table" id="educationTable-{{ $employee->id }}">
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
                @foreach ($employee->educations as $index => $education)
                    <tr>
                        <td><input type="text" name="educations[{{ $index }}][level]" class="form-control section-field-education-{{ $employee->id }}" value="{{ $education->level }}" readonly></td>
                        <td><input type="text" name="educations[{{ $index }}][school]" class="form-control section-field-education-{{ $employee->id }}" value="{{ $education->school }}" readonly></td>
                        <td><input type="text" name="educations[{{ $index }}][course]" class="form-control section-field-education-{{ $employee->id }}" value="{{ $education->course }}" readonly></td>
                        <td><input type="text" name="educations[{{ $index }}][major]" class="form-control section-field-education-{{ $employee->id }}" value="{{ $education->major }}" readonly></td>
                        <td><input type="text" name="educations[{{ $index }}][remarks]" class="form-control section-field-education-{{ $employee->id }}" value="{{ $education->remarks }}" readonly></td>
                        <td class="action-column d-none text-center">
                            <button type="button" class="btn btn-sm btn-danger remove-edu-row d-none">Remove</button>
                        </td>                        
                    </tr>
                @endforeach
            </tbody>
        </table>

        <button type="button" class="btn btn-sm btn-outline-success mb-3 d-none mt-2" id="addEducationBtn-{{ $employee->id }}">
           + Add Education
        </button>
    </div>
</div>
