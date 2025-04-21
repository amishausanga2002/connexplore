<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Sport;
use App\Models\Equipment;
use App\Models\Location;
use Illuminate\Support\Facades\Auth;


class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bookings = Booking::with(['user', 'sport', 'equipment', 'location'])->get();
        return view('bookings.index', compact('bookings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Fetch only equipment that is not marked as 'damaged'
        $sports = Sport::all(); // Assuming you also need a list of sports
        $locations = Location::all(); // Assuming you also need a list of locations

        return view('bookings.create', [
            'sports' => $sports,
            'locations' => $locations
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'cbnumber' => 'required|string|max:255',
        'sport_id' => 'required|exists:sports,id',
        'location_id' => 'required|exists:locations,id',
        'date' => 'required|date',
        'time_slot' => 'required|string',
        'set_number' => 'required|integer' // Add validation for set number
    ]);

 

    $user = Auth::user();
    $sport = Sport::find($request->sport_id);
    $location = Location::find($request->location_id);

    // Check if the set is available
    $isSetAvailable = Equipment::where('sport_id', $request->sport_id)
        ->where('location_id', $request->location_id)
        ->where('set', $request->set_number)
        ->whereDoesntHave('reservations', function($query) use ($request) {
            $query->where('date', $request->date)
                  ->where('time_slot', $request->time_slot);
        })
        ->exists();

        if (!$isSetAvailable) {
            return back()->with('error', 'The selected set is not available for the chosen time slot')->withInput();
        }

   $booking= Booking::create([
        'user_id' => $user->id,
        'user_name' => $user->name ?? $user->email,
        'cbnumber' => $request->cbnumber,
        'sport_id' => $sport->id,
        'sport_name' => $sport->name,
        'location_id' => $location->id,
        'location_name' => $location->branch,
        'date' => $request->date,
        'time_slot' => $request->time_slot,
        'set_number' => $request->set_number // Store the set number with booking
    ]);
     // Reserve the equipment
    $booking->reserveSetEquipment($request->date, $request->time_slot);

    return redirect()->route('users.sports-page')->with('success', 'Booking created successfully.');
}
/** * Generate time slots (helper method)
     */
    private function generateTimeSlots()
    {
        return [
            '08:00-10:00',
            '10:00-12:00',
            '12:00-14:00',
            '14:00-16:00',
            '16:00-18:00',
            '18:00-20:00'
        ];
    } 
 /**
     * Get available time slots for a sport/location/date
     */
    public function getAvailableSlots(Request $request)
    {
        $request->validate([
            'sport_id' => 'required|exists:sports,id',
            'location_id' => 'required|exists:locations,id',
            'date' => 'required|date|after_or_equal:today'
        ]);
    
        // Get all sets for this sport/location
        $allSets = Equipment::where('sport_id', $request->sport_id)
            ->where('location_id', $request->location_id)
            ->select('set')
            ->distinct()
            ->pluck('set')
            ->sort()
            ->values();
    
        // Get all possible time slots
        $allSlots = $this->generateTimeSlots();
    
        // Filter available slots and sets
        $availableSlots = [];
        $availableSets = [];
    
        foreach ($allSlots as $slot) {
            $slotAvailable = false;
            
            foreach ($allSets as $set) {
                // Check if ALL equipment in this set is available
                $setAvailable = true;
                $equipmentInSet = Equipment::where('sport_id', $request->sport_id)
                    ->where('location_id', $request->location_id)
                    ->where('set', $set)
                    ->get();
    
                foreach ($equipmentInSet as $equipment) {
                    if (!$equipment->isAvailableFor($request->date, $slot)) {
                        $setAvailable = false;
                        break;
                    }
                }
    
                if ($setAvailable) {
                    $slotAvailable = true;
                    // Only add to availableSets if we're checking a specific time slot
                    if ($request->has('time_slot') && $slot === $request->time_slot && !in_array($set, $availableSets)) {
                        $availableSets[] = $set;
                    }
                }
            }
    
            if ($slotAvailable) {
                $availableSlots[] = $slot;
            }
        }
    
        // If checking for a specific time slot, sort available sets
        if ($request->has('time_slot')) {
            sort($availableSets); // This will ensure sets are in order (1, 2, 3...)
        }
    
        return response()->json([
            'available_slots' => $availableSlots,
            'available_sets' => $availableSets
        ]);
    

    }
    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $booking = Booking::findOrFail($id);
        return view('bookings.show', compact('booking'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $booking = Booking::findOrFail($id);
        $sports = Sport::all();
        $equipment = Equipment::all();
        $locations = Location::all();
        $bookedSlots = Booking::where('id', '!=', $booking->id)->pluck('time_slot')->toArray();
        $slots = [
        '08:00-10:00',
        '10:00-12:00',
        '12:00-14:00',
        '14:00-16:00',
        '16:00-18:00',
        '18:00-20:00'
    ];
 
        return view('bookings.edit', compact('booking', 'sports', 'equipment', 'locations','slots','bookedSlots'));
      
       

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'cbnumber' => 'required|string|max:255',
            'sport_id' => 'required|exists:sports,id',
            'location_id' => 'required|exists:locations,id',
            'date' => 'required|date',
            'time_slot' => 'required|string',
            'set_number' => 'required|integer'
        ]);
    
        $booking = Booking::findOrFail($id);
        
        // Authorization check
        if ($booking->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }
    
        $sport = Sport::find($request->sport_id);
        $location = Location::find($request->location_id);
    
        // Check set availability (excluding current booking)
        $isSetAvailable = Equipment::where('sport_id', $request->sport_id)
            ->where('location_id', $request->location_id)
            ->where('set', $request->set_number)
            ->whereDoesntHave('reservations', function($query) use ($request, $booking) {
                $query->where('date', $request->date)
                      ->where('time_slot', $request->time_slot)
                      ->where('booking_id', '!=', $booking->id);
            })
            ->exists();
    
        if (!$isSetAvailable) {
            return back()->with('error', 'The selected set is not available for the chosen time slot')->withInput();
        }
        $newSlot = $request->input('time_slot'); // ✅ define it like this
        $existingBooking = Booking::where('time_slot', $newSlot)
        ->where('id', '!=', $booking->id) // Exclude the current booking
        ->exists();
    
    if ($existingBooking) {
        return back()->with('error', 'Time slot already booked!');
    }
    
        // Update booking
        $booking->update([
            'cbnumber' => $request->cbnumber,
            'sport_id' => $sport->id,
            'sport_name' => $sport->name,
            'location_id' => $location->id,
            'location_name' => $location->branch,
            'date' => $request->date,
            'time_slot' => $request->time_slot,
            'set_number' => $request->set_number
        ]);
    
        // Update reserved equipment
        $booking->reservedEquipment()->delete(); // Remove old reservations
        $booking->reserveSetEquipment($request->date, $request->time_slot); // Create new ones
    
        return redirect('/my-bookings')->with('success', 'Booking updated successfully.');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $booking = Booking::findOrFail($id);
    
    // Authorization - user can only cancel their own bookings
    if ($booking->user_id !== Auth::id()) {
        abort(403, 'Unauthorized action.');
    }

    // Delete associated reserved equipment first
    $booking->reservedEquipment()->delete();


    // Then delete the booking
        $booking->delete();

        // Option 1: Using named route (preferred)
        return redirect('/my-bookings')->with('success', 'Booking cancelled successfully.');

}

    public function myBookings()
{
    $userId = Auth::id();

    $bookings = Booking::where('user_id', $userId)->get();

    return view('bookings.my-bookings', compact('bookings'));
}




}
