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
<!-- Contact Us Section -->
<main class="container mx-auto py-10">
    <h1 class="text-3xl font-bold text-center text-white mb-10">Contact Us</h1>

    <!-- Campuses Information -->
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <!-- Updated City Campus Card -->
            <div class="bg-gray-800 bg-opacity-50 text-white p-4 rounded-lg shadow-md flex flex-col items-center">
                <h2 class="text-lg font-bold mb-2 text-white">City Campus</h2>
                <p class="text-gray-300 mb-1">388, Union Place,<br>Colombo 2, Sri Lanka.</p>
                <p class="text-gray-300 mb-1"><strong>📞</strong> +94 76 967 9448 - Chamalka</p>
                <p class="text-gray-300 mb-1"><strong>📞</strong> +94 76 858 3708 - Gihani</p>
                <p class="text-gray-300 mb-1"><strong>📞</strong> +94 77 753 5393 - Bimbisha</p>
                <p class="text-gray-300 mb-2"><strong>✉️</strong> info@apiit.lk</p>
                <p class="text-gray-300 mb-2"><strong>Opening Hours:</strong> Weekdays: 9 AM - 5 PM,<br><center> Weekends: 10 AM - 5 PM</center></p>
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3153.0862381704137!2d79.860832!3d6.927079!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae25944b8fb14d7%3A0xd48e0c6c4316340f!2sUnion%20Place!5e0!3m2!1sen!2slk!4v1612255475641!5m2!1sen!2slk"
                    width="100%" height="350" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>

            <!-- Updated Law School Card -->
            <div class="bg-gray-800 bg-opacity-50 text-white p-4 rounded-lg shadow-md flex flex-col items-center">
                <h2 class="text-lg font-bold mb-2 text-white">Law School</h2>
                <p class="text-gray-300 mb-1">278, 3rd Floor, Access Towers,<br>Colombo 2, Sri Lanka.</p>
                <p class="text-gray-300 mb-1"><strong>📞</strong> +94 76 967 9448 - Chamalka</p>
                <p class="text-gray-300 mb-1"><strong>📞</strong> +94 76 858 3708 - Gihani</p>
                <p class="text-gray-300 mb-1"><strong>📞</strong> +94 77 753 5393 - Bimbisha</p>
                <p class="text-gray-300 mb-2"><strong>✉️</strong> info@apiit.lk</p>
                <p class="text-gray-300 mb-2"><strong>Opening Hours:</strong> Weekdays: 9 AM - 5 PM,<br> <center> Weekends: 10 AM - 5 PM</center></p>
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3153.0862381704137!2d79.860832!3d6.927079!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae25944b8fb14d7%3A0xd48e0c6c4316340f!2sUnion%20Place!5e0!3m2!1sen!2slk!4v1612255475641!5m2!1sen!2slk"
                    width="100%" height="350" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>






        <br><br>

         <!-- Inquiry Form -->
         <div class="bg-white bg-opacity-50 p-8 rounded-lg shadow-lg max-w-lg mx-auto">
            <h2 class="text-2xl font-bold text-gray-800 mb-6">Get in Touch</h2>
            <form action="{{ url('/submit-contact') }}" method="POST">
                @csrf
                <div class="mb-6">
                    <label for="inquiry-type" class="block text-gray-700 font-bold mb-2">Inquiry Type</label>
                    <select id="inquiry-type" name="inquiry-type"
                        class="w-full border border-gray-300 rounded py-2 px-3 focus:outline-none focus:border-blue-500">
                        <option value="business">Business</option>
                        <option value="law">Law</option>
                        <option value="computing">Computing</option>
                        <option value="general">General Inquiry</option>
                    </select>
                </div>
                <div class="mb-6">
                    <label for="name" class="block text-gray-700 font-bold mb-2">Name</label>
                    <input type="text" id="name" name="name" placeholder="Your Full Name"
                        class="w-full border border-gray-300 rounded py-2 px-3 focus:outline-none focus:border-blue-500">
                </div>
                <div class="mb-6">
                    <label for="email" class="block text-gray-700 font-bold mb-2">Email</label>
                    <input type="email" id="email" name="email" placeholder="Your Email"
                        class="w-full border border-gray-300 rounded py-2 px-3 focus:outline-none focus:border-blue-500">
                </div>
                <div class="mb-6">
                    <label for="phone" class="block text-gray-700 font-bold mb-2">Phone Number</label>
                    <input type="tel" id="phone" name="phone" placeholder="Your Phone Number"
                        class="w-full border border-gray-300 rounded py-2 px-3 focus:outline-none focus:border-blue-500">
                </div>
                <div class="mb-6">
                    <label for="query" class="block text-gray-700 font-bold mb-2">Your Query</label>
                    <textarea id="query" name="query" placeholder="Type your message..." rows="4"
                        class="w-full border border-gray-300 rounded py-2 px-3 focus:outline-none focus:border-blue-500"></textarea>
                </div>
                <button type="submit"
                    class="w-full bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none">
                    Submit
                </button>
            </form>
        </div>

</main>

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
