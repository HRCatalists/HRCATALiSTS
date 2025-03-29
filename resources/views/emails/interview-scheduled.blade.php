<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Interview Invitation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 100%;
            max-width: 600px;
            background: #ffffff;
            margin: auto;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .header {
            text-align: center;
            padding: 20px;
            background: #3377CC;
            color: #ffffff;
            font-size: 22px;
            font-weight: bold;
            border-radius: 8px 8px 0 0;
        }
        .content {
            padding: 20px;
            color: #333;
            text-align: left;
            line-height: 1.6;
        }
        .details {
            background: #f9f9f9;
            padding: 10px;
            border-left: 4px solid #3377CC;
            margin: 10px 0;
        }
        .footer {
            text-align: center;
            padding: 15px;
            font-size: 12px;
            color: #666;
        }
        .no-reply {
            font-size: 12px;
            color: #999;
            text-align: center;
            margin-top: 20px;
        }
        @media screen and (max-width: 600px) {
            .container {
                width: 100%;
            }
        }
    </style>
</head>
<body>

    <div class="container">
        <!-- Header -->
        <div class="header">
            Interview Invitation – Next Steps
        </div>

        <!-- Email Content -->
        <div class="content">
            <p><strong>Dear Mr./Ms. {{ $applicant->last_name }},</strong></p>

            <p>We are delighted to inform you that you have been shortlisted for the next stage of our hiring process. Based on your application and qualifications, we would like to invite you to an interview for the [Job Position] role at [Company Name].</p>

            <p>The interview will be an opportunity for us to learn more about your experience and skills, as well as for you to ask any questions about the position and our company culture.</p>

            <div class="details">
                <p><strong>Interview Details:</strong></p>
                <ul>
                    <li><strong>Date:</strong> {{ $scheduleDate }}</li>
                    <li><strong>Time:</strong> {{ $scheduleTime }}</li>
                    <li><strong>Location/Platform:</strong> [Specify whether it's in-person or via Zoom, Microsoft Teams, etc.]</li>
                </ul>
            </div>

            <p><strong>What to Expect:</strong></p>
            <p>During the interview, you will meet with [Interviewer Name/Panel] and discuss your experience, qualifications, and how you can contribute to our team. The session will last approximately [Duration] minutes.</p>

            <p><strong>Next Steps:</strong></p>
            <p>Please confirm your availability for the interview by responding to this email or contacting [Contact Person] at [Contact Email/Phone]. If the scheduled time does not work for you, please let us know as soon as possible so we can arrange an alternative time.</p>

            <p>We appreciate your interest in joining our team and look forward to speaking with you. If you have any questions, feel free to reach out before the interview.</p>

            <p>Best Regards,</p>
            <p><strong>[Your Name]</strong><br>
               [Your Position] <br>
               [Company Name] <br>
               [Company Website]</p>

            <!-- No Reply Disclaimer -->
            <p class="no-reply">
                This is an automated email – please do not reply. If you need assistance, contact us at [Support Email].
            </p>
        </div>

        <!-- Footer -->
        <div class="footer">
            &copy; 2025 HAMDO Columban College Inc. All rights reserved. <br>
            <a href="https://yourcompany.com/unsubscribe">Unsubscribe</a> | <a href="https://yourcompany.com">Visit Website</a>
        </div>
    </div>

</body>
</html>
