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
                <div class="text-white text-2xl font-semibold">Connexplore System - Admin Dashboard</div>
            </div>
            <div class="flex items-center space-x-4">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn btn-light">Logout</button>
                </form>
            </div>
        </div>
    </nav>
    <div class="sidebar">

        <a href="{{ route('sports.index') }}" class="bg-blue-500 hover:bg-blue-700 py-2 px-4 rounded">Manage Sports</a>
        <a href="{{route('equipment.index')}}" class="bg-blue-500 hover:bg-blue-700 py-2 px-4 rounded">Manage Equipments</a>
        <a href="{{ route('admin.bookings.index') }}" class="bg-blue-500 hover:bg-blue-700 py-2 px-4 rounded">Manage Bookings</a>
        <a href="{{ route('damage-reports.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 rounded">
            Manage Equipment Damage/Loss Reports
        </a>

        <a href="{{route('damage-reports.index')}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            View Damage/Loss Reports
        </a>
        <a href="{{ route('emails.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Manage Emails
        </a>



    </div>

</body>
<br><br><br><br><br><br><br><br><br>
<!-- Footer -->
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
</html>