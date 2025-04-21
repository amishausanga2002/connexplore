<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Booking</title>
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
            min-height: 100vh;
        }
        
        .form-container {
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 0.5rem;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar p-4 shadow-md bg-gray-800">
        <div class="container mx-auto flex items-center justify-between">
            <div class="flex items-center space-x-4">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-10">
                <div class="text-white text-2xl font-semibold">Connexplore System - Edit Booking</div>
            </div>
            <div class="flex items-center space-x-4">
                <form id="bookingForm" method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn btn-light">Logout</button>
                </form>
            </div>
        </div>
    </nav>

    <div class="container mx-auto p-4 mt-8">
        <div class="form-container p-6 max-w-4xl mx-auto">
            <h1 class="text-3xl font-bold mb-6 text-gray-800 border-b pb-2">Edit Booking</h1>

            <form action="{{ route('bookings.update', $booking->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- CB Number -->
                    <div class="mb-4">
                        <label for="cbnumber" class="block text-gray-700 font-medium mb-2">CB Number</label>
                        <input type="text" name="cbnumber" id="cbnumber" 
                               value="{{ old('cbnumber', $booking->cbnumber) }}"
                               class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                               required>
                        @error('cbnumber')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Sport -->
                    <div class="mb-4">
                        <label for="sport_id" class="block text-gray-700 font-medium mb-2">Sport</label>
                        <select name="sport_id" id="sport_id" 
                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                required>
                            @foreach($sports as $sport)
                                <option value="{{ $sport->id }}" {{ $booking->sport_id == $sport->id ? 'selected' : '' }}>
                                    {{ $sport->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Location -->
                    <div class="mb-4">
                        <label for="location_id" class="block text-gray-700 font-medium mb-2">Location</label>
                        <select name="location_id" id="location_id" 
                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                required>
                            @foreach($locations as $location)
                                <option value="{{ $location->id }}" {{ $booking->location_id == $location->id ? 'selected' : '' }}>
                                    {{ $location->branch }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Date -->
                    <div class="mb-4">
                        <label for="date" class="block text-gray-700 font-medium mb-2">Date</label>
                        <input type="date" name="date" id="date" 
                               value="{{ old('date', $booking->date->format('Y-m-d')) }}"
                               class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                               required min="{{ date('Y-m-d') }}">
                        @error('date')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Time Slot -->
                    <div class="mb-4">
                        <label for="time_slot" class="block text-gray-700 font-medium mb-2">Time Slot</label>
                        <select name="time_slot" id="time_slot" 
                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                required>
    @foreach ($slots as $slot)
        <option value="{{ $slot }}"
            {{ in_array($slot, $bookedSlots) ? 'disabled' : '' }}
            {{ $slot == $booking->time_slot ? 'selected' : '' }}>
            {{ $slot }}
        </option>
    @endforeach

                        </select>
                    </div>

                    <!-- Set Number -->
                    <div class="mb-4">
                        <label for="set_number" class="block text-gray-700 font-medium mb-2">Set Number</label>
                        <select name="set_number" id="set_number" 
                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                                required>
                            @for($i = 1; $i <= 2; $i++)
                                <option value="{{ $i }}" {{ $booking->set_number == $i ? 'selected' : '' }}>
                                    Set {{ $i }}
                                </option>
                            @endfor
                        </select>
                    </div>
                </div>

                <div class="mt-6 flex justify-end space-x-4">
                <a href="/my-bookings" class="btn btn-secondary">Cancel</a>
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition">
                        Update Booking
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Your footer remains the same -->
    <footer class="bg-black py-3 mt-8">
        <!-- Footer content -->
    </footer>

    <script>
        // Your existing JavaScript
        document.addEventListener('DOMContentLoaded', function() {
            const sportSelect = document.getElementById('sport_id');
            const locationSelect = document.getElementById('location_id');
            const dateInput = document.getElementById('date');
            const timeSlotSelect = document.getElementById('time_slot');
            const setNumberSelect = document.getElementById('set_number');
            
            function updateAvailableSets() {
                const sportId = sportSelect.value;
                const locationId = locationSelect.value;
                const date = dateInput.value;
                const timeSlot = timeSlotSelect.value;
                
                if (!sportId || !locationId || !date || !timeSlot) return;
                
                fetch(`/bookings/available-sets?sport_id=${sportId}&location_id=${locationId}&date=${date}&time_slot=${timeSlot}`)
                    .then(response => response.json())
                    .then(data => {
                        setNumberSelect.innerHTML = '';
                        
                        data.available_sets.forEach(set => {
                            const option = document.createElement('option');
                            option.value = set;
                            option.textContent = `Set ${set}`;
                            setNumberSelect.appendChild(option);
                        });
                        
                        const currentSet = "{{ $booking->set_number }}";
                        if (!data.available_sets.includes(parseInt(currentSet))) {
                            const option = document.createElement('option');
                            option.value = currentSet;
                            option.textContent = `Set ${currentSet} (Currently booked)`;
                            option.selected = true;
                            setNumberSelect.appendChild(option);
                        }
                    });
            }
            
            [sportSelect, locationSelect, dateInput, timeSlotSelect].forEach(element => {
                element.addEventListener('change', updateAvailableSets);
            });
            
            updateAvailableSets();
        });
    </script>
</body>
</html>