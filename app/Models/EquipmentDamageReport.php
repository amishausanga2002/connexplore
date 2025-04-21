<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EquipmentDamageReport extends Model
{
    protected $fillable = [
        'cb_number',
        'incident_date',
        'incident_time',
        'reported_on',
        'location',
        'sport_name',
        'equipment_id',
        'damage_details',
        'images',
        'status',
    ];

    public function equipment()
    {
        return $this->belongsTo(Equipment::class);
    }
}

