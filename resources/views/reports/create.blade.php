<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report Equipment Damage</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto px-4 py-6 mt-20">
        <div class="max-w-3xl mx-auto bg-white p-6 rounded-lg shadow-lg">
            <h1 class="text-3xl font-bold mb-6 text-center">Equipment Damage/Loss Reporting Form</h1>
            <form action="{{ route('reports.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- CB Number -->
                <div class="mb-4">
                    <label for="cb_number" class="block text-gray-700 font-semibold">CB Number</label>
                    <input type="text" name="cb_number" id="cb_number" required class="form-input mt-1 block w-full rounded-md shadow-sm border-gray-300">
                    @error('cb_number')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Incident Date -->
                <div class="mb-4">
                    <label for="incident_date" class="block text-gray-700 font-semibold">Incident Date</label>
                    <input type="date" name="incident_date" id="incident_date" required class="form-input mt-1 block w-full rounded-md shadow-sm border-gray-300">
                    @error('incident_date')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Time of Incident -->
                <div class="mb-4">
                    <label for="incident_time" class="block text-gray-700 font-semibold">Time of Incident</label>
                    <input type="time" name="incident_time" id="incident_time" required class="form-input mt-1 block w-full rounded-md shadow-sm border-gray-300">
                    @error('incident_time')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Reported On -->
                <div class="mb-4">
                    <label for="reported_on" class="block text-gray-700 font-semibold">Reported On</label>
                    <input type="date" name="reported_on" id="reported_on" required class="form-input mt-1 block w-full rounded-md shadow-sm border-gray-300">
                    @error('reported_on')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Location -->
                <div class="mb-4">
                    <label for="location" class="block text-gray-700 font-semibold">Location</label>
                    <input type="text" name="location" id="location" required class="form-input mt-1 block w-full rounded-md shadow-sm border-gray-300">
                    @error('location')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Sport Name -->
                <div class="mb-4">
                    <label for="sport_name" class="block text-gray-700 font-semibold">Sport Name</label>
                    <input type="text" name="sport_name" id="sport_name" required class="form-input mt-1 block w-full rounded-md shadow-sm border-gray-300">
                    @error('sport_name')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Equipment ID -->
                <div class="mb-4">
                    <label for="equipment_id" class="block text-gray-700 font-semibold">Equipment ID</label>
                    <input type="text" name="equipment_id" id="equipment_id" required class="form-input mt-1 block w-full rounded-md shadow-sm border-gray-300">
                    @error('equipment_id')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Damage Details -->
                <div class="mb-4">
                    <label for="damage_details" class="block text-gray-700 font-semibold">Details of Damage/Loss</label>
                    <textarea name="damage_details" id="damage_details" required class="form-textarea mt-1 block w-full rounded-md shadow-sm border-gray-300"></textarea>
                    @error('damage_details')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Image Upload -->
                <div class="mb-4">
                    <label for="images" class="block text-gray-700 font-semibold">Upload Images</label>
                    <input type="file" name="images[]" id="images" multiple class="form-input mt-1 block w-full text-base font-normal bg-white border border-gray-300 rounded-md">
                    @error('images')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Submit Button -->
                <div class="mb-4">
                    <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg transition duration-200">Submit Report</button>
                </div>
            </form>

        </div>
    </div>
</body>
</html>
