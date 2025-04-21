

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
        Schema::create('equipment_damage_reports', function (Blueprint $table) {
            $table->id();
            $table->string('cb_number');
            $table->date('incident_date');
            $table->time('incident_time');
            $table->date('reported_on');
            $table->string('location');
            $table->string('sport_name');
            $table->unsignedBigInteger('equipment_id');
            $table->text('damage_details');
            $table->longText('images')->nullable(); // Fixed here
            $table->timestamps();

            $table->foreign('equipment_id')
                  ->references('id')->on('equipment')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('equipments_damage_reports');
    }
};

