<?php

namespace Database\Factories;

use App\Models\PaintBrand;
use App\Models\User;
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
            'paint_brand_id' => PaintBrand::all()->random()->id,
            'created_by' => User::all()->random()->id,
        ];
    }

    public function add_link(): static
    {
        return $this->state(fn(array $attributes) => [
            'site_link' => fake()->safeEmail(),
        ]);
    }
}
