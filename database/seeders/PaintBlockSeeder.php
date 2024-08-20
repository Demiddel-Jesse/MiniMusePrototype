<?php

namespace Database\Seeders;

use App\Models\PaintBlock;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaintBlockSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PaintBlock::factory()->count(20)->create();
    }
}
