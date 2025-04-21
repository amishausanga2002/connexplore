<?php
use App\Models\EmailVerification;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use App\Mail\SendOtp;

class AuthController extends Controller{

public function sendOtp(Request $request)
{
    $request->validate([
        'email' => [
            'required',
            'email',
            'regex:/^cb[a-zA-Z0-9._%+-]+@students\.apiit\.lk$/'
        ],
    ]);
    
    $otp = rand(100000, 999999);

    EmailVerification::updateOrCreate(
        ['email' => $request->email],
        [
            'otp' => $otp,
            'expires_at' => Carbon::now()->addMinutes(10),
        ]
    );

    Mail::to($request->email)->send(new SendOtp($otp));

    return response()->json(['message' => 'OTP sent successfully']);
}

public function verifyOtp(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'otp' => 'required',
    ]);

    $record = EmailVerification::where('email', $request->email)
                ->where('otp', $request->otp)
                ->where('expires_at', '>=', Carbon::now())
                ->first();

    if (!$record) {
        return response()->json(['message' => 'Invalid or expired OTP'], 422);
    }

    return response()->json(['message' => 'OTP verified']);
}
}