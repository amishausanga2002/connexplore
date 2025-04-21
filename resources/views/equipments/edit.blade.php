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



    <br>
    <center>
        <h1 class="text-4xl text-white font-semibold">Equipment Update Form</h1>
    </center>
    <br>



    <form method="POST" action="{{ route('equipment.update', ['equipment' => $equipment->id]) }}" enctype="multipart/form-data" class="max-w-2xl mx-auto p-6 bg-white rounded-lg shadow-md">
        @csrf
        @method('put')

         <!-- Sport Dropdown -->
         <div class="mb-4">
            <label for="sport_id" class="block text-gray-700 font-semibold mb-2">Sport</label>
            <select name="sport_id" id="sport_id" class="form-control">
                <option value="">Select Sport</option>
                @foreach($sports as $sport)
                    <option value="{{ $sport->id }}"
                        {{ (old('sport_id', $equipment->sport_id ?? '') == $sport->id) ? 'selected' : '' }}>
                        {{ $sport->name }}
                    </option>
                @endforeach
            </select>
        </div>



        <div class="mb-4">
            <label for="name" class="block text-lg font-semibold">Name</label>
            <input type="text" name="name" id="name" value="{{ $equipment->name }}" class="w-full p-3 mt-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <!-- Dropdown for selecting location from database -->
        <div class="mb-4">
            <label for="location_id" class="block text-lg font-semibold">Location</label>
            <select name="location_id" id="location_id" class="w-full p-3 mt-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                <option value="">Select a Location</option>
                @foreach($locations as $location)
                    <option value="{{ $location->id }}" {{ $equipment->location_id == $location->id ? 'selected' : '' }}>
                        {{ $location->branch }} <!-- Display the branch name -->
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="quantity" class="block text-lg font-semibold">Set</label>
            <input type="number" name="set" id="set" value="{{ $equipment->set }}" class="w-full p-3 mt-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>
        <div class="mb-4">
            <label for="availability_status" class="block text-gray-700 font-semibold mb-2">Availability Status</label>
            <select name="availability_status" id="availability_status" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                <option value="new" {{ old('availability_status', $equipment->availability_status ?? '') == 'new' ? 'selected' : '' }}>New</option>
                <option value="damaged" {{ old('availability_status', $equipment->availability_status ?? '') == 'damaged' ? 'selected' : '' }}>Damaged</option>
                <option value="under_maintenance" {{ old('availability_status', $equipment->availability_status ?? '') == 'under_maintenance' ? 'selected' : '' }}>Under Maintenance</option>
                <option value="available" {{ old('availability_status', $equipment->availability_status ?? '') == 'available' ? 'selected' : '' }}>Available</option>
                <option value="not_available" {{ old('availability_status', $equipment->availability_status ?? '') == 'not_available' ? 'selected' : '' }}>Not Available</option>
            </select>
        </div>


        <div class="mb-4">
            <label for="image" class="block text-lg font-semibold">Image</label>
            <input type="file" name="image" id="image" class="w-full p-3 mt-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            @if ($equipment->image)
                <img src="{{ asset('storage/' . $equipment->image) }}" alt="Current Image" class="mt-2" style="width: 100px;">
            @endif
        </div>

        <div class="mt-6">
            <input type="submit" value="Update Equipment" class="w-full py-3 bg-blue-600 text-white font-bold rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>
    </form>

    <div class="mt-4 text-center">
        <a href="{{ route('equipments.index') }}" class="py-2 px-4 rounded-lg bg-blue-600 hover:bg-blue-700 text-white">Back to Equipment List</a>
    </div>
    <div class="mt-4 text-center">
        <a href="{{ route('admin') }}" class="py-2 px-4 rounded-lg bg-blue-600 hover:bg-blue-700 text-white">Back to Admin Dashboard</a>
    </div>





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