<!-- Navbar -->
<nav class="navbar navbar-expand-lg fixed-top py-5">
    <div class="container d-flex justify-content-between">
        
        <!-- Left Side (Logo and College Name) -->
        <a class=" d-flex align-items-center" href="{{ route('home') }}">
            <img src="{{ asset('images/CC_logo.png') }}" alt="Logo" class="cclogo">
            <span class="cc-nav-text navbar-text fw-bold ms-2">Columban College, Inc.</span>
        </a>
        
        <!-- Right Side -->
        <div class="d-flex align-items-center">
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
        </div>
    </div>
</nav>
<!-- End of Navbar -->