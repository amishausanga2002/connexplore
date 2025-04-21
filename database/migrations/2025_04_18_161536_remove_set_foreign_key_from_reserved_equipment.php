<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('reserved_equipment', function (Blueprint $table) {
            $table->dropForeign(['set']); // Remove the foreign key constraint
        });
    }

    public function down()
    {
        Schema::table('reserved_equipment', function (Blueprint $table) {
            // Only re-add this if you really need it (you probably don't)
            $table->foreign('set')->references('id')->on('equipment');
        });
    }
};