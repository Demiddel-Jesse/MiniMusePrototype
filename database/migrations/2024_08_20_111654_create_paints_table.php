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
        Schema::create('paints', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('hexcode', 12);
            $table->string('site_link')->nullable();
            $table->foreignId('paint_brand_id')->constrained('paint_brands')->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paints');
    }
};
