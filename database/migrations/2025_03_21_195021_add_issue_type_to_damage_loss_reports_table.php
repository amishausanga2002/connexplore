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
        Schema::table('damage_loss_reports', function (Blueprint $table) {
            $table->string('issue_type')->after('time'); // Adds the new column after 'time' column
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('damage_loss_reports', function (Blueprint $table) {
            //
        });
    }
};
