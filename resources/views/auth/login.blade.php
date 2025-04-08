<x-login-layout>
    <x-slot:title>
        Columban College Inc. | Admin Login
    </x-slot:title>

    <div class="container-fluid vh-100 d-flex">
        <div class="row flex-grow-1 w-100">

            <!-- Left Section -->
            <div class="col-lg-8 d-none d-lg-flex bgd-image align-items-center justify-content-center"
                style="background-image:url('{{ asset('images/cc-bg.jpg') }}');">
                <div class="text-center text-white left-section">
                    <img src="{{ asset('images/ccihr-logo.png') }}" class="cc-logo img-fluid" alt="Columban College Logo">
                    <h1 class="mt-3">Human Asset Management <br> and Development Office</h1>
                </div>
            </div>

            <!-- Right Section -->
            <div class="col-lg-4 col-12 d-flex align-items-center justify-content-center ats-right-section">
                <div class="card w-75 shadow" id="loginCard">
                    <div class="card-body p-4">

                        <div class="text-center mb-4">
                            <h2>Log In to <br> HR CATALiSTS</h2>
                        </div>

                        <!-- ✅ Flash Messages -->
                        @if (session('status'))
                            <div class="alert alert-success text-center">
                                {{ session('status') }}
                            </div>
                        @endif

                        @if (session('success'))
                            <div class="alert alert-success text-center">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if (session('error'))
                            <div class="alert alert-danger text-center">
                                {{ session('error') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('login') }}" id="loginForm">
                            @csrf

                            <!-- Email -->
                            <div class="mb-3">
                                <label for="email" class="form-label login-label">Email</label>
                                <input type="email"
                                       class="form-control input-border"
                                       id="email"
                                       name="email"
                                       value="{{ old('email') }}"
                                       placeholder="Enter Email"
                                       required autofocus>
                                @error('email')
                                    <span class="text-danger small">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Password -->
                            <div class="mb-3">
                                <label for="password" class="form-label login-label">Password</label>
                                <div class="input-group position-relative">
                                    <input type="password"
                                           class="form-control input-border pe-5"
                                           id="password"
                                           name="password"
                                           placeholder="Enter Password"
                                           required>
                                    <span class="position-absolute end-0 top-50 translate-middle-y me-3"
                                          style="z-index: 2; cursor: pointer;"
                                          onclick="togglePasswordVisibility()">
                                        <img src="{{ asset('images/hide-icon.jpg') }}"
                                             id="togglePasswordIcon"
                                             alt="Toggle Password Visibility"
                                             style="width: 20px;">
                                    </span>
                                </div>
                                @error('password')
                                    <span class="text-danger small">{{ $message }}</span>
                                @enderror

                                <!-- Forgot Password -->
                                <div class="mt-2 text-end">
                                    <a href="{{ route('password.request') }}" class="small text-muted">Forgot Password?</a>
                                </div>
                            </div>

                            <!-- Remember Me -->
                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="remember" name="remember">
                                <label class="form-check-label small text-muted" for="remember">Remember me</label>
                            </div>

                            <!-- Login Button -->
                            <button type="submit" class="btn btn-primary w-100 my-3">Log In</button>

                            <!-- Google Login -->
                            <a href="{{ route('google.login') }}" class="btn shadow-sm w-100" style="background-color: #4285F4; color: white;">
                                <i class="fab fa-google me-2"></i> Sign in with Google
                            </a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ✅ Password Toggle Script -->
    <script>
        function togglePasswordVisibility() {
            const passwordField = document.getElementById("password");
            const icon = document.getElementById("togglePasswordIcon");

            const showIcon = "{{ asset('images/show-icon.jpg') }}";
            const hideIcon = "{{ asset('images/hide-icon.jpg') }}";

            if (passwordField.type === "password") {
                passwordField.type = "text";
                icon.src = showIcon;
            } else {
                passwordField.type = "password";
                icon.src = hideIcon;
            }
        }
    </script>
</x-login-layout>
