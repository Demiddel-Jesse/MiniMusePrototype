<?php

namespace Database\Seeders;

use App\Models\Paint;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class PaintDeltaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (Paint::all() as $paint) {
            $paints_in_table = DB::table('paint_deltas')->select('paint_id_1')->where('id', '!=', $paint->id)->get();

            $other_paints = Paint::all()->where('id', '!=', $paint->id)->where('paint_brand_id', '!=', $paint->paint_brand_id)->whereNotIn('id', $paints_in_table)->id;

            foreach ($other_paints as $other_paint) {
                $paint->paints()->attach($other_paint, ['delta' => fake()->randomFloat(2, 0, 14)]);
            }
        }
    }
}
