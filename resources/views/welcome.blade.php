<!-- resources/views/welcome.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Connexplore</title>
</head>
<body style="background: linear-gradient(rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0.75)), url('{{ asset('images/bg.webp') }}') no-repeat center center fixed; background-size: cover; color: #ffffff; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; margin: 0; padding: 0;">

    <header style="width: 100%; max-width: 800px; margin: 0 auto; text-align: right ; padding-top: 20px;">
        @if (Route::has('login'))
        <nav style="display: inline-flex; gap: 10px; margin-right: -70px; padding-top: 10px">
            @auth
                <a href="{{ url('/dashboard') }}" style="padding: 8px 16px; border-radius: 5px; border: 2px solid #28a745; background-color: transparent; text-decoration: none; color: #28a745; transition: 0.3s;">
                    Dashboard
                </a>
            @else
                <a href="{{ route('login') }}" style="padding: 8px 16px; border-radius: 5px; border: 2px solid #28a745; background-color: transparent; text-decoration: none; color: #28a745; transition: 0.3s;">
                    Log in
                </a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" style="padding: 8px 16px; border-radius: 5px; border: 2px solid #28a745; background-color: transparent; text-decoration: none; color: #28a745; transition: 0.3s;">
                        Register
                    </a>
                @endif
            @endauth
        </nav>
        @endif
    </header>

    <main style="display: flex; align-items: center; justify-content: center; text-align: center; height: 75vh;">
        <div>
            <h1 style="font-size: 48px; font-weight: bold; text-shadow: 2px 2px 4px rgba(0,0,0,0.7); margin-bottom: 15px;">Welcome to Connexplore</h1>
            <p style="font-size: 20px;">APIIT Official Recreational Activities Booking System</p>
            <img src="{{ asset('images/apiitlogo.jpg') }}" alt="APIIT Logo" style="width:150px; height:auto; margin-top:20px;">
        </div>
    </main>


</body>
</html>