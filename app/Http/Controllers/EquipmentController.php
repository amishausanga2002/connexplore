<?php

namespace App\Http\Controllers;

use App\Models\Equipment;
use App\Models\Location;
use App\Models\Sport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EquipmentController extends Controller
{
    public function index()
    {
        // Eager load the location and sport data
        $equipments = Equipment::with('location', 'sport')->get();
        return view('equipments.index', compact('equipments'));
    }

    public function create()
    {
        // Fetch all locations and sports from the database
        $locations = Location::all();
        $sports = Sport::all();

        return view('equipments.create', [
            'locations' => $locations,
            'sports' => $sports
        ]);
    }




    public function store(Request $request)
    {
        // Validate the incoming request data including sport_id and availability_status
        $data = $request->validate([
            'name' => 'required',
            'location_id' => 'required|exists:locations,id',
            'sport_id' => 'required|exists:sports,id',
            'set' => 'required|numeric',
            'image' => 'image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        // Handle file upload
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('images', 'public');
        }

        // Create a new equipment record
        Equipment::create($data);

        // Redirect to the equipment list page with success message
        return redirect()->route('equipments.index')->with('success', 'Equipment successfully created!');
    }

    public function edit(Equipment $equipment)
    {
        // Fetch all locations and sports from the database
        $locations = Location::all();
        $sports = Sport::all();

        return view('equipments.edit', [
            'equipment' => $equipment,
            'locations' => $locations,
            'sports' => $sports
        ]);
    }

    public function update(Request $request, Equipment $equipment)
    {
        // Validate the incoming request data including sport_id and availability_status
        $data = $request->validate([
            'name' => 'required',
            'location_id' => 'required|exists:locations,id',
            'sport_id' => 'required|exists:sports,id',
            'availability_status' => 'required|string',
            'set' => 'required|numeric',
            'image' => 'image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        // Check and handle file upload
        if ($request->hasFile('image')) {
            // Delete old image if it exists
            if ($equipment->image) {
                Storage::delete('public/' . $equipment->image);
            }
            // Store new image and update the data array
            $data['image'] = $request->file('image')->store('images', 'public');
        }

        // Update the equipment record with new data
        $equipment->update($data);

        // Redirect to the equipment list page with success message
        return redirect()->route('equipments.index')->with('success', 'Equipment successfully updated!');
    }

    public function destroy(Equipment $equipment)
    {
        // Delete the equipment record
        if ($equipment->image) {
            Storage::delete('public/' . $equipment->image);
        }
        $equipment->delete();

        // Redirect to the equipment list page with success message
        return redirect()->route('equipments.index')->with('success', 'Equipment successfully deleted!');
    }

    public function getAvailableEquipmentSets(Request $request)
    {
        $request->validate([
            'sport_id' => 'required|exists:sports,id',
            'location_id' => 'required|exists:locations,id',
            'date' => 'required|date|after_or_equal:today',
            'time_slot' => 'sometimes|string' // Optional for pre-selection
        ]);
    
        // 1. Get all equipment matching sport/location
        $equipmentSets = Equipment::where('sport_id', $request->sport_id)
            ->where('location_id', $request->location_id)
            ->where('availability_status', 'available')
            ->get()
            ->groupBy('set');
    
        // 2. Filter out sets with booked equipment
        $availableSets = [];
        foreach ($equipmentSets as $setNumber => $equipments) {
            $allAvailable = true;
            
            foreach ($equipments as $equipment) {
                $isBooked = Booking::where('equipment_id', $equipment->id)
                    ->where('date', $request->date)
                    ->where('time_slot', $request->time_slot)
                    ->exists();
                    
                if ($isBooked) {
                    $allAvailable = false;
                    break;
                }
            }
            
            if ($allAvailable) {
                $availableSets[$setNumber] = $equipments;
            }
        }
    
        return response()->json([
            'available_sets' => $availableSets,
            'time_slots' => $this->getTimeSlots() // Helper method
        ]);
    }

}
