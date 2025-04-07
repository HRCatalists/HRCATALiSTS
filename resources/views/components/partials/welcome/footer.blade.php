<!-- Footer Section -->
<!-- Footer Section -->
<footer class="footer text-whit pt-5 pb-3">
    <div class="container">
        <div class="row">
            <!-- Logo and Main Text -->
            <div class="col-md-6 d-flex justify-content-center footer-brand logo-section mb-4">
                <img src="{{ asset('images/CC_logo.png') }}" alt="Columban College Logo" class="img-fluid footer-logo me-2">
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
                    <li><i class="fas fa-phone me-2"></i>(047) 222-3329 loc. 120</li>
                </ul>
            </div>
        </div>

        <hr class="border-light">

        <!-- Bottom Bar -->
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-center small">
            <p class="mb-2 mb-md-0 text-center text-md-start">
                &copy; {{ now()->year }} Columban College, Inc. All rights reserved.
            </p>

            <div class="text-center text-md-end">
                <a href="{{ route('privacy.policy') }}" target="_blank" class="text-white text-decoration-none">Privacy Policy</a>
                <span class="text-white mx-2">&bull;</span>
                <a href="{{ route('terms.of.use') }}" target="_blank" class="text-white text-decoration-none">Terms of Use</a>
                <span class="text-white mx-2">&bull;</span>
                <a href="https://www.facebook.com/profile.php?id=100085747780035" target="_blank" class="text-white">
                    <i class="fab fa-facebook-square fa-lg"></i>
                </a>
            </div>            
        </div>
    </div>
</footer>

{{-- <footer class="footer text-white">
    <div class="container">
        <div class="row">
            <!-- Logo and Main Text -->
            <div class="col-md-4 d-flex justify-content-center footer-brand logo-section">
                <img src="{{ asset('images/CC_logo.png') }}" alt="Columban College Logo" class="img-fluid footer-logo me-2">
                <div class="text-center">
                    <h3 class="fw-bold mb-3">Columban College, Inc.</h3>
                    <p>Christi Simus Non Nostri<br>We are Christ's and not our own</p>
                </div>
            </div>

            <!-- Contact Information -->
            <div class="col-md-4 contact-section">

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
            <div class="col-md-4 legal-section">
                <h4 class="fw-bold mb-3">Legal</h4>

                <ul>
                    <li class="mb-3">
                        <a href="#" data-bs-toggle="modal" data-bs-target="#privacyPolicyModal">Privacy Policy</a>
                    </li>
                    <li class="mb-3">
                        <a href="#" data-bs-toggle="modal" data-bs-target="#termsModal">Terms of Use</a>
                    </li>
                </ul>
                @include('hrcatalists.legal-modals')
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
</footer> --}}