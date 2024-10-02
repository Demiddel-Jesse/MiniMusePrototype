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
        Schema::table('tags', function (Blueprint $table) {
            $table->foreignId('tag_type_id')->default(1)->constrained('tag_types')->cascadeOnDelete()->cascadeOnUpdate();
            $table->dropColumn('type');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tags', function (Blueprint $table) {
            $table->dropForeign('tag_type_id');
            $table->string('type')->nullable()->default('text');
        });
    }
};
