<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('equipment', function (Blueprint $table) {
            $table->id();  // Primary key
            $table->string('name');
            $table->unsignedBigInteger('sport_id');  // Foreign key to sports table
            $table->unsignedBigInteger('location_id');  // Foreign key to locations table
            $table->integer('set');
            $table->string('image')->nullable();
            $table->timestamps();  // For created_at and updated_at

            // Define foreign key constraints
            $table->foreign('sport_id')->references('id')->on('sports')->onDelete('cascade');
            $table->foreign('location_id')->references('id')->on('locations')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('equipment');
    }
};
