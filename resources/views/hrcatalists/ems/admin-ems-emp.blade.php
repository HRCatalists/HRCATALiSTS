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
                
                <div class="d-flex justify-content-between align-items-center mt-5 mb-5">
                    <h2 class="db-h2">Employee List</h2>
                    <div class="d-flex">
                        <a href="{{ route('ems-employees') }}" class="button btn add-btn">ADD EMPLOYEE</a>
                        <button class="btn shadow print-btn">
                            <i class="fa fa-print"></i> PRINT
                        </button>
                    </div>
                </div>

                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
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
                                
                            </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- View Modal --}}
    <div class="modal fade" id="employeeModal-{{ $employee->id }}" tabindex="-1" aria-labelledby="employeeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Employee Profile</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
    
                <div class="modal-body">
                    @include('hrcatalists.partials.employment-summary', ['employee' => $employee])
                    @include('hrcatalists.partials.personal-data', ['employee' => $employee])
                    @include('hrcatalists.partials.education', ['employee' => $employee])
                    @include('hrcatalists.partials.employment-details', ['employee' => $employee])
                    @include('hrcatalists.partials.licenses', ['employee' => $employee])
                    @include('hrcatalists.partials.service-record', ['employee' => $employee])
                    @include('hrcatalists.partials.trainings', ['employee' => $employee])
                    @include('hrcatalists.partials.organizations', ['employee' => $employee])
                    @include('hrcatalists.partials.others', ['employee' => $employee])
                </div>
    
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    {{-- View Modal --}}

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

    
</x-admin-ems-layout>