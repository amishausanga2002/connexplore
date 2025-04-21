<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\ReservedEquipment;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Mail\BookingApprovedMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;




class BookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::with(['user', 'sport', 'location', 'reservedEquipment.equipment'])
            ->orderBy('date', 'desc')
            ->orderBy('time_slot', 'desc')
            ->get()
            ->map(function ($booking) {
                // Calculate cancellation cutoff time
                $timeSlot = explode('-', $booking->time_slot);
                $booking->end_time = Carbon::parse($booking->date->format('Y-m-d') . ' ' . trim($timeSlot[1]));
                $booking->cutoff_time = $booking->end_time->copy()->subMinutes(15);
                $booking->can_cancel = now()->lt($booking->cutoff_time);
                
                return $booking;
            });
            
        return view('admin.bookings.index', compact('bookings'));
    }

    public function destroy(Booking $booking)
    {
        
            // Calculate cancellation cutoff
            $timeSlot = explode('-', $booking->time_slot);
            $endTime = Carbon::parse($booking->date->format('Y-m-d') . ' ' . trim($timeSlot[1]));
            $cutoffTime = $endTime->copy()->subMinutes(15);
            
            if (now()->gt($cutoffTime)) {
                return back()->with('error', 'Cancellation deadline passed (' . $cutoffTime->format('g:i A') . ')');
            }

            // Store user email for logging before deletion
            $userEmail = $booking->user->email;
            

            // Delete related records
            ReservedEquipment::where('booking_id', $booking->id)->delete();
            $booking->delete();

            return back()->with('success', 'Booking cancelled ');
            
        
    }

    // When approving a booking
public function approveBooking($bookingId)
{
    $booking = Booking::findOrFail($bookingId);
    $booking->update(['status' => 'approved']);

    // When booking is approved
Mail::to($user->email)->send(new BookingApprovedMail($booking));
    
    // Send notification
    //$booking->user->notify(new BookingApproved($booking));
    
    return redirect()->back()->with('success', 'Booking approved!');
}

// When cancelling a booking
public function cancelBooking($bookingId)
{
    $booking = Booking::findOrFail($bookingId);
    $booking->update(['status' => 'cancelled']);
    
    // Send notification
    //$booking->user->notify(new BookingCancelled($booking));
    
    return redirect()->back()->with('success', 'Booking cancelled!');
}


}