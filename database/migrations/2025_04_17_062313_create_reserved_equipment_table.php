<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('reserved_equipment', function (Blueprint $table) {
            $table->id();
            $table->foreignId('equipment_id')->constrained('equipment')->onDelete('cascade');
            $table->foreignId('booking_id')->constrained('bookings')->onDelete('cascade');
            $table->foreignId('set')->constrained('equipment')->onDelete('cascade');;
            $table->string('time_slot'); // e.g. "08:00-10:00"
            $table->date('date');
            $table->timestamps();
            
            // Prevent double-booking of same equipment in same slot
            $table->unique(['equipment_id', 'time_slot', 'booking_id','set']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reserved_equipment');
    }
};
