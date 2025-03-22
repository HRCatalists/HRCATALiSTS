<!-- Navbar -->
<nav class="navbar navbar-expand-lg fixed-top py-5">
    <div class="container d-flex justify-content-between">
        
        <!-- Left Side (Logo and College Name) -->
        <div class="d-flex justify-content-between">
            <a class="d-flex align-items-center" href="{{ route('home') }}">
                <img src="{{ asset('images/CC_logo.png') }}" alt="Logo" class="cclogo">
                <span class="cc-nav-text navbar-text fw-bold ms-2">Columban College, Inc.</span>
            </a>
            <a class="d-flex align-items-center" href="{{ Auth::check() ? route('admin.dashboard') : route('login') }}">
                <img src="{{ asset('images/ccihr-logo.png') }}" alt="Logo" class="cclogo">
            </a>
        </div>

        {{-- Job Openings --}}
        {{-- <div class="d-flex align-items-center">
            <span class="text-white login me-2">Looking for a Job?</span>
            <button class="btn-1">
                <a href="{{ route('openings') }}">
                    <div class="original">Job Openings</div>
                    <div class="letters">
                        <span>A</span>
                        <span>P</span>
                        <span>P</span>
                        <span>L</span>
                        <span>Y</span>
                        <span>&nbsp;</span>
                        <span>N</span>
                        <span>O</span>
                        <span>W</span>
                    </div>
                </a>
            </button>
        </div> --}}
        {{-- Job Openings / Apply Now Button --}}
        <div class="d-flex align-items-center">
            

            @if(Route::currentRouteName() == 'home') 
            <span class="text-white login me-2">Looking for a Job?</span>
                <!-- Show "Job Openings" button on Home Page -->
                <button class="btn-1">
                    <a href="{{ route('openings') }}">
                        <div class="original">Job Openings</div>
                        <div class="letters">
                            <span>A</span>
                            <span>P</span>
                            <span>P</span>
                            <span>L</span>
                            <span>Y</span>
                            <span>&nbsp;</span>
                            <span>N</span>
                            <span>O</span>
                            <span>W</span>
                        </div>
                    </a>
                </button>
            @elseif(Route::currentRouteName() == 'openings') 
                <!-- Show "Back to Home" button on Openings Page -->
                <button class="btn-1">
                    <a href="{{ route('home') }}">
                        <div class="original">Go Back</div>
                        <div class="letters">
                            <span>H</span>
                            <span>O</span>
                            <span>M</span>
                            <span>E</span>
                            <span>&nbsp;</span>
                            <span>P</span>
                            <span>A</span>
                            <span>G</span>
                            <span>E</span>
                        </div>
                    </a>
                </button>
            @endif
        </div>
    </div>
</nav>
<!-- End of Navbar -->