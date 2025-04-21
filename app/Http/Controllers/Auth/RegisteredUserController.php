<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\OtpVerificationMail;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
{
    $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'email' => [
            'required',
            'string',
            'email',
            'max:255',
            'unique:users,email',  // Ensures the email is not already registered
            'regex:/^[a-zA-Z0-9._%+-]+@students\.apiit\.lk$/', // Allow only cb******@students.apiit.lk emails
            // 'exists:approved_emails,email'  // Checks if the email is approved by admin
        ],
        'password' => ['required', 'confirmed', Rules\Password::defaults()],
    ]);

    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
    ]);

     // Generate OTP and store it in the database
     $otp = mt_rand(100000,999999);  // Generate a random 6-character OTP
     $user->otp = $otp;
     $user->save();
 
     // Send OTP via email
     Mail::to($user->email)->send(new OtpVerificationMail($otp));
 
     // Redirect user to OTP verification page
    //  return redirect(route('verifyOtp'));

    // event(new Registered($user));

    // Auth::login($user);

    // return redirect(route('dashboard', absolute: false));
    // Redirect user to OTP verification page
return redirect()->route('verifyOtp')->with('email', $user->email);

}

public function showOtpPage()
{
    return view('auth.verify-otp');
}

public function verifyOtp(Request $request)
{
    // Validate the OTP input
    $request->validate([
        'otp' => 'required|numeric|digits:6',
    ]);

    // Find the user by OTP
    $user = User::where('otp', $request->otp)->first();

    if ($user) {
        // Mark OTP as verified
        $user->otp_verified_at = now();
        $user->otp = null;  // Clear the OTP
        $user->save();

        // Log in the user
        Auth::login($user);

        // Redirect to the dashboard
        return redirect()->route('dashboard');
    } else {
        return back()->withErrors(['otp' => 'Invalid OTP']);
    }
}

}
