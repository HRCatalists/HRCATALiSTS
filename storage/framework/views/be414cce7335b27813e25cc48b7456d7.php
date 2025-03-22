<!-- Navbar -->
<nav class="navbar navbar-expand-lg fixed-top py-5">
    <div class="container d-flex justify-content-between">
        
        <!-- Left Side (Logo and College Name) -->

        <a class=" d-flex align-items-center" href="<?php echo e(route('home')); ?>">
            <img src="<?php echo e(asset('images/CC_logo.png')); ?>" alt="Logo" class="cclogo">
            <span class="cc-nav-text navbar-text fw-bold ms-2">Columban College, Inc.</span>
            
        </a>

        
        <div class="d-flex align-items-center">
            
            <div class="d-flex align-items-center me-4">
                
                <?php if(Auth::check()): ?>
                <button class="btn-1">
                    <a href="<?php echo e(route('main-menu')); ?>">
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
                <?php else: ?>
                <button class="btn-1">
                    <a href="<?php echo e(route('login')); ?>">
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
                <?php endif; ?>
            </div>

        <div class="d-flex justify-content-between">
            <a class="d-flex align-items-center" href="<?php echo e(route('home')); ?>">
                <img src="<?php echo e(asset('images/CC_logo.png')); ?>" alt="Logo" class="cclogo">
                <span class="cc-nav-text navbar-text fw-bold ms-2">Columban College, Inc.</span>
            </a>
            <a class="d-flex align-items-center" href="<?php echo e(Auth::check() ? route('admin.dashboard') : route('login')); ?>">
                <img src="<?php echo e(asset('images/ccihr-logo.png')); ?>" alt="Logo" class="cclogo">
            </a>
        </div>

        
        
        
        <div class="d-flex align-items-center">
            

            <?php if(Route::currentRouteName() == 'home'): ?> 
            <span class="text-white login me-2">Looking for a Job?</span>
                <!-- Show "Job Openings" button on Home Page -->
                <button class="btn-1">
                    <a href="<?php echo e(route('openings')); ?>">
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
            <?php elseif(Route::currentRouteName() == 'openings'): ?> 
                <!-- Show "Back to Home" button on Openings Page -->
                <button class="btn-1">
                    <a href="<?php echo e(route('home')); ?>">
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
            <?php endif; ?>
        </div>
    </div>
</nav>
<!-- End of Navbar --><?php /**PATH C:\Users\raide\OneDrive\Desktop\HRCATALiSTS-hr-catalists\resources\views/components/partials/welcome/navbar.blade.php ENDPATH**/ ?>