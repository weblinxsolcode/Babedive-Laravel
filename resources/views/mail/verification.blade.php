<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OTP Verification</title>
</head>
<body>
    <div style="font-family: Arial, sans-serif; max-width: 600px; margin: 0 auto; padding: 20px;">
        <h2 style="text-align: center; color: #333;">OTP Verification</h2>
        <p style="text-align: center; color: #666;">Hello {{ $name }},</p>
        <p style="text-align: center; color: #666;">Your One-Time Password (OTP) for verification is: <strong>{{ $code }}</strong></p>
        <p style="text-align: center; color: #666;">Please use this OTP to complete the verification process.</p>
        <p style="text-align: center; color: #666;">If you didn't request this, you can safely ignore this email.</p>
        <p style="text-align: center; color: #666;">Thank you!</p>
        <p style="text-align: center; color: #666;">Best Regards,</p>
        <p style="text-align: center; color: #666;">Diving Application</p>
    </div>
</body>
</html>
