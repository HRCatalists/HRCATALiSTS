<x-admin-ems-layout>
    <x-slot:title>
        Columban College Inc. | Admin Dashboard
    </x-slot:title>

    <div class="d-flex">
        <x-partials.system.ats.ats-sidebar />

        <div class="container manage-users-container">
            <h4 class="mb-3">Add User</h4>

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
            <div class="card mb-5">
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
                                <select name="role" class="form-control" required>
                                    <option value="">Select Role</option>
                                    <option value="admin">Admin</option>
                                    <option value="secretary">Secretary</option>
                                </select>
                            </div>
                            <div class="col-md-1">
                                <button type="submit" class="btn btn-outline-success">Create</button>
                            </div>
                        </div>
                    </form>
                    <small class="text-muted d-block mt-2">
                        <i class="fas fa-info-circle text-secondary" data-bs-toggle="tooltip" title="New users will receive the default password P@SSW0RD. Please advise them to change it upon first login for security."></i>
                    </small>                                       
                </div>
            </div>

            <h4 class="mb-3">Users</h4>
            {{-- 🔍 SEARCH BAR --}}
            <form action="{{ route('manage-users') }}" method="GET" class="d-flex mb-3" role="search">
                <input type="text" name="search" class="form-control me-2" placeholder="Search by name or email" value="{{ request('search') }}">
                <button type="submit" class="btn btn-outline-primary">Search</button>
            </form>

            {{-- 📋 USER TABLE --}}
            <table class="table table-bordered table-striped align-middle text-center">
                <thead class="table-dark">
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Current Role</th>
                        <th>Change Role</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ ucfirst($user->role) }}</td>
                            @if (auth()->id() !== $user->id)
                                <form action="{{ route('update-role') }}" method="POST" class="d-flex justify-content-center align-items-center">
                                    @csrf
                                    <input type="hidden" name="user_id" value="{{ $user->id }}">
                                    <td>
                                        <select name="role" class="form-select form-select-sm rounded-pill shadow-sm">
                                            <option value="employee" {{ $user->role === 'employee' ? 'selected' : '' }}>Employee</option>
                                            <option value="secretary" {{ $user->role === 'secretary' ? 'selected' : '' }}>Secretary</option>
                                            <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
                                        </select>
                                    </td>
                                    <td>
                                        <button type="submit" class="btn btn-sm btn-outline-primary rounded-pill px-3 shadow-sm">
                                            <i class="fas fa-sync-alt me-1"></i> Update
                                        </button>
                                    </td>
                                </form>
                            @else
                                <td colspan="2">
                                    <span class="text-muted">You cannot change your own role</span>
                                </td>
                            @endif
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">No users found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
            tooltipTriggerList.forEach(function (tooltipTriggerEl) {
                new bootstrap.Tooltip(tooltipTriggerEl)
            })
        });
    </script>
    
</x-admin-ems-layout>
