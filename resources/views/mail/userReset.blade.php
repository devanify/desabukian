<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
</head>
<body style="font-family: Arial, sans-serif; margin: 0; padding: 0; background-color: #f4f4f4;">

    <div style="max-width: 600px; margin: 20px auto; padding: 20px; background-color: #ffffff; border-radius: 8px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
        <div style="text-align: center; margin-bottom: 20px;">
            <h1 style="color: #333333; font-size: 24px; margin-bottom: 8px;">Reset Password</h1>
            <p style="color: #555555; font-size: 14px;">Klik tombol di bawah ini untuk mereset password Anda</p>
        </div>

        <div style="text-align: center; margin: 20px 0;">
            <a href="{{ route('resetpassword', $token) }}" 
               style="display: inline-block; text-decoration: none; background-color: #00bfff; color: #ffffff; font-size: 16px; padding: 12px 24px; border-radius: 6px;">
                Reset Password
            </a>
        </div>

        <p style="color: #777777; font-size: 14px; text-align: center; margin-top: 20px;">
            Jika Anda tidak meminta pengaturan ulang password, abaikan email ini.
        </p>
    </div>

</body>
</html>
