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
        Schema::create('paint_block_line_has_paint', function (Blueprint $table) {
            $table->foreignId('paint_id')->constrained('paints')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('paint_block_line_id')->constrained('paint_block_lines')->cascadeOnDelete()->cascadeOnUpdate();
            $table->integer('amount')->nullable()->default(null);

            $table->primary(['paint_id', 'paint_block_line_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paint_block_line_has_paint');
    }
};
