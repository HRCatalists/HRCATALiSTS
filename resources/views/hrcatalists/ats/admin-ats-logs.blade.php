<x-admin-ats-layout>

    <x-slot:title>
        Columban College Inc. | ATS Logs
    </x-slot:title>

    <!-- Log List Section -->
    <div class="d-flex">
        <!-- Sidebar -->
        <x-partials.system.ats.ats-sidebar />
        <!-- End of Sidebar -->
    
        <!-- Logs Content -->
        <div id="content" class="flex-grow-1">
            <div class="container">

                <div class="d-flex justify-content-between align-items-center my-5">
                    <h2 class="dt-h2">Log History</h2>

                    <button class="btn shadow print-btn">
                        <i class="fa fa-print"></i> PRINT
                    </button>
                </div>

                <table class="table table-bordered mt-4 m-0" id="logsTable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>USER</th>
                            <th>ACTIVITIES</th>
                            <th>TIME</th>
                            <th>DATE</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($logs as $log)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $log->user->name ?? 'Guest' }}</td>
                                <td>{{ $log->activity }}</td>
                                <td>{{ $log->created_at->format('h:i a') }}</td>
                                <td>{{ $log->created_at->format('F d, Y') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</x-admin-ats-layout>