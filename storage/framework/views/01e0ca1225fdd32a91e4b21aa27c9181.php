<!-- Footer Section -->
<!-- Footer Section -->
<footer class="footer text-whit pt-5 pb-3">
    <div class="container">
        <div class="row">
            <!-- Logo and Main Text -->
            <div class="col-md-6 d-flex justify-content-center footer-brand logo-section mb-4">
                <img src="<?php echo e(asset('images/CC_logo.png')); ?>" alt="Columban College Logo" class="img-fluid footer-logo me-2">
                <div class="text-center">
                    <h3 class="fw-bold mb-3">Columban College, Inc.</h3>
                    <p>Christi Simus Non Nostri<br>We are Christ's and not our own</p>
                </div>
            </div>

            <!-- Contact Information -->
            <div class="col-md-6 contact-section mb-4">
                <h4 class="fw-bold mb-3">Contact Us</h4>
                <ul class="list-unstyled">
                    <li class="mb-2"><i class="fas fa-map-marker-alt me-2"></i>#1 First St. New Asinan, Olongapo City</li>
                    <li class="mb-2"><i class="fas fa-envelope me-2"></i>hamdo@columban.edu.ph</li>
                    <li><i class="fas fa-phone me-2"></i>(047) 222-3329</li>
                </ul>
            </div>
        </div>

        <hr class="border-light">

        <!-- Bottom Bar -->
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-center small">
            <p class="mb-2 mb-md-0 text-center text-md-start">
                &copy; <?php echo e(now()->year); ?> Columban College, Inc. All rights reserved.
            </p>

            <div class="text-center text-md-end">
                <a href="<?php echo e(route('privacy.policy')); ?>" target="_blank" class="text-white text-decoration-none">Privacy Policy</a>
                <span class="text-white mx-2">&bull;</span>
                <a href="<?php echo e(route('terms.of.use')); ?>" target="_blank" class="text-white text-decoration-none">Terms of Use</a>
                <span class="text-white mx-2">&bull;</span>
                <a href="https://www.facebook.com/profile.php?id=100085747780035" target="_blank" class="text-white">
                    <i class="fab fa-facebook-square fa-lg"></i>
                </a>
            </div>            
        </div>
    </div>
</footer>

<?php /**PATH C:\Users\raide\OneDrive\Desktop\HRCATALiSTS-hr-catalists\resources\views/components/partials/welcome/footer.blade.php ENDPATH**/ ?>