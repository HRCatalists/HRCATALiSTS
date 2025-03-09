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
        <a class=" d-flex align-items-center" href="#">
            <img src="images/CC_logo.png" alt="Logo" class="cclogo">
            <span class="cc-nav-text navbar-text ms-2">Columban College, Inc.</span>
        </a>
        
        <!-- Right Side (User Profile Section) -->
        <div class="d-flex align-items-center">
            <span class="user-name navbar-text me-3"><?php echo e(auth()->user()->name); ?>!</span>
            <div class="dropdown">
                <a href="#" class="dropdown-toggle d-flex align-items-center text-decoration-none" id="userMenu" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="images/dummy-profile.png" alt="Profile" class="rounded-circle user-img">
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userMenu">
                    <li><a class="dropdown-item" href="#">Profile</a></li>
                    <li><a class="dropdown-item" href="#">Settings</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li>
                        <form action="<?php echo e(route('logout')); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <button type="submit" class="dropdown-item">Logout</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
<!-- End of Navbar --><?php /**PATH C:\laragon\www\hr_catalists\resources\views/components/partials/system/system-navbar.blade.php ENDPATH**/ ?>