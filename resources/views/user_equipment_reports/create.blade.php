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
<body>
<br>
<div class="container mx-auto max-w-4xl mt-5 p-6 bg-white shadow-lg rounded">
    <h2 class="text-2xl font-semibold mb-5 text-center">Equipment Damage/Loss Reporting Form</h2>

    @if(session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('user-damage-report.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- CB Number -->
        <div class="mb-4">
            <label for="cb_number" class="form-label block text-gray-700 text-sm font-bold mb-2">CB Number</label>
            <input type="text" name="cb_number" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" required>
        </div>

        <!-- Incident Information -->
        <h3 class="text-lg font-semibold mt-4 mb-2">Incident Information</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="mb-4">
                <label for="incident_date" class="form-label">Incident Date</label>
                <input type="date" name="incident_date" class="form-control" required>
            </div>
            <div class="mb-4">
                <label for="incident_time" class="form-label">Time of Incident</label>
                <input type="time" name="incident_time" class="form-control" required>
            </div>
            <div class="mb-4">
                <label for="reported_on" class="form-label">Reported On</label>
                <input type="date" name="reported_on" class="form-control" required>
            </div>
            <div class="mb-4">
                <label for="location" class="form-label">Location</label>
                <input type="text" name="location" class="form-control" required>
            </div>
        </div>

        <!-- Equipment Information -->
        <h3 class="text-lg font-semibold mt-4 mb-2">Equipment Information</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="mb-4">
                <label for="sport_name" class="form-label">Sport Name</label>
                <input type="text" name="sport_name" class="form-control" required>
            </div>
            <div class="mb-4">
                <label for="equipment_name" class="form-label">Equipment Name</label>
                <input type="text" name="equipment_name" class="form-control" required>
            </div>
        </div>

        <!-- Description -->
        <div class="mb-4">
            <label for="loss_description" class="form-label block text-gray-700 text-sm font-bold mb-2">Description of Loss/Damage/Stolen</label>
            <textarea name="loss_description" class="form-control resize-none" rows="4" required></textarea>
        </div>

        <!-- Image Upload -->
        <div class="mb-4">
            <label for="image" class="form-label">Attach Image (optional)</label>
            <input type="file" name="image" class="form-control-file">
        </div>

        <!-- Submit Button -->
        <div class="flex justify-center mt-6">
            <button type="submit" class="btn btn-primary px-6 py-2 rounded font-semibold">
                Submit Report
            </button>
        </div>
    </form>
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
</body>
</html>