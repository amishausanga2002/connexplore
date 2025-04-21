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
    Schema::create('locations', function (Blueprint $table) {
        $table->id();  // This is the primary key (auto-incrementing)
        $table->string('branch');  // The location's branch name
        $table->timestamps();  // Created at and updated at timestamps
    });
}

public function down()
{
    Schema::dropIfExists('locations');
}

};
