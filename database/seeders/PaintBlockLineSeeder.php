<?php

namespace Database\Seeders;

use App\Models\Paint;
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

        foreach (PaintBlockLine::all() as $paint_block_line) {
            $paints = Paint::inRandomOrder()->take(rand(1, 5))->pluck('id');

            foreach ($paints as $paint) {
                $paint_block_line->paints()->attach($paint, ['amount' => random_int(1, 4)]);
            }
        }
    }
}
