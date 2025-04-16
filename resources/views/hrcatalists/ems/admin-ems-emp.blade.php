<x-admin-ems-layout>
    <x-slot:title>
        Columban College Inc. | Employee List
    </x-slot:title>
    
    <div class="d-flex">
        <!-- Sidebar -->
        <x-partials.system.ats.ats-sidebar />
        
        <!-- Employee List -->
        <div id="content" class="flex-grow-1">
            <div class="container mt-5">

                <div class="d-flex justify-content-between align-items-center my-5">
                    <div>
                        <h2 class="db-h2">Employee List</h2>
                    </div>     
                </div>

                <div class="d-flex align-items-center flex-wrap my-3">
                    <div>
                        <button type="button" class="btn archive-btn add-btn bulk-archive-btn bulk-action-btn me-2" style="display: none;">
                            ARCHIVE
                        </button>
                        <button type="button" class="btn reject-btn add-btn bulk-reject-btn bulk-action-btn me-2" style="display: none;">
                            REJECT
                        </button>
                    </div>
                
                    <button type="button" class="btn btn-primary add-btn action-btn me-2" data-bs-toggle="modal" data-bs-target="#addEmployeeModal">
                        ADD EMPLOYEE
                    </button>
                
                    <!-- <button type="button" class="btn shadow print-btn ms-auto">
                        <i class="fas fa-print me-2"></i> Print
                    </button>              
                </div> -->

                {{-- Success Alert --}}
                @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
            

                <!-- Employee Table -->
                <table id="employeeTable" class="table table-bordered display">
                    <thead>
                        <tr>
                            <th class="text-center"><input type="checkbox" id="selectAll"></th>
                            <th>ID</th>
                            <th>NAME</th>
                            <th>EMAIL</th>
                            <th>DEPARTMENT</th>
                            <th>POSITION</th>
                            <th>DATE OF EMPLOYMENT</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($employees as $employee)
                            <tr id="row-{{ $employee->id }}">
                                <td class="text-center"><input type="checkbox" class="rowCheckbox"></td>
                                <td>{{ $employee->id }}</td>
                                <td>{{ $employee->last_name }}, {{ $employee->first_name }}</td>
                                <td>{{ $employee->email }}</td>
                                <td>{{ $employee->department }}</td>
                                <td>{{ $employee->job_title }}</td>
                                <td>{{ \Carbon\Carbon::parse($employee->applied_at)->format('F d, Y') }}</td>
                                <td>
                                    <div class="dropdown text-center">
                                        <button class="btn btn-primary border-0" type="button" data-bs-toggle="dropdown">
                                            <i class="fa-solid fa-list"></i>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <!-- Approve -->
                                            <li>
                                                {{-- <a href="{{ route('employees.show', $employee->id) }}" class="button btn text-primary">VIEW</a> --}}
                                                <button type="button" class="dropdown-item text-info" data-bs-toggle="modal" data-bs-target="#employeeModal-{{ $employee->id }}">
                                                    VIEW
                                                </button>                                            
                                            </li>

                                            <!-- Download CV -->
                                            @if (!empty($employee->cv))
                                                <li>
                                                    <a 
                                                        href="https://drive.google.com/uc?id={{ $employee->cv }}&export=download" 
                                                        target="_blank" 
                                                        class="dropdown-item text-success"
                                                    >
                                                        DOWNLOAD CV
                                                    </a>
                                                </li>
                                            @endif

                                            <!-- Delete -->
                                            <li>
                                                <form action="{{ route('employees.delete', $employee->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this employee?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="dropdown-item text-danger">DELETE</button>
                                                </form>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                
                @foreach ($employees as $employee)
                    <!-- View/Edit Modal -->
                    <div class="modal fade" id="employeeModal-{{ $employee->id }}" tabindex="-1" aria-labelledby="employeeModalLabel-{{ $employee->id }}" aria-hidden="true">
                        <div class="modal-dialog modal-xl modal-dialog-scrollable">
                            <div class="modal-content">

                                <!-- ✅ header outside the form -->
                                <div class="modal-header">
                                    <h5 class="modal-title">Employee Profile</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>

                                <!-- ✅ form starts inside modal-body (scrollable area) -->
                                <div class="modal-body">
                                    <form method="POST" action="{{ route('employees.update', $employee->id) }}" id="employeeMainForm-{{ $employee->id }}" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')

                                        @include('hrcatalists.partials.employment-summary-view', ['employee' => $employee])
                                        @include('hrcatalists.partials.personal-data-view', ['employee' => $employee])
                                        @include('hrcatalists.partials.education-view', ['employee' => $employee])
                                        @include('hrcatalists.partials.employment-details-view', ['employee' => $employee, 'jobs' => $jobs])
                                        @include('hrcatalists.partials.licenses-view', ['employee' => $employee])
                                        @include('hrcatalists.partials.service-record-view', ['employee' => $employee])
                                        @include('hrcatalists.partials.trainings-view', ['employee' => $employee])
                                        @include('hrcatalists.partials.organizations-view', ['employee' => $employee])
                                        @include('hrcatalists.partials.others-view', ['employee' => $employee])

                                        <!-- ✅ footer is INSIDE the form and modal-body -->
                                        <div class="modal-footer">
                                            <button type="submit" class="btn text-success" onclick="this.disabled=true; this.form.submit();">Update</button>
                                            <button type="button" class="btn text-secondary" data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                @endforeach                        
            </div>
        </div>
    </div>

    <!-- Add Employee Modal -->
    <div class="modal fade" id="addEmployeeModal" tabindex="-1" aria-labelledby="addEmployeeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-scrollable">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Add New Employee</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">

                    <form method="POST" action="{{ route('employees.store') }}" id="addEmployeeForm" enctype="multipart/form-data">
                        @csrf

                        @include('hrcatalists.partials.employment-summary-view', ['employee' => null])
                        @include('hrcatalists.partials.personal-data-view', ['employee' => null])
                        @include('hrcatalists.partials.education-view', ['employee' => null])
                        @include('hrcatalists.partials.employment-details-view', ['employee' => null, 'jobs' => $jobs])
                        @include('hrcatalists.partials.licenses-view', ['employee' => null])
                        @include('hrcatalists.partials.service-record-view', ['employee' => null])
                        @include('hrcatalists.partials.trainings-view', ['employee' => null])
                        @include('hrcatalists.partials.organizations-view', ['employee' => null])
                        @include('hrcatalists.partials.others-view', ['employee' => null])

                        <div class="modal-footer">
                            {{-- <button type="submit" class="btn text-success" onclick="this.disabled=true; this.form.submit();">Submit</button> --}}
                            <button type="submit" class="btn text-success">Submit</button>
                            <button type="button" class="btn text-secondary" data-bs-dismiss="modal">Cancel</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <!-- Add Employee Modal -->


    {{-- deleteWithConfirm --}}
    <script>
        function deleteWithConfirm(employeeId) {
            Swal.fire({
                title: 'Are you sure?',
                text: "This employee record will be permanently deleted!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#e3342f',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Yes, delete it!',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    const form = document.getElementById(`delete-form-${employeeId}`);
                    if (form) {
                        form.submit();
                    } else {
                        console.error('Form not found for employee ID:', employeeId);
                    }
                }
            });
        }
    </script>
    {{-- deleteWithConfirm --}}

    {{-- JavaScript logic to support dynamic edit/add/remove for all sections in editing employee's information --}}
    <script>
        $(document).ready(function () {
            $('#employeeTable').DataTable({
                responsive: true,
                pageLength: 10,
                lengthChange: true,
                order: [[1, 'asc']], // Optional: order by ID
                columnDefs: [
                    { targets: 0, orderable: false }, // Disable sort for checkboxes
                    { targets: -1, orderable: false } // Disable sort for Action column
                ],
                language: {
                    search: '',
                    searchPlaceholder: 'Search employees...',
                    paginate: {
                        previous: 'Previous',
                        next: 'Next'
                    }
                }
            });
        });
    </script>    

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const sections = ['education', 'licenses', 'trainings', 'service-records', 'organizations', 'others'];
    
            function getAddButtonId(section, employeeId) {
                return {
                    'education': `addEducationBtn-${employeeId}`,
                    'licenses': `addLicenseBtn-${employeeId}`,
                    'trainings': `addTrainingBtn-${employeeId}`,
                    'service-records': `addServiceRecordBtn-${employeeId}`,
                    'organizations': `addOrganizationBtn-${employeeId}`,
                    'others': `addOtherBtn-${employeeId}`
                }[section];
            }
    
            function getTableId(section, employeeId) {
                return {
                    'education': `educationTable-${employeeId}`,
                    'licenses': `licensesTable-${employeeId}`,
                    'trainings': `trainingsTable-${employeeId}`,
                    'service-records': `serviceRecordTable-${employeeId}`,
                    'organizations': `organizationTable-${employeeId}`,
                    'others': `othersTable-${employeeId}`
                }[section];
            }
    
            function toggleCVInput(employeeId, enable = false) {
                const fileInput = document.getElementById(`cv-${employeeId}`);
                if (fileInput) {
                    // fileInput.disabled = !enable;
                    fileInput.readOnly = !enable;
                    fileInput.style.pointerEvents = enable ? 'auto' : 'none'; // prevent clicking
                    fileInput.style.opacity = enable ? '1' : '0.6'; // show it visually disabled
                }
            }
    
            function bindEditButtons() {
                document.querySelectorAll('.toggle-edit-btn').forEach(btn => {
                    btn.removeEventListener('click', handleEditClick);
                    btn.addEventListener('click', handleEditClick);
                });
    
                document.querySelectorAll('select[id^="job_id_"]').forEach(select => {
                    select.disabled = true;
                });
            }
    
            function handleEditClick() {
                const section = this.dataset.section;
                const employeeId = this.dataset.employeeId;
                const wrapper = document.getElementById(`section-${section}-${employeeId}`);
                const inputs = document.querySelectorAll(`.section-field-${section}-${employeeId}`);
                const buttonContainer = this.parentElement;
    
                if (wrapper && wrapper.dataset.editing === "true") return;
                if (wrapper) wrapper.dataset.editing = "true";
    
                inputs.forEach(input => {
                    input.readOnly = false;
                    input.dataset.originalValue = input.value;
                });
    
                const selectField = document.querySelector(`#job_id_${employeeId}`);
                if (selectField) selectField.disabled = false;
    
                const addBtn = document.getElementById(getAddButtonId(section, employeeId));
                if (addBtn) addBtn.classList.remove('d-none');
    
                wrapper?.querySelectorAll('.action-column').forEach(col => col.classList.remove('d-none'));
                wrapper?.querySelectorAll('.remove-edu-row').forEach(btn => btn.classList.remove('d-none'));
    
                toggleCVInput(employeeId, true);
    
                buttonContainer.innerHTML = `
                    <button type="button" class="btn btn-sm btn-success me-2 save-edit-btn"
                        data-section="${section}" data-employee-id="${employeeId}">Save</button>
                    <button type="button" class="btn btn-sm btn-secondary cancel-edit-btn"
                        data-section="${section}" data-employee-id="${employeeId}">Cancel</button>
                `;
    
                bindActionButtons();
            }
    
            function handleSaveCancel() {
                const isSave = this.classList.contains('save-edit-btn');
                const section = this.dataset.section;
                const employeeId = this.dataset.employeeId;
                const wrapper = document.getElementById(`section-${section}-${employeeId}`);
                const inputs = document.querySelectorAll(`.section-field-${section}-${employeeId}`);
                const buttonContainer = this.parentElement;
                const label = document.getElementById(`cvLabel-${employeeId}`);

                if (label) label.textContent = 'No file selected';
    
                if (isSave) {
                    inputs.forEach(input => {
                        input.readOnly = true;
                        input.dataset.originalValue = input.value;
                    });
                } else {
                    inputs.forEach(input => {
                        input.value = input.dataset.originalValue || '';
                        input.readOnly = true;
                    });
                }
    
                const selectField = document.querySelector(`#job_id_${employeeId}`);
                if (selectField) selectField.disabled = true;
    
                wrapper?.querySelectorAll('.action-column').forEach(col => col.classList.add('d-none'));
                wrapper?.querySelectorAll('.remove-edu-row').forEach(btn => btn.classList.add('d-none'));
    
                const addBtn = document.getElementById(getAddButtonId(section, employeeId));
                if (addBtn) addBtn.classList.add('d-none');
    
                toggleCVInput(employeeId, false);
    
                if (wrapper) wrapper.dataset.editing = "false";
    
                buttonContainer.innerHTML = `
                    <button type="button" class="btn btn-sm btn-outline-primary toggle-edit-btn"
                        data-section="${section}" data-employee-id="${employeeId}">Edit</button>
                `;
    
                bindEditButtons();
            }
    
            function bindActionButtons() {
                document.querySelectorAll('.save-edit-btn, .cancel-edit-btn').forEach(btn => {
                    btn.removeEventListener('click', handleSaveCancel);
                    btn.addEventListener('click', handleSaveCancel);
                });
            }
    
            function bindAddButtons() {
                sections.forEach(section => {
                    document.querySelectorAll(`[id^="${getAddButtonId(section, '')}"]`).forEach(btn => {
                        btn.removeEventListener('click', addRow);
                        btn.addEventListener('click', addRow);
                    });
                });
            }
    
            function addRow() {
                const id = this.id;
                const section = sections.find(sec => id.startsWith(getAddButtonId(sec, '')));
                const employeeId = id.split('-').pop();
                const tableBody = document.querySelector(`#${getTableId(section, employeeId)} tbody`);
                const index = tableBody.querySelectorAll('tr').length;
    
                let html = ''; // your HTML rows still inserted here (unchanged)

                switch (section) {
                    case 'education':
                        html = `
                            <td><input type="text" name="educations[${index}][level]" class="form-control section-field-education-${employeeId}"></td>
                            <td><input type="text" name="educations[${index}][school]" class="form-control section-field-education-${employeeId}"></td>
                            <td><input type="text" name="educations[${index}][course]" class="form-control section-field-education-${employeeId}"></td>
                            <td><input type="text" name="educations[${index}][major]" class="form-control section-field-education-${employeeId}"></td>
                            <td><input type="text" name="educations[${index}][remarks]" class="form-control section-field-education-${employeeId}"></td>
                            <td class="action-column text-center"><button type="button" class="btn btn-sm btn-danger remove-edu-row">Remove</button></td>
                        `;
                        break;
                    case 'licenses':
                        html = `
                            <td><input type="text" name="licenses[${index}][license_name]" class="form-control section-field-licenses-${employeeId}"></td>
                            <td><input type="text" name="licenses[${index}][license_number]" class="form-control section-field-licenses-${employeeId}"></td>
                            <td><input type="date" name="licenses[${index}][expiry_date]" class="form-control section-field-licenses-${employeeId}"></td>
                            <td><input type="date" name="licenses[${index}][renewal_from]" class="form-control section-field-licenses-${employeeId}"></td>
                            <td><input type="date" name="licenses[${index}][renewal_to]" class="form-control section-field-licenses-${employeeId}"></td>
                            <td class="action-column text-center"><button type="button" class="btn btn-sm btn-danger remove-edu-row">Remove</button></td>
                        `;
                        break;
                    case 'trainings':
                        html = `
                            <td><input type="date" name="trainings[${index}][training_date]" class="form-control section-field-trainings-${employeeId}"></td>
                            <td><input type="text" name="trainings[${index}][title]" class="form-control section-field-trainings-${employeeId}"></td>
                            <td><input type="text" name="trainings[${index}][venue]" class="form-control section-field-trainings-${employeeId}"></td>
                            <td><input type="text" name="trainings[${index}][remark]" class="form-control section-field-trainings-${employeeId}"></td>
                            <td class="action-column text-center"><button type="button" class="btn btn-sm btn-danger remove-edu-row">Remove</button></td>
                        `;
                        break;
                    case 'service-records':
                        html = `
                            <td><input type="text" name="service_records[${index}][department]" class="form-control section-field-service-records-${employeeId}"></td>
                            <td><input type="text" name="service_records[${index}][inclusive_date]" class="form-control section-field-service-records-${employeeId}"></td>
                            <td><input type="text" name="service_records[${index}][appointment_record]" class="form-control section-field-service-records-${employeeId}"></td>
                            <td><input type="text" name="service_records[${index}][position]" class="form-control section-field-service-records-${employeeId}"></td>
                            <td><input type="text" name="service_records[${index}][rank]" class="form-control section-field-service-records-${employeeId}"></td>
                            <td><input type="text" name="service_records[${index}][remarks]" class="form-control section-field-service-records-${employeeId}"></td>
                            <td class="action-column text-center"><button type="button" class="btn btn-sm btn-danger remove-edu-row">Remove</button></td>
                        `;
                        break;
                    case 'organizations':
                        html = `
                            <td><input type="date" name="organizations[${index}][registration_date]" class="form-control section-field-organizations-${employeeId}"></td>
                            <td><input type="date" name="organizations[${index}][validity_date]" class="form-control section-field-organizations-${employeeId}"></td>
                            <td><input type="text" name="organizations[${index}][organization_name]" class="form-control section-field-organizations-${employeeId}"></td>
                            <td><input type="text" name="organizations[${index}][place]" class="form-control section-field-organizations-${employeeId}"></td>
                            <td><input type="text" name="organizations[${index}][position]" class="form-control section-field-organizations-${employeeId}"></td>
                            <td class="action-column text-center"><button type="button" class="btn btn-sm btn-danger remove-edu-row">Remove</button></td>
                        `;
                        break;
                    case 'others':
                        html = `
                            <td><input type="date" name="others[${index}][date]" class="form-control section-field-others-${employeeId}"></td>
                            <td><input type="text" name="others[${index}][description]" class="form-control section-field-others-${employeeId}"></td>
                            <td class="action-column text-center"><button type="button" class="btn btn-sm btn-danger remove-edu-row">Remove</button></td>
                        `;
                        break;
                }
    
                const row = document.createElement('tr');
                row.innerHTML = html;
                tableBody.appendChild(row);
                bindRemoveButtons();
            }
    
            function bindRemoveButtons() {
                document.querySelectorAll('.remove-edu-row').forEach(btn => {
                    btn.removeEventListener('click', removeRow);
                    btn.addEventListener('click', removeRow);
                });
            }
    
            function removeRow() {
                this.closest('tr').remove();
            }
    
            // Update hidden job_id field and auto-fill others
            document.querySelectorAll('select[id^="job_id_"]').forEach(select => {
                select.addEventListener('change', function () {
                    const selected = this.options[this.selectedIndex];
                    const employeeId = this.id.split('_')[2] || 'new';
    
                    const fields = {
                        'department': selected.dataset.department,
                        'job_title': selected.dataset.title,
                        'classification': selected.dataset.classification,
                        'parent_college': selected.dataset.college,
                        'employment_status': selected.dataset.status,
                        'accreditation': selected.dataset.accreditation,
                    };
    
                    Object.entries(fields).forEach(([field, value]) => {
                        const input = document.getElementById(`${field}_${employeeId}`);
                        if (input) input.value = value || '';
                    });
    
                    const hiddenInput = document.getElementById('job_id_hidden_' + employeeId);
                    if (hiddenInput) hiddenInput.value = this.value;
                });
            });
    
            // Update label when a file is chosen
            document.querySelectorAll('input[type="file"][id^="cv-"]').forEach(input => {
                input.addEventListener('change', function () {
                    const employeeId = this.id.split('-')[1] || 'new';
                    const label = document.getElementById(`cvLabel-${employeeId}`);
                    const fileName = this.files[0] ? this.files[0].name : 'No file selected';
                    if (label) {
                        label.textContent = 'Selected: ' + fileName;
                    }
                });
            });
    
            // Initial bindings
            bindEditButtons();
            bindAddButtons();
            bindRemoveButtons();
        });
    </script>
    
    
</x-admin-ems-layout>