<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
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
                <div class="text-white text-2xl font-semibold">Connexplore System</div>
            </div>
            <div class="flex items-center space-x-4">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn btn-light">Logout</button>
                </form>
            </div>
        </div>
    </nav>
    <br>
    <center>
        <h1 class="text-4xl text-white font-semibold">Sport Creation Form</h1>
    </center>
    <br>
    <form method="POST" action="{{ route('sports.store') }}" enctype="multipart/form-data" class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow-lg">
        @csrf
        @method('POST')

        <!-- Success Message -->
        @if (session('success'))
            <div class="alert alert-success text-center font-semibold text-white bg-green-500 p-2 rounded-lg mb-4">
                {{ session('success') }}
            </div>
        @endif

        <!-- Location Dropdown -->
        <div class="mb-4">
            <label for="location_id" class="block text-gray-700 font-semibold mb-2">Location</label>
            <select name="location_id" id="location_id" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                <option value="">Select a location</option>
                @foreach ($locations as $location)
                    <option value="{{ $location->id }}">{{ $location->branch }}</option>
                @endforeach
            </select>
        </div>

        <!-- Name Input -->
        <div class="mb-4">
            <label for="name" class="block text-gray-700 font-semibold mb-2">Name</label>
            <input type="text" name="name" id="name" placeholder="Enter sport name" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>


        <!-- Max Players Input -->
        <div class="mb-4">
            <label for="max_players" class="block text-gray-700 font-semibold mb-2">Max Players</label>
            <input type="number" name="max_players" id="max_players" placeholder="Enter max players" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <!-- Min Players Input -->
        <div class="mb-4">
            <label for="min_players" class="block text-gray-700 font-semibold mb-2">Min Players</label>
            <input type="number" name="min_players" id="min_players" placeholder="Enter min players" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <!-- Image Input -->
        <div class="mb-4">
            <label for="image" class="block text-gray-700 font-semibold mb-2">Image</label>
            <input type="file" name="image" id="image" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <!-- Submit Button -->
        <div class="mb-4">
            <input type="submit" value="Save the new sport" class="w-full bg-blue-600 text-white p-3 rounded-lg font-semibold hover:bg-blue-700 transition duration-200">
        </div>
    </form>

    <div class="mt-4 text-center">
        <a href="{{ route('sports.index') }}" class="py-2 px-4 rounded-lg bg-blue-600 hover:bg-blue-700 text-white">Back to Sports</a>
    </div>
    <div class="mt-4 text-center">
        <a href="{{ route('admin') }}" class="py-2 px-4 rounded-lg bg-blue-600 hover:bg-blue-700 text-white">Back to Admin Dashboard</a>
    </div>
    <br>
    <footer class="bg-black py-3">
        <div class="container mx-auto px-4">
            <!-- First Row: Social Media Icons and Partner Logos -->
            <div class="flex flex-col md:flex-row justify-between items-center mb-4">
                <!-- Social Media Icons -->
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
                <!-- APIIT Logo -->
                <div class="flex justify-center mb-4 md:mb-0">
                    <img src="{{ asset('images/apiitlogo.jpg') }}" alt="APIIT Logo" class="h-24">
                </div>
                <!-- Partner Logos -->
                <div class="flex justify-center space-x-4 flex-wrap">
                    <img src="{{ asset('images/staf.png') }}" alt="University of Staffordshire" class="h-24 mb-4 md:mb-0">
                    <img src="{{ asset('images/APIIT.png') }}" alt="Asian Institute of Technology" class="h-24 mb-4 md:mb-0">
                    <img src="{{ asset('images/NCUK.png') }}" alt="NCUK" class="h-24 mb-4 md:mb-0">
                    <img src="{{ asset('images/Southencross.png') }}" alt="Southern Cross University" class="h-24">
                </div>
            </div>

        </div>
    </footer>
</body>
</html>