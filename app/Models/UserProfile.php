<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'bio', 'interests'];

    // User relation
    public function user()
{
    return $this->belongsTo(User::class, 'user_id');
}
public function create()
{
    return view('profile.create');
}
}


