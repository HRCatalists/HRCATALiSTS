<!-- Footer Section -->
<footer class="footer text-white">
    <div class="container">
        <div class="row">
            <!-- Logo and Main Text -->
            <div class="col-md-4 d-flex justify-content-center footer-brand logo-section">
                <img src="<?php echo e(asset('images/CC_logo.png')); ?>" alt="Columban College Logo" class="img-fluid footer-logo me-2">
                <div class="text-center">
                    <h3 class="fw-bold mb-3">Columban College, Inc.</h3>
                    <p>Christi Simus Non Nostri<br>We are Christ's and not our own</p>
                </div>
            </div>

            <!-- Contact Information -->
            <div class="col-md-3 contact-section">

                <div class="mb-3">
                    <h4 class="fw-bold mb-3">Contact Us</h4>
                    
                </div>
                
                <ul>
                    <li class="mb-3">
                        <i class="fas fa-map-marker-alt me-2"></i> # 1 First St. New Asinan Olongapo City 
                    </li>
                    <li class="mb-3">
                        <i class="fas fa-envelope me-2"></i> hamdo@columban.edu.ph 
                    </li>
                    <li class="mb-3">
                        <i class="fas fa-phone me-2"></i> (047) 222-3329
                    </li>
                </ul>    
            </div>

            <!-- Legal -->
            <div class="col-md-2 legal-section">
                <h4 class="fw-bold mb-3">Legal</h4>

                <ul>
                    <li class="mb-3">
                        <a href="#" class="text-white">Terms of Use</a>
                    </li>
                    <li class="mb-3">
                        <a href="#" class="text-white">Privacy Policy</a>
                    </li>
                </ul>  
            </div>

            <!-- Admin Log in -->
            <div class="col-md-3 login-section">
                <h4 class="fw-bold mb-3">Log in as Admin</h4>
                
                <div class="d-flex flex-column">
                    
                <?php if(Auth::check()): ?>   
                    <!-- Redirects to dashboard if logged in -->
                    <a href="<?php echo e(route('main-menu')); ?>">Go to menu</a>
                <?php else: ?>
                    <!-- Shows login page only if not logged in -->
                    <a href="<?php echo e(route('login')); ?>">Login Here</a>
                <?php endif; ?>
                
                    
                </div>
            </div>
        </div>
    </div>

    <div class="container d-flex justify-content-between copyright">
        <!-- Copyright Text -->
        <p class="small">
            Copyright Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
        </p>

        <a href="https://www.facebook.com/profile.php?id=100085747780035" target="_blank"><i class="fab fa-facebook-square fa-lg"></i></a>
    </div>
</footer><?php /**PATH C:\laragon\www\hr_catalists\resources\views/components/partials/welcome/footer.blade.php ENDPATH**/ ?>