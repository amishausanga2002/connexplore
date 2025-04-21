<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    use HasFactory;

    // Ensure the fillable property includes all fields that need mass assignment
    protected $fillable = ['name', 'sport_id', 'location_id', 'set', 'image', 'availability_status'];


    // Define a relationship to the Sport model
    public function sport()
    {
        return $this->belongsTo(Sport::class);
    }

    // Define a relationship to the Location model
    public function location()
    {
        return $this->belongsTo(Location::class);
    }



public function reservations()
{
    return $this->hasMany(ReservedEquipment::class);
}

public function isAvailableFor($date, $timeSlot)
{
    return !$this->reservations()
               ->where('date', $date)
               ->where('time_slot', $timeSlot)
               ->exists();
}
}
