@php
    $employeeId = $employee->id ?? 'new';
    $serviceRecords = $employee->serviceRecords ?? collect([]);
@endphp

<!-- =================== SERVICE RECORDS =================== -->
<div class="border-top border-dark mb-5" id="section-service-records-{{ $employeeId }}">
    <div class="d-flex justify-content-between align-items-center">
        <h4 class="db-h4 my-4">Employment Service Record</h4>
        <div>
            <button type="button" class="btn btn-sm btn-outline-primary toggle-edit-btn" 
                data-section="service-records" data-employee-id="{{ $employeeId }}">Edit</button>
        </div>
    </div>

    <table class="table table-bordered text-center" id="serviceRecordTable-{{ $employeeId }}">
        <thead>
            <tr>
                <th>Department</th>
                <th>Inclusive Date</th>
                <th>Appointment Record</th>
                <th>Position</th>
                <th>Rank</th>
                <th>Remarks</th>
                <th class="action-column d-none">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($serviceRecords as $i => $record)
                <tr>
                    <td><input type="text" name="service_records[{{ $i }}][department]" class="form-control section-field-service-records-{{ $employeeId }}" value="{{ $record->department }}" readonly></td>
                    <td><input type="text" name="service_records[{{ $i }}][inclusive_date]" class="form-control section-field-service-records-{{ $employeeId }}" value="{{ $record->inclusive_date }}" readonly></td>
                    <td><input type="text" name="service_records[{{ $i }}][appointment_record]" class="form-control section-field-service-records-{{ $employeeId }}" value="{{ $record->appointment_record }}" readonly></td>
                    <td><input type="text" name="service_records[{{ $i }}][position]" class="form-control section-field-service-records-{{ $employeeId }}" value="{{ $record->position }}" readonly></td>
                    <td><input type="text" name="service_records[{{ $i }}][rank]" class="form-control section-field-service-records-{{ $employeeId }}" value="{{ $record->rank }}" readonly></td>
                    <td><input type="text" name="service_records[{{ $i }}][remarks]" class="form-control section-field-service-records-{{ $employeeId }}" value="{{ $record->remarks }}" readonly></td>
                    <td class="action-column d-none text-center"><button type="button" class="btn btn-sm btn-danger remove-edu-row">Remove</button></td>
                </tr>
            @empty
                {{-- No records initially; nothing shown --}}
            @endforelse
        </tbody>
    </table>

    <button type="button" class="btn btn-sm btn-outline-success mb-3 d-none" id="addServiceRecordBtn-{{ $employeeId }}">+ Add Service Record</button>
</div>
