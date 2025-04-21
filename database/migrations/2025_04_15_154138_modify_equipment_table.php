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
  
        Schema::table('equipment', function (Blueprint $table) {
            // To drop a column (description in this case)
            $table->dropColumn('description');
            
            // To rename a column (assuming you're renaming 'old_name' to 'new_name')
            $table->renameColumn('quantity', 'set');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('equipment');
        Schema::table('equipment', function (Blueprint $table) {
            // For rolling back - recreate the column and rename back
            $table->text('description')->nullable();
            $table->renameColumn('set', 'quantity');
        });
    }
};
