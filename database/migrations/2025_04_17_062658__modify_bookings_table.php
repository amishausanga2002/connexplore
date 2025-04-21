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
        Schema::table('bookings', function (Blueprint $table) {
        $table->dropcolumn(['equipment_id']);
        $table->dropcolumn('equipment_name');
    });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->foreign('equipment_id')->references('id')->on('equipment')->onDelete('cascade');
            $table->string('equipment_name')->nullable();
        });
       
    }
};
