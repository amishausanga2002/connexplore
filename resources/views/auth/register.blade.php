<!-- resources/views/auth/register.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Connexplore</title>

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
            max-width: 500px;
        }
        .form-input {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: none;
            margin-top: 8px;
            margin-bottom: 15px;
            font-size: 16px;
        }
        .btn-register {
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
        .btn-register:hover {
            background-color: #218838;
        }
        a.login-link {
            color: #ddd;
            text-decoration: underline;
            font-size: 16px;
        }
        .form-label {
            font-size: 14px;
        }
    </style>
</head>
<body>

<div class="form-container">
    <h1 style="text-align: center; margin-bottom: 20px; font-size: 28px; font-weight: bold;">Register | Connexplore</h1>

    
    @if ($errors->has('email'))
        <div style="background-color: rgba(255,0,0,0.3); padding:10px; border-radius:5px; margin-bottom:10px;">
            {{ $errors->first('email') }}
        </div>
    @endif

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div>
            <label for="name" class="form-label">Name</label>
            <input id="name" class="form-input" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" />
        </div>

        <div>
            <label for="email" class="form-label">Email</label>
            <input id="email" class="form-input" type="email" name="email" value="{{ old('email') }}" required autocomplete="username" />

        </div>

        <div>
            <label for="password" class="form-label">Password</label>
            <input id="password" class="form-input" type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" />
        </div>

        <div>
            <label for="password_confirmation" class="form-label">Confirm Password</label>
            <input id="password_confirmation" class="form-input" type="password" name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" />
        </div>

        <div style="margin-top: 15px; text-align: right;">
            <a class="login-link" href="{{ route('login') }}">Already registered?</a>
        </div>

        <br>
        <button type="submit" class="btn-register">Register</button>
    </form>
</div>

</body>
</html>