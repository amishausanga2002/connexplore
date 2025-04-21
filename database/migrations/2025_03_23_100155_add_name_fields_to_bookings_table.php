<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('bookings', function (Blueprint $table) {
        $table->string('user_name')->nullable()->after('user_id');
        $table->string('sport_name')->nullable()->after('sport_id');
        $table->string('equipment_name')->nullable()->after('equipment_id');
        $table->string('location_name')->nullable()->after('location_id');
    });
}

public function down()
{
    Schema::table('bookings', function (Blueprint $table) {
        $table->dropColumn(['user_name', 'sport_name', 'equipment_name', 'location_name']);
    });
}
};
