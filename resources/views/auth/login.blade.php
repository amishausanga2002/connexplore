<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Connexplore</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)),
                        url('{{ asset('images/bg.webp') }}') no-repeat center center fixed;
            background-size: cover;
            color: #ffffff;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            margin: 0;
        }
        .form-container {
            background: rgba(255,255,255,0.1);
            backdrop-filter: blur(10px);
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.5);
            width: 100%;
            max-width: 400px;
        }
        .form-input {
            width: 100%;
            padding: 14px;
            border-radius: 5px;
            border: none;
            margin-top: 8px;
            margin-bottom: 15px;
            font-size: 16px;
        }
        .btn-login {
            width: 100%;
            background-color: #28a745;
            color: white;
            padding: 14px;
            border-radius: 5px;
            border: none;
            cursor: pointer;
            transition: 0.3s;
            font-size: 16px;
        }
        .btn-login:hover {
            background-color: #218838;
        }
        a.forgot-password {
            color: #ddd;
            text-decoration: underline;
            font-size: 16px;
        }
        .remember-label {
            font-size: 16px;
            display: inline-flex;
            align-items: center;
            color: #ddd;
        }
    </style>
</head>
<body>

<div class="form-container">
    <h1 style="text-align: center; margin-bottom: 20px; font-size: 28px; font-weight: bold;">Login Form | Connexplore</h1>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <label for="email" style="font-size:16px;">Email</label>
            <input id="email" class="form-input" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" />
        </div>

        <!-- Password -->
        <div>
            <label for="password" style="font-size:16px;">Password</label>
            <input id="password" class="form-input" type="password" name="password" required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" />
        </div>

        <!-- Remember Me -->
        <div>
            <label class="remember-label">
                <input id="remember_me" type="checkbox" name="remember">
                <span style="margin-left: 8px;">Remember me</span>
            </label>
        </div>

        <div style="margin-top: 15px; text-align: right;">
            @if (Route::has('password.request'))
                <a class="forgot-password" href="{{ route('password.request') }}">Forgot your password?</a>
            @endif
        </div>

        <br>

        <button type="submit" class="btn-login">Log in</button>
    </form>
</div>

</body>
</html>
