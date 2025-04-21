<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('user_equipment_reports', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id');
            $table->string('user_name'); // ✅ store user's name

            $table->string('cb_number');
            $table->date('incident_date');
            $table->time('incident_time');
            $table->date('reported_on');
            $table->string('location');

            $table->string('sport_name');
            $table->string('equipment_name'); // ✅ no foreign key used

            $table->text('loss_description');
            $table->string('image')->nullable();

            $table->timestamps();

            // Foreign key constraint for user
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('user_equipment_reports');
    }
};
