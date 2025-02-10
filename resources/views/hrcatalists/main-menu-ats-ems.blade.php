<x-main-menu-layout>

    <x-slot:title>
        Columban College Inc. | Main Menu
    </x-slot:title>

    <div class="container text-center">
        <!-- Logo and Welcome Section -->
        <div>
            <img src="images/ccihr-logo.png" class="cchrlogo mx-auto d-block mb-3" alt="Logo">
            <h1 class="wc-txt fw-bolder">WELCOME, Admin!</h1>
            <p class="motto">Christi Simus Non Nostri</p>
        </div>

        <!-- Buttons Section -->
        <div class="row gap-3 mt-5 justify-content-center">
            <div class="col-12 col-md-5">
                <a href="{{ route('ems-dashboard') }}" class="w-100">
                    <button class="btn btn-lg shadow btn-ems-ats p-5 w-100">
                        EMPLOYEE MANAGEMENT SYSTEM
                    </button>
                </a>
            </div>
            <div class="col-12 col-md-5">
                <a href="{{ route('ats-dashboard') }}" class="w-100">
                    <button class="btn btn-lg shadow btn-ems-ats p-5 w-100">
                        APPLICANT TRACKING SYSTEM
                    </button>
                </a>
            </div>
        </div>
    </div>

</x-main-menu-layout>