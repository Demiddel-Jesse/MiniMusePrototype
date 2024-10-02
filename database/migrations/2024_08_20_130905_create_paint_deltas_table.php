<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('paint_deltas', function (Blueprint $table) {
            $table->foreignId('paint_id_1')->constrained('paints')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('paint_id_2')->constrained('paints')->cascadeOnDelete()->cascadeOnUpdate();
            $table->float('delta');

            $table->primary(['paint_id_1', 'paint_id_2']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paint_deltas');
    }
};
