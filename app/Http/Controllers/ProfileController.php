<?php

namespace App\Http\Controllers;

use App\Models\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\RedirectResponse;

class ProfileController extends Controller
{
    /**
     * Show the profile edit form.
     */
    public function edit()
    {
        $profile = UserProfile::firstOrCreate(
            ['user_id' => Auth::id()],
            ['bio' => '', 'interests' => '']
        );

        return view('profiles.edit', compact('profile'));
    }

    /**
     * Update the user's profile (user_profiles table).
     */
    public function update(Request $request) // ✅ only one parameter
{
    $validated = $request->validate([
        'bio' => 'required|string',
        'interests' => 'required|string',
    ]);

    $profile = \App\Models\UserProfile::where('user_id', Auth::id())->firstOrFail();
    $profile->update($validated);

    return redirect()->route('dashboard')->with('success', 'Profile updated successfully!');
}


    /**
     * (Optional) Delete profile, not full user account.
     */
    public function destroyProfile(): RedirectResponse
    {
        UserProfile::where('user_id', Auth::id())->delete();
        return Redirect::route('dashboard')->with('status', 'profile-deleted');
    }
}
