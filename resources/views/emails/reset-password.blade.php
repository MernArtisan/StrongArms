<!DOCTYPE html>
<html>
<head>
    <title>Reset Password</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f6f6f6; padding: 30px;">
    <div style="max-width: 600px; margin: auto; background: white; padding: 30px; border-radius: 8px;">
        <h2 style="color: #333;">Forgot your password?</h2>
        <p>We received a request to reset your password. Click the button below to proceed:</p>

        <a href="{{ $link }}" style="display: inline-block; padding: 12px 20px; background-color: #007bff; color: white; text-decoration: none; border-radius: 5px; margin: 20px 0;">
            Reset Password
        </a>

        <p>If you didn’t request this, you can safely ignore this email.</p>

        <p style="margin-top: 40px;">Thanks,<br><strong>Your App Team</strong></p>
    </div>
</body>
</html>
