<!DOCTYPE html>
<html>
<head>
    <title>Welcome to Our Platform</title>
</head>
<body>
    <h1>Welcome, {{ $name }}!</h1>
    <p>Your account has been created successfully. Here are your account details:</p>
    <p>Email: {{ $email }}</p>
    <p>Password: {{ $password }}</p>
    <p>your verification code is: {{ $email_verification_code }}</p>
    <p>Please log in and change your password as soon as possible.</p>
    <p>Thank you for joining us!</p>
</body>
</html>
