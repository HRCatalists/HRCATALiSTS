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
                        <tr>
                            <td class="text-center"><input type="checkbox" class="rowCheckbox"></td>
                            <td>{{ $employee->id }}</td>
                            <td>{{ $employee->last_name }}, {{ $employee->first_name }}</td>
                            <td>{{ $employee->email }}</td>
                            <td>{{ $employee->department }}</td>
                            <td>{{ $employee->job_title }}</td>
                            <td>{{ \Carbon\Carbon::parse($employee->applied_at)->format('F d, Y') }}</td>
                            <td>
                                <a href="{{ route('employees.show', $employee->id) }}" class="button btn btn-ap-edit">VIEW</a>
                                <button class="btn btn-danger" onclick="showPopup({{ $employee->id }})">DELETE</button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Delete Confirmation Popup -->
    <div id="rejectPopup" class="custom-popup" style="display: none;">
        <div class="popup-content">
            <p>Are you sure you want to delete this employee?</p>
            <form id="deleteForm" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Yes, delete the employee!</button>
                <button type="button" class="btn btn-outline-secondary" onclick="closePopup()">Cancel</button>
            </form>
        </div>
    </div>

    <script>
        function showPopup(employeeId) {
            document.getElementById("deleteForm").action = "/employees/" + employeeId;
            document.getElementById("rejectPopup").style.display = "block";
        }

        function closePopup() {
            document.getElementById("rejectPopup").style.display = "none";
        }
    </script>
</x-admin-ems-layout>