<!-- Navbar -->
<nav class="navbar navbar-expand-lg fixed-top">
    <div class="container d-flex justify-content-between">

        <!-- Hamburger Menu Button -->
        <button class="navbar-toggler me-2" type="button" id="hamburgerMenu">
            <div class="imageBox">
                <div class="imageInn">
                    <img src="images/hamburger-1.png" class="card-icon m-auto" alt="Default Image">
                </div>
                <div class="hoverImg">
                    <img src="images/hamburger-2.png" class="card-icon m-auto" alt="Profile Image">
                </div>
            </div>
        </button>
        
        <!-- Left Side (Logo and College Name) -->
        <a class=" d-flex align-items-center" href="{{ route('admin.dashboard') }}">
            <img src="images/CC_logo.png" alt="Logo" class="cclogo">
            <span class="cc-nav-text navbar-text ms-2">Columban College, Inc.</span>
        </a>
        
        <!-- Right Side (Navbar) -->
        <div class="d-flex align-items-center">

            {{-- Notification Bell
            <div class="dropdown me-3">
                <a href="#" class="text-decoration-none position-relative" id="notificationDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-bell fa-lg text-dark"></i>
                    @if(isset($notificationsCount) && $notificationsCount > 0)
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                        {{ $notificationsCount }}
                    </span>
                @endif                
                </a>

                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="notificationDropdown">
                    <li class="dropdown-header">Notifications</li>

                    @forelse($notifications as $note)
                        <li><a class="dropdown-item small" href="#">{{ $note->message }}</a></li>
                    @empty
                        <li><span class="dropdown-item small text-muted">No new notifications</span></li>
                    @endforelse
                </ul>
            </div> --}}

            {{-- Username & Profile --}}
            <span class="user-name navbar-text me-3">{{ auth()->user()->name }}!</span>

            <div class="dropdown">
                <a href="#" class="dropdown-toggle d-flex align-items-center text-decoration-none" id="userMenu" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="{{ asset('images/dummy-profile.png') }}" alt="Profile" class="rounded-circle user-img">
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userMenu">
                    <li><a class="dropdown-item" href="#">Profile</a></li>
                    <li><a class="dropdown-item" href="{{ route('password.update') }}">Settings</a></li>
                    @auth
                        @if (Auth::user()->role !== 'secretary')
                            <li><a class="dropdown-item" href="{{ route('manage-users') }}">Add user</a></li>
                        @endif
                    @endauth
                    <li><hr class="dropdown-divider"></li>
                    <li>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="dropdown-item">Logout</button>
                        </form>
                    </li>
                </ul>
            </div>

        </div>

    </div>
</nav>
<!-- End of Navbar -->