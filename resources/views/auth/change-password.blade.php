<x-admin-ems-layout>
    <x-slot:title>
        Change Password
    </x-slot:title>

    <x-partials.system.ats.ats-sidebar />

    @push('styles')
    <style>
        body {
            padding-top: 150px;
        }
    </style>
    @endpush

    <div class="container" style="max-width: 600px;">
        <h3 class="mb-4 fw-bold text-primary">🔒 Change Your Password</h3>

        {{-- Success/Error Alert --}}
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @elseif (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <form action="{{ route('password.update') }}" method="POST">
            @csrf

            {{-- Current Password --}}
            <div class="mb-3">
                <label for="current_password" class="form-label">Current Password</label>
                <div class="input-group">
                    <input type="password" name="current_password" id="current_password"
                        class="form-control @error('current_password') is-invalid @enderror" required>
                    <button type="button" class="btn btn-outline-secondary toggle-password" data-target="current_password">
                        <i class="fas fa-eye"></i>
                    </button>
                </div>
                @error('current_password')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>

            {{-- New Password --}}
            <div class="mb-3">
                <label for="new_password" class="form-label">New Password</label>
                <div class="input-group">
                    <input type="password" name="new_password" id="new_password"
                        class="form-control @error('new_password') is-invalid @enderror" required>
                    <button type="button" class="btn btn-outline-secondary toggle-password" data-target="new_password">
                        <i class="fas fa-eye"></i>
                    </button>
                </div>
                @error('new_password')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>

            {{-- Confirm New Password --}}
            <div class="mb-4">
                <label for="new_password_confirmation" class="form-label">Confirm New Password</label>
                <div class="input-group">
                    <input type="password" name="new_password_confirmation" id="new_password_confirmation"
                        class="form-control" required>
                    <button type="button" class="btn btn-outline-secondary toggle-password" data-target="new_password_confirmation">
                        <i class="fas fa-eye"></i>
                    </button>
                </div>
            </div>

            <button type="submit" class="btn btn-primary w-100">Update Password</button>
        </form>
  

    </div>
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('.toggle-password').forEach(button => {
            button.addEventListener('click', function () {
                const input = document.getElementById(this.dataset.target);
                const icon = this.querySelector('i');

                if (input.type === 'password') {
                    input.type = 'text';
                    icon.classList.remove('fa-eye');
                    icon.classList.add('fa-eye-slash');
                } else {
                    input.type = 'password';
                    icon.classList.remove('fa-eye-slash');
                    icon.classList.add('fa-eye');
                }
            });
        });
    });
</script>


   
</x-admin-ems-layout>
