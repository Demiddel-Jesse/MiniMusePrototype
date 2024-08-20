<?php

namespace Database\Factories;

use App\Models\PaintBlock;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PaintBlockLine>
 */
class PaintBlockLineFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'layer_name' => fake()->name(),
            'paint_block_id' => PaintBlock::all()->random()->id,
        ];
    }
}
