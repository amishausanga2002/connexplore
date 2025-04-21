<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Bookings - Admin Panel</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0.75)),
                        url('{{ asset('images/bg.webp') }}') no-repeat center center fixed;
            background-size: cover;
        }

        .sidebar {
            background-color: #2d3748;
            color: white;
            padding: 40px 20px 20px 20px;
            height: auto;
            width: 250px;
            margin-top: auto;
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
            background-color: #3182ce;
            color: white;
        }

        .content {
            padding: 20px;
            margin-left: 270px;
        }

        .navbar {
            background-color: #2d3748;
        }

        .status-badge {
            display: inline-block;
            padding: 3px 8px;
            border-radius: 12px;
            font-size: 12px;
            font-weight: 500;
        }
        .status-active { background-color: #dcfce7; color: #166534; }
        .status-completed { background-color: #e0f2fe; color: #075985; }
        .btn-action {
            padding: 6px 12px;
            border-radius: 6px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.2s;
        }
        .btn-cancel {
            background-color: #fee2e2;
            color: #b91c1c;
        }
        .btn-cancel:hover {
            background-color: #fecaca;
        }
        .btn-disabled {
            background-color: #e2e8f0;
            color: #64748b;
            cursor: not-allowed;
        }
    </style>
</head>
<body class="bg-gray-100">
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
    <br><br>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg relative mb-4 max-w-4xl mx-auto" role="alert">
            <strong class="font-bold">Success! 🎉</strong>
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif

    <h2 class="text-white text-4xl font-bold text-center">
        Manage Bookings
    </h2>

    @if($bookings->isEmpty())
        <div class="bg-white rounded-lg shadow p-8 text-center max-w-4xl mx-auto mt-8">
            <img src="https://cdn-icons-png.flaticon.com/512/4076/4076478.png" alt="No bookings" class="w-24 mx-auto mb-4">
            <h3 class="text-lg font-medium text-gray-700">No Bookings Found</h3>
            <p class="text-gray-500">There are currently no bookings in the system.</p>
        </div>
    @else
        <table class="table-auto w-full max-w-4xl mx-auto mt-4 border-collapse">
            <thead class="bg-blue-600 text-white">
                <tr>
                    <th class="px-4 py-2">User</th>
                    <th class="px-4 py-2">Sport</th>
                    <th class="px-4 py-2">Location</th>
                    <th class="px-4 py-2">Date</th>
                    <th class="px-4 py-2">Time Slot</th>
                    <th class="px-4 py-2">Set</th>
                    <th class="px-4 py-2">Status</th>
                    <th class="px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody class="overflow-y-auto">
                @foreach($bookings as $booking)
                @php
                    $timeSlot = explode('-', $booking->time_slot);
                    $endTime = \Carbon\Carbon::parse($booking->date->format('Y-m-d') . ' ' . trim($timeSlot[1]));
                    $cutoffTime = $endTime->copy()->subMinutes(15);
                    $isPast = now()->gt($endTime);
                    $canCancel = now()->lt($cutoffTime);
                    
                    $statusClass = $isPast ? 'status-completed' : 'status-active';
                    $statusText = $isPast ? 'Completed' : 'Active';
                @endphp
                <tr class="border-b bg-white hover:bg-gray-100">
                    <td class="px-4 py-2">
                        <div class="font-medium">{{ $booking->user_name }}</div>
                        <div class="text-sm text-gray-500">{{ $booking->cbnumber }}</div>
                    </td>
                    <td class="px-4 py-2">{{ $booking->sport_name }}</td>
                    <td class="px-4 py-2">{{ $booking->location_name }}</td>
                    <td class="px-4 py-2">{{ $booking->date->format('M d, Y') }}</td>
                    <td class="px-4 py-2">{{ $booking->time_slot }}</td>
                    <td class="px-4 py-2">Set {{ $booking->set_number }}</td>
                    <td class="px-4 py-2">
                        <span class="status-badge {{ $statusClass }}">{{ $statusText }}</span>
                    </td>
                    <td class="px-4 py-2">
                        @if($canCancel)
                            <form action="{{ route('admin.bookings.destroy', $booking->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-action btn-cancel" 
                                    onclick="return confirm('Are you sure you want to cancel this booking?\n\nCancellation allowed until {{ $cutoffTime->format('g:i A') }}')">
                                    Cancel
                                </button>
                            </form>
                        @else
                            <button class="btn-action btn-disabled" disabled 
                                title="{{ $isPast ? 'Booking has ended' : 'Cancellation deadline passed (' . $cutoffTime->format('g:i A') . ')' }}">
                                Cancel
                            </button>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    <div class="flex justify-center mt-4">
        <a href="{{ route('admin') }}" class="bg-blue-800 hover:bg-blue-900 text-white font-bold py-2 px-4 rounded-lg shadow-md">
            Back to Admin Dashboard
        </a>
    </div>

    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    
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