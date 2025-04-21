<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ReservedEquipment extends Model
{
    use HasFactory;
    protected $table = 'reserved_equipment';
    protected $fillable = [
        'equipment_id',
        'booking_id',
        'time_slot',
        'set',
        'date' // Added to match migration
    ];

    /**
     * Get the equipment that's reserved
     */
    public function equipment()
    {
        return $this->belongsTo(Equipment::class);
    }

    /**
     * Get the parent booking
     */
    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }

    /**
     * Scope to check availability
     */
    public function scopeAvailable($query, $equipmentId, $date, $timeSlot)
    {
        return $query->where('equipment_id', $equipmentId)
                    ->where('date', $date)
                    ->where('time_slot', $timeSlot)
                    ->doesntExist();
    }
}

