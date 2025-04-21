<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Booking;
use Carbon\Carbon;
use App\Notifications\GameReminder;

class SendGameReminders extends Command
{
    protected $signature = 'reminders:send';
    protected $description = 'Send game reminders 5 minutes before start';

    public function handle()
    {
        $now = Carbon::now();
        $reminderTime = $now->addMinutes(5);
        
        $bookings = Booking::where('status', 'approved')
            ->whereDate('booking_date', $reminderTime->toDateString())
            ->whereTime('start_time', $reminderTime->format('H:i'))
            ->where('reminder_sent', false)
            ->with('user')
            ->get();
            
        foreach ($bookings as $booking) {
            $booking->user->notify(new GameReminder($booking));
            $booking->update(['reminder_sent' => true]);
        }
        
        $this->info('Sent ' . $bookings->count() . ' reminders.');
    }
}