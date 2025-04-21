<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sport extends Model
{
    // Allow mass assignment for these fields
    protected $fillable = [
        'name',
        'max_players',
        'min_players',
        'image',
        'location_id', // Include location_id in the fillable attributes
    ];

    /**
     * Get the location that the sport belongs to.
     */
    public function location()
{
    return $this->belongsTo(Location::class, 'location_id');
}
}

