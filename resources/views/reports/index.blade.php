<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>


<div class="container mx-auto px-4 py-6">
    <h1 class="text-3xl font-bold text-white text-center mb-6">Submitted Equipment Damage Reports</h1>

    @if(session('success'))
        <div class="bg-green-100 text-green-800 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto">
        <table class="table-auto w-full text-sm text-left text-white bg-gray-800 rounded-lg shadow-lg">
            <thead class="bg-gray-700 text-white">
                <tr>
                    <th class="px-4 py-2">CB Number</th>
                    <th class="px-4 py-2">Incident Date</th>
                    <th class="px-4 py-2">Time</th>
                    <th class="px-4 py-2">Reported On</th>
                    <th class="px-4 py-2">Location</th>
                    <th class="px-4 py-2">Sport</th>
                    <th class="px-4 py-2">Equipment</th>
                    <th class="px-4 py-2">Details</th>

                </tr>
            </thead>
            <tbody>
                @forelse($reports as $report)
                <tr class="bg-gray-900 border-b border-gray-700">
                    <td class="px-4 py-2">{{ $report->cb_number }}</td>
                    <td class="px-4 py-2">{{ $report->incident_date }}</td>
                    <td class="px-4 py-2">{{ \Carbon\Carbon::parse($report->incident_time)->format('h:i A') }}</td>
                    <td class="px-4 py-2">{{ $report->reported_on }}</td>
                    <td class="px-4 py-2">{{ $report->location }}</td>
                    <td class="px-4 py-2">{{ $report->sport_name }}</td>
                    <td class="px-4 py-2">{{ $report->equipment->name ?? 'N/A' }}</td>
                    <td class="px-4 py-2">{{ $report->damage_details }}</td>


                </tr>
                @empty
                    <tr>
                        <td colspan="9" class="text-center py-4 text-white">No reports submitted yet.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>




</body>
</html>