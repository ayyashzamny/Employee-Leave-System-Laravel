<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Leave Management System</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Include Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Optional: Font Awesome for icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background: url('{{ asset('img/bg.jpg') }}') no-repeat center center fixed;
            background-size: cover;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.5);
            /* Darken effect */
            z-index: 0;
        }

        .login-container {
            background: rgba(255, 255, 255, 0.15);
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 30px;
            width: 320px;
            text-align: center;
            position: relative;
            /* Ensure relative positioning for child elements */
            backdrop-filter: blur(10px);
            /* Glass effect */
            border: 1px solid rgba(255, 255, 255, 0.3);
            /* Optional: Border for glass effect */
        }

        .logo {
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-control {
            border-radius: 20px;
            padding: 12px 20px;
            font-size: 16px;
        }

        .btn-login {
            border-radius: 20px;
            padding: 10px 20px;
            font-size: 18px;
            background-color: #007bff;
            border-color: #007bff;
            color: white;
            width: 100%;
            margin-top: 10px;
        }

        .btn-login:hover {
            background-color: #0056b3;
            border-color: #004085;
        }

        .forgot-password {
            margin-top: 10px;
        }

        .forgot-password a {
            color: #007bff;
            text-decoration: none;
            font-weight: bold;
        }

        .forgot-password a:hover {
            text-decoration: underline;
        }

        .footer-text {
            margin-top: 20px;
            color: #888;
        }

        .title {
            font-size: 36px;
            font-weight: bold;
            color: white;
            text-align: center;
            position: absolute;
            top: 30px;
            left: 50%;
            transform: translateX(-50%);
            z-index: 1;
            width: 100%;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
            /* Text shadow for better visibility */
        }

        .glass-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(255, 255, 255, 0.2);
            /* Lighter glass effect */
            backdrop-filter: blur(10px);
            /* Glass effect */
            border-radius: 8px;
            z-index: -1;
        }
    </style>
</head>

<body>
    <div class="title">Employee Leave Management System</div>
    <div class="login-container">
        <div class="glass-overlay"></div>
        <div class="logo">
            <img src="{{ asset('img/logo.png') }}" alt="Company Logo" style="max-width: 100%;">
        </div>

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group">
                <input id="username" type="text" class="form-control" name="User_name" placeholder="Username"
                    value="{{ old('User_name') }}" required autofocus>
            </div>
            <div class="form-group">
                <input id="password" type="password" class="form-control" name="password" placeholder="Password"
                    required>
            </div>
            <button type="submit" class="btn btn-login">Login</button>
        </form>
        <div class="forgot-password">
            <a href="{{ route('password.request') }}">Forgot Password?</a>
        </div>
        <div class="footer-text mt-4">
            &copy; 2024 Employee Leave Management System
        </div>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
    <!-- Include Bootstrap JS for any additional functionality -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>