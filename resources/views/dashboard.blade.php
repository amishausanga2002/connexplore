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
        <!-- Welcome Card -->
        <div class="p-6 bg-gradient-to-r from-blue-600 to-blue-800 text-white rounded-lg shadow-lg">
            <h2 class="text-3xl font-semibold mb-2">Welcome, {{ Auth::user()->name }}!</h2>
            <p class="text-lg">Here are your account details:</p>

            <div class="mt-4 space-y-1">
                <p><strong>Name:</strong> {{ Auth::user()->name }}</p>
                <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
            </div>
        </div>

        <!-- Spacer -->
        <div class="my-8 border-t border-gray-300"></div>

        <!-- Profile Section -->
        @php
            $userProfile = \App\Models\UserProfile::where('user_id', auth()->id())->first();
        @endphp
        @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

        <div class="p-6 bg-white rounded-lg shadow-md">
            <h3 class="text-2xl font-semibold text-gray-800 mb-4">Your Profile</h3>

            @if ($userProfile)
                <div class="space-y-4">
                    <div>
                        <h4 class="text-lg font-medium text-gray-700">Bio:</h4>
                        <p class="text-gray-600">{{ $userProfile->bio }}</p>
                    </div>

                    <div>
                        <h4 class="text-lg font-medium text-gray-700">Interests:</h4>
                        <p class="text-gray-600">{{ $userProfile->interests }}</p>
                    </div>

                    <a href="{{ route('profiles.edit') }}"
                    class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">
                    Edit Profile
                 </a>

                </div>
            @else
                <p class="text-gray-600 mb-4">You haven't set up your profile yet.</p>
                <a href="{{ route('profiles.create') }}"
                   class="inline-block bg-green-600 hover:bg-green-700 text-white font-semibold py-2 px-4 rounded transition duration-200">
                    Create Profile
                </a>
            @endif
        </div>
    </div>



        <div class="flex justify-around mt-6 space-x-4">
            <!-- Landing Page Link -->
            <a href="{{ url('/index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded-lg shadow-md transition duration-200 ease-in-out transform hover:scale-105">
                Go to Home Page
            </a>

            <a href="{{ route('bookings.my') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded-lg shadow-md transition duration-200 ease-in-out transform hover:scale-105">
                My Bookings
            </a>

            <a href="{{ route('user-damage-report.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded-lg shadow-md transition duration-200 ease-in-out transform hover:scale-105">
                Report Equipment Damage/Loss
            </a>

            <a href="{{ route('user-damage-report.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded-lg shadow-md transition duration-200 ease-in-out transform hover:scale-105">
                    View submited Equipment Damage/Loss Reports
            </a>






        </div>
        <br><br>

        <footer class="bg-black py-3">
            <div class="container mx-auto px-4">
                <div class="flex flex-col md:flex-row justify-between items-center mb-4">
                    <div class="flex justify-center space-x-4 mb-4 md:mb-0">
                        <a href="https://x.com/apiitsl?lang=en" class="text-gray-400 hover:text-gray-200" target="_blank" rel="noopener noreferrer">
                            <i class="fab fa-twitter fa-lg"></i>
                        </a>
                        <a href="https://www.facebook.com/APIITofficial" class="text-gray-400 hover:text-gray-200" target="_blank" rel="noopener noreferrer">
                            <i class="fab fa-facebook fa-lg"></i>
                        </a>
                        <a href="https://www.youtube.com/@APIITedu" class="text-gray-400 hover:text-gray-200" target="_blank" rel="noopener noreferrer">
                            <i class="fab fa-youtube fa-lg"></i>
                        </a>
                        <a href="https://www.linkedin.com/company/apiitsl" class="text-gray-400 hover:text-gray-200" target="_blank" rel="noopener noreferrer">
                            <i class="fab fa-linkedin fa-lg"></i>
                        </a>
                        <a href="https://www.instagram.com/apiitsl/" class="text-gray-400 hover:text-gray-200" target="_blank" rel="noopener noreferrer">
                            <i class="fab fa-instagram fa-lg"></i>
                        </a>
                    </div>
                    <div class="flex justify-center space-x-4 flex-wrap">
                        <img src="{{ asset('images/staf.png') }}" alt="University of Staffordshire" class="h-24 mb-4 md:mb-0">
                        <img src="{{ asset('images/APIIT.png') }}" alt="Asian Institute of Technology" class="h-24 mb-4 md:mb-0">
                        <img src="{{ asset('images/NCUK.png') }}" alt="NCUK" class="h-24 mb-4 md:mb-0">
                        <img src="{{ asset('images/Southencross.png') }}" alt="Southern Cross University" class="h-24">
                    </div>
                </div>
                <div class="flex flex-col md:flex-row justify-around text-gray-300 text-center md:text-left">
                    <div class="mb-4 md:mb-0">
                        <h4 class="text-white text-lg font-semibold">APIIT City Campus</h4>
                        <address>
                            388, Union Place,<br>
                            Colombo 2, Sri Lanka.
                        </address>
                        <p>📞 +94 76 967 9448 - Chamalka</p>
                        <p>📞 +94 76 858 3708 - Gihani</p>
                        <p>📞 +94 77 753 5393 - Bimbisha</p>
                    </div>
                    <div class="mb-4 md:mb-0">
                        <h4 class="text-white text-lg font-semibold mb-2">Subscribe to get new offers, tournaments, etc.</h4>
                        <form onsubmit="event.preventDefault(); this.email.value='';">
                            <input type="email" name="email" placeholder="Your email" class="text-gray-800 px-4 py-2 rounded-l-lg focus:outline-none" required>
                            <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-r-lg">Subscribe</button>
                        </form>
                    </div>
                    <div>
                        <h4 class="text-white text-lg font-semibold">APIIT Law School</h4>
                        <address>
                            278, 3rd Floor, Access Towers,<br>
                            Colombo 2, Sri Lanka.
                        </address>
                        <p>📞 +94 76 967 9448 - Chamalka</p>
                        <p>📞 +94 76 858 3708 - Gihani</p>
                        <p>📞 +94 77 753 5393 - Bimbisha</p>
                    </div>
                </div>
            </div>
        </footer>

    </div>
</body>
</html>



