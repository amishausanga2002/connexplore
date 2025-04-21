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
<br><br>
<body>


    <h2 class="text-white text-4xl font-bold text-center">
        Available Equipments
    </h2>
</div>
<div>
    @if(session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg relative mb-4" role="alert">
        <strong class="font-bold">Success! 🎉</strong>
        <span class="block sm:inline">{{ session('success') }}</span>
    </div>
    @endif
    <div>
        <table class="table-auto w-full max-w-4xl mx-auto mt-4 border-collapse text-black">
            <thead class="bg-blue-600 text-white">
                <tr>
                    <th class="px-4 py-2">Name</th>
                    <th class="px-4 py-2">Sport</th>
                    <th class="px-4 py-2">Location</th>
                    <th class="px-4 py-2">Set</th>
                    <th class="px-4 py-2">Availability Status</th>
                    <th class="px-4 py-2">Image</th>
                    <th class="px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody class="overflow-y-auto max-h-72">
                @foreach($equipments as $equipment)
                    <tr class="border-b bg-white">
                        <td class="px-4 py-2 text-black">{{ $equipment->name }}</td>
                        <td class="px-4 py-2 text-black">{{ $equipment->sport->name ?? 'No Sport Assigned' }}</td>
                        <td class="px-4 py-2 text-black">{{ $equipment->location->branch ?? 'No location set' }}</td>
                        <td class="px-4 py-2 text-black">{{ $equipment->set }}</td>
                        <td class="px-4 py-2 text-black">{{ ucfirst($equipment->availability_status) }}</td>
                        <td class="px-4 py-2 text-black">
                            @if($equipment->image)
                                <img src="{{ asset('storage/' . $equipment->image) }}" alt="Equipment Image" width="100">
                            @else
                                No image available
                            @endif
                        </td>
                        <td class="px-4 py-2 text-black">
                            <div class="flex space-x-4">
                                <!-- Edit button -->
                                <a href="{{ route('equipment.edit', $equipment) }}" class="text-xl text-yellow-600 hover:text-yellow-700">
                                    ✏️
                                </a>

                                <!-- Delete button -->
                                <form method="POST" action="{{ route('equipment.destroy', $equipment) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-xl text-red-600 hover:text-red-700" onclick="return confirm('Are you sure you want to delete this equipment?')">
                                        ❌
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="flex justify-end space-x-4 mt-4">
        <a href="{{ route('equipment.create') }}" class="bg-blue-800 hover:bg-blue-900 text-white font-bold py-2 px-4 rounded-lg shadow-md">
            Create Equipment
        </a>

        <a href="{{ route('admin') }}" class="bg-blue-800 hover:bg-blue-900 text-white py-2 px-4 rounded-lg shadow-md">
            Go to Admin Dashboard
        </a>
    </div>
</div>






<br><br><br><br><br><br><br><br><br><br><br><br>
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