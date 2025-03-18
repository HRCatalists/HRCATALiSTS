<!-- Navbar -->
<nav class="navbar navbar-expand-lg fixed-top py-5">
    <div class="container d-flex justify-content-between">
        
        <!-- Left Side (Logo and College Name) -->
        <div class="d-flex justify-content-between">
            <a class="d-flex align-items-center" href="{{ route('home') }}">
                <img src="{{ asset('images/CC_logo.png') }}" alt="Logo" class="cclogo">
                <span class="cc-nav-text navbar-text fw-bold ms-2">Columban College, Inc.</span>
            </a>
            <a class="d-flex align-items-center" href="{{ Auth::check() ? route('main-menu') : route('login') }}">
                <img src="{{ asset('images/ccihr-logo.png') }}" alt="Logo" class="cclogo">
            </a>
        </div>

        {{-- Job Openings --}}
        <div class="d-flex align-items-center">
            {{-- Login --}}
            {{-- <div class="d-flex align-items-center me-4">
                @if(Auth::check())
                <button class="btn-1">
                    <a href="{{ route('main-menu') }}">
                        <div class="login">SIGN IN</div>
                        <div class="letters">
                            <span>M</span>
                            <span>A</span>
                            <span>I</span>
                            <span>N</span>
                            <span>&nbsp;</span>
                            <span>M</span>
                            <span>E</span>
                            <span>N</span>
                            <span>U</span>
                        </div>
                    </a>
                </button>
                @else
                <button class="btn-1">
                    <a href="{{ route('login') }}">
                        <div class="login">SIGN IN</div>
                        <div class="letters">
                            <span>L</span>
                            <span>O</span>
                            <span>G</span>
                            <span>I</span>
                            <span>N</span>
                            <span>&nbsp;</span>
                            <span>H</span>
                            <span>E</span>
                            <span>R</span>
                            <span>E</span>
                        </div>
                    </a>
                </button>
                @endif
            </div> --}}
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