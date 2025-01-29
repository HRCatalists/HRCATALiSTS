<x-login-layout>
    <div class="container-fluid vh-100 d-flex">
        <div class="row flex-grow-1 w-100">
            
            <!-- Left Section -->
            <div class="col-lg-8 d-none d-lg-flex bgd-image align-items-center justify-content-center" 
            style="background-image:url('{{ asset('images/cc-bg.jpg') }}');">
                <div class="text-center text-white left-section">
                    <img src="images/ccihr-logo.png" class="cc-logo img-fluid" alt="Columban College Logo">
                    <h1 class="mt-3">Human Asset Management <br> and Development Office</h1>
                </div>
            </div>
            
            <!-- Right Section -->
            <div class="col-lg-4 col-12 d-flex align-items-center justify-content-center ats-right-section">
    
                <div class="card w-75 shadow" id="loginCard">
                    <div class="card-body p-4">
    
                        <div class="text-center mb-4">
                            <h2>Log In to <br>
                                HR CATALiSTS</h2> 
                        </div>
    
                        <form method="POST" action="{{ route('login') }}" id="loginForm">
                            @csrf

                            <div class="mb-3">
                                <label for="email" class="form-label login-label">Email</label>
                                <input type="email" class="form-control input-border" id="email" name="email" placeholder="Enter Email" required>
                            </div>
    
                            <div class="mb-3">
                                <label for="password" class="form-label login-label">Password</label>
                                <div class="input-group">
                                    <input type="password" class="form-control input-border" id="password" name="password" placeholder="Enter Password" required>
                                    <span class="input-group-text">
                                        <img src="images/hide-icon.jpg" alt="Hide Icon" class="hide-icon" style="cursor:pointer;">
                                    </span>
                                </div>
    
                                <div class="d-flex justify-content-between align-items-center mt-2">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="remember" name="remember">
                                        <label class="form-check-label small text-muted" for="remember">Remember me</label>
                                    </div>
                                    <a href="{{ route('password.request') }}" class="small text-muted">Forgot Password?</a>
                                </div>
                            </div>
    
                            <button type="submit" class="btn btn-primary w-100 mt-4">Log In</button>
    
                        </form>
    
                    </div>
    
                    <!-- Back Side -->
                    <div class="card p-4 card-back" id="loginCardBack">
                        <div class="card-body d-flex flex-column align-items-center justify-content-center">
                            <a href="#">
                                <button class="btn btn-lg btn-primary my-3 w-100 text-center">
                                    EMPLOYEE MANAGEMENT SYSTEM
                                </button>
                            </a>
                            <a href="#">
                                <button class="btn btn-lg btn-primary my-3 w-100 text-center">
                                    APPLICANT TRACKING SYSTEM
                                </button>
                            </a>
                        </div>
                    </div>
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
