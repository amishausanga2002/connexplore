<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserEquipmentReport extends Model
{
    protected $fillable = [
        'user_id',
        'user_name', // ✅ added
        'cb_number',
        'incident_date',
        'incident_time',
        'reported_on',
        'location',
        'sport_name',
        'equipment_name',
        'loss_description',
        'image',
    ];

}
