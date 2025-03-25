<!DOCTYPE html>
<html>
<head>
    <title>Interview Scheduled</title>
</head>
<body>
    <h2>Dear {{ $applicant->last_name }},</h2>

    <p>We are pleased to inform you that you have been scheduled for an interview for the position .</p>

    <p><strong>Schedule Details:</strong></p>
    <ul>
        <li><strong>Date:</strong> {{ $scheduleDate }}</li>
        <li><strong>Time:</strong> {{ $scheduleTime }}</li>
    </ul>

    <p>Please be prepared and let us know if you have any questions.</p>

    <p>Best Regards,</p>
    <p>Your Company Name</p>
</body>
</html>
