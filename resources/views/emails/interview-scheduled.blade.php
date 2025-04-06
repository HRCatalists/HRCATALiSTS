<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Interview Invitation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            background: #fff;
            margin: 30px auto;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px #ccc;
        }
        .header {
            background: #3377CC;
            color: #fff;
            padding: 15px;
            font-size: 20px;
            text-align: center;
            border-radius: 8px 8px 0 0;
        }
        .content {
            padding: 20px;
            color: #333;
        }
        .details {
            background: #f1f1f1;
            padding: 10px;
            margin: 15px 0;
            border-left: 4px solid #3377CC;
        }
        .footer {
            text-align: center;
            font-size: 12px;
            color: #777;
            margin-top: 20px;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="header">Interview Invitation</div>

    <div class="content">
        <p>Dear Mr./Ms. {{ $applicant->last_name }},</p>

        <p>Thank you for your application. We are pleased to invite you to an interview for the <strong>{{ $applicant->job->job_title ?? 'N/A' }}</strong> role at <strong>Columban College Inc.</strong>.</p>

        <div class="details">
            <p><strong>Date:</strong> {{ $scheduleDate }}<br>
               <strong>Time:</strong> {{ $scheduleTime }}<br>
               <strong>Location:</strong> Columban College Inc.</p>
        </div>

        <p>Please confirm your availability by replying to this email or contacting us at <strong>hamdo@columban.edu.ph</strong>.</p>

        <p>We look forward to meeting you!</p>

        <p>Best regards,<br>
        <strong>HAMDO Department</strong><br>

    </div>

    <div class="footer">
        © 2025 HAMDO Columban College Inc. | <a href="https://ccihamdo.com">Visit Website</a>
    </div>
</div>
</body>
</html>