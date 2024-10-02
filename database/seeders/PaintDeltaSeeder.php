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
        DB::table('paint_deltas')->delete();
        foreach (Paint::all() as $paint) {
            $existing_paint_combinations = DB::table('paint_deltas')
                ->select('paint_id_1', 'paint_id_2')
                ->where('paint_id_1', '=', $paint->id)
                ->orWhere('paint_id_2', '=', $paint->id)
                ->get()
                ->map(function ($item) {
                    return [$item->paint_id_1, $item->paint_id_2];
                });

            // Retrieve all other paints that are not the same as the current paint and not of the same brand
            $other_paints = Paint::where('id', '!=', $paint->id)
                ->where('paint_brand_id', '!=', $paint->paint_brand_id)  // Ensure different brands
                ->get();

            // Iterate over the other paints and attach them if the combination doesn't exist
            foreach ($other_paints as $other_paint) {
                // Check if the combination already exists in paint_deltas
                $combination_exists = $existing_paint_combinations->contains(function ($pair) use ($paint, $other_paint) {
                    return (in_array($paint->id, $pair) && in_array($other_paint->id, $pair));
                });

                if (!$combination_exists) {
                    // Attach the paint combination with a random delta
                    $paint->paints()->attach($other_paint->id, ['delta' => fake()->randomFloat(2, 0, 14)]);
                }
            }
        }
    }
}
