<table id="{{ $tableId }}" class="table table-bordered table-striped align-middle text-center">

    @push('styles')
    <style>
        table tbody tr:hover {
            background-color: #f8f9fa;
        }

        .form-select,
        .btn {
            transition: all 0.2s ease-in-out;
        }

        .btn-outline-primary:hover {
            background-color: #0d6efd;
            color: white;
        }
    </style>
    @endpush

    <thead class="table-dark">
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Current Role</th>
            <th>Change Role</th>
            <th class="no-export">Action</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ ucfirst($user->role) }}</td>

                @if (auth()->id() !== $user->id)
                    <form action="{{ route('update-role') }}" method="POST" class="d-flex align-items-center">
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
                        <span class="text-muted">You cannot change your own role/ No actions can be taken</span>
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