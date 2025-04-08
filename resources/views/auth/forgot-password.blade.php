<x-login-layout>
    <x-slot:title>
        Forgot Password
    </x-slot:title>

    <div class="d-flex justify-content-center align-items-center vh-100">
        <div class="card shadow p-4" style="width: 100%; max-width: 450px;">
            <h2 class="text-center mb-3">🔐 Forgot Your Password?</h2>
            <p class="text-muted text-center mb-4">We'll send a link to your email to reset your password.</p>

            {{-- ✅ Show all possible session messages --}}
            @if (session('status'))
                <div class="alert alert-success text-center">{{ session('status') }}</div>
            @elseif (session('success'))
                <div class="alert alert-success text-center">{{ session('success') }}</div>
            @elseif (session('error'))
                <div class="alert alert-danger text-center">{{ session('error') }}</div>
            @endif

            {{-- ✅ Validation Errors --}}
            @if ($errors->any())
                <div class="alert alert-danger text-center">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li class="small">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <!-- Email Field -->
                <div class="mb-3">
                    <label for="email" class="form-label fw-semibold">Email Address</label>
                    <input type="email" name="email" id="email"
                           class="form-control @error('email') is-invalid @enderror"
                           placeholder="Enter your registered email" required>

                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary w-100 mt-2">Send Reset Link</button>
            </form>
        </div>
    </div>
</x-login-layout>
