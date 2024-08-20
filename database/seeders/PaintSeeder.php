<?php

namespace Database\Seeders;

use App\Models\Paint;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaintSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Paint::factory()->count(40)->create();
        Paint::factory()->count(10)->add_link()->create();
    }
}
