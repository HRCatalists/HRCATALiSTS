<x-admin-ats-layout>
    <x-slot:title>
        Columban College Inc. | Admin Dashboard
    </x-slot:title>

    <div class="d-flex">
        <x-partials.system.ats.ats-sidebar />

        <div class="container mt-4 w-100">
            <h4 class="mb-3">Manage User Roles</h4>

            {{-- Flash Messages --}}
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @elseif (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
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
            <form action="{{ route('manage-users') }}" method="GET" class="d-flex mb-3" role="search">
                <input type="text" name="search" class="form-control me-2" placeholder="Search by name or email" value="{{ request('search') }}">
                <button type="submit" class="btn btn-outline-primary">Search</button>
            </form>

            {{-- 📋 USER TABLE --}}
            <table class="table table-bordered table-striped">
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
            </table>
        </div>
    </div>
</x-admin-ats-layout>
