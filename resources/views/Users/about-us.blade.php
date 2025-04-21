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
<main class="container mx-auto p-4 flex-grow pt-24">


    <!-- Why We Are Making This Section -->
    <section class="bg-gray-800 bg-opacity-80 p-6 rounded-lg shadow-lg mb-8 mx-auto text-center" style="width: 70%;">
        <h2 class="text-2xl font-bold text-center text-gray-200 mb-6">
            Empowering Connections Through Sports and Recreation
        </h2>
        <p class="text-gray-300 text-lg leading-8">
            We are a team of sports enthusiasts dedicated to promoting active lifestyles and building connections through sports and recreation. Driven by our passion for collaboration, strategy, and personal growth, we believe sports are more than just games they’re opportunities to learn, bond, and achieve new heights together.
        </p>
        <p class="text-gray-300 text-lg leading-8 mt-4">
            As students, we understand the importance of balancing academics with recreation and the challenges that come with it. That’s why we developed this platform to simplify the process of accessing sports facilities, encourage participation in recreational activities, and foster a supportive community for all APIIT students.
        </p>
        <p class="text-gray-300 text-lg leading-8 mt-4">
            Our mission is to create an inclusive environment that celebrates the joy of sports while nurturing teamwork, strategy, and wellness. Together, let’s redefine the sports culture at APIIT and make every game a step towards building stronger connections and unforgettable memories.
        </p>
    </section>

    <!-- About Our Team Section -->
    <section>
        <h1 class="text-3xl font-bold text-center mb-6">About Our Team</h1>
        <div class="grid grid-cols-1 gap-8 place-items-center">
            <!-- Sameeha Fahim Card -->
            <div class="bg-gray-700 p-4 rounded-lg shadow-lg w-full max-w-md">
                <h2 class="text-lg font-semibold text-teal-400 text-center mb-2">Founder</h2>
                <img src="{{ asset('images/sameehaimg.jpeg') }}" alt="Sameeha Fahim" class="w-32 h-32 rounded-full mx-auto object-cover border-4 border-black">
                <h1 class="text-2xl font-bold mt-4 text-blue-500 text-center">Sameeha Fahim</h1>
                <h4 class="text-lg font-medium mt-2 text-gray-300 text-center">BSc (Hons) Cyber Security <br> Reading 2023 - Present</h4>
                <p class="text-sm text-gray-400 mt-4 text-center">
                    I’m a dedicated sports enthusiast with a passion for swimming, chess, netball, athletics, badminton, and soccer. My achievements include winning 3 medals (2 Gold, 1 Bronze) at the 2019 Aquatic Championship organized by Sri Lanka’s Aquatic Sports Union, as well as earning multiple awards such as Best Athlete (2015), Best Swimmer (2015-2020), Best Chess Player (2016, 2019), and Best Defender Netball (2018) at school.
                </p>
            </div>
            <!-- Other Team Members -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 w-full">
                <!-- Aqib Nazar -->
                <div class="bg-gray-700 p-4 rounded-lg shadow-lg">
                    <h2 class="text-lg font-semibold text-teal-400 text-center mb-2">Co-Founder</h2>
                    <img src="{{ asset('images/aqibimg.jpeg') }}" alt="Aqib Nazar" class="w-32 h-32 rounded-full mx-auto object-cover border-4 border-black">
                    <h1 class="text-2xl font-bold mt-4 text-blue-500 text-center">Aqib Nazar</h1>
                    <h4 class="text-lg font-medium mt-2 text-gray-300 text-center">BSc (Hons) Computer Science <br> Reading 2023 - Present</h4>
                    <p class="text-sm text-gray-400 mt-4 text-center">
                        I’m currently pursuing my degree while also managing responsibilities as an entrepreneur. I have a strong passion for technology and problem-solving, which drives my academic journey. Outside academics, I’ve been actively involved in rugby and basketball, where I’ve honed skills like teamwork, leadership, strategic thinking, and resilience.
                    </p>
                </div>
                <!-- Nishika Jayawardane -->
                <div class="bg-gray-700 p-4 rounded-lg shadow-lg">
                    <h2 class="text-lg font-semibold text-teal-400 text-center mb-2">Co-Founder</h2>
                    <img src="{{ asset('images/nishika.jpg') }}" alt="Nishika Jayawardane" class="w-32 h-32 rounded-full mx-auto object-cover border-4 border-black">
                    <h1 class="text-2xl font-bold mt-4 text-blue-500 text-center">Nishika Jayawardane</h1>
                    <h4 class="text-lg font-medium mt-2 text-gray-300 text-center">BSc (Hons) Computer Science <br> Reading 2023 - Present</h4>
                    <p class="text-sm text-gray-400 mt-4 text-center">
                        I'm a student who has a passion for exploring cutting-edge technologies. Academically, I have been recognized with awards for excellence. As an athlete I have excelled in individual running events and relays in school, where my team consistently secured first place, showcasing my commitment and teamwork.
                    </p>
                </div>
                <!-- Amisha Usanga -->
                <div class="bg-gray-700 p-4 rounded-lg shadow-lg">
                    <h2 class="text-lg font-semibold text-teal-400 text-center mb-2">Co-Founder</h2>
                    <img src="{{ asset('images/amishaimg.jpg') }}" alt="Amisha Usanga" class="w-32 h-32 rounded-full mx-auto object-cover border-4 border-black">
                    <h1 class="text-2xl font-bold mt-4 text-blue-500 text-center">Amisha Usanga</h1>
                    <h4 class="text-lg font-medium mt-2 text-gray-300 text-center">BSc (Hons) Computer Science <br> Reading 2023 - Present</h4>
                    <p class="text-sm text-gray-400 mt-4 text-center">
                        I'm a talented programmer and aspiring network engineer who actively participates in tech events and has a knack for solving complex technical problems. I'm also passionate about cricket, having won several tournaments in school cricket and currently playing for Ragama Cricket Club.
                    </p>
                </div>
            </div>
        </div>
    </section>
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
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const menuBtn = document.getElementById('menu-btn');
        const menu = document.getElementById('menu');

        menuBtn.addEventListener('click', function () {
            menu.classList.toggle('hidden');
        });
    });
</script>
</body>
</html>
