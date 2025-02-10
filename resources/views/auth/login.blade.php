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
    
                        <form method="POST" action="{{ route('login') }}" id="loginForm">
                            @csrf
                            <!-- Email -->
                            <div class="mb-3">
                                <label for="email" class="form-label login-label">Email</label>
                                <input type="email" class="form-control input-border" id="email" name="email" value="{{ old('email') }}" placeholder="Enter Email" required autofocus>
                                @error('email')
                                    <span class="text-danger small">{{ $message }}</span>
                                @enderror
                            </div>
    
                            <!-- Password -->
                            <div class="mb-3">
                                <label for="password" class="form-label login-label">Password</label>
                                <div class="input-group">
                                    <input type="password" class="form-control input-border" id="password" name="password" placeholder="Enter Password" required>
                                    <span class="input-group-text">
                                        <img src="{{ asset('images/hide-icon.jpg') }}" alt="Hide Icon" class="hide-icon" style="cursor:pointer;">
                                    </span>
                                </div>
                                @error('password')
                                    <span class="text-danger small">{{ $message }}</span>
                                @enderror
    
                                <div class="d-flex justify-content-between align-items-center mt-2">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="remember" name="remember">
                                        <label class="form-check-label small text-muted" for="remember">Remember me</label>
                                    </div>
                                    <a href="{{ route('password.request') }}" class="small text-muted">Forgot Password?</a>
                                </div>
                            </div>
    
                            <!-- Submit Button -->
                            <button type="submit" class="btn btn-primary w-100 mt-4">Log In</button>
                        </form>
                    </div>
    
                    <!-- Back Side -->
                    {{-- <div class="card p-4 card-back" id="loginCardBack">
                        <div class="card-body d-flex flex-column align-items-center justify-content-center p-0">
                            <a id="chooseEMS" class="btn btn-lg btn-primary my-3 py-5 w-100 text-center">
                                EMPLOYEE MANAGEMENT SYSTEM
                            </a>
                            <a id="chooseATS" class="btn btn-lg btn-primary my-3 py-5 w-100 text-center">
                                APPLICANT TRACKING SYSTEM
                            </a>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>

    <!-- Password Visibility Toggle -->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const passwordInput = document.getElementById("password");
            const toggleIcon = document.querySelector(".hide-icon");

            toggleIcon.addEventListener("click", function () {
                if (passwordInput.type === "password") {
                    passwordInput.type = "text";
                    toggleIcon.src = "{{ asset('images/show-icon.jpg') }}";
                } else {
                    passwordInput.type = "password";
                    toggleIcon.src = "{{ asset('images/hide-icon.jpg') }}";
                }
            });
        });
    </script>

</x-login-layout>

{{-- <x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}
