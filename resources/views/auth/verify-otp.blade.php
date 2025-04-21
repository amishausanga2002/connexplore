<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OTP Verification | Connexplore</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f7fc;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .form-container {
            background-color: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            box-sizing: border-box;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 24px;
            color: #333;
            font-weight: bold;
        }

        .form-label {
            display: block;
            margin-bottom: 8px;
            font-size: 14px;
            color: #555;
        }

        .form-input {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            color: #333;
            box-sizing: border-box;
        }

        .form-input:focus {
            outline: none;
            border-color: #007BFF;
        }

        .btn-register {
            width: 100%;
            padding: 14px;
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn-register:hover {
            background-color: #0056b3;
        }

        .error-message {
            background-color: rgba(255, 0, 0, 0.1);
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 15px;
            color: red;
            font-size: 14px;
            text-align: center;
        }

        @media (max-width: 480px) {
            .form-container {
                padding: 20px;
                width: 90%;
            }

            h1 {
                font-size: 22px;
            }

            .form-input, .btn-register {
                font-size: 14px;
            }
        }
    </style>
</head>
<body>

<div class="form-container">
    <h1>Verify OTP</h1>

    @if ($errors->has('otp'))
        <div class="error-message">
            {{ $errors->first('otp') }}
        </div>
    @endif

    <form method="POST" action="{{ route('verifyOtp') }}">
        @csrf

        <div>
            <label for="otp" class="form-label">OTP</label>
            <input id="otp" class="form-input" type="text" name="otp" required autocomplete="off" />
        </div>

        <button type="submit" class="btn-register">Verify OTP</button>
    </form>
</div>

</body>
</html>
