<x-admin-ems-layout>

    <!-- Log List Section -->
    <div class="d-flex">
        <!-- Sidebar -->
        <x-partials.system.ats.ats-sidebar />
<<<<<<< HEAD

=======
<<<<<<< HEAD
=======

>>>>>>> hr-catalists
>>>>>>> 53eaa7626ee2bc35004633ce2f6496ccff20f396
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
<<<<<<< HEAD
                            <th>POSITION</th>
=======
>>>>>>> 53eaa7626ee2bc35004633ce2f6496ccff20f396
                            <th>ACTIVITIES</th>
                            <th>TIME</th>
                            <th>DATE</th>
                        </tr>
                    </thead>

                    <tbody>
<<<<<<< HEAD
                        <tr>
                            <td>1</td>
                            <td>Fate Gamboa</td>
                            <td>Employee</td>
                            <td>Updated Mobile Number</td>
                            <td>1:00 p.m.</td>
                            <td>1/19/2025</td>
                        </tr>

                        <tr>
                            <td>2</td>
                            <td>Dr. Mora</td>
                            <td>Super Admin</td>
                            <td>Deleted Applicant Profile</td>
                            <td>10:00 a.m.</td>
                            <td>1/19/2025</td>
                        </tr>

                        <tr>
                            <td>3</td>
                            <td>Secretary</td>
                            <td>Admin</td>
                            <td>Posted a Position</td>
                            <td>1:00 p.m.</td>
                            <td>1/11/2025</td>
                        </tr>
=======
                        @foreach($logs as $log)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $log->user->name ?? 'Guest' }}</td>
                                <td>{{ $log->activity }}</td>
                                <td>{{ $log->created_at->format('h:i a') }}</td>
                                <td>{{ $log->created_at->format('F d, Y') }}</td>
                            </tr>
                        @endforeach
>>>>>>> 53eaa7626ee2bc35004633ce2f6496ccff20f396
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<<<<<<< HEAD
    <!-- End of Logs Content -->

</x-admin-ems-layout>
=======

</x-admin-ats-layout>
>>>>>>> 53eaa7626ee2bc35004633ce2f6496ccff20f396
