<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB; 
use Illuminate\Notifications\Notifiable; // Add this line

class Booking extends Model
{
    use HasFactory, Notifiable; 

    protected $fillable = [
        'user_id',
        'user_name',
        'cbnumber',
        'sport_id',
        'sport_name',
        'location_id',
        'location_name',
        'date',
        'time_slot',
        'set_number'
    ];

    // app/Models/Booking.php
protected $casts = [
    'date' => 'date', // This automatically casts the date to a Carbon instance
];

/**
     * Reserve all equipment in a set for a time slot
     */
    public function reserveSetEquipment($date, $timeSlot)
    {
        try {
            return DB::transaction(function () use ($date, $timeSlot) {
                $equipmentItems = Equipment::where('sport_id', $this->sport_id)
                    ->where('location_id', $this->location_id)
                    ->where('set', $this->set_number)
                    ->get();
    
                $createdReservations = [];
                
                foreach ($equipmentItems as $equipment) {
                    $reservation = ReservedEquipment::create([
                        'equipment_id' => $equipment->id,
                        'booking_id' => $this->id,
                        'time_slot' => $timeSlot,
                        'set' => $this->set_number,
                        'date' => $date
                    ]);
                    
                    $createdReservations[] = $reservation;
                    
                    // Update equipment status
                    $equipment->update(['availability_status' => 'reserved']);
                }
    
                \Log::info('Reservations created:', $createdReservations);
                return $createdReservations;
            });
        } catch (\Exception $e) {
            \Log::error('Reservation failed:', ['error' => $e->getMessage()]);
            throw $e;
        }
    }
    

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function sport()
    {
        return $this->belongsTo(Sport::class);
    }


public function reservedEquipment()
{
    return $this->hasMany(ReservedEquipment::class);
}

    public function location()
    {
        return $this->belongsTo(Location::class);
    }


    public function canBeEdited()
{
    // Example: Only allow editing if the booking date is in the future
    return $this->date->isFuture();
}


public function canBeCancelled()
{
    // Example: Can cancel up to 24 hours before booking date
    return $this->date->gt(now()->addDay());
    
   
}

}
