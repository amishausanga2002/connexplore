<!DOCTYPE html>
<html lang="en" class="flex flex-col min-h-screen">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connex Explore</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">



</head>
<style>
    body {
        background: linear-gradient(rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0.75)),
                    url('{{ asset('images/bg.webp') }}') no-repeat center center fixed;
        background-size: cover;
    }
</style>


<body class="flex flex-col flex-1 bg-gray-900 text-gray-100">
    <header class="bg-gray-800 p-4 shadow-lg fixed top-0 w-full z-50">
        <div class="container mx-auto flex justify-between items-center">
            <a href="{{ url('/') }}" class="flex items-center text-xl font-bold text-white">
                <img src="{{ asset('images/logo.png') }}" alt="Site Logo" class="mr-3 h-8 w-auto">Connexplore
            </a>
            <button id="menu-btn" class="text-white md:hidden focus:outline-none">
                <i class="fas fa-bars" id="menu-icon"></i>
            </button>
            <nav id="menu" class="hidden absolute bg-gray-800 md:bg-transparent md:relative md:flex w-full md:w-auto top-full left-0 z-10">
                <ul class="flex flex-col md:flex-row space-y-4 md:space-y-0 md:space-x-4 p-4 md:p-0">
                    <li><a href="{{ url('/index') }}" class= "text-white hover:text-gray-400">Home</a></li>
                    <li><a href="{{ route('users.about-us') }}" class="text-white hover:text-gray-400">About Us</a></li>
                    <li><a href="{{ route('users.sports-page') }}" class="text-white hover:text-gray-400">Sports</a></li>
                    <li><a href="{{ route('users.events') }}" class="text-white hover:text-gray-400">Events</a></li>
                    <li><a href="{{ route('users.contact') }}" class="text-white hover:text-gray-400">Contact Us</a></li>
                    <li><a href="{{ route('dashboard') }}" class="text-white hover:text-gray-400">Dashboard</a></li>
                </ul>
            </nav>
        </div>
    </header>
<br><br>
<main class="container mx-auto p-4">
    <h1 class="text-3xl font-bold mb-6 text-center text-white">2025 Sports Events</h1>
    <div class="flex flex-wrap justify-center gap-6">
        <!-- Event Card 1 -->
        <div class="bg-gradient-to-r from-gray-800 via-gray-700 to-gray-800 p-6 rounded-lg shadow-xl transform hover:scale-105 transition duration-300">
            <h3 class="text-2xl font-semibold mb-2 text-blue-400">Chess Tournament</h3>
            <p class="text-gray-300"><strong>Date:</strong> February 10, 2025</p>
            <p class="text-gray-300"><strong>Time:</strong> 10:00 AM - 4:00 PM</p>
            <p class="text-gray-300"><strong>Venue:</strong> APIIT City Campus</p>
            <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded mt-4">Register Now</button>
        </div>
        <!-- Event Card 2 -->
        <div class="bg-gradient-to-r from-gray-800 via-gray-700 to-gray-800 p-6 rounded-lg shadow-xl transform hover:scale-105 transition duration-300">
            <h3 class="text-2xl font-semibold mb-2 text-blue-400">Futsal Championship</h3>
            <p class="text-gray-300"><strong>Date:</strong> March 15, 2025</p>
            <p class="text-gray-300"><strong>Time:</strong> 9:00 AM - 3:00 PM</p>
            <p class="text-gray-300"><strong>Venue:</strong> Futsal Park</p>
            <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded mt-4">Register Now</button>
        </div>
        <!-- Event Card 3 -->
        <div class="bg-gradient-to-r from-gray-800 via-gray-700 to-gray-800 p-6 rounded-lg shadow-xl transform hover:scale-105 transition duration-300">
            <h3 class="text-2xl font-semibold mb-2 text-blue-400">Carrom Face-off</h3>
            <p class="text-gray-300"><strong>Date:</strong> April 21, 2025</p>
            <p class="text-gray-300"><strong>Time:</strong> 12:00 PM - 5:00 PM</p>
            <p class="text-gray-300"><strong>Venue:</strong> APIIT Lounge</p>
            <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded mt-4">Register Now</button>
        </div>
        <!-- Event Card 4 -->
        <div class="bg-gradient-to-r from-gray-800 via-gray-700 to-gray-800 p-6 rounded-lg shadow-xl transform hover:scale-105 transition duration-300">
            <h3 class="text-2xl font-semibold mb-2 text-blue-400">Pool Tournament</h3>
            <p class="text-gray-300"><strong>Date:</strong> June 10, 2025</p>
            <p class="text-gray-300"><strong>Time:</strong> 1:00 PM - 6:00 PM</p>
            <p class="text-gray-300"><strong>Venue:</strong> APIIT Recreation Hall</p>
            <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded mt-4">Register Now</button>
        </div>
        <!-- Event Card 5 -->
        <div class="bg-gradient-to-r from-gray-800 via-gray-700 to-gray-800 p-6 rounded-lg shadow-xl transform hover:scale-105 transition duration-300">
            <h3 class="text-2xl font-semibold mb-2 text-blue-400">Table Tennis Match</h3>
            <p class="text-gray-300"><strong>Date:</strong> July 8, 2025</p>
            <p class="text-gray-300"><strong>Time:</strong> 2:00 PM - 7:00 PM</p>
            <p class="text-gray-300"><strong>Venue:</strong> APIIT Sports Arena</p>
            <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded mt-4">Register Now</button>
        </div>
        <!-- Event Card 6 -->
        <div class="bg-gradient-to-r from-gray-800 via-gray-700 to-gray-800 p-6 rounded-lg shadow-xl transform hover:scale-105 transition duration-300">
            <h3 class="text-2xl font-semibold mb-2 text-blue-400">Card Games Night</h3>
            <p class="text-gray-300"><strong>Date:</strong> August 20, 2025</p>
            <p class="text-gray-300"><strong>Time:</strong> 6:00 PM - Midnight</p>
            <p class="text-gray-300"><strong>Venue:</strong> APIIT Cafeteria</p>
            <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded mt-4">Register Now</button>
        </div>
    </div>
</main>
<br><br><br><br><br>
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
            <!-- Partner Logos -->
            <div class="flex justify-center space-x-4 flex-wrap">
                <img src="{{ asset('images/staf.png') }}" alt="University of Staffordshire" class="h-24 mb-4 md:mb-0">
                <img src="{{ asset('images/APIIT.png') }}" alt="Asian Institute of Technology" class="h-24 mb-4 md:mb-0">
                <img src="{{ asset('images/NCUK.png') }}" alt="NCUK" class="h-24 mb-4 md:mb-0">
                <img src="{{ asset('images/Southencross.png') }}" alt="Southern Cross University" class="h-24">
            </div>
        </div>
        <!-- Second Row: Contact Information and Subscription Form -->
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
            <!-- Subscription Form -->
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
<script>
document.addEventListener('DOMContentLoaded', function () {
        const menuBtn = document.getElementById('menu-btn');
        const menu = document.getElementById('menu');

        menuBtn.addEventListener('click', function () {
            menu.classList.toggle('hidden');
        });
    });
</script>
</html>
