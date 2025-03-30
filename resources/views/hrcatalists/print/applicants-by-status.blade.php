<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Applicants - {{ ucfirst($status) }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        @media print {
            .no-print {
                display: none !important;
            }
        }
    </style>
</head>
<body>

    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3>Applicants - {{ ucfirst($status) }}</h3>
            <button class="btn btn-primary no-print" onclick="window.print()">
                <i class="fa fa-print"></i> Print
            </button>
        </div>

        <table class="table table-bordered table-sm">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Position Applied</th>
                    <th>Applied At</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($applicants as $index => $applicant)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $applicant->first_name }} {{ $applicant->last_name }}</td>
                        <td>{{ $applicant->email }}</td>
                        <td>{{ $applicant->phone }}</td>
                        <td>{{ $applicant->job->job_title ?? 'N/A' }}</td>
                        <td>{{ \Carbon\Carbon::parse($applicant->applied_at)->format('M d, Y') }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">No applicants found for this status.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</body>
</html>
