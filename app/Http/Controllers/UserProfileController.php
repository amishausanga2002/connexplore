<?php

namespace App\Http\Controllers;

use App\Models\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserProfileController extends Controller
{
    public function create()
{
    return view('profiles.create'); // Ensure this view exists in your resources/views/profile directory
}
    // Show the update form
    public function edit()
{
    $user = Auth::user();
    if (!$user) {
        abort(403, 'Unauthorized action.');
    }
    $profile = \App\Models\UserProfile::where('user_id', $user->id)->firstOrFail();

    return view('profiles.edit', compact('profile'));
}

    public function store(Request $request)
{
    $request->validate([
        'bio' => 'required|string',
        'interests' => 'required|string'
    ]);

    $profile = new UserProfile([
        'user_id' => \Illuminate\Support\Facades\Auth::user()->id,
        'bio' => $request->bio,
        'interests' => $request->interests
    ]);
    $profile->save();

    return redirect()->route('dashboard')->with('success', 'Profile created successfully!');
}

    // Handle the update request
    public function update(Request $request) // ✅ FIXED
    {
        $validated = $request->validate([
            'bio' => 'required|string',
            'interests' => 'required|string',
        ]);

        $profile = \App\Models\UserProfile::where('user_id', Auth::user()->id)->firstOrFail();
        $profile->update($validated);

        return redirect()->route('profiles.edit')->with('status', 'Profile updated!');
    }

}
