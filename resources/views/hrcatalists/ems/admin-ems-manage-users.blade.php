<x-admin-ems-layout>
    <x-slot:title>
        Columban College Inc. | Admin Dashboard
    </x-slot:title>

    <div class="d-flex">
        <x-partials.system.ats.ats-sidebar />

        <div class="container manage-users-container">
            <h4 class="mb-3">Manage User Roles</h4>

            {{-- Flash SweetAlert Notifications --}}
            @if (session('success'))
            <script>
                Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: '{{ session('success') }}',
                    timer: 2000,
                    showConfirmButton: false
                });
            </script>
            @elseif (session('error'))
            <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: '{{ session('error') }}',
                });
            </script>
            @endif

            {{-- 🔹 CREATE NEW USER FORM --}}
            <div class="card mb-4">
                <div class="card-header">Create New User (Admin or Secretary)</div>
                <div class="card-body">
                                <form method="POST" action="{{ route('create-user') }}">
                                        @csrf
                                        <div class="row g-3">
                                            <div class="col-md-4">
                                                <input type="text" name="name" class="form-control" placeholder="Full Name" required>
                                            </div>
                                            <div class="col-md-4">
                                                <input type="email" name="email" class="form-control" placeholder="Email Address" required>
                                            </div>
                                            <div class="col-md-3">
                                                <select name="role" class="form-select" required>
                                                    <option value="">Select Role</option>
                                                    <option value="admin">Admin</option>
                                                    <option value="secretary">Secretary</option>
                                                </select>
                                            </div>
                                            <div class="col-md-1">
                                                <button type="submit" class="btn btn-success w-100">Create</button>
                                            </div>
                                        </div>
                </form>
                <small class="text-muted d-block mt-2">Note: Default password is <strong>P@SSW0RD</strong></small>
                </div>
            </div>

            {{-- 🔍 SEARCH BAR --}}
            {{-- <form action="{{ route('manage-users') }}" method="GET" class="d-flex mb-3" role="search">
                <input type="text" name="search" class="form-control me-2" placeholder="Search by name or email" value="{{ request('search') }}">
                <button type="submit" class="btn btn-outline-primary">Search</button>
            </form> --}}

            {{-- 🔽 TABS FOR USER ROLES --}}
            <ul class="nav nav-tabs mb-3" id="userRoleTabs" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="admins-tab" data-bs-toggle="tab" data-bs-target="#admins" type="button" role="tab">Admins</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="secretaries-tab" data-bs-toggle="tab" data-bs-target="#secretaries" type="button" role="tab">Secretaries</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="employees-tab" data-bs-toggle="tab" data-bs-target="#employees" type="button" role="tab">Employees</button>
                </li>
            </ul>

            <div class="tab-content" id="userRoleTabsContent">

                <div class="tab-pane fade show active" id="admins" role="tabpanel">
                    <div class="mb-2">
                        <input type="text" id="search-admin" class="form-control" placeholder="Search admins...">
                    </div>
                    @include('hrcatalists.partials.user-table', ['users' => $users->where('role', 'admin'), 'tableId' => 'adminTable'])
                </div>
                
                <div class="tab-pane fade" id="secretaries" role="tabpanel">
                    <div class="mb-2">
                        <input type="text" id="search-secretary" class="form-control" placeholder="Search secretaries...">
                    </div>
                    @include('hrcatalists.partials.user-table', ['users' => $users->where('role', 'secretary'), 'tableId' => 'secretaryTable'])
                </div>

                <div class="tab-pane fade" id="employees" role="tabpanel">
                    <div class="mb-2">
                        <input type="text" id="search-employee" class="form-control" placeholder="Search employees...">
                    </div>
                    @include('hrcatalists.partials.user-table', ['users' => $users->where('role', 'employee'), 'tableId' => 'employeeTable'])
                </div>                

                {{-- 🔹 Admins --}}
                {{-- <div class="tab-pane fade show active" id="admins" role="tabpanel">
                    @include('hrcatalists.partials.user-table', ['users' => $users->where('role', 'admin'), 'tableId' => 'adminTable'])
                </div> --}}

                {{-- 🔹 Secretaries --}}
                {{-- <div class="tab-pane fade" id="secretaries" role="tabpanel">
                    @include('hrcatalists.partials.user-table', ['users' => $users->where('role', 'secretary'), 'tableId' => 'secretaryTable'])
                </div> --}}

                {{-- 🔹 Employees --}}
                {{-- <div class="tab-pane fade" id="employees" role="tabpanel">
                    @include('hrcatalists.partials.user-table', ['users' => $users->where('role', 'employee'), 'tableId' => 'employeeTable'])
                </div> --}}
            </div>

            {{-- 📋 USER TABLE --}}
            {{-- <table class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Current Role</th>
                        <th>Change Role</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ ucfirst($user->role) }}</td>
                            <td>
                                @if (auth()->id() !== $user->id)
                                    <form action="{{ route('update-role') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="user_id" value="{{ $user->id }}">
                                        <select name="role" class="form-select">
                                            <option value="employee" {{ $user->role === 'employee' ? 'selected' : '' }}>Employee</option>
                                            <option value="secretary" {{ $user->role === 'secretary' ? 'selected' : '' }}>Secretary</option>
                                            <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
                                        </select>
                                        <button type="submit" class="btn btn-primary btn-sm mt-2">Update Role</button>
                                    </form>
                                @else
                                    <span class="text-muted">You cannot change your own role</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">No users found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table> --}}
        </div>
    </div>

    <script>
        let adminTable, secretaryTable, employeeTable;
    
        function initUserTable(id) {
            return $(id).DataTable({
                searching: false, // disables default search input
                dom: 'Bfrtip',
                buttons: ['copy', 'excel', 'csv', 'pdf', 'print', 'colvis'],
                responsive: true,
                pageLength: 10,
                language: {
                    search: '',
                    searchPlaceholder: 'Search'
                }
            });
        }
    
        $(document).ready(function () {
            // Delay init to make sure tab contents are rendered
            setTimeout(() => {
                adminTable = initUserTable('#adminTable');
                secretaryTable = initUserTable('#secretaryTable');
                employeeTable = initUserTable('#employeeTable');
            }, 100);
    
            // 🔍 Live filtering
            $('#search-admin').on('keyup', function () {
                adminTable?.search(this.value).draw();
            });
    
            $('#search-secretary').on('keyup', function () {
                secretaryTable?.search(this.value).draw();
            });
    
            $('#search-employee').on('keyup', function () {
                employeeTable?.search(this.value).draw();
            });
    
            // 🌀 Clear inputs + redraw on tab switch
            $('button[data-bs-toggle="tab"]').on('shown.bs.tab', function () {
                $('#search-admin, #search-secretary, #search-employee').val('');
                adminTable?.search('').columns.adjust().draw();
                secretaryTable?.search('').columns.adjust().draw();
                employeeTable?.search('').columns.adjust().draw();
            });
        });
    </script>
    
    
    

    {{-- <script>
        let adminTable, secretaryTable, employeeTable;
    
        $(document).ready(function () {
            adminTable = $('#adminTable').DataTable();
            secretaryTable = $('#secretaryTable').DataTable();
            employeeTable = $('#employeeTable').DataTable();
    
            // Optional: trigger search on enter
            $('#userSearchInput').on('keypress', function (e) {
                if (e.which == 13) {
                    filterActiveTable();
                }
            });
        });
    
        function filterActiveTable() {
            const query = $('#userSearchInput').val();
    
            // Determine active tab
            const activeTabId = $('#userRoleTabs .nav-link.active').attr('id');
    
            switch (activeTabId) {
                case 'admins-tab':
                    adminTable.search(query).draw();
                    break;
                case 'secretaries-tab':
                    secretaryTable.search(query).draw();
                    break;
                case 'employees-tab':
                    employeeTable.search(query).draw();
                    break;
            }
        }
    </script> --}}

</x-admin-ems-layout>
