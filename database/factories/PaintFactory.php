<?php

namespace Database\Factories;

use App\Models\PaintBrand;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Paint>
 */
class PaintFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'hexcode' => fake()->safeHexColor(),
            'brand_id' => PaintBrand::all()->random()->id,
        ];
    }

    public function link(): static
    {
        return $this->state(fn(array $attributes) => [
            'site_link' => fake()->link(),
        ]);
    }
}
