<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $fillable = ['branch']; // Assuming your locations table has at least a 'name' column

    /**
     * Get the sports associated with the location.
     */
    public function sports()
    {
        return $this->hasMany(Sport::class); // Defines a relationship where a location can have many sports
    }
}
