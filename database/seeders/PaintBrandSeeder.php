<?php

namespace Database\Seeders;

use App\Models\PaintBrand;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaintBrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PaintBrand::factory()->count(4)->create();
        PaintBrand::factory()->count(4)->add_link()->create();
    }
}
