<x-admin-ats-layout>

    <x-slot:title>
        Columban College Inc. | Admin Dashboard
    </x-slot:title>

    <div class="d-flex">
        <x-partials.system.ats.ats-sidebar />

        <div id="content" class="flex-grow-1">
            <div class="container mt-5">
                <div class="welcome-text-only">Welcome, {{ auth()->user()->name }}!</div>

                <div class="d-flex justify-content-between align-items-center mt-4 border-bottom pb-5">
                    <div>
                        <h2 class="db-h2">DASHBOARD</h2>
                        <h4 class="db-h4 mt-4">Overview</h4>
                    </div>

                    <div class="d-flex banner-db banner-gradient text-white align-items-center justify-content-center px-4 py-2">
                        <h4 class="banner-text mx-5">Welcome, {{ auth()->user()->name }}!</h4>
                        <img src="{{ asset('images/db-icon.png') }}" class="banner-icon" alt="banner-icon">
                    </div>
                </div>

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
