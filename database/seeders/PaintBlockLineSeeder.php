<?php

namespace Database\Seeders;

use App\Models\PaintBlockLine;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaintBlockLineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PaintBlockLine::factory()->count(20)->create();
    }
}
