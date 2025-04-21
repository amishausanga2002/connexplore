<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <style>
        body {
            background: linear-gradient(rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0.75)),
                        url('{{ asset('images/bg.webp') }}') no-repeat center center fixed;
            background-size: cover;
        }

        .sidebar {
    background-color: #2d3748; /* Matching the navbar color */
    color: white;
    padding: 40px 20px 20px 20px; /* Increased top padding to make the sidebar taller from the top */
    height: auto; /* Adjust height of sidebar based on content */
    width: 250px;
    margin-top: auto; /* Increased margin to create more space between navbar and sidebar */
}


        .sidebar a {
            color: white;
            text-decoration: none;
            padding: 12px;
            font-weight: bold;
            display: block;
            margin-bottom: 10px;
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .sidebar a:hover {
            background-color: #3182ce; /* Hover effect with Tailwind Blue */
            color: white;
        }

        .content {
            padding: 20px;
            margin-left: 270px; /* Adjust to leave space for the sidebar */
        }

        .navbar {
            background-color: #2d3748; /* Same color as sidebar */
        }

    </style>

    <!-- Navbar -->
    <nav class="navbar p-4 shadow-md">
        <div class="container mx-auto flex items-center justify-between">
            <div class="flex items-center space-x-4">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-10">
                <div class="text-white text-2xl font-semibold">Connexplore System - User Dashbaord</div>
            </div>
            <div class="flex items-center space-x-4">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn btn-light">Logout</button>
                </form>
            </div>
        </div>
    </nav>
    <div class="container mx-auto px-4 py-8">
<body>

    <div class="container mx-auto py-8">
        <h2 class="text-2xl md:text-3xl font-bold text-center text-gray-800 mb-6">
            Edit Profile
        </h2>

        <div class="max-w-xl mx-auto bg-white shadow-lg rounded-lg p-6">
            <form action="{{ route('profiles.update') }}" method="POST">
                @csrf
                @method('PUT')

                {{-- Error Messages --}}
                @if ($errors->any())
                    <div class="mb-4 bg-red-50 border-l-4 border-red-400 text-red-700 px-4 py-3 rounded">
                        <strong>Please fix the following errors:</strong>
                        <ul class="mt-2 list-disc list-inside">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                {{-- Bio Field --}}
                <div class="mb-4">
                    <label for="bio" class="block text-gray-700 font-medium">Bio</label>
                    <textarea name="bio" id="bio" class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-indigo-500" rows="4" required>{{ old('bio', $profile->bio) }}</textarea>
                </div>

                {{-- Interests Field --}}
                <div class="mb-4">
                    <label for="interests" class="block text-gray-700 font-medium">Interests</label>
                    <textarea name="interests" id="interests" class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-indigo-500" rows="4" required>{{ old('interests', $profile->interests) }}</textarea>
                </div>

                {{-- Submit Button --}}
                <button type="submit" class="w-full bg-indigo-600 text-white font-semibold py-2 rounded-md hover:bg-indigo-700 transition duration-300">
                    Update Profile
                </button>

                {{-- Dashboard Button --}}
                <div class="mt-4 text-center">
                    <a href="{{ route('dashboard') }}" class="inline-block bg-gray-600 hover:bg-gray-700 text-white py-2 px-4 rounded-md transition duration-300">
                        Go to Dashboard
                    </a>
                </div>
            </form>
        </div>
    </div>




</body>
</html>