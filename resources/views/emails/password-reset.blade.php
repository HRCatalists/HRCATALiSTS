<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Reset Password</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f8f9fa; padding: 30px; color: #212529;">
    <div style="max-width: 600px; margin: auto; background-color: white; padding: 30px; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.05);">
        <h2 style="color: #0d6efd; text-align: center;">🔒 Reset Your Password</h2>

        <p>Hello,</p>

        <p>You recently requested to reset your password. Click the button below to continue:</p>

        <div style="text-align: center; margin: 30px 0;">
            <a href="{{ $url }}" style="display: inline-block; background-color: #0d6efd; color: white; padding: 12px 20px; border-radius: 5px; text-decoration: none; font-weight: bold;">
                Reset Password
            </a>
        </div>

        <p>If the button doesn't work, copy and paste this link into your browser:</p>
        <p style="word-break: break-all;"><a href="{{ $url }}">{{ $url }}</a></p>

        <p style="margin-top: 30px;">If you did not request a password reset, no further action is required.</p>

        <hr style="margin: 40px 0; border: none; border-top: 1px solid #e9ecef;">
        <p style="font-size: 12px; color: #6c757d; text-align: center;">This email was sent by Columban College's HR System</p>
    </div>
</body>
</html>
