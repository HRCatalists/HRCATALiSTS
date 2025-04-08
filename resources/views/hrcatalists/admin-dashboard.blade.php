<x-admin-ats-layout>

    <x-slot:title>
        Columban College Inc. | Admin Dashboard
    </x-slot:title>

    <div class="d-flex">
        <x-partials.system.ats.ats-sidebar />

        <div id="content" class="flex-grow-1" style="background-color: #f5f7fa;">
            <div class="container mt-5" >
                <div class="container my-4">

                    {{-- Greeting --}}
                    <div class="mb-3">
                        <h5 class="text-muted">Hi, <span class="fw-bold">{{ auth()->user()->name }}</span></h5>
                    </div>
                
                    {{-- Main Dashboard Header --}}
                    <div class="d-flex flex-column flex-md-row justify-content-between align-items-center gap-3 p-4 rounded-4 shadow bg-white border">
                
                        {{-- Left Side: Title & Subtitle --}}
                        <div>
                            <h1 class="fw-bold mb-1 text-primary">Dashboard</h1>
                            <p class="text-muted fs-6 mb-0">Quick overview of recruitment flow and workforce updates.</p>
                        </div>
                
                        {{-- Right Side: Welcome Banner --}}
                        <div class="d-flex align-items-center gap-3 p-3 px-4 rounded-3"
                             style="background: linear-gradient(135deg, #8799eb, #3377CC); color: white; box-shadow: 0 4px 12px rgba(0,0,0,0.15);">
                            <i class="fas fa-user-circle fa-2x"></i>
                            <div class="text-start">
                                <small class="text-white-50 d-block">Welcome back</small>
                                <span class="fw-semibold">{{ auth()->user()->name }}</span>
                            </div>
                        </div>
                
                    </div>
                
                </div>
                
                {{-- <div class="welcome-text-only">Welcome, {{ auth()->user()->name }}!</div>

                <div class="d-flex justify-content-between align-items-center mt-4 border-bottom pb-5">
                    <div>
                        <h2 class="db-h2">DASHBOARD</h2>
                        <h4 class="db-h4 mt-4">Overview</h4>
                    </div>

                    <div class="d-flex banner-db banner-gradient text-white align-items-center justify-content-center px-4 py-2">
                        <h4 class="banner-text mx-5">Welcome, {{ auth()->user()->name }}!</h4>
                        <img src="{{ asset('images/db-icon.png') }}" class="banner-icon" alt="banner-icon">
                    </div>
                </div> --}}

                <!-- ATS Dashboard Section -->
                <div class="mb-5 pb-5">
                    {{-- <h3 class="section-title">ATS Dashboard</h3> --}}
                    @include('hrcatalists.partials.ats-dashboard-content', ['logs' => $logs, 'events' => $events])
                </div>

                <!-- EMS Dashboard Section -->
                <div class="border-top">
                    {{-- <h3 class="section-title">EMS Dashboard</h3> --}}
                    @include('hrcatalists.partials.ems-dashboard-content', ['events' => $events])
                </div>
            </div>
        </div>
    </div>

    <script>
        window.atsEvents = @json($events);
    </script>
    
    <script src="{{ asset('js/calendar.js') }}" defer></script>      

</x-admin-ats-layout>
