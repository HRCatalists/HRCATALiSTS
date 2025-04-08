<x-login-layout>
    <x-slot:title>
        Reset Your Password
    </x-slot:title>

    <div class="d-flex justify-content-center align-items-center vh-100">
        <div class="card shadow p-4" style="width: 100%; max-width: 450px;">
            <h2 class="text-center mb-4">🔒 Reset Password</h2>

            @if (session('status'))
                <div class="alert alert-success text-center">{{ session('status') }}</div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('password.store') }}">
                @csrf

                <!-- Token and Email -->
                <input type="hidden" name="token" value="{{ request()->route('token') }}">
                <input type="hidden" name="email" value="{{ old('email', request()->input('email')) }}">

                <!-- New Password -->
                <div class="mb-3 position-relative">
                    <label for="password" class="form-label fw-semibold">New Password</label>
                    <input type="password" id="password" name="password" class="form-control" required>
                    <span class="position-absolute top-50 end-0 translate-middle-y me-3" onclick="togglePassword('password', this)" style="cursor:pointer;">
                        <i class="fa fa-eye text-secondary"></i>
                    </span>
                    @error('password')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Confirm Password -->
                <div class="mb-3 position-relative">
                    <label for="password_confirmation" class="form-label fw-semibold">Confirm Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required>
                    <span class="position-absolute top-50 end-0 translate-middle-y me-3" onclick="togglePassword('password_confirmation', this)" style="cursor:pointer;">
                        <i class="fa fa-eye text-secondary"></i>
                    </span>
                    @error('password_confirmation')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary w-100 mt-2">Reset Password</button>
            </form>
        </div>
    </div>

    <script>
        function togglePassword(id, el) {
            const input = document.getElementById(id);
            const icon = el.querySelector('i');

            if (input.type === 'password') {
                input.type = 'text';
                icon.classList.replace('fa-eye', 'fa-eye-slash');
            } else {
                input.type = 'password';
                icon.classList.replace('fa-eye-slash', 'fa-eye');
            }
        }
    </script>
</x-login-layout>
